<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct(){
		parent::__construct();
		if ($this->session->userdata('status')!="user") {
			redirect('user/login');exit();
		}
	}
	
	function index(){
		redirect('user/order');
    }
    function profile(){
        $id_user =  $this->session->userdata('id_user');
		if($id_user > 0){
			$data['title'] = 'profile';
            $data['side'] = 'index';
			$data['profile'] = $this->db->query("SELECT * FROM user WHERE id_user = '$id_user'")->result()[0];
			$this->master($data,'profile');
		}else{
			show_404();
		}
    }
    function profile_update(){
		if($this->input->post('submit')){
            $id_user = $this->session->userdata('id_user');
            $old_password = md5($this->input->post('old_password'));
            $new_password = $this->input->post('new_password');
            $confirm_password = $this->input->post('confirm_password');

            $cek_old_password = $this->db->query("SELECT password FROM user WHERE password = '$old_password' AND id_user = '$id_user'")->num_rows();
            if($cek_old_password == 1){
                if($new_password == $confirm_password){
                    $data_update = array(
                        'password' => md5($new_password),
                    );
                    $this->db->where('id_user',$id_user);
                    $this->db->update('user',$data_update);

                    $this->session->set_flashdata('item', array('message' => 'Berhasil mengganti password','color' => 'success'));
                }else{
                    //konfirmasi password baru anda tidak sama
                    $this->session->set_flashdata('item', array('message' => 'Konfirmasi password baru anda tidak sama','color' => 'danger'));
                }
            }else{
                //password lama anda salah
                $this->session->set_flashdata('item', array('message' => 'Password lama anda salah','color' => 'danger'));
            }

			redirect('user/profile');
		}else{
			show_404();
		}
    }
    
    //order-------------------------------------------------------------------------------------------------------
    function order(){
        $id_shop = $this->session->userdata('id_shop');
        $data['order'] = $this->db->query("SELECT a.*, shop.nama shop, user.nama user, (SELECT SUM(jumlah*harga) FROM detail_transaksi WHERE detail_transaksi.id_transaksi = a.id_transaksi) total FROM transaksi a JOIN shop USING(id_shop) JOIN user ON a.id_user = user.id_user WHERE a.id_shop = '$id_shop' ORDER BY a.tanggal DESC")->result();

        $data['title'] = 'order';
        $data['side'] = 'index';
		$this->master($data,'order');
    }
    function order_show($id = null){
        if($id > 0){
            $data['title'] = 'order';
            $data['side'] = 'index';
            $data['data'] = $this->db->query("SELECT a.*, shop.nama shop, user.nama user FROM transaksi a JOIN shop USING(id_shop) JOIN user ON a.id_user = user.id_user WHERE id_transaksi = $id")->result()[0];
            $data['detail'] = $this->db->query("SELECT a.*, produk.nama produk FROM detail_transaksi a JOIN produk USING(id_produk) WHERE id_transaksi = $id")->result();
            $this->master($data,'order_show');
        }else{
            show_404();
        }
    }
    function order_tambah(){
        $data['title'] = 'order';
        $data['side'] = 'tambah';
        $id_shop = $this->session->userdata('id_shop');
        $data['detail'] = $this->db->query("SELECT a.*, produk.nama produk FROM detail_transaksi a JOIN produk USING(id_produk) WHERE id_transaksi = 0 AND id_shop = '$id_shop' AND jumlah > 0")->result();
		$this->master($data,'order_tambah');
    }
    function order_tambah_produk(){
        $data['title'] = 'order';
        $data['side'] = 'tambah';
        $data['produk'] = $this->db->query("SELECT * FROM produk WHERE status = '1'")->result();
		$this->master($data,'order_tambah_produk');
    }
    function order_edit_produk($id = null){
        if($id > 0){
            $data['title'] = 'order';
            $data['side'] = 'tambah';
            $data['produk'] = $this->db->query("SELECT * FROM produk WHERE status = '1'")->result();
            $data['data'] = $this->db->query("SELECT * FROM detail_transaksi WHERE id_detail_transaksi = '$id'")->result()[0];
            $this->master($data,'order_edit_produk');
        }else{
            show_404();
        }
    }
    function order_add_produk(){
        if($this->input->post()){
            $id_transaksi = 0;
            $id_produk = $this->input->post('produk');
            $harga = $this->db->query("SELECT harga FROM produk WHERE id_produk = $id_produk")->result()[0]->harga;
            $jumlah = $this->input->post('jumlah');
            $id_shop = $this->session->userdata('id_shop');
            $cek = $this->db->query("SELECT id_detail_transaksi, jumlah FROM detail_transaksi WHERE id_shop = $id_shop AND id_transaksi = 0 AND id_produk = $id_produk");
            
            if($cek->num_rows() == 1){
                $id_detail_transaksi = $cek->result()[0]->id_detail_transaksi;
                $jumlah = $cek->result()[0]->jumlah + $jumlah;
                $data_update = array(
                    'id_produk' => $id_produk,
                    'harga' => $harga,
                    'jumlah' => $jumlah,
                );
                $this->db->where('id_detail_transaksi',$id_detail_transaksi);
			    $this->db->update('detail_transaksi',$data_update);
            }else{
                $data_insert = array(
                    'id_transaksi' => $id_transaksi,
                    'id_produk' => $id_produk,
                    'harga' => $harga,
                    'jumlah' => $jumlah,
                    'id_shop' => $id_shop
                );
                $this->db->insert('detail_transaksi',$data_insert);
            }

            $this->session->set_flashdata('item', array('message' => 'Berhasil menambahkan data','color' => 'success'));
			redirect('user/order/tambah');
		}else{
			show_404();
		}
    }
    function order_update_produk(){
        if($this->input->post()){
            $jumlah = $this->input->post('jumlah');
            $id_detail_transaksi = $this->input->post('id');
            
            $data_update = array(
                'jumlah' => $jumlah,
            );
            $this->db->where('id_detail_transaksi',$id_detail_transaksi);
            $this->db->update('detail_transaksi',$data_update);

            $this->session->set_flashdata('item', array('message' => 'Berhasil menambahkan data','color' => 'success'));
			redirect('user/order/tambah');
		}else{
			show_404();
		}
    }
    function order_add(){
        $id_shop = $this->session->userdata('id_shop');
        $id_user = $this->session->userdata('id_user');
        
        $data_insert = array(
            'id_shop' => $id_shop,
            'id_user' => $id_user,
            'status' => '1'
        );
        $this->db->insert('transaksi',$data_insert);
        $id_transaksi = $this->db->insert_id();

        $data_update = array(
            'id_transaksi' => $id_transaksi,
            'id_shop' => 0
        );
        $this->db->where('id_shop',$id_shop);
        $this->db->where('id_transaksi',0);
        $this->db->update('detail_transaksi',$data_update);

        $this->session->set_flashdata('item', array('message' => 'Berhasil menambahkan data','color' => 'success'));
        redirect('user/order');
    }

    //users------------------------------------------------------------------------------------------------------
    function users(){
        if ($this->session->userdata('role')!="owner") {
			redirect('user');exit();
		}
        $data['title'] = 'users';
        $data['side'] = 'index';
        $id_shop = $this->session->userdata('id_shop');
        $data['user'] = $this->db->query("SELECT a.*, shop.nama shop FROM user a JOIN shop USING(id_shop) WHERE id_shop = '$id_shop' AND role = 'member'")->result();
		$this->master($data,'user');
    }
    function users_tambah(){
        if ($this->session->userdata('role')!="owner") {
			redirect('user');exit();
		}
        $data['title'] = 'users';
        $data['side'] = 'tambah';
        $data['shop'] = $this->db->query("SELECT * FROM shop WHERE status = '1'")->result();
		$this->master($data,'user_tambah');
    }
    function users_edit($id = null){
        if ($this->session->userdata('role')!="owner") {
			redirect('user');exit();
		}
        if($id > 0){
            $data['title'] = 'users';
            $data['side'] = 'index';
            $data['shop'] = $this->db->query("SELECT * FROM shop WHERE status = '1'")->result();
            $data['data'] = $this->db->query("SELECT * FROM user WHERE id_user = $id")->result()[0];
            $this->master($data,'user_edit');
        }else{
            show_404();
        }
    }
    function users_add(){
        if ($this->session->userdata('role')!="owner") {
			redirect('user');exit();
		}
		if($this->input->post()){
            $id_shop = $this->session->userdata('id_shop');
            $role = 'member';
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
			$status = $this->input->post('status');
			
			$data_insert = array(
                'id_shop' => $id_shop,
                'role' => $role,
                'nama' => $nama,
                'username' => $username,
                'password' => $password,
				'status' => $status
			);
			$this->db->insert('user',$data_insert);

            $this->session->set_flashdata('item', array('message' => 'Berhasil menambahkan data','color' => 'success'));
			redirect('user/users');
		}else{
			show_404();
		}
    }
    function users_update(){
        if ($this->session->userdata('role')!="owner") {
			redirect('user');exit();
		}
		if($this->input->post()){
            $id_user = $this->input->post('id');
            $id_shop = $this->session->userdata('id_shop');
            $role = 'member';
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
			$status = $this->input->post('status');
            
            if(strlen($password) > 0){
                $data_update = array(
                    'id_shop' => $id_shop,
                    'role' => $role,
                    'nama' => $nama,
                    'username' => $username,
                    'password' => md5($password),
                    'status' => $status
                );
            }else{
                $data_update = array(
                    'id_shop' => $id_shop,
                    'role' => $role,
                    'nama' => $nama,
                    'username' => $username,
                    'status' => $status
                );
            }
			$this->db->where('id_user',$id_user);
			$this->db->update('user',$data_update);

            $this->session->set_flashdata('item', array('message' => 'Berhasil mengubah data','color' => 'info'));
			redirect('user/users');
		}else{
			show_404();
		}
    }

	private function master($data,$view){
		$this->load->view('user/theme/header');
		$this->load->view('user/theme/topbar',$data);
		$this->load->view('user/theme/sidebar',$data);
		$this->load->view("user/$view",$data);
		$this->load->view('user/theme/footer');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct(){
		parent::__construct();
		if ($this->session->userdata('status')!="admin") {
			redirect('admin/login');exit();
		}
	}
	
	function index(){
        $data['title'] = 'dashboard';
        $data['side'] = 'index';
        $data['new'] = $this->db->query("SELECT COUNT(id_transaksi) a FROM transaksi WHERE status = '1'")->result()[0]->a;
        $data['order'] = $this->db->query("SELECT COUNT(id_transaksi) a FROM transaksi")->result()[0]->a;
        $data['user'] = $this->db->query("SELECT COUNT(id_user) a FROM user")->result()[0]->a;
        $data['shop'] = $this->db->query("SELECT COUNT(id_shop) a FROM shop")->result()[0]->a;
		$this->master($data,'dashboard');
    }
    function profile(){
        $id_admin =  $this->session->userdata('id_admin');
		if($id_admin > 0){
			$data['title'] = 'profile';
            $data['side'] = 'index';
			$data['profile'] = $this->db->query("SELECT * FROM admin WHERE id_admin = '$id_admin'")->result()[0];
			$this->master($data,'profile');
		}else{
			show_404();
		}
    }
    function profile_update(){
		if($this->input->post('submit')){
            $id_admin = $this->session->userdata('id_admin');
            $old_password = md5($this->input->post('old_password'));
            $new_password = $this->input->post('new_password');
            $confirm_password = $this->input->post('confirm_password');

            $cek_old_password = $this->db->query("SELECT password FROM admin WHERE password = '$old_password' AND id_admin = '$id_admin'")->num_rows();
            if($cek_old_password == 1){
                if($new_password == $confirm_password){
                    $data_update = array(
                        'password' => md5($new_password),
                    );
                    $this->db->where('id_admin',$id_admin);
                    $this->db->update('admin',$data_update);

                    $this->session->set_flashdata('item', array('message' => 'Berhasil mengganti password','color' => 'success'));
                }else{
                    //konfirmasi password baru anda tidak sama
                    $this->session->set_flashdata('item', array('message' => 'Konfirmasi password baru anda tidak sama','color' => 'danger'));
                }
            }else{
                //password lama anda salah
                $this->session->set_flashdata('item', array('message' => 'Password lama anda salah','color' => 'danger'));
            }

			redirect('admin/profile');
		}else{
			show_404();
		}
    }
    
    //order-------------------------------------------------------------------------------------------------------
    function order(){
        $data['title'] = 'order';
        $data['side'] = 'index';
        $data['order'] = $this->db->query("SELECT a.*, shop.nama shop, user.nama user, (SELECT SUM(jumlah*harga) FROM detail_transaksi WHERE detail_transaksi.id_transaksi = a.id_transaksi) total FROM transaksi a JOIN shop USING(id_shop) JOIN user ON a.id_user = user.id_user ORDER BY a.tanggal DESC")->result();
		$this->master($data,'order');
    }
    function order_new(){
        $data['title'] = 'order';
        $data['side'] = 'new';
        $data['order'] = $this->db->query("SELECT a.*, shop.nama shop, user.nama user, (SELECT SUM(jumlah*harga) FROM detail_transaksi WHERE detail_transaksi.id_transaksi = a.id_transaksi) total FROM transaksi a JOIN shop USING(id_shop) JOIN user ON a.id_user = user.id_user WHERE a.status = '1' ORDER BY a.tanggal DESC")->result();
		$this->master($data,'order');
    }
    function order_process(){
        $data['title'] = 'order';
        $data['side'] = 'process';
        $data['order'] = $this->db->query("SELECT a.*, shop.nama shop, user.nama user, (SELECT SUM(jumlah*harga) FROM detail_transaksi WHERE detail_transaksi.id_transaksi = a.id_transaksi) total FROM transaksi a JOIN shop USING(id_shop) JOIN user ON a.id_user = user.id_user WHERE a.status = '2' ORDER BY a.tanggal DESC")->result();
		$this->master($data,'order');
    }
    function order_kirim(){
        $data['title'] = 'order';
        $data['side'] = 'kirim';
        $data['order'] = $this->db->query("SELECT a.*, shop.nama shop, user.nama user, (SELECT SUM(jumlah*harga) FROM detail_transaksi WHERE detail_transaksi.id_transaksi = a.id_transaksi) total FROM transaksi a JOIN shop USING(id_shop) JOIN user ON a.id_user = user.id_user WHERE a.status = '3' ORDER BY a.tanggal DESC")->result();
		$this->master($data,'order');
    }
    function order_finish(){
        $data['title'] = 'order';
        $data['side'] = 'finish';
        $data['order'] = $this->db->query("SELECT a.*, shop.nama shop, user.nama user, (SELECT SUM(jumlah*harga) FROM detail_transaksi WHERE detail_transaksi.id_transaksi = a.id_transaksi) total FROM transaksi a JOIN shop USING(id_shop) JOIN user ON a.id_user = user.id_user WHERE a.status = '4' ORDER BY a.tanggal DESC")->result();
		$this->master($data,'order');
    }
    function order_cancel(){
        $data['title'] = 'order';
        $data['side'] = 'cancel';
        $data['order'] = $this->db->query("SELECT a.*, shop.nama shop, user.nama user, (SELECT SUM(jumlah*harga) FROM detail_transaksi WHERE detail_transaksi.id_transaksi = a.id_transaksi) total FROM transaksi a JOIN shop USING(id_shop) JOIN user ON a.id_user = user.id_user WHERE a.status = '0' ORDER BY a.tanggal DESC")->result();
		$this->master($data,'order');
    }
    function order_show($id = null){
        if($id > 0){
            $data['title'] = 'order';
            $data['side'] = '';
            $data['data'] = $this->db->query("SELECT a.*, shop.nama shop, user.nama user FROM transaksi a JOIN shop USING(id_shop) JOIN user ON a.id_user = user.id_user WHERE id_transaksi = $id")->result()[0];
            $data['detail'] = $this->db->query("SELECT a.*, produk.nama produk FROM detail_transaksi a JOIN produk USING(id_produk) WHERE id_transaksi = $id")->result();
            $this->master($data,'order_show');
        }else{
            show_404();
        }
    }
    function order_update(){
		if($this->input->post()){
			$id_transaksi = $this->input->post('id');
            $status = $this->input->post('status');
			
			$data_update = array(
                'status' => $status
			);
			$this->db->where('id_transaksi',$id_transaksi);
			$this->db->update('transaksi',$data_update);

            $this->session->set_flashdata('item', array('message' => 'Berhasil mengubah data','color' => 'info'));
			redirect('admin/order');
		}else{
			show_404();
		}
    }
    
    //produk------------------------------------------------------------------------------------------------------
    function produk(){
        $data['title'] = 'produk';
        $data['side'] = 'index';
        $data['produk'] = $this->db->query("SELECT * FROM produk")->result();
		$this->master($data,'produk');
    }
    function produk_tambah(){
        $data['title'] = 'produk';
        $data['side'] = 'tambah';
		$this->master($data,'produk_tambah');
    }
    function produk_edit($id = null){
        if($id > 0){
            $data['title'] = 'produk';
            $data['side'] = 'index';
            $data['data'] = $this->db->query("SELECT * FROM produk WHERE id_produk = $id")->result()[0];
            $this->master($data,'produk_edit');
        }else{
            show_404();
        }
    }
    function produk_add(){
		if($this->input->post()){
			$nama = $this->input->post('nama');
            $harga = $this->input->post('harga');
            $status = $this->input->post('status');
			
			$data_insert = array(
                'nama' => $nama,
                'harga' => $harga,
                'status' => $status
			);
			$this->db->insert('produk',$data_insert);

            $this->session->set_flashdata('item', array('message' => 'Berhasil menambahkan data','color' => 'success'));
			redirect('admin/produk');
		}else{
			show_404();
		}
    }
    function produk_update(){
		if($this->input->post()){
			$id_produk = $this->input->post('id');
			$nama = $this->input->post('nama');
            $harga = $this->input->post('harga');
            $status = $this->input->post('status');
			
			$data_update = array(
				'nama' => $nama,
                'harga' => $harga,
                'status' => $status
			);
			$this->db->where('id_produk',$id_produk);
			$this->db->update('produk',$data_update);

            $this->session->set_flashdata('item', array('message' => 'Berhasil mengubah data','color' => 'info'));
			redirect('admin/produk');
		}else{
			show_404();
		}
    }

    //shop------------------------------------------------------------------------------------------------------
    function shop(){
        $data['title'] = 'shop';
        $data['side'] = 'index';
        $data['shop'] = $this->db->query("SELECT * FROM shop")->result();
		$this->master($data,'shop');
    }
    function shop_tambah(){
        $data['title'] = 'shop';
        $data['side'] = 'tambah';
		$this->master($data,'shop_tambah');
    }
    function shop_edit($id = null){
        if($id > 0){
            $data['title'] = 'shop';
            $data['side'] = 'index';
            $data['data'] = $this->db->query("SELECT * FROM shop WHERE id_shop = $id")->result()[0];
            $this->master($data,'shop_edit');
        }else{
            show_404();
        }
    }
    function shop_add(){
		if($this->input->post()){
			$nama = $this->input->post('nama');
			$status = $this->input->post('status');
			
			$data_insert = array(
				'nama' => $nama,
				'status' => $status
			);
			$this->db->insert('shop',$data_insert);

            $this->session->set_flashdata('item', array('message' => 'Berhasil menambahkan data','color' => 'success'));
			redirect('admin/shop');
		}else{
			show_404();
		}
    }
    function shop_update(){
		if($this->input->post()){
			$id_shop = $this->input->post('id');
			$nama = $this->input->post('nama');
			$status = $this->input->post('status');
			
			$data_update = array(
				'nama' => $nama,
				'status' => $status
			);
			$this->db->where('id_shop',$id_shop);
			$this->db->update('shop',$data_update);

            $this->session->set_flashdata('item', array('message' => 'Berhasil mengubah data','color' => 'info'));
			redirect('admin/shop');
		}else{
			show_404();
		}
    }

    //user------------------------------------------------------------------------------------------------------
    function user(){
        $data['title'] = 'user';
        $data['side'] = 'index';
        $data['user'] = $this->db->query("SELECT a.*, shop.nama shop FROM user a JOIN shop USING(id_shop)")->result();
		$this->master($data,'user');
    }
    function user_tambah(){
        $data['title'] = 'user';
        $data['side'] = 'tambah';
        $data['shop'] = $this->db->query("SELECT * FROM shop WHERE status = '1'")->result();
		$this->master($data,'user_tambah');
    }
    function user_edit($id = null){
        if($id > 0){
            $data['title'] = 'user';
            $data['side'] = 'index';
            $data['shop'] = $this->db->query("SELECT * FROM shop WHERE status = '1'")->result();
            $data['data'] = $this->db->query("SELECT * FROM user WHERE id_user = $id")->result()[0];
            $this->master($data,'user_edit');
        }else{
            show_404();
        }
    }
    function user_add(){
		if($this->input->post()){
            $id_shop = $this->input->post('shop');
            $role = $this->input->post('role');
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
			redirect('admin/user');
		}else{
			show_404();
		}
    }
    function user_update(){
		if($this->input->post()){
            $id_user = $this->input->post('id');
            $id_shop = $this->input->post('shop');
            $role = $this->input->post('role');
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
			redirect('admin/user');
		}else{
			show_404();
		}
    }

	private function master($data,$view){
		$this->load->view('admin/theme/header');
		$this->load->view('admin/theme/topbar',$data);
		$this->load->view('admin/theme/sidebar',$data);
		$this->load->view("admin/$view",$data);
		$this->load->view('admin/theme/footer');
	}
}

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

    //users------------------------------------------------------------------------------------------------------
    function users(){
        $data['title'] = 'users';
        $data['side'] = 'index';
        $id_shop = $this->session->userdata('id_shop');
        $data['user'] = $this->db->query("SELECT a.*, shop.nama shop FROM user a JOIN shop USING(id_shop) WHERE id_shop = '$id_shop'")->result();
		$this->master($data,'user');
    }
    function users_tambah(){
        $data['title'] = 'users';
        $data['side'] = 'tambah';
        $data['shop'] = $this->db->query("SELECT * FROM shop WHERE status = '1'")->result();
		$this->master($data,'user_tambah');
    }
    function users_edit($id = null){
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

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct(){
		parent::__construct();
		// if ($this->session->userdata('status')!="user") {
		// 	redirect('user/login');exit();
		// }
	}
	
	function index(){
		$data = '';
		$this->master($data,'dashboard');
	}

	private function master($data,$view){
		$this->load->view('user/theme/header');
		$this->load->view('user/theme/topbar',$data);
		$this->load->view('user/theme/sidebar',$data);
		$this->load->view("user/$view",$data);
		$this->load->view('user/theme/footer');
	}
}

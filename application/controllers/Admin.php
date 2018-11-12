<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct(){
		parent::__construct();
		// if ($this->session->userdata('status')!="admin") {
		// 	redirect('admin/login');exit();
		// }
	}
	
	function index(){
		$data = '';
		$this->master($data,'dashboard');
	}

	private function master($data,$view){
		$this->load->view('admin/theme/header');
		$this->load->view('admin/theme/topbar',$data);
		$this->load->view('admin/theme/sidebar',$data);
		$this->load->view("admin/$view",$data);
		$this->load->view('admin/theme/footer');
	}
}

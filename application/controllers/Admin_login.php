<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller {
	
	function index(){
		if ($this->session->userdata('status')=="admin") {
			redirect('admin');exit();
		}
		$this->load->view('admin_login');
	}
}

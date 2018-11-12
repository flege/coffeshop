<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_login extends CI_Controller {
	
	function index(){
		if ($this->session->userdata('status')=="user") {
			redirect('user');exit();
		}
		$this->load->view('user_login');
	}
}

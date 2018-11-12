<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_login extends CI_Controller {
	
	function index(){
		if ($this->session->userdata('status')=="user") {
			redirect('user');exit();
		}
		$this->load->view('user_login');
    }
    
    function auth(){
		if ($this->session->userdata('status')=="user") {
			redirect('user');
		}else{
			$this->load->library('form_validation');
			$this->load->helper('security');
			$this->form_validation->set_rules('username','Username','trim|required|xss_clean');
			$this->form_validation->set_rules('password','Password','trim|required|xss_clean');
			if ($this->form_validation->run() == FALSE) {
				echo '<script type="text/javascript">'; 
				echo 'alert("Cek username dan password anda");';
				echo 'window.location.href = "'.$_SERVER['HTTP_REFERER'].'";';
				echo '</script>';
			}else{
				$username = $this->input->post('username', TRUE);
				$password = md5($this->input->post('password', TRUE));
				$cek = $this->db->query("SELECT * FROM user WHERE username = '$username' AND password = '$password' AND status = '1'");
				if($cek->num_rows() == 1){
					$data = $cek->result();
					$data_session = array(
                        'id_user' => $data[0]->id_user,
                        'id_shop' => $data[0]->id_shop,
                        'nama' => $data[0]->nama,
                        'role' => $data[0]->role,
						'status' => "user"
					);

					$this->session->set_userdata($data_session);
					redirect('user');

				}else{
					echo '<script type="text/javascript">'; 
					echo 'alert("Username atau Password anda salah");';
					echo 'window.location.href = "'.$_SERVER['HTTP_REFERER'].'";';
					echo '</script>';
				}
			}
		}
    }
    
	function logout(){ 
		$this->session->sess_destroy();
		redirect('user/login');
	}
}

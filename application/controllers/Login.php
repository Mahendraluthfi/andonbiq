<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if (empty($this->session->userdata('epf'))) {
			$this->load->view('login');					
		}else{
			redirect('welcome','refresh');
		}
	}

	public function submit()
	{
		$user = $this->input->post('user');
		$password = md5($this->input->post('password'));

		$cek = $this->db->get_where('user', array(
			'epf' => $user,
			'password' => $password,
		));

		if ($cek->num_rows() > 0) {
			$array = array(
				'epf' => $user,
				'password' => $password
			);
			
			$this->session->set_userdata( $array );
			redirect('welcome','refresh');
		}else{
			$this->session->set_flashdata('msg', '<div class="alert alert-danger">				
				<strong>EPF or Password is wrong !</strong>
			</div>');
			redirect('login','refresh');
		}
	}

	public function logout()
	{
		session_destroy();
		redirect('login','refresh');
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
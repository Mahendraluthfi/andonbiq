<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Botsetting extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('epf'))) {
			redirect('login','refresh');
		}
	}


	public function index()
	{
		$data['get'] = $this->db->get('apikey_telegram')->row();
		$data['content'] = 'botsetting';
		$this->load->view('index', $data);		
	}

	public function edit_eco()
	{
		$this->db->where('id', 1);
		$this->db->update('apikey_telegram', array(
			'api_ecosystem' => $this->input->post('api_ecosystem')
		));
		
		echo json_encode(true);
	}

	public function edit_vsm()
	{
		$this->db->where('id', 1);
		$this->db->update('apikey_telegram', array(
			'api_valuestream' => $this->input->post('api_valuestream')
		));
		
		echo json_encode(true);
	}

}

/* End of file Botsetting.php */
/* Location: ./application/controllers/Botsetting.php */
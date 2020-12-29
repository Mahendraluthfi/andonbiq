<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Downtime extends CI_Controller {

	public function index()
	{
		$data['get'] = $this->db->get_where('downtime', array('status' => 1))->result();
		$data['content'] = 'downtime';
		$this->load->view('index', $data);		
	}

}

/* End of file Downtime.php */
/* Location: ./application/controllers/Downtime.php */
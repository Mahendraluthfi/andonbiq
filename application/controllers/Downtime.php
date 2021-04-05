<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Downtime extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('epf'))) {
			redirect('login','refresh');
		}
	}

	public function index()
	{
		$data['get'] = $this->db->get_where('downtime', array('status' => 1))->result();
		$data['content'] = 'downtime';
		$this->load->view('index', $data);		
	}

	public function ecosystem()
	{
		$this->db->from('dt_eco');
		$this->db->join('line', 'dt_eco.id_line = line.id');
		$db = $this->db->get()->result();
		$data['get'] = $db;
		$data['content'] = 'dt_eco';
		$this->load->view('index', $data);
	}

	public function valuestream()
	{
		$this->db->from('dt_vsm');
		$this->db->join('line', 'dt_vsm.id_line = line.id');
		$db = $this->db->get()->result();
		$data['get'] = $db;
		$data['content'] = 'dt_vsm';
		$this->load->view('index', $data);
	}

}

/* End of file Downtime.php */
/* Location: ./application/controllers/Downtime.php */
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Line extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('epf'))) {
			redirect('login','refresh');
		}
	}

	public function index()
	{
		$data['line'] = $this->db->get('line')->result();
		$data['content'] = 'line';
		$this->load->view('index', $data);		
	}


	public function get($id)
	{
		$data = $this->db->get_where('line', array('id' => $id))->row();
		echo json_encode($data);
	}

	public function simpan(){		
			$data = array(									
					'mac_address' => $this->input->post('mac_address'),
					'line' => $this->input->post('line'),
					'section' => $this->input->post('section'),
				);
			$this->db->insert('line', $data);
			
			
		
		echo json_encode(array("status" => TRUE));
	}

	public function edit($id){
		$data = array(								
			'mac_address' => $this->input->post('mac_address'),
			'line' => $this->input->post('line'),
			'section' => $this->input->post('section'),
		);
		$this->db->where('id', $id);
		$this->db->update('line', $data);			
		
		echo json_encode(array("status" => TRUE));
	}

	public function hapus($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('line');
		
		redirect('line','refresh');
	}

}

/* End of file Line.php */
/* Location: ./application/controllers/Line.php */
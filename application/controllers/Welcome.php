<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		if (empty($this->session->userdata('epf'))) {
			redirect('login','refresh');
		}
		date_default_timezone_set('Asia/Jakarta');
	}	

	public function index()
	{
		$data['content'] = 'dashboard';
		$this->load->view('index', $data);
	}

	public function level4()
	{
		$chatid_sec_a = '-495415635';			
		$pesan = "Defect level 4 on Line 1.\nPlease support on this. Thank You";
		$this->telegram($chatid_sec_a,$pesan);
		echo json_encode("TRUE");	
	}

	public function level5()
	{
		$this->db->insert('downtime', array(
			'line' => 'Line 1',
			'time_start' => date('H:i:s'),
			'date' => date('Y-m-d'),
			'status' => '0',
		));

		$chatid_val_stream = '-301363315';			
		$pesan = "Defect level 5 on Line 1.\nPlease support on this. Thank You";
		$this->telegram($chatid_val_stream,$pesan);
		echo json_encode("TRUE");	
	}

	public function countdown()
	{
		$timenow = date("H:i:s");
		$get = $this->db->get_where('downtime', array('status' => 0))->row();
		$count = $this->dateDifference($timenow,$get->time_start);

		$this->db->where('status', 0);
		$this->db->update('downtime', array(
			'status' => '1',
			'count' => $count,
			'time_end' => $timenow,
		));

		$chatid_val_stream = '-301363315';			
		$pesan = "Downtime at defect level 5.\nLine 1\n".$count." minutes.\nThank You";
		$this->telegram($chatid_val_stream,$pesan);
		echo json_encode($count);

	}

	function dateDifference($date_1 , $date_2 , $differenceFormat = '%i' )
	{
	    $datetime1 = date_create($date_1);
	    $datetime2 = date_create($date_2);
	   
	    $interval = date_diff($datetime1, $datetime2);
	   
	    return $interval->format($differenceFormat);
	   
	}

	public function telegram($chatid,$message)
	{
		$botToken = '1457953098:AAF1jfEApHvLgTNA81Fr7x1lT99-GX60gag';
		$website="https://api.telegram.org/bot".$botToken;
		
		$params=[
		    'chat_id'=>$chatid,
		    'text'=>$message,
		];
		$ch = curl_init($website . '/sendMessage');
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		$result = curl_exec($ch);
		curl_close($ch);
	}
}

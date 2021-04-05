<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Push extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

	public function level4($line)
	{
		$chatid_sec_a = '-495415635';			
		$pesan = "Defect level 4 on Line ".$line.".\nPlease support on this. Thank You";
		// $this->telegram($chatid_sec_a,$pesan);
		echo json_encode("TRUE");	
	}

	public function level5($line)
	{
		$this->db->where('status', 0);
		$this->db->delete('downtime');

		$this->db->insert('downtime', array(
			'line' => 'Line '.$line,
			'time_start' => date('H:i:s'),
			'date' => date('Y-m-d'),
			'status' => '0',
		));

		$chatid_val_stream = '-301363315';			
		$pesan = "Defect level 5 on Line ".$line.".\nPlease support on this. Thank You";
		$this->telegram($chatid_val_stream,$pesan);
		echo json_encode("TRUE");	
	}

	public function countdown($line)
	{
		$timenow = date("H:i:s");
		
		$get= $this->db->get_where('downtime', array('status' => 0))->row();

		$count = $this->dateDifference($timenow,$get->time_start);

		$this->db->where('id', $get->id);
		$this->db->update('downtime', array(
			'status' => '1',
			'count' => $count,
			'time_end' => $timenow,
		));

		$chatid_val_stream = '-301363315';			
		$pesan = "Downtime at defect level 5.\nLine ".$line."\n".$count." minutes.\nThank You";
		$this->telegram($chatid_val_stream,$pesan);
		echo json_encode($count);

	}

	function dateDifference($date_1 , $date_2 , $differenceFormat = '%i' )
	{
	   
	    $waktu_awal     =strtotime($date_1);
        $waktu_akhir    =strtotime($date_2); // bisa juga waktu sekarang now()
       
        $diff    =$waktu_awal - $waktu_akhir;           
        $menit    =floor($diff / 60);
               
        return $menit;
	   
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


	public function dtin_eco($mac)
	{
		$get = $this->db->get_where('line', array('mac_address' => $mac))->row();

		$this->db->insert('dt_eco', array(
			'id_line' => $get->id,
			'time_start' => date('H:i:s'),
			'date' => date('Y-m-d'),
			'status' => '0',
		));
		$chatid = $this->db->get_where('apikey_telegram', array('id' => 1))->row();
		$pesan = "Defect level 4 on Line ".$get->line.".\nPlease support on this. Thank You";		
		$this->telegram($chatid->api_ecosystem,$pesan);
		echo json_encode(TRUE);
	}

	public function dtin_vsm($mac)
	{
		$get = $this->db->get_where('line', array('mac_address' => $mac))->row();

		$this->db->insert('dt_vsm', array(
			'id_line' => $get->id,
			'time_start' => date('H:i:s'),
			'date' => date('Y-m-d'),
			'status' => '0',
		));

		$chatid = $this->db->get_where('apikey_telegram', array('id' => 1))->row();
		$pesan = "Defect level 5 on Line ".$get->line.".\nPlease support on this. Thank You";		
		$this->telegram($chatid->api_valuestream,$pesan);

		echo json_encode(TRUE);
	}

	public function countdown_eco($mac)
	{
		$get_line = $this->db->get_where('line', array('mac_address' => $mac))->row();

		$timenow = date("H:i:s");
		
		$cek= $this->db->get_where('dt_eco', array('id_line' => $get_line->id, 'status' => 0))->num_rows();
			if ($cek > 0) {
				
			$get= $this->db->get_where('dt_eco', array('id_line' => $get_line->id, 'status' => 0))->row();

			$count = $this->dateDifference($timenow,$get->time_start);

			$this->db->where('id', $get->id);
			$this->db->update('dt_eco', array(
				'status' => '1',
				'count' => $count,
				'time_end' => $timenow,
			));

			$chatid = $this->db->get_where('apikey_telegram', array('id' => 1))->row();
			$pesan = "Downtime at defect level 4.\nLine ".$get_line->line."\n".$count." minutes.\nThank You";
			$this->telegram($chatid->api_ecosystem,$pesan);
			echo json_encode($count);

		}
	}

	public function countdown_vsm($mac)
	{
		$get_line = $this->db->get_where('line', array('mac_address' => $mac))->row();

		$timenow = date("H:i:s");
		

		$cek= $this->db->get_where('dt_vsm', array('id_line' => $get_line->id, 'status' => 0))->num_rows();

		if ($cek > 0) {
			# code...
			$get= $this->db->get_where('dt_vsm', array('id_line' => $get_line->id, 'status' => 0))->row();

			$count = $this->dateDifference($timenow,$get->time_start);

			$this->db->where('id', $get->id);
			$this->db->update('dt_vsm', array(
				'status' => '1',
				'count' => $count,
				'time_end' => $timenow,
			));

			$chatid = $this->db->get_where('apikey_telegram', array('id' => 1))->row();		
			$pesan = "Downtime at defect level 5.\nLine ".$get_line->line."\n".$count." minutes.\nThank You";
			$this->telegram($chatid->api_valuestream,$pesan);
			echo json_encode($count);

		}
	}

	public function last_update($mac)
	{
		$this->db->where('mac_address', $mac);
		$this->db->update('line', array(
			'last_update' => date('Y-m-d H:i:s')
		));

		echo json_encode(true);
	}


}

/* End of file Push.php */
/* Location: ./application/controllers/Push.php */
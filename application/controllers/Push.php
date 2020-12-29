<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Push extends CI_Controller {

	public function index()
	{
		
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

/* End of file Push.php */
/* Location: ./application/controllers/Push.php */
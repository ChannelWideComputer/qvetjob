<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {
	

	public function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('lang') == NULL) {
			$lang = "EN";
			$this->session->set_userdata('lang', $lang);                
			
		}else{          
			$lang = $this->session->userdata('lang');  
		}
		
		$this->lang->load($lang, $lang);
		
	}
	
	
	public function index()
	{
		
		$email = $this->db->escape_str($_POST["regis_email"]);	
		
		$data = array(
			'Email' => $email,
			

		);

		$this->db->insert('tb_email', $data);
		
		if($this->db->trans_status() === TRUE)
		{
			echo "true";//redirect($_SERVER['HTTP_REFERER']);

		}else{
			
			//redirect($_SERVER['HTTP_REFERER']);
			
			echo "false";
		}
		
		
		
		
	}//function
	
	
	
	
}

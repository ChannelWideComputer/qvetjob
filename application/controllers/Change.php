<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change extends CI_Controller {
	
	
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
		
		
		$_SESSION["lang"] = $this->input->get('lang');
		//echo $this->session->lang;
		redirect($_SERVER['HTTP_REFERER']);
		
	}
}

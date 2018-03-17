<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	
	
	
	public function __construct()
	{
		parent::__construct();		
		
		$this->load->model('Model_category');	

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
		
		$data = $this->Model_category->get_home();
		$this->load->view('header',$data);
		
	}
	
	public function detail($id = null)
	{	
		
		$data = $this->Model_category->get_detail($id);
		$this->load->view('details',$data);
		
	}
	
	
	
	
	
	
	
}

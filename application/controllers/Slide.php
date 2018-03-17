<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slide extends CI_Controller {

	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->model('Model_slide');
        /*
		$this->load->model('Model_product');
		
        if ($this->session->userdata('lang') == NULL) {
        	$lang = "EN";
            $this->session->set_userdata('lang', $lang);	        	
                      
        }else{        	
            $lang = $this->session->userdata('lang');  
        }
        
        $this->lang->load($lang, $lang);
        */
    }

    
    public function index()
    {
        $rows_per_page =   12    ;
        $data["slide"] = $this->Model_slide->get_home();
        

        $this->load->view('slide',$data);
    }


}
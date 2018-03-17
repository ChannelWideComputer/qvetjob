<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends CI_Controller {
	
	
	
	public function __construct()
	{
		parent::__construct();		
		
		$this->load->model('Model_faq');
		if(!isset($_SESSION["user_id"])){
			
			redirect('home');  

		}

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
		
		$data = $this->Model_faq->get_user_comment();
		$this->load->view('dashboard',$data);
		
	}
	
	public function detail($id = null)
	{	
		
		$data = $this->Model_faq->get_detail_comment($id);
		$this->load->view('comment-details',$data);
		
	}
	
	public function update_ans()
	{	
		
		$data = $this->Model_faq->update_ans();
		
		
	}
	
	public function delete_ans()
	{	
		
		$query = $this->Model_faq->delete_ans();
		
	}	
	
	
}

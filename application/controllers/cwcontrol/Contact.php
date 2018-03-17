<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	
	protected $default_page = 'contact';
	
	public function __construct()
	{
		parent::__construct();		
		if(!isset($_SESSION["user_username"])){
			
			redirect('cwcontrol');  

		}
		$this->load->model('Model_contact');
		
	}

	
	public function index()
    {   
        if(isset($_GET["type"]) && $_GET["type"] == 'edit'){
            
            $data = $this->Model_contact->get_detail();
            
        }else{
            
            $rows_per_page = 15;
            $page_url = base_url('cwcontrol/'.$this->default_page);
            $data = $this->Model_contact->get_all($rows_per_page,$page_url);  
            $data['page_url'] = $page_url;
            
            
        }
        
        $data['page'] = $this->default_page;      
        $this->load->view('cwcontrol/pages/'.$this->default_page.'/index',$data);
        
    }

	public function sentmail()
	{
		
		$lang = $this->session->lang;


		
		$query = $this->Model_contact->sentmail();


		
		if($query == TRUE){
			
			$data_page = array(
				'page' => "contact",
				'label' => constant('Contact-TH'),
				'labeltext' => constant('Weget-TH'),
			);
			
			$this->load->view('cwcontrol/modal/front_success',$data_page);
			
		}elseif($query == "code"){
			
			$data_page = array(
				'page' => "contact",
				'label' => constant('Contact-TH'),
				'labeltext' => constant('Security-TH'),
			);
			
			
		}else{
			
			$data_page = array(
				'page' => "contact",
				'label' => constant('Contact-TH'),
				'labeltext' => constant('Error-TH'),
			);
			$this->load->view('cwcontrol/modal/front_error',$data_page);
			
		}
		
		
		
	}
	
	public function update()
	{
		
		$query = $this->Model_contact->update();
		$data['page'] = $this->default_page;
		if ($query === TRUE)
		{	
			$this->load->view('cwcontrol/modal/success',$data);	
		}else{
			
			$this->load->view('cwcontrol/modal/error',$data);
		}
		
		
	}//function

	public function update_cus_mail()
	{
		
		$query = $this->Model_contact->update_cus_mail();
		$data['page'] = $this->default_page;
		if ($query === TRUE)
		{	
			$this->load->view('cwcontrol/modal/success',$data);	
		}else{
			
			$this->load->view('cwcontrol/modal/error',$data);
		}
		
		
	}//function
	
	public function insert()
	{	
		
		$query = $this->Model_contact->insert();
		$data['page'] = $this->default_page;
		if ($query === TRUE)
		{
		
			$this->load->view('cwcontrol/modal/success',$data);
			

		}else{
			
			$this->load->view('cwcontrol/modal/error',$data);
			
		

		}
		
	}
	
	public function delete()
	{	
		
		$query = $this->Model_contact->delete();
		
	}
	
	public function delete_All()
	{	
		
		$query = $this->Model_contact->delete_All();
		
	}
	
	public function status()
	{	
		
		$query = $this->Model_contact->status();
		
	}
	
	public function home()
	{	
		
		$query = $this->Model_contact->home();
		
	}
	
	public function Sort()
	{	
		
		$query = $this->Model_contact->Sort();
		
	}
	
}

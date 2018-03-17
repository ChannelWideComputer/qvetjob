<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
		
	public function __construct()
	{
		parent::__construct();		
		
		if(!isset($_SESSION["user_username"])){

			redirect('cwcontrol');  

		}
		$this->load->model('Model_about');	
	}

	
	public function index()
	{	
		
		
		$data = $this->Model_about->get_about("home");		
		$this->load->view('cwcontrol/pages/home/index',$data);
		
	}
	
	public function update()
	{
		
		$query = $this->Model_about->update();
		
		
		$data_page['page'] = "home" ;
		if ($query === TRUE)
		{
		
			$this->load->view('cwcontrol/modal/success',$data_page);
			

		}else{
			
			$this->load->view('cwcontrol/modal/error',$data_page);
			
		

		}
		
		
		
	}
	
	
	
	
	
	
	
}

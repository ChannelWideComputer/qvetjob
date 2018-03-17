<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
	
	protected $default_page = 'about';
	
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
		$data = $this->Model_about->get_about("about");
		$data['page'] = $this->default_page;
		$data['title'] ="เกี่ยวกับเรา";
		//echo '<pre>';print_r($data); echo '</pre>';
		//var_dump($data); 


		$this->load->view('cwcontrol/pages/about/index',$data);
		
	}
	
	public function update()
	{
		
		$query = $this->Model_about->update();
		$data_page['page'] = $this->default_page; ;
		if ($query === TRUE)
		{
		
			$this->load->view('cwcontrol/modal/success',$data_page);
			

		}else{
			
			$this->load->view('cwcontrol/modal/error',$data_page);
			}
		}
	public function delete_img()
	{	
		$this->Model_contact->delete_img();
		
	}//function
	
	
	
	
	
	
	
}

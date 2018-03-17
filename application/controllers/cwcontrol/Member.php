<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
	
	protected $default_page = 'member';
	
	public function __construct()
	{
		parent::__construct();		
		if(!isset($_SESSION["user_username"])){
			
			redirect('cwcontrol');  

		}
		$this->load->model('Model_member');
	}

	
	public function index()
	{	
		if(isset($_GET["type"]) && $_GET["type"] == 'edit'){
			
			$data = $this->Model_member->get_detail();
			
		}else{
			
			$rows_per_page = 15;
			$page_url = base_url('cwcontrol/'.$this->default_page);
			$data = $this->Model_member->get_all($rows_per_page,$page_url);	
			$data['page_url'] = $page_url;
			
			
		}
		
		$data['page'] = $this->default_page;		
		$this->load->view('cwcontrol/pages/'.$this->default_page.'/index',$data);
		
	}
	
	public function insert()
	{	
		
		$query = $this->Model_member->insert();
		$data['page'] = $this->default_page;
		if ($query === TRUE)
		{
		
			$this->load->view('cwcontrol/modal/success',$data);
			

		}else{
			
			$this->load->view('cwcontrol/modal/error',$data);
			
		

		}
		
	}
	
	public function update()
	{	
		
		$query = $this->Model_member->update();
		$data['page'] = $this->default_page;
		if ($query === TRUE)
		{
		
			$this->load->view('cwcontrol/modal/success',$data);
			

		}else{
			
			$this->load->view('cwcontrol/modal/error',$data);
			
		

		}
		
	}
	
	
	public function chk_mail()
	{	
		
		$query = $this->Model_member->chk_mail();
		
	}//function
	
	public function delete()
	{	
		
		$query = $this->Model_member->delete();
		
	}
	
	public function delete_All()
	{	
		
		$query = $this->Model_member->delete_All();
		
	}
	
	public function status()
	{	
		
		$query = $this->Model_member->status();
		
	}
	
	
	
}

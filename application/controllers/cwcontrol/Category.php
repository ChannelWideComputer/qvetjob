<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	
	protected $default_page = 'category';
	
	public function __construct()
	{
		parent::__construct();		
		if(!isset($_SESSION["user_username"])){
			
			redirect('cwcontrol');  

		}
		$this->load->model('Model_category');	
		
	}

	
	public function index()
	{	
		if(isset($_GET["type"]) && $_GET["type"] == 'edit'){
			
			$data = $this->Model_category->get_detail();
			
		}else{
			
			//$rows_per_page = 15;
			$page_url = base_url('cwcontrol/'.$this->default_page);
			$data = $this->Model_category->get_all($page_url);	
			$data['page_url'] = $page_url;
			
			
		}
		
		
		
		
		$data['page'] = $this->default_page;		
		$this->load->view('cwcontrol/pages/'.$this->default_page.'/index',$data);
		
	}
	
	public function insert()
	{	
		
		$query = $this->Model_category->insert();
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
		
		$query = $this->Model_category->update();
		$data['page'] = $this->default_page;
		if ($query === TRUE)
		{
		
			$this->load->view('cwcontrol/modal/success',$data);
			

		}else{
			
			$this->load->view('cwcontrol/modal/error',$data);
			
		

		}
		
	}
	
	
	
	public function detail()
	{	
		
		$data['id'] = $this->input->post('id');
		$this->load->view('cwcontrol/pages/'.$this->default_page.'/add_detail',$data);
		
	}
	
	public function delete_gallery()
	{	
		
		$query = $this->Model_category->delete_gallery();
		
	}
	
	public function delete_file()
	{	
		
		$query = $this->Model_category->delete_file();
		
	}
	
	public function delete()
	{	
		
		$query = $this->Model_category->delete();
		
	}
	
	public function delete_All()
	{	
		
		$query = $this->Model_category->delete_All();
		
	}
	
	public function status()
	{	
		
		$query = $this->Model_category->status();
		
	}
	
	public function home()
	{	
		
		$query = $this->Model_category->home();
		
	}
	
	public function Sort()
	{	
		
		$query = $this->Model_category->Sort();
		
	}
	
	
	
	
}

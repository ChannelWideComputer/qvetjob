<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends CI_Controller {
	
	protected $default_page = 'portfolio';
	
	public function __construct()
	{
		parent::__construct();		
		if(!isset($_SESSION["user_username"])){
			
			redirect('cwcontrol');  

		}
		$this->load->model('Model_portfolio');	
		
	}

	
	public function index()
	{	
		if(isset($_GET["type"]) && $_GET["type"] == 'edit'){
			
			$data = $this->Model_portfolio->get_detail();
			
		}else{
			
			$rows_per_page = 15;
			$page_url = base_url('cwcontrol/'.$this->default_page);
			$data = $this->Model_portfolio->get_all($rows_per_page,$page_url);	
			$data['page_url'] = $page_url;
			
			
		}
		
		
		
		
		$data['page'] = $this->default_page;		
		$this->load->view('cwcontrol/pages/'.$this->default_page.'/index',$data);
		
	}
	
	public function insert()
	{	
		
		$query = $this->Model_portfolio->insert();
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
		
		$query = $this->Model_portfolio->update();
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
		
		$query = $this->Model_portfolio->delete_gallery();
		
	}
	
	public function delete_file()
	{	
		
		$query = $this->Model_portfolio->delete_file();
		
	}
	
	public function delete()
	{	
		
		$query = $this->Model_portfolio->delete();
		
	}
	
	public function delete_All()
	{	
		
		$query = $this->Model_portfolio->delete_All();
		
	}
	
	public function status()
	{	
		
		$query = $this->Model_portfolio->status();
		
	}
	
	public function home()
	{	
		
		$query = $this->Model_portfolio->home();
		
	}
	
	public function Sort()
	{	
		
		$query = $this->Model_portfolio->Sort();
		
	}
	
	
	
	
}

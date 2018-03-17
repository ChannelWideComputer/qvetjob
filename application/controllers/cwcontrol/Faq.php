<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {
	
	protected $default_page = 'faq';
	
	public function __construct()
	{
		parent::__construct();		
		if(!isset($_SESSION["user_username"])){
			
			redirect('cwcontrol');  

		}
		$this->load->model('Model_faq');	
		
	}

	
	public function index()
	{	
		if(isset($_GET["type"]) && $_GET["type"] == 'edit'){
			
			$data = $this->Model_faq->get_detail();
			
		}elseif(isset($_GET["type"]) && $_GET["type"] == 'comment'){
			
			
			$rows_per_page = 10;
			$page_url = base_url('cwcontrol/'.$this->default_page);
			$data = $this->Model_faq->get_comment($rows_per_page,$page_url);	
			$data['page_url'] = $page_url;
			
		}else{
			
			$rows_per_page = 15;
			$page_url = base_url('cwcontrol/'.$this->default_page);
			$data = $this->Model_faq->get_all($rows_per_page,$page_url);	
			$data['page_url'] = $page_url;
			
			
		}
		
		
		
		
		$data['page'] = $this->default_page;		
		$this->load->view('cwcontrol/pages/'.$this->default_page.'/index',$data);
		
	}
	
	public function insert()
	{	
		
		$query = $this->Model_faq->insert();
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
		
		$query = $this->Model_faq->update();
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
	
		
	public function delete()
	{	
		
		$query = $this->Model_faq->delete();
		
	}
	
	public function delete_All()
	{	
		
		$query = $this->Model_faq->delete_All();
		
	}
	
	public function status()
	{	
		
		$query = $this->Model_faq->status();
		
	}
	
	public function home()
	{	
		
		$query = $this->Model_faq->home();
		
	}
	
	public function Sort()
	{	
		
		$query = $this->Model_faq->Sort();
		
	}
	
	
	public function add_ans()
	{	
		
		$query = $this->Model_faq->add_ans();
		//$data['page'] = $this->default_page;
		redirect('cwcontrol/'.$this->default_page.'?type=comment&id='.$this->input->post('faq_ID')); 
	}
	
	
	public function update_ans()
	{	
		
		$query = $this->Model_faq->update_ans();
		$data['page'] = $this->default_page.'?type=comment&id='.$this->input->post('faq_ID');
		if ($query === TRUE)
		{
		
			$this->load->view('cwcontrol/modal/success',$data);
			

		}else{
			
			$this->load->view('cwcontrol/modal/error',$data);
			
		

		}
		
	}
	
	
	public function delete_ans()
	{	
		
		$query = $this->Model_faq->delete_ans();
		
	}	
	
	
	public function status_ans()
	{	
		
		$query = $this->Model_faq->status_ans();
		
	}
	
	
	
	
}

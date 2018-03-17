<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends CI_Controller {

	protected $default_page = 'help';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_about');
		$this->load->model('Model_slide');
		$this->load->model('Model_contact');
		$this->load->model('Model_htb');
		$this->load->model('Model_faq');
		$this->load->model('Model_bank');
		$this->load->model('Model_delivery');

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
		$data = $this->Model_about->get_about("help");

		$data["slide"] = $this->Model_slide->get_home();

		$data['page_url'] = base_url($this->default_page); 


		$data["contact"] = $this->Model_contact->get_detail();	
		
		//echo "<pre>"; print_r($data); echo "</pre>";	
		
		$this->load->view('help',$data);
	}

	public function faq()
	{	
		
		$data = $this->Model_faq->get_home();
		$data["slide"] = $this->Model_slide->get_home();
		$data["contact"] = $this->Model_contact->get_detail();	
		$this->load->view('faq',$data);
		
	}

	public function basic()
	{
		$data = $this->Model_about->get_about("basic");

		$data["slide"] = $this->Model_slide->get_home();

		$data["contact"] = $this->Model_contact->get_detail();	
		
		//echo "<pre>"; print_r($data); echo "</pre>";	
		
		$this->load->view('basic',$data);
	}

	public function How2buy()
	{
		$data = $this->Model_htb->get_home();
		$data["slide"] = $this->Model_slide->get_home();
		$data["contact"] = $this->Model_contact->get_detail();	

		$this->load->view('how2buy',$data);
		
	}

	public function How2pay()
	{
		$data = $this->Model_bank->get_home();
		$data["slide"] = $this->Model_slide->get_home();
		$data["contact"] = $this->Model_contact->get_detail();	

		$this->load->view('how2pay',$data);
		
	}

	public function privilege()
	{
		$data = $this->Model_about->get_about("privilege");

		$data["slide"] = $this->Model_slide->get_home();

		$data["contact"] = $this->Model_contact->get_detail();	
		
		//echo "<pre>"; print_r($data); echo "</pre>";	
		
		$this->load->view('privilege',$data);
	}

	public function delivery()
	{
		$data = $this->Model_about->get_about("delivery");

		$data["slide"] = $this->Model_slide->get_home();

		$data["contact"] = $this->Model_contact->get_detail();	
		
		//echo "<pre>"; print_r($data); echo "</pre>";	
		
		$this->load->view('delivery',$data);
	}

	public function re_turn()
	{
		$data = $this->Model_about->get_about("return");

		$data["slide"] = $this->Model_slide->get_home();

		$data["contact"] = $this->Model_contact->get_detail();	
		
		//echo "<pre>"; print_r($data); echo "</pre>";	
		
		$this->load->view('return',$data);
	}

	public function size()
	{
		$data = $this->Model_about->get_about("size");

		$data["slide"] = $this->Model_slide->get_home();

		$data["contact"] = $this->Model_contact->get_detail();	
		
		//echo "<pre>"; print_r($data); echo "</pre>";	
		
		$this->load->view('size',$data);
	}

	public function tracking()
	{
		$data = $this->Model_delivery->get_home();

		$data["slide"] = $this->Model_slide->get_home();

		$data["contact"] = $this->Model_contact->get_detail();	
		
		//echo "<pre>"; print_r($data); echo "</pre>";	
		
		$this->load->view('tracking',$data);
	}




}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    protected $default_page = 'home';
    
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_about');
		$this->load->model('Model_slide');
		$this->load->model('Model_product');
        // $this->load->model('Model_service');
        // $this->load->model('Model_promotion');
        $this->load->model('Model_category');
        $this->load->helpers('counter_helper');
	}
	
	public function index($id = null)
	{
		if ($this->session->userdata('lang') == NULL) {
        	$lang = "EN";
            $this->session->set_userdata('lang', $lang);	        	
                      
        }else{        	
            $lang = $this->session->userdata('lang');  
        }
        
        $this->lang->load($lang, $lang);
		
        // ======================================================================== //
        
        $rows_per_page = 15;
        $page_url = base_url($this->default_page);
        // $data = $this->Model_service->get_all($rows_per_page,$page_url);
		
		$data["slide"] = $this->Model_slide->get_home();
		$data['page_url'] = $page_url;
		//$data["cate"] = $this->Model_category->get_home();
		// $data["service"] = $this->Model_service->get_home("home");
		$data["menu"] = $this->Model_product->get_home("home");
        // $data["promotion"] = $this->Model_promotion->get_home("home");
        //$data = $this->Model_product->get_all($rows_per_page,$page_url);
		//$data["portfolio"] = $this->Model_portfolio->get_home("home");
		
		/*echo "<pre>";
		print_r($service);
		echo "</pre>";
		//die();*/
		$data["home"] = $this->Model_about->get_about("home");
		
		
		
		// echo "<pre>";
		// print_r($data["contact"]);
		// echo "</pre>";	
		
		$this->load->view('index',$data);
	}

	public function change($lang)
    {
        //echo $this->router->class;
        //die();
        $this->session->set_userdata('lang', $lang);
        redirect($this->router->class, 'refresh');
    }
    
    public function sentmail()
	{	
		//print_r($_POST);
		//print_r($_FILES['emailpic']);
		//echo  $_POST['emailpic'];
		//echo  $_FILES['emailpic']['name'];
		//echo  $_FILES['emailpic']['type'];
		//echo  $_FILES['emailpic']['size'];
		//die();
		$lang = $this->session->lang;
		
		$query = $this->Model_contact->sentmail();
		
		if($query == TRUE){
			
			$data_page = array(
				'page' => "index.php",
				'label' => constant('Contact-'.$_SESSION["lang"]),
				'labeltext' => constant('Weget-'.$_SESSION["lang"]),
			);
			
			$this->load->view('cwcontrol/modal/front_success',$data_page);
			
		}elseif($query == "code"){
			
			$data_page = array(
				'page' => "index.php",
				'label' => constant('Contact-'.$_SESSION["lang"]),
				'labeltext' => constant('Security-'.$_SESSION["lang"]),
			);
			
			
		}else{
			
			$data_page = array(
				'page' => "index.php",
				'label' => constant('Contact-'.$_SESSION["lang"]),
				'labeltext' => constant('Error-'.$_SESSION["lang"]),
			);
			$this->load->view('cwcontrol/modal/front_error',$data_page);
			
		}
		
		
		
	}
    
    
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password extends CI_Controller {
	
	protected $default_page = 'password';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_slide');
		$this->load->model('Model_contact');
		$this->load->library('cart');
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
		
		$lang = $this->session->lang;
		$id   = $this->db->escape_str($_SESSION["user_id"]);
		
		$data['page_url'] = base_url($this->default_page); 
		$data['page'] = array(
			"H_TH"=>"หน้าแรก",
			"H_EN"=>"Home",
			"TH"=>"login",
			"EN"=>"Company Profile",
		);
		
		
		$sql = "SELECT * FROM tb_member WHERE ID = '".$id."' ";
		$query = $this->db->query($sql);		
		foreach ($query->result_array() as $row){
			
			$data["member"] = array(
				'ID' => $row["ID"],

			);
			
			
		}

		$data["slide"] = $this->Model_slide->get_home();
		$data["contact"] = $this->Model_contact->get_detail();	
		
		
		$this->load->view('change_password',$data);
	}//function
	
	
	
	public function edit()
	{
		
		$lang = $this->session->lang;
		$id   = $this->db->escape_str($_POST["id"]);
		/*
		if(isset($_POST['g-recaptcha-response'])){
			$captcha=$_POST['g-recaptcha-response'];
		}
		
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$response = file_get_contents($url."?secret=".apikey("secret_key")."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);

		$data = json_decode($response);*/

		$chk_captcha = "1";

		
		if($chk_captcha){
			
			
			$sql = "SELECT * FROM tb_member WHERE ID = '".$id."' ";
			$query = $this->db->query($sql);
			$row = $query->row_array();
			
			//$Oldpassword = base64_encode($_POST["Oldpassword"]);	
			$member_Email = $_POST["member_Email"];
			$basemember_Email = $row['member_Email'];

			
			if($basemember_Email == $member_Email){


				if ($_POST["member_Pass"] == $_POST["member_Pass2"]) {
				
				$data = array(
					'member_Pass' => base64_encode($_POST["member_Pass"]),

				);

				$this->db->where('ID', $id);
				//$this->db->set('member_date_reg', 'NOW()', FALSE);
				$this->db->update('tb_member', $data);


				$this->db->trans_complete();
				if ($this->db->trans_status() === TRUE)
				{
					$data_page = array(
					'page' => "profile",
					'label' => constant('Profile-'.$_SESSION["lang"]),
					'labeltext' => constant('Security-'.$_SESSION["lang"]),
				);
					$this->load->view('cwcontrol/modal/front_success',$data_page);
					//echo "success";
				}else{
					$data_page = array(
					'page' => "profile",
					'label' => constant('Profile-'.$_SESSION["lang"]),
					'labeltext' => constant('Security-'.$_SESSION["lang"]),
				);
					$this->load->view('cwcontrol/modal/code',$data_page);
					//echo "error";
					
				}
				}else{
					$data_page = array(
					'page' => "profile",
					'label' => constant('Profile-'.$_SESSION["lang"]),
					'labeltext' => constant('Security-'.$_SESSION["lang"]),
				);
					$this->load->view('cwcontrol/modal/code',$data_page);
					
				}

			}else{
				$data_page = array(
					'page' => "profile",
					'label' => constant('Profile-'.$_SESSION["lang"]),
					'labeltext' => constant('Security-'.$_SESSION["lang"]),
				);
				$this->load->view('cwcontrol/modal/code',$data_page);
				//echo "pass";
				
			}
			
			
		}else{
			$data_page = array(
					'page' => "profile",
					'label' => constant('Profile-'.$_SESSION["lang"]),
					'labeltext' => constant('Security-'.$_SESSION["lang"]),
				);
			$this->load->view('cwcontrol/modal/front_error',$data_page);
			//echo "code";
			
		}
		
		
		
	}//function
	
	
	
	
}

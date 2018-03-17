<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	protected $default_page = 'login';
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Model_slide');

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
		
		$sql = "SELECT * FROM tb_about WHERE about_Type = 'images' ";
		$query = $this->db->query($sql);
		$row = $query->row_array();
		$data["about_Images"] = $row["about_Images"];

		$data["contact"] = $this->Model_contact->get_detail();	
		$data["slide"] = $this->Model_slide->get_home();
		$data['page_url'] = base_url($this->default_page); 
		$data['page'] = array(
			"H_TH"=>"หน้าแรก",
			"H_EN"=>"Home",
			"TH"=>"login",
			"EN"=>"Company Profile",
		);
		$this->load->view('login',$data);
	}
	
	
	public function chk_login()
	{
		
		
		$strUsername = $this->db->escape_str($_POST["Username"]);
		$strPassword = $this->db->escape_str($_POST["Password"]);
		
		if(trim($strUsername) == "" || trim($strPassword) == "" )
		{
			echo "false";
			exit();
		}
		
		
		
		$sql = "SELECT * FROM tb_member WHERE member_Email = ? AND member_Pass = ? AND member_Status = ?";
		$query = $this->db->query($sql, array($strUsername, base64_encode($strPassword), 1));
		//echo $this->db->last_query();
		$Num_Rows = $query->num_rows();
		$row = $query->row_array();
		if($Num_Rows != 0)
		{
			
			
			if(@$_POST["remember_me"] == "on") { 
				
				set_cookie('username_log',$strUsername,'30000000');
				set_cookie("password_log",$strPassword,'30000000');
			}else{
				set_cookie("username_log", "", time()-3600);
				set_cookie("password_log", "", time()-3600);
			}
			
			$_SESSION["user_id"] = $row["ID"];
			$_SESSION["user_Name"] = $row["member_Name"];
			$_SESSION["user_Type"] = $row["member_Type"];

			//print_r($_SESSION);
			
			$data_page = array(
				'page' => "profile",
				'label' => constant('Profile-'.$_SESSION["lang"]),
				'labeltext' => constant('Success-'.$_SESSION["lang"]),
			);


			$this->load->view('cwcontrol/modal/front_success',$data_page);
		}else{
			$data_page = array(
				'page' => "index.php",
				'label' => constant('Profile-'.$_SESSION["lang"]),
				'labeltext' => constant('Error-'.$_SESSION["lang"]),
			);

			$this->load->view('cwcontrol/modal/front_error',$data_page);
		}
		
		
		
		
	}
	
	public function logout()
	{
		
		
		unset( $_SESSION['user_id']);
		unset( $_SESSION['user_Name']);

		
		redirect('login');
		
		
		
	}
	
}

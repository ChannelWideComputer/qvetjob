<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create extends CI_Controller {
	
	protected $default_page = 'create';
	
	public function __construct()
	{
		parent::__construct();		
		
		$this->load->model('Model_faq');	
		
	}

	
	public function index()
	{	
		$id = $this->input->get('id');
		$data = $this->Model_faq->get_detail($id);
		$data['page_url'] = base_url($this->default_page);
		$data['page'] = array(
			"H_TH"=>"หน้าแรก",
			"H_EN"=>"product",
			"TH"=>"สร้างกระทู้",
			"EN"=>"create",
		);
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		$this->load->view('create',$data);
		
	}
	
	public function insert()
	{
		$lang = $this->session->lang;
		
		if(isset($_POST['g-recaptcha-response'])){
			$captcha=$_POST['g-recaptcha-response'];
		}
		
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$secret = '6LelrjMUAAAAAKkNLbYrzV4okYSVQ8JdqJ0gKCai';
		// $response = file_get_contents($url."?secret=".apikey("secret_key")."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
		$response = file_get_contents($url."?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);

		$data = json_decode($response);

		$chk_captcha = $data->success;

		
		if($chk_captcha){

			$query = $this->db->get('tb_faq');
			$Num_Rows = $query->num_rows();
			$Sort = $Num_Rows+1;
			if ($_SESSION["user_id"] == "") {
				$user_id = '0' ;
			}else{
				$user_id = $_SESSION["user_id"] ;
			}
			$data = array(
				'faq_Name' => $_SESSION["user_Name"],
				'user_ID' => $user_id,
				'faq_Ask_TH' => $_POST["faq_Ask_TH"],
			// 'faq_Ask_EN' => $_POST["faq_Ask_EN"],
				'faq_Reply_TH' => $_POST["faq_Reply_TH"],
				'faq_Status' => "0",
			// 'faq_Reply_EN' => $_POST["faq_Reply_EN"],
				'faq_Sort' => $Sort,

			);

			$this->db->insert('tb_faq', $data);
			$id = $this->db->insert_id();


		//exit();
		//echo $this->db->last_query();
			if($this->db->trans_status() === TRUE)
			{
				$data_page = array(
					'page' => "qa",
					'label' => constant('Profile-'.$_SESSION["lang"]),
					'labeltext' => constant('Success-'.$_SESSION["lang"]),
				);


				$this->load->view('cwcontrol/modal/front_success',$data_page);

			}else{
				$data_page = array(
					'page' => "qa",
					'label' => constant('Profile-'.$_SESSION["lang"]),
					'labeltext' => constant('Error-'.$_SESSION["lang"]),
				);

				$this->load->view('cwcontrol/modal/front_error',$data_page);


			}

		}else{
			$data_page = array(
				'page' => "create",
				'label' => constant('Profile-'.$_SESSION["lang"]),
				'labeltext' => constant('Error-'.$_SESSION["lang"]),
			);

			$this->load->view('cwcontrol/modal/front_error',$data_page);
		}
	}

	public function delete()
	{	

		$query = $this->Model_faq->delete();

	}


	public function update()
	{	
		$lang = $this->session->lang;
		
		if(isset($_POST['g-recaptcha-response'])){
			$captcha=$_POST['g-recaptcha-response'];
		}
		
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$secret = '6LelrjMUAAAAAKkNLbYrzV4okYSVQ8JdqJ0gKCai';
		// $response = file_get_contents($url."?secret=".apikey("secret_key")."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
		$response = file_get_contents($url."?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);

		$data = json_decode($response);

		$chk_captcha = $data->success;

		$id = $this->input->post('id');

		if($chk_captcha){
			$query = $this->db->get('tb_faq');

			$id = $this->input->post('id');

			$data = array(
			//'faq_Name' => $_SESSION["user_Name"],
				'faq_Ask_TH' => $_POST["faq_Ask_TH"],
			// 'faq_Ask_EN' => $_POST["faq_Ask_EN"],
				'faq_Reply_TH' => $_POST["faq_Reply_TH"],
			//'faq_Status' => "0",
			// 'faq_Reply_EN' => $_POST["faq_Reply_EN"],
			//'faq_Sort' => $Sort,

			);

			$this->db->where('faq_ID', $id);
			$this->db->set('faq_UpDate', 'NOW()', FALSE);
			$this->db->update('tb_faq', $data);


		//exit();
		//echo $this->db->last_query();
			if($this->db->trans_status() === TRUE)
			{

				$data_page = array(
					'page' => "qa",
					'label' => constant('Profile-'.$_SESSION["lang"]),
					'labeltext' => constant('Success-'.$_SESSION["lang"]),
				);


				$this->load->view('cwcontrol/modal/front_success',$data_page);

			}else{

				$data_page = array(
					'page' => "qa",
					'label' => constant('Profile-'.$_SESSION["lang"]),
					'labeltext' => constant('Error-'.$_SESSION["lang"]),
				);

				$this->load->view('cwcontrol/modal/front_error',$data_page);


			}
		}else{

			$data_page = array(
				'page' => 'qa',
				'label' => constant('Profile-'.$_SESSION["lang"]),
				'labeltext' => constant('Error-'.$_SESSION["lang"]),
			);

			$this->load->view('cwcontrol/modal/front_error',$data_page);


		}

	}
}

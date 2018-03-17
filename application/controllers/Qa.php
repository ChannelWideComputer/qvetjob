<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qa extends CI_Controller {
	
	protected $default_page = 'qa';
	
	public function __construct()
	{
		parent::__construct();		
		
		$this->load->model('Model_faq');	
		
	}

	
	public function index()
	{	
		
		$data = $this->Model_faq->get_home();
		$data['page_url'] = base_url($this->default_page);
		$data['page'] = array(
			"H_TH"=>"หน้าแรก",
			"H_EN"=>"product",
			"TH"=>"เว็ปบอร์ด",
			"EN"=>"webboard",
		);
		$this->load->view('webboard',$data);
		
	}
	
	public function detail($id = null)
	{	


		$id = $this->uri->segment(2);
		// echo $this->uri->segment(2);
		// die();
		$query = $this->db->query("SELECT counter_V FROM `tb_faq` WHERE faq_ID = $id");
		$row = $query->row_array();
		//print_r($row);
		//echo $this->db->last_query();
		$Sort = $row['counter_V']+1 ;
		//echo $Sort;
		//echo $row["counter_V"];
			//$Sort = $row["counter_V"]+1;
		$this->db->where('faq_ID', $id);
		$this->db->set('counter_V', $Sort);
		$this->db->update('tb_faq');









		$rows_per_page =  5;
		$page_url      =  base_url($this->default_page);;
		$data = $this->Model_faq->get_comment($rows_per_page,$page_url);
		$data = $this->Model_faq->get_detail($id);
		$data['page_url'] = base_url($this->default_page);
		$data['page'] = array(
			"H_TH"=>"หน้าแรก",
			"H_EN"=>"product",
			"TH"=>"เว็ปบอร์ด",
			"EN"=>"webboard",
			"sub"=>"Post",
		);
		$this->load->view('posts',$data);
		
	}


	public function add_ans()
	{	

		if(!isset($this->session->user_id)){

			redirect('qa/');  

		}
		$lang = $this->session->lang;
		
		if(isset($_POST['g-recaptcha-response'])){
			$captcha=$_POST['g-recaptcha-response'];
		}
		
		$secret = '6LelrjMUAAAAAKkNLbYrzV4okYSVQ8JdqJ0gKCai'; // ftp
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$response = file_get_contents($url."?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
		// $response = file_get_contents($url."?secret=".apikey("secret_key")."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);

		$data2 = json_decode($response);

		$chk_captcha = $data2->success;

		
		if($chk_captcha){

			$query = $this->Model_faq->add_ans_home();
		//$data['page'] = $this->default_page;
			//redirect('qa/'.$this->input->post('faq_ID')); 
			$p = 'qa/'.$this->input->post('faq_ID') ;
			$data = array(
				'page' => $p,
				'label' => constant('Profile-'.$_SESSION["lang"]),
				'labeltext' => constant('Success-'.$_SESSION["lang"]),
			);

			$this->load->view('cwcontrol/modal/front_success',$data);
		}else{
			$p = 'qa/'.$this->input->post('faq_ID') ;
			$data_page = array(
				'page' => $p,
				'label' => constant('Profile-'.$_SESSION["lang"]),
				'labeltext' => constant('Error-'.$_SESSION["lang"]),
			);

			$this->load->view('cwcontrol/modal/front_error',$data_page);
		}
	}

	public function delete($id=null)
	{
		// echo $this->input->get('faq_ID');
		if ($this->input->get('faq_ID')) {
			$id = $this->db->escape_str($this->input->get('faq_ID'));
			$this->db->delete('tb_faq', array('faq_ID' => $id)); 
			$data = array(
				'page' => 'qa',
				'label' => constant('Profile-'.$_SESSION["lang"]),
				'labeltext' => constant('Success-'.$_SESSION["lang"]),
			);

			$this->load->view('cwcontrol/modal/front_success',$data); 
		}
	}


	public function delete_ans($id=null)
	{
		
		if ($this->input->get('ans_ID')) {
			$id = $this->db->escape_str($this->input->get('ans_ID'));
			$this->db->delete('tb_ans', array('ans_ID' => $id)); 
			$data = array(
				'page' => 'qa/',
				'label' => constant('Profile-'.$_SESSION["lang"]),
				'labeltext' => constant('Success-'.$_SESSION["lang"]),
			);

			$this->load->view('cwcontrol/modal/front_success',$data); 
		}
	}


	public function update_ans($id=null)
	{
		
		if ($this->input->post('ans_ID')) {
			$id = $this->db->escape_str($this->input->post('ans_ID'));

			$data = array(
			'ans_Detail' => $_POST["ans_Detail"],
				// 'faq_Ask_TH' => $_POST["faq_Ask_TH"],
			// 'faq_Ask_EN' => $_POST["faq_Ask_EN"],
				// 'faq_Reply_TH' => $_POST["faq_Reply_TH"],
			//'faq_Status' => "0",
			// 'faq_Reply_EN' => $_POST["faq_Reply_EN"],
			//'faq_Sort' => $Sort,

			);

			$this->db->where('ans_ID', $id);
			$this->db->set('ans_UpDate', 'NOW()', FALSE);
			$this->db->update('tb_ans', $data);
			
			$data2 = array(
				'page' => 'qa/'.$this->input->post('faq_ID'),
				'label' => constant('Profile-'.$_SESSION["lang"]),
				'labeltext' => constant('Success-'.$_SESSION["lang"]),
			);
			$this->load->view('cwcontrol/modal/front_success',$data2); 
		}
	}

	// public function update() 
	// { 

	// 	if ($this->input->post('ans_ID')) {

	// 		$id = $this->db->escape_str($this->input->post('ans_ID'));
	// 		$data = array(
	// 			'ans_Detail' => $_POST["ans_Detail"],
	// 		);

	// 		$this->db->where('ans_ID', $id);
	// 		$this->db->set('ans_UpDate', 'NOW()', FALSE);
	// 		$this->db->update('tb_ans', $data);
	// 	// 	echo $this->db->last_query();echo "<br>";
	// 	// 	echo $this->input->post('ans_ID');echo "<br>";
	// 	// 	echo $id;echo "<br>";
	// 	// 	echo "pass";echo "<br>";
	// 	// 	echo $_POST['ans_ID'];echo "<br>";
	// 	// 	echo $_POST['faq_ID'];echo "<br>";
	// 	// 	die();

	// 		redirect('qa/'.$this->input->post('faq_ID')); 

	// 	}else{
	// 	// 	echo $this->db->last_query();echo "<br>";
	// 	// 	echo $this->input->post('ans_ID');echo "<br>";
	// 	// 	echo $id;echo "<br>";
	// 	// 	echo "die";echo "<br>";
	// 	// 	echo $_POST['ans_ID'];echo "<br>";
	// 	// 	echo $_POST['faq_ID'];echo "<br>";
	// 	// 	die();
	// 		redirect('qa/'.$this->input->post('faq_ID')); 


	// 	}		
	// }

	// public function delete()
	// {	


	// 	if($this->input->get('ans_ID')!=""){

	// 		$id = $this->db->escape_str($this->input->get('ans_ID'));

	// 		$tables = array('tb_ans');
	// 		$this->db->where('ans_ID', $id);
	// 		$this->db->delete($tables);
	// 		// echo $this->db->last_query();echo "<br>";
	// 		$this->dbutil->optimize_table('tb_ans');
	// 		// echo "pass";echo "<br>";
	// 		// echo "id=".$id;echo "<br>";
	// 		// echo "ans_ID=".$this->input->get('ans_ID');echo "<br>";
	// 		// echo "faq_ID=".$this->input->get('faq_ID');echo "<br>";

	// 		// die();

	// 		redirect('qa/'.$this->input->get('faq_ID')); 
	// 	}else{
	// 		// echo "die";echo "<br>";
	// 		// echo "id=".$id;echo "<br>";
	// 		// echo "ans_ID=".$this->input->get('ans_ID');echo "<br>";
	// 		// echo "faq_ID=".$this->input->get('faq_ID');echo "<br>";
	// 		// echo $this->db->last_query();echo "<br>";
	// 		// die();
	// 		redirect('qa/'.$this->input->get('faq_ID'));
	// 	} 


	// }
		//echo $this->db->last_query();

	
}

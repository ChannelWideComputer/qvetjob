<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	
	protected $default_page = 'register';
	
	public function __construct()
	{
		parent::__construct();		
		if(!isset($_SESSION["user_username"])){
			
			redirect('cwcontrol');  

		}
		$this->load->model('Model_register');	
		
	}

	
	public function index()
	{	
		if(isset($_GET["type"]) && $_GET["type"] == 'edit'){
			
			$data = $this->Model_register->get_detail();
			
			
		}else{		
			
			$page_url = base_url('cwcontrol/'.$this->default_page);
			$data = $this->Model_register->get_all($page_url);	
			$data['page_url'] = $page_url;		
		}
		
		$data['page'] = $this->default_page;		
		$this->load->view('cwcontrol/pages/'.$this->default_page.'/index',$data);
		
	}


	
	public function insert()
	{	
		
		$query = $this->Model_register->insert();
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
		
		$query = $this->Model_register->update();
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
		
		$id = $this->input->post('id');

		//echo print_r($_POST); die();

		/*

		if($id){
			$id = $this->db->escape_str($id);	
		}else{
			$id = $this->db->escape_str($this->input->get('id'));
		}
		$query = $this->db->get_where('tb_register', array('register_ID' => $id));
		
		foreach ($query->result_array() as $row){
			

			$data["cv"] = array(
				'register_ID' => $row["register_ID"],
				'register_Fname' => $row["register_Fname"],
				'register_Lname' => $row["register_Lname"],
				'register_Email' => $row["register_Email"],
				'register_Phone' => $row["register_Phone"],
				'register_Add' => $row["register_Add"],
				'register_City' => $row["register_City"],
				'register_State' => $row["register_State"],
				'register_Country' => $row["register_Country"],
				'register_Date	' => $row["register_Date"],
			);
			
			
		}*/
		



		$data['aaa'] = $this->Model_register->get_detail_query($id);

		
		
		//echo json_encode($query);

		//echo print_r($query); die();

		//return $data;

		$this->load->view('cwcontrol/pages/'.$this->default_page.'/member_detail',$data);
		
	}
	
	public function delete_gallery()
	{	
		
		$query = $this->Model_register->delete_gallery();
		
	}
	
	public function delete_file()
	{	
		
		$query = $this->Model_register->delete_file();
		
	}
	
	public function delete()
	{	
		
		$query = $this->Model_register->delete();
		
	}
	
	public function delete_All()
	{	
		
		$query = $this->Model_register->delete_All();
		
	}
	
	public function status()
	{	
		
		$query = $this->Model_register->status();
		
	}
	
	public function home()
	{	
		
		$query = $this->Model_register->home();
		
	}
	
	public function Sort()
	{	
		
		$query = $this->Model_register->Sort();
		
	}
	
	
	
	
}

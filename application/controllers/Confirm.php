<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirm extends CI_Controller {
	

	public function __construct()
	{
		parent::__construct();

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
		$lang = $_GET["lg"];
		
		$id = $this->db->escape_str($_GET["v"]);
		//echo $id;

		
		$sql = "SELECT * FROM tb_member WHERE ID='".$id."'  ";
		$query = $this->db->query($sql);

		//echo $this->db->last_query();
		
		if($row = $query->row_array()){
			
			$data = array(
				'member_Active' => "yes",
				'member_Status' => 1,


			);

			$this->db->where('ID', $row["ID"]);
			$this->db->update('tb_member', $data);
			
			$this->db->trans_complete();
			
			if ($this->db->trans_status() === TRUE)
			{

				$data_page = array(
					'page' => "home",
					'label' => constant('regis3-'.$lang),
					'labeltext' => constant('Success-'.$lang),
				);
				$this->load->view('cwcontrol/modal/front_success',$data_page);


			}else{
				
				$data_page = array(
					'page' => "home",
					'label' => constant('regis3-'.$lang),
					'labeltext' => constant('Error-'.$lang),
				);
				$this->load->view('cwcontrol/modal/front_error',$data_page);



			}
			
		}
		
	}
}

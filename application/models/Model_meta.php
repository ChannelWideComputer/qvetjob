<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_meta extends CI_Model {
	
	private $type = 'meta';
	
	public function __construct()
	{
			parent::__construct();			
			$this->load->dbutil();
			$this->load->helper(array('classupload'));
			
	}
	
	public function get_detail($id = null) 
	{ 
		
		if($id){
			$id = $this->db->escape_str($id);	
		}else{
			$id = $this->db->escape_str($this->input->get('id'));
		}
		$query = $this->db->get_where('tb_meta', array('id' => $id));
		
		foreach ($query->result_array() as $row){
			
		
			$data = array(
					'meta_titte' => $row["meta_titte"],
					'meta_description' => $row["meta_description"],
					'meta_keywords' => $row["meta_keywords"],
			);
			
			
		}
		
		
		/*echo "<pre>";
		print_r($data);
		echo "</pre>";*/
		
		//echo $this->db->last_query();
		
			return $data;
			
	}//function
	

}
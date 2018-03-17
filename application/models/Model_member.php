<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_member extends CI_Model {
	
	
	
	public function __construct()
	{
		parent::__construct();			
		$this->load->dbutil();
		$this->load->helper(array('classupload'));

	}
	
	
	public function get_all($rows_per_page,$page_url) 
	{ 
		

		$current_page = 1;
		$rows_per_page = $rows_per_page;
		$page_range = 5;
		$qry_string = "";

		if($this->input->get_post('page')) {
			$current_page = $this->input->get_post('page');
		}
		if($this->input->get_post('Keyword') != ""){

			$word = $this->input->get_post('Keyword');
			$qry_string .= "Keyword=$word";
			$data["word"] = $word;
		}else{	

			$word = "";
		}

		$start_row = paging_start_row($current_page, $rows_per_page);

		$this->db->start_cache();
		$this->db->group_start();
		$this->db->like('member_Name', $word)->or_like('member_Email', $word);
		$this->db->or_like('member_Tel', $word)->or_like('member_Mobile',$word);
		$this->db->group_end();
		$this->db->order_by('member_date_reg', 'DESC');
		$this->db->stop_cache();

		$query = $this->db->get('tb_member');
		
		$Num_Rows = $query->num_rows();
		$total_pages = paging_total_pages($Num_Rows, $rows_per_page);
		$page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url);



		$this->db->limit($rows_per_page, $start_row);
		$query = $this->db->get('tb_member');
		$this->db->flush_cache();


		if($Num_Rows > 0 ) {
			$data["member"] = $query->result_array();
		}


		$data["pagination"] = array(
			'start_row' => $start_row,
			'Num_Rows' => $Num_Rows,
			'current_page' => $current_page,
			'total_pages' => $total_pages,

		);

		if($Num_Rows > $rows_per_page){
			$data["page_str"] = $page_str;

		}

		
		/*echo "<pre>";
		print_r($data);
		echo "</pre>";*/
		
		//echo $this->db->last_query();
		
		return $data;
		
	}//function
	
	
	
	public function get_detail($id = null) 
	{ 
		
		if($id){
			$id = $this->db->escape_str($id);	
		}else{
			$id = $this->db->escape_str($this->input->get('id'));
		}
		$query = $this->db->get_where('tb_member', array('ID' => $id));
		
		foreach ($query->result_array() as $row){
			

			$data["member"] = array(
				'ID' => $row["ID"],
				'member_Name' => $row["member_Name"],
				'member_Add' => $row["member_Add"],
				'member_Province' => $row["member_Province"],
				'member_Citizen' => $row["member_Citizen"],
				'member_Pass' => base64_decode($row["member_Pass"]),
				'member_Tel' => $row["member_Tel"],
				'member_Mobile' => $row["member_Mobile"],
				'member_Company' => $row["member_Company"],
				'member_District' => $row["member_District"],
				'member_County' => $row["member_County"],
				'member_Message' => $row["member_Message"],
				'member_Email' => $row["member_Email"],
				'member_date_reg' => $row["member_date_reg"],
			);
			
			
		}
		
		
		/*echo "<pre>";
		print_r($data);
		echo "</pre>";*/
		
		//echo $this->db->last_query();
		
		return $data;

	}//function
	
	
	
	public function insert() 
	{ 
		
		
		$data = array(
			'member_Name' => $_POST["member_Name"],
			'member_Add' => str_replace("\n", "<br>\n", $_POST["member_Add"]),
			'member_Phone' => $_POST["member_Phone"],
			'member_Pass' => base64_encode($_POST["member_Pass"]),
			'member_Email' => $_POST["member_Email"],
			'member_Status' => '1',
			'member_Active' => 'yes',

		);

		$this->db->insert('tb_member', $data);
		$id = $this->db->insert_id();
		
		
		
		//exit();
		//echo $this->db->last_query();
		if($this->db->trans_status() === TRUE)
		{

			return TRUE;

		}else{
			
			return FALSE;


		}
		
	}//function
	
	public function update() 
	{ 
		
		$id = $this->db->escape_str($this->input->post('id'));
		$data = array(
			'member_Name' => $_POST["member_Name"],
			'member_Add' => str_replace("\n", "<br>\n", $_POST["member_Add"]),
			'member_Province' => $_POST["member_Province"],
			'member_Citizen' => $_POST["member_Citizen"],
			'member_Tel' => $_POST["member_Tel"],
			'member_Mobile' => $_POST["member_Mobile"],
			'member_Company' => $_POST["member_Company"],
			'member_District' => $_POST["member_District"],
			'member_County' => $_POST["member_County"],
			'member_Message' => $_POST["member_Message"],

		);

		$this->db->where('ID', $id);
		$this->db->set('member_date_reg', 'NOW()', FALSE);
		$this->db->update('tb_member', $data);
		
		
		//echo $this->db->last_query();
		if($this->db->trans_status() === TRUE)
		{

			return TRUE;

		}else{
			
			return FALSE;


		}


	}//function
	
	
	
	
	

	
	public function delete() 
	{ 
		

		if($this->input->post('id')!=""){

			$id = $this->db->escape_str($this->input->post('id'));
			
			/*$query = $this->db->get_where('tb_member', array('ID' => $id));
			$row = $query->row_array();
			unlink("assets/upload/$row[member_Images]");*/
			
			
			$tables = array('tb_member');
			$this->db->where('ID', $id);
			$this->db->delete($tables);
			$this->dbutil->optimize_table('tb_member');
			
			
			
		}
		

		
		
	}//function
	
	
	public function delete_All() 
	{ 
		
		for($i=0;$i<count($_POST["id"]);$i++)
		{	
			if($this->input->post('id')[$i]!=""){

				$id = $this->db->escape_str($this->input->post('id')[$i]);
				
				
				/*$query = $this->db->get_where('tb_member', array('ID' => $id));
				$row = $query->row_array();
				unlink("assets/upload/$row[member_Images]");*/

				
				$this->db->where('ID', $id);
				$this->db->delete('tb_member');
				


			}

		}
		
		
		$this->dbutil->optimize_table('tb_member');

		
		
	}//function
	
	public function chk_mail() 
	{ 

		$Email = $this->db->escape_str($this->input->post('member_Email'));
		$query = $this->db->get_where('tb_member', array('member_Email' => $Email));

		if(!$row = $query->row_array()){
			echo "n";
		}
	}
	
	
	
	
	public function status() 
	{ 

		if($this->input->post('id')!=""){

			$id = $this->db->escape_str($this->input->post('id'));
			
			$query = $this->db->get_where('tb_member', array('ID' => $id));
			$row = $query->row_array();
			if($row["member_Status"] == 1){
				$Status = 0;
			}else{
				$Status = 1;
			}
			
			
			$data = array(
				'member_Status' => $Status,
			);
			$this->db->where('ID', $id);
			$this->db->update('tb_member', $data);

		}
		
		
		
	}//function
	
	
	
	

}
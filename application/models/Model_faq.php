<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_faq extends CI_Model {

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
		$this->db->like('faq_Ask_TH', $word)->or_like('faq_Ask_EN', $word);
		$this->db->order_by('faq_Sort', 'ASC');
		$this->db->stop_cache();

		$query = $this->db->get('tb_faq');

		
		$Num_Rows = $query->num_rows();
		$total_pages = paging_total_pages($Num_Rows, $rows_per_page);
		$page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url);


		$this->db->limit($rows_per_page, $start_row);
		$query = $this->db->get('tb_faq');
		$this->db->flush_cache();

			//echo $this->db->last_query();


		if($Num_Rows > 0 ) {
			$data["faq"] = $query->result_array();
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
		echo "</pre>";
		
		echo $this->db->last_query();*/
		
		return $data;
		
	}//function
	
	public function get_home() 
	{ 
		

		$rows_per_page = 12;
		$current_page = 1;
		$page_range = 5;
		$qry_string = "";
		$page_url = base_url('qa/');

		if($this->input->get_post('page')) {
			$current_page = $this->input->get_post('page');
		}



		$start_row = paging_start_row($current_page, $rows_per_page);

		$this->db->start_cache();
		$this->db->where('faq_Status', 1);
		$this->db->order_by('faq_Sort', 'ASC');
		$this->db->stop_cache();

		$query = $this->db->get('tb_faq');

		
		$Num_Rows = $query->num_rows();
		$total_pages = paging_total_pages($Num_Rows, $rows_per_page);

		$themePaging["next"]='>>';
		$themePaging["prev"]='<<';
		$themePaging["theme"]='<a href="{{link}}#view" title="{{str_page}}"><div class="page2 {{active}}">{{str_page}}</div></a>';

		$page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url,$themePaging);

		$this->db->limit($rows_per_page, $start_row);
		$query = $this->db->get('tb_faq');
		$this->db->flush_cache();

			//


		if($Num_Rows > 0 ) {
			$data["faq"] = $query->result_array();
		}



		if($Num_Rows > $rows_per_page){
			$data["page_str"] = $page_str;

		}
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		if (isset($data)) {
			return $data;
		}
		
	}
	
	
	
	
	public function get_detail($id = null) 
	{ 
		
		if($id){
			$id = $this->db->escape_str($id);	
		}else{
			$id = $this->db->escape_str($this->input->get('id'));
		}
		$query = $this->db->get_where('tb_faq', array('faq_ID' => $id));
		
		
		foreach ($query->result_array() as $row){
			

			$data["faq"] = array(
				'faq_ID' => $row["faq_ID"],
				'faq_Ask_TH' => $row["faq_Ask_TH"],
				'faq_Ask_EN' => $row["faq_Ask_EN"],
				'faq_Reply_TH' => $row["faq_Reply_TH"],
				'faq_Reply_EN' => $row["faq_Reply_EN"],
				'member_ID' => $row["member_ID"],
				'faq_Read' => $row["faq_Read"],
				'faq_UpDate' => $row["faq_UpDate"],

			);
			
			$this->db->where('faq_ID', $row["faq_ID"]);
			$this->db->where('ans_Status', 1);
			$this->db->order_by('ans_Date', 'ASC');
			$query = $this->db->get('tb_ans');
			
			foreach ($query->result_array() as $row){
				
				if($row["member_ID"] == 0){

					$name ="Admin";

				}else{

					$this->db->where('ID', $row["member_ID"]);
					$query2 = $this->db->get('tb_member');
					$row2 = $query2->row_array();

					$name =$row2["member_Name"];

				}

				$data["faq"]["comment"][] = array(
					'ans_ID' => $row["ans_ID"],
					'ans_Name' => $name,
					'ans_Date' => $row["ans_Date"],
					'ans_UpDate' => $row["ans_UpDate"],
					'ans_Detail' => $row["ans_Detail"],
					'ans_Status' => $row["ans_Status"],
					'faq_ID' => $row["faq_ID"],
					'member_ID' => $row["member_ID"],


				);

			}

			
			
			
		}
		
		
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		
		//echo $this->db->last_query();
		
		return $data;

	}//function
	
	
	public function get_user_comment() 
	{ 
		
		$user_id   = $this->db->escape_str($_SESSION["user_id"]);
		
		$rows_per_page = 10;
		$current_page = 1;
		$page_range = 5;
		$qry_string = "";
		$page_url = base_url('comment/');

		if($this->input->get_post('page')) {
			$current_page = $this->input->get_post('page');
		}



		$start_row = paging_start_row($current_page, $rows_per_page);

		$this->db->start_cache();
		$this->db->join('tb_ans', 'tb_ans.faq_ID = tb_faq.faq_ID', 'left');
		$this->db->where('faq_Status', 1);
		$this->db->where('member_ID', $user_id);
		$this->db->group_by('tb_faq.faq_ID');
		$this->db->order_by('faq_Sort', 'ASC');
		$this->db->stop_cache();

		$query = $this->db->get('tb_faq');

		
		$Num_Rows = $query->num_rows();
		$total_pages = paging_total_pages($Num_Rows, $rows_per_page);

		$themePaging["next"]='>>';
		$themePaging["prev"]='<<';
		$themePaging["theme"]='<a href="{{link}}" title="{{str_page}}"><div class="page2 {{active}}">{{str_page}}</div></a>';

		$page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url,$themePaging);

		$this->db->limit($rows_per_page, $start_row);
		$query = $this->db->get('tb_faq');
		$this->db->flush_cache();

			//


		if($Num_Rows > 0 ) {
			$data["faq"] = $query->result_array();
		}



		if($Num_Rows > $rows_per_page){
			$data["page_str"] = $page_str;

		}
		

		return $data;
	}
	
	
	public function get_detail_comment($id = null) 
	{ 
		
		$user_id   = $this->db->escape_str($_SESSION["user_id"]);
		
		$id = $this->db->escape_str($id);	
		
		$query = $this->db->get_where('tb_faq', array('faq_ID' => $id));
		
		
		foreach ($query->result_array() as $row){
			

			$data["faq"] = array(
				'faq_ID' => $row["faq_ID"],
				'faq_Ask_TH' => $row["faq_Ask_TH"],
				'faq_Ask_EN' => $row["faq_Ask_EN"],
				'faq_Reply_TH' => $row["faq_Reply_TH"],
				'faq_Reply_EN' => $row["faq_Reply_EN"],

			);
			
			$this->db->where('faq_ID', $row["faq_ID"]);
			//$this->db->where('ans_Status', 1);
			$this->db->where('member_ID', $user_id);
			$this->db->order_by('ans_Date', 'DESC');
			$query = $this->db->get('tb_ans');
			
			foreach ($query->result_array() as $row){
				
				

				$this->db->where('ID', $row["member_ID"]);
				$query2 = $this->db->get('tb_member');
				$row2 = $query2->row_array();

				$name =$row2["member_Name"];

				
				$data["faq"]["comment"][] = array(
					'ans_ID' => $row["ans_ID"],
					'ans_Name' => $name,
					'ans_Date' => $row["ans_Date"],
					'ans_UpDate' => $row["ans_UpDate"],
					'ans_Detail' => $row["ans_Detail"],
					'ans_Status' => $row["ans_Status"],
					'faq_ID' => $row["faq_ID"],
					'member_ID' => $row["member_ID"],


				);

			}

			
			
			
		}
		
		
		/*echo "<pre>";
		print_r($data);
		echo "</pre>";*/
		
		//echo $this->db->last_query();
		
		return $data;

	}//function
	
	public function get_comment($rows_per_page,$page_url) 
	{ 
		

		$id = $this->db->escape_str($this->input->get('id'));

		$query = $this->db->get_where('tb_faq', array('faq_ID' => $id));


		foreach ($query->result_array() as $row){


			$data["faq"] = array(
				'faq_ID' => $row["faq_ID"],
				'faq_Ask_TH' => $row["faq_Ask_TH"],
				'faq_Reply_TH' => $row["faq_Reply_TH"],


			);



		}
		
		
		$current_page = 1;
		$rows_per_page = $rows_per_page;
		$page_range = 5;
		$qry_string = "";

		if($this->input->get_post('page')) {
			$current_page = $this->input->get_post('page');
		}
		if($id != ""){


			$qry_string .= "type=comment&id=$id";

		}

		$start_row = paging_start_row($current_page, $rows_per_page);
		
		
		$this->db->start_cache();
		$this->db->where('faq_ID', $id);
		$this->db->order_by('ans_Date', 'DESC');
		$this->db->stop_cache();

		$query = $this->db->get('tb_ans');

		
		$Num_Rows = $query->num_rows();
		$total_pages = paging_total_pages($Num_Rows, $rows_per_page);
		$page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url);


		$this->db->limit($rows_per_page, $start_row);
		$query = $this->db->get('tb_ans');
		$this->db->flush_cache();

			//echo $this->db->last_query();


		if($Num_Rows > 0 ) {

			foreach ($query->result_array() as $row){

				if($row["member_ID"] == 0){

					$name ="Admin";

				}else{

					$this->db->where('ID', $row["member_ID"]);
					$query2 = $this->db->get('tb_member');
					$row2 = $query2->row_array();

					$name =$row2["member_Name"];

				}


				$data["faq"]["comment"][] = array(
					'ans_ID' => $row["ans_ID"],
					'ans_Name' => $name,
					'ans_Date' => $row["ans_Date"],
					'ans_UpDate' => $row["ans_UpDate"],
					'ans_Detail' => $row["ans_Detail"],
					'ans_Status' => $row["ans_Status"],
					'faq_ID' => $row["faq_ID"],


				);



			}


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
		
		


		
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		
		// echo $this->db->last_query();
		
		return $data;
		
	}//function
	
	
	public function insert() 
	{ 
		
		
		
		$query = $this->db->get('tb_faq');
		$Num_Rows = $query->num_rows();
		$Sort = $Num_Rows+1;

		$data = array(
			'faq_Ask_TH' => $_POST["faq_Ask_TH"],
			'faq_Ask_EN' => $_POST["faq_Ask_EN"],
			'faq_Reply_TH' => $_POST["faq_Reply_TH"],
			'faq_Reply_EN' => $_POST["faq_Reply_EN"],
			'faq_UpDate' => 'NOW()',
			'faq_Sort' => $Sort,

		);
		
		$this->db->insert('tb_faq', $data);
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
			'faq_Ask_TH' => $_POST["faq_Ask_TH"],
			'faq_Ask_EN' => $_POST["faq_Ask_EN"],
			'faq_Reply_TH' => $_POST["faq_Reply_TH"],
			'faq_Reply_EN' => $_POST["faq_Reply_EN"],


		);

		$this->db->where('faq_ID', $id);
		$this->db->set('faq_UpDate', 'NOW()', FALSE);
		$this->db->update('tb_faq', $data);
		
		
		
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
			
			$query = $this->db->get_where('tb_faq', array('faq_ID' => $id));
			$row = $query->row_array();
			
			$this->db->set('faq_Sort', 'faq_Sort-1', FALSE);
			$this->db->where("faq_Sort > '$row[faq_Sort]' ");
			$this->db->update('tb_faq');
			
			$tables = array('tb_faq','tb_ans');
			$this->db->where('faq_ID', $id);
			$this->db->delete($tables);
			$this->dbutil->optimize_table('tb_faq');
			$this->dbutil->optimize_table('tb_ans');

			
			
			
		}
		

		
		
	}//function
	
	
	public function delete_All() 
	{ 
		
		for($i=0;$i<count($_POST["id"]);$i++)
		{	
			if($this->input->post('id')[$i]!=""){

				$id = $this->db->escape_str($this->input->post('id')[$i]);

				$query = $this->db->get_where('tb_faq', array('faq_ID' =>$id));
				$row = $query->row_array();
				
				
				$this->db->set('faq_Sort', 'faq_Sort-1', FALSE);
				$this->db->where("faq_Sort > '$row[faq_Sort]' ");
				$this->db->update('tb_faq');

				
				$this->db->where('faq_ID', $id);
				$this->db->delete('tb_faq');
				
				$this->db->where('faq_ID', $id);
				$this->db->delete('tb_ans');
				
				


			}

		}
		
		
		$this->dbutil->optimize_table('tb_faq');
		$this->dbutil->optimize_table('tb_ans');

		
		
	}//function
	
	
	public function status() 
	{ 

		if($this->input->post('id')!=""){

			$id = $this->db->escape_str($this->input->post('id'));
			
			$query = $this->db->get_where('tb_faq', array('faq_ID' => $id));
			$row = $query->row_array();
			if($row["faq_Status"] == 1){
				$Status = 0;
			}else{
				$Status = 1;
			}
			
			
			$data = array(
				'faq_Status' => $Status,
			);
			$this->db->where('faq_ID', $id);
			$this->db->update('tb_faq', $data);

		}
		
		
		
	}//function
	
	
	
	
	public function Sort() 
	{ 
		
		$id = $this->db->escape_str($this->input->post('id'));

		$query = $this->db->get_where('tb_faq', array('faq_ID' => $id));
		$row = $query->row_array();

		$old_sort = $row["faq_Sort"];
		$new_sort = $_POST["value"];


		if($new_sort > $old_sort){ 

			$this->db->set('faq_Sort', 'faq_Sort-1', FALSE);
			$this->db->where("faq_Sort Between '$old_sort' and '$new_sort' AND faq_ID != '$id' ");
			$this->db->update('tb_faq');
			


			
		}else{

			$this->db->set('faq_Sort', 'faq_Sort+1', FALSE);
			$this->db->where("faq_Sort Between '$new_sort' and '$old_sort' AND faq_ID != '$id' ");
			$this->db->update('tb_faq');




		}

		$data = array(
			'faq_Sort' => $_POST["value"],
		);
		$this->db->where('faq_ID', $id);
		$this->db->update('tb_faq', $data);
		
		
	}//function
	
	
	
	
	
	public function add_ans() 
	{ 
		
		
		$data = array(
			'ans_Detail' => $_POST["ans_Detail"],
			'ans_Status' => 1,
			'faq_ID' => $_POST["faq_ID"],


		);
		
		$this->db->insert('tb_ans', $data);
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
	
	public function add_ans_home() 
	{ 
		
		
		$data = array(
			'ans_Detail' => $_POST["ans_Detail"],
			'faq_ID' => $_POST["faq_ID"],
			'ans_Name' => $_POST["ans_Name"],
			'member_ID' => $_POST["member_ID"],
			'ans_Status' => 1,
		);
		// print_r($data);
		// die();
		$this->db->insert('tb_ans', $data);
		$id = $this->db->insert_id();
		

		//exit();
		//echo $this->db->last_query();
		if($this->db->trans_status() === TRUE)
		{

			$p = 'Qa/detail_webboard/?id='.$this->input->post('faq_ID') ;
			$data = array(
				'page' => $p,
				'label' => constant('Profile-'.$_SESSION["lang"]),
				'labeltext' => constant('Success-'.$_SESSION["lang"]),
			);
			$this->load->view('cwcontrol/modal/front_success',$data);
		}else{
			
			$p = 'Qa/detail_webboard/?id='.$this->input->post('faq_ID') ;
			$data_page = array(
				'page' => $p,
				'label' => constant('Profile-'.$_SESSION["lang"]),
				'labeltext' => constant('Error-'.$_SESSION["lang"]),
			);

			$this->load->view('cwcontrol/modal/front_error',$data_page);
		}
		
	}//function
	
	public function update_ans($id = NULL,$value = NULL) 
	{ 
		
		
		$id = $this->db->escape_str($this->input->post('id'));

		
		$data = array(
			'ans_Detail' => $_POST["ans_Detail"],

		);

		$this->db->where('ans_ID', $id);
		$this->db->set('ans_UpDate', 'NOW()', FALSE);
		$this->db->update('tb_ans', $data);
		
		
		
		//echo $this->db->last_query();
		if($this->db->trans_status() === TRUE)
		{

			return TRUE;

		}else{
			
			return FALSE;


		}


	}//function
	
	
	
	
	public function delete_ans() 
	{ 
		

		if($this->input->post('id')!=""){

			$id = $this->db->escape_str($this->input->post('id'));
			
			
			$tables = array('tb_ans');
			$this->db->where('ans_ID', $id);
			$this->db->delete($tables);
			$this->dbutil->optimize_table('tb_ans');

			
			
			
		}
		

		
		
	}//function
	
	public function status_ans() 
	{ 

		if($this->input->post('id')!=""){

			$id = $this->db->escape_str($this->input->post('id'));
			
			$query = $this->db->get_where('tb_ans', array('ans_ID' => $id));
			$row = $query->row_array();
			if($row["ans_Status"] == 1){
				$Status = 0;
			}else{
				$Status = 1;
			}
			
			
			$data = array(
				'ans_Status' => $Status,
			);
			$this->db->where('ans_ID', $id);
			$this->db->update('tb_ans', $data);

		}
		
		
		
	}//function
	
	

}
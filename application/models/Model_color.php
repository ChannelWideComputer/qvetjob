<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_color extends CI_Model {
	
	private $type = 'color';
	
	public function __construct()
	{
		parent::__construct();			
		$this->load->dbutil();
		$this->load->helper(array('classupload'));

	}
	
	
	public function get_all($page_url) 
	{ 
		
		$rows_per_page = 15;
		$current_page = 1;
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
		$this->db->like('color_Name_TH', $word)->or_like('color_Name_EN', $word);
		$this->db->group_end();
		$this->db->order_by('color_Sort', 'ASC');
		$this->db->stop_cache();

		$query = $this->db->get('tb_color');

		
		$Num_Rows = $query->num_rows();
		$total_pages = paging_total_pages($Num_Rows, $rows_per_page);
		$page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url);

		$this->db->limit($rows_per_page, $start_row);
		$query = $this->db->get('tb_color');
		$this->db->flush_cache();


		if($Num_Rows > 0 ) {
			$data["color"] = $query->result_array();
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

	
	
	public function get_home() 
	{ 
		
		

		$rows_per_page = 9;
		$current_page = 1;
		$page_range = 5;
		$qry_string = "";
		$page_url = base_url('color');

		if($this->input->get_post('page')) {
			$current_page = $this->input->get_post('page');
		}



		$start_row = paging_start_row($current_page, $rows_per_page);

		$this->db->start_cache();
		$this->db->where('color_Status', 1);
		$this->db->order_by('color_Sort', 'ASC');
		$this->db->stop_cache();

		$query = $this->db->get('tb_color');

		
		$Num_Rows = $query->num_rows();
		$total_pages = paging_total_pages($Num_Rows, $rows_per_page);

		$themePaging["next"]='>>';
		$themePaging["prev"]='<<';
		$themePaging["theme"]='<a href="{{link}}#view" title="{{str_page}}"><div class="page2 {{active}}">{{str_page}}</div></a>';

		$page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url,$themePaging);

		$this->db->limit($rows_per_page, $start_row);
		$query = $this->db->get('tb_color');
		$this->db->flush_cache();

			//echo $this->db->last_query();


		if($Num_Rows > 0 ) {
			$data["color"] = $query->result_array();
		}



		if($Num_Rows > $rows_per_page){
			$data["page_str"] = $page_str;

		}

		
		if (isset($data)) {
			return $data ;
		}
		
	}

	
	
	public function get_detail($id = null) 
	{ 
		
		if($id){
			$id = $this->db->escape_str($id);	
		}else{
			$id = $this->db->escape_str($this->input->get('id'));
		}
		$query = $this->db->get_where('tb_color', array('color_ID' => $id));
		
		foreach ($query->result_array() as $row){
			

			$data["color"] = array(
				'color_ID' => $row["color_ID"],
				'color_Name_TH' => $row["color_Name_TH"],
				'color_Name_EN' => $row["color_Name_EN"],
				
			);
			
			
		}

		
		//echo $this->db->last_query();
		
		return $data;

	}//function
	
	
	
	public function insert() 
	{ 
		
		$query = $this->db->get('tb_color');
		$Num_Rows = $query->num_rows();
		$Sort = $Num_Rows+1;

		$data = array(
			'color_Name_TH' => $_POST["color_Name_TH"],
			'color_Name_EN' => $_POST["color_Name_EN"],
			'color_status' => 1,
			'color_Sort' => $Sort,

		);

		$this->db->insert('tb_color', $data);
		$id = $this->db->insert_id();
		


		// if ($_FILES["color_Images"]["name"] != "") {


		// 	$rename = "PHOTO_color_" . date("d-m-Y_Hms");


		// 	$handle = new upload($_FILES["color_Images"]);


		// 	if ($handle->uploaded) {
		// 		$handle->file_new_name_body = $rename;
		// 		$handle->image_resize = true;
		// 			//$handle->image_ratio_crop = "T";
		// 		$handle->image_x = '326';
		// 		$handle->image_y = '218';
		// 			//$handle->image_ratio_y        = true;
		// 			//$handle->jpeg_quality = '100';
		// 			//$handle->image_watermark = '../../class.upload/bg.png';

		// 		$handle->process('assets/upload/product');
		// 	}

		// 	if ($handle->processed) {
		// 		$photo_name = $handle->file_dst_name;
		// 	}

		// 	$data = array(
		// 		'color_Images' => $photo_name,
		// 	);
		// 	$this->db->where('color_ID', $id);
		// 	$this->db->update('tb_color', $data);

		// }
		



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
			'color_Name_TH' => $_POST["color_Name_TH"],
			'color_Name_EN' => $_POST["color_Name_EN"],

		);

		$this->db->where('color_ID', $id);
		$this->db->update('tb_color', $data);
		
		

		// if ($_FILES["color_Images"]["name"] != "") {


		// 	$rename = "PHOTO_color_" . date("d-m-Y_Hms");


		// 	$handle = new upload($_FILES["color_Images"]);


		// 	if ($handle->uploaded) {
		// 		$handle->file_new_name_body = $rename;
		// 		$handle->image_resize = true;
		// 			//$handle->image_ratio_crop = "T";
		// 		$handle->image_x = '326';
		// 		$handle->image_y = '218';
		// 			//$handle->image_ratio_y        = true;
		// 			//$handle->jpeg_quality = '100';
		// 			//$handle->image_watermark = '../../class.upload/bg.png';

		// 		$handle->process('assets/upload');
		// 	}

		// 	if ($handle->processed) {
		// 		$photo_name = $handle->file_dst_name;

		// 		$data = array(
		// 			'color_Images' => $photo_name,
		// 		);
		// 		$this->db->where('color_ID', $id);
		// 		$this->db->update('tb_color', $data);

		// 		unlink("assets/upload/$_POST[news_Images]");
		// 	}

		// }
		
		
		
		
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
			
			
			

			
			$query = $this->db->get_where('tb_color', array('color_ID' => $id));
			$row = $query->row_array();
			unlink("assets/upload/$row[color_Images]");
			
			
			$this->db->set('color_Sort', 'color_Sort-1', FALSE);
			$this->db->where("color_Sort > '$row[color_Sort]' ");
			$this->db->where('type', $this->type);
			$this->db->update('tb_color');
			
			
			$tables = array('tb_color');
			$this->db->where('color_ID', $id);
			$this->db->delete($tables);
			$this->dbutil->optimize_table('tb_color');
			
			
			
			
			
		}
		

		
		
	}//function
	
	
	public function delete_All() 
	{ 
		
		for($i=0;$i<count($_POST["id"]);$i++)
		{	
			if($this->input->post('id')[$i]!=""){

				$id = $this->db->escape_str($this->input->post('id')[$i]);
				
				
				$query = $this->db->get_where('tb_color', array('color_ID' => $id));
				$row = $query->row_array();
				unlink("assets/upload/$row[color_Images]");


				$this->db->set('color_Sort', 'color_Sort-1', FALSE);
				$this->db->where("color_Sort > '$row[color_Sort]' ");
				$this->db->where('type', $this->type);
				$this->db->update('tb_color');


				
				$this->db->where('color_ID', $id);
				$this->db->delete('tb_color');
				
				
				


			}

		}
		
		
		$this->dbutil->optimize_table('tb_color');

		
		
	}//function
	
	
	public function status() 
	{ 

		if($this->input->post('id')!=""){

			$id = $this->db->escape_str($this->input->post('id'));
			
			$query = $this->db->get_where('tb_color', array('color_ID' => $id));
			$row = $query->row_array();
			if($row["color_Status"] == 1){
				$Status = 0;
			}else{
				$Status = 1;
			}
			
			
			$data = array(
				'color_Status' => $Status,
			);
			$this->db->where('color_ID', $id);
			$this->db->update('tb_color', $data);

		}
		
		
		
	}//function
	
	

	public function Sort() 
	{ 
		
		$id = $this->db->escape_str($this->input->post('id'));

		$query = $this->db->get_where('tb_color', array('color_ID' => $id));
		$row = $query->row_array();

		$old_sort = $row["color_Sort"];
		$new_sort = $_POST["value"];

		if($new_sort > $old_sort){ 

			$this->db->set('color_Sort', 'color_Sort-1', FALSE);
			$this->db->where("color_Sort Between '$old_sort' and '$new_sort'  AND color_ID != '$id' ");
			$this->db->update('tb_color');
			
		}else{

			$this->db->set('color_Sort', 'color_Sort+1', FALSE);
			$this->db->where("color_Sort Between '$new_sort' and '$old_sort'  AND color_ID != '$id' ");
			$this->db->update('tb_color');

		}

		$data = array(
			'color_Sort' => $_POST["value"],
		);
		$this->db->where('color_ID', $id);
		$this->db->update('tb_color', $data);
		
		
	}//function
	
	
	
	
	

}
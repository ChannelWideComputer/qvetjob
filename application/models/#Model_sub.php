<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_sub extends CI_Model {
	
	private $type = 'sub';
	
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
		$this->db->where('type', $this->type);
		$this->db->group_start();
		$this->db->like('category_Name_TH', $word)->or_like('category_Name_EN', $word);
		$this->db->group_end();
		$this->db->order_by('category_Sort', 'ASC');
		$this->db->stop_cache();

		$query = $this->db->get('tb_category');

		
		$Num_Rows = $query->num_rows();
		$total_pages = paging_total_pages($Num_Rows, $rows_per_page);
		$page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url);

		$this->db->limit($rows_per_page, $start_row);
		$query = $this->db->get('tb_category');
		$this->db->flush_cache();


		if($Num_Rows > 0 ) {
			$data["category"] = $query->result_array();
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

	public function get_all_sub($page_url) 
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
		$this->db->join('tb_category', 'tb_subcategory.subcat_cat_ID = tb_category.category_ID', 'rigth');
		$this->db->group_start();
		$this->db->like('tb_subcategory.subcat_Name_TH', $word)->or_like('tb_subcategory.subcat_Name_EN', $word);
		$this->db->group_end();
		$this->db->order_by('tb_subcategory.subcat_Sort', 'ASC');
		$this->db->stop_cache();

		$query = $this->db->get('tb_subcategory');
		// echo $this->db->last_query();
		
		$Num_Rows = $query->num_rows();
		$total_pages = paging_total_pages($Num_Rows, $rows_per_page);
		$page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url);

		$this->db->limit($rows_per_page, $start_row);
		$query = $this->db->get('tb_subcategory');
		$this->db->flush_cache();


		if($Num_Rows > 0 ) {
			$data["sub"] = $query->result_array();

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
		$page_url = base_url('category');

		if($this->input->get_post('page')) {
			$current_page = $this->input->get_post('page');
		}



		$start_row = paging_start_row($current_page, $rows_per_page);

		$this->db->start_cache();
		$this->db->where('category_Status', 1);
		$this->db->order_by('category_Sort', 'ASC');
		$this->db->stop_cache();

		$query = $this->db->get('tb_category');

		
		$Num_Rows = $query->num_rows();
		$total_pages = paging_total_pages($Num_Rows, $rows_per_page);

		$themePaging["next"]='>>';
		$themePaging["prev"]='<<';
		$themePaging["theme"]='<a href="{{link}}#view" title="{{str_page}}"><div class="page2 {{active}}">{{str_page}}</div></a>';

		$page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url,$themePaging);

		$this->db->limit($rows_per_page, $start_row);
		$query = $this->db->get('tb_category');
		$this->db->flush_cache();

			//echo $this->db->last_query();


		if($Num_Rows > 0 ) {
			$data["category"] = $query->result_array();
		}



		if($Num_Rows > $rows_per_page){
			$data["page_str"] = $page_str;

		}

		

		return $data;
	}

	public function get_home_sub() 
	{ 
		
		

		$rows_per_page = 9;
		$current_page = 1;
		$page_range = 5;
		$qry_string = "";
		$page_url = base_url('category');

		if($this->input->get_post('page')) {
			$current_page = $this->input->get_post('page');
		}



		$start_row = paging_start_row($current_page, $rows_per_page);

		$this->db->start_cache();
		$this->db->join('tb_category', 'tb_subcategory.subcat_cat_ID = tb_category.category_ID', 'rigth');
		$this->db->where('subcat_Status', 1);
		$this->db->order_by('subcat_Sort', 'ASC');
		$this->db->stop_cache();

		$query = $this->db->get('tb_subcategory');

		
		$Num_Rows = $query->num_rows();
		$total_pages = paging_total_pages($Num_Rows, $rows_per_page);

		$themePaging["next"]='>>';
		$themePaging["prev"]='<<';
		$themePaging["theme"]='<a href="{{link}}#view" title="{{str_page}}"><div class="page2 {{active}}">{{str_page}}</div></a>';

		$page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url,$themePaging);

		$this->db->limit($rows_per_page, $start_row);
		$query = $this->db->get('tb_subcategory');
		$this->db->flush_cache();

			//echo $this->db->last_query();
		


		if($Num_Rows > 0 ) {
			$data["sub"] = $query->result_array();
		}



		if($Num_Rows > $rows_per_page){
			$data["page_str"] = $page_str;

		}

		

		return $data;
	}
	
	public function get_detail($id = null) 
	{ 
		
		if($id){
			$id = $this->db->escape_str($id);	
		}else{
			$id = $this->db->escape_str($this->input->get('id'));
		}
		$query = $this->db->get_where('tb_category', array('category_ID' => $id));
		
		foreach ($query->result_array() as $row){
			

			$data["category"] = array(
				'category_ID' => $row["category_ID"],
				'category_Name_TH' => $row["category_Name_TH"],
				'category_Name_EN' => $row["category_Name_EN"],
				'category_Images' => $row["category_Images"],
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
		
		if ($_POST["type33"] == "sub") {
			$query = $this->db->where('subcat_cat_ID', $_POST["category_ID"])->get('tb_subcategory');
			$Num_Rows = $query->num_rows();
			$Sort = $Num_Rows+1;

			$data = array(
				
				'subcat_Name_TH' => $_POST["category_Name_TH"],
				'subcat_Name_EN' => $_POST["category_Name_EN"],
				'subcat_cat_ID'  => $_POST["category_ID"],
				'subcat_Sort' => $Sort,
				
			);

			$this->db->insert('tb_subcategory', $data);
			$id = $this->db->insert_id();



			if ($_FILES["category_Images"]["name"] != "") {


				$rename = "PHOTO_sub_" . date("d-m-Y_Hms");


				$handle = new upload($_FILES["category_Images"]);


				if ($handle->uploaded) {
					$handle->file_new_name_body = $rename;
					$handle->image_resize = true;
					//$handle->image_ratio_crop = "T";
					$handle->image_x = '326';
					$handle->image_y = '218';
					//$handle->image_ratio_y        = true;
					//$handle->jpeg_quality = '100';
					//$handle->image_watermark = '../../class.upload/bg.png';

					$handle->process('assets/upload/product/sub');
				}

				if ($handle->processed) {
					$photo_name = $handle->file_dst_name;
				}
				
				$data = array(
					'subcat_Image' => $photo_name,
				);
				$this->db->where('subcat_ID', $id);
				$this->db->update('tb_subcategory', $data);
				

			}
		}else{
			$query = $this->db->where('type', $this->type)->get('tb_category');
			$Num_Rows = $query->num_rows();
			$Sort = $Num_Rows+1;

			$data = array(
				'type' => $this->type,
				'category_Name_TH' => $_POST["category_Name_TH"],
				'category_Name_EN' => $_POST["category_Name_EN"],
				'category_Sort' => $Sort,
				
			);

			$this->db->insert('tb_category', $data);
			$id = $this->db->insert_id();



			if ($_FILES["category_Images"]["name"] != "") {


				$rename = "PHOTO_category_" . date("d-m-Y_Hms");


				$handle = new upload($_FILES["category_Images"]);


				if ($handle->uploaded) {
					$handle->file_new_name_body = $rename;
					$handle->image_resize = true;
					//$handle->image_ratio_crop = "T";
					$handle->image_x = '326';
					$handle->image_y = '218';
					//$handle->image_ratio_y        = true;
					//$handle->jpeg_quality = '100';
					//$handle->image_watermark = '../../class.upload/bg.png';

					$handle->process('assets/upload/product');
				}

				if ($handle->processed) {
					$photo_name = $handle->file_dst_name;
				}
				
				$data = array(
					'category_Images' => $photo_name,
				);
				$this->db->where('category_ID', $id);
				$this->db->update('tb_category', $data);
				
			}
		}



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
			'category_Name_TH' => $_POST["category_Name_TH"],
			'category_Name_EN' => $_POST["category_Name_EN"],

		);

		$this->db->where('category_ID', $id);
		$this->db->set('category_Date', 'NOW()', FALSE);
		$this->db->update('tb_category', $data);
		
		

		if ($_FILES["category_Images"]["name"] != "") {


			$rename = "PHOTO_category_" . date("d-m-Y_Hms");


			$handle = new upload($_FILES["category_Images"]);


			if ($handle->uploaded) {
				$handle->file_new_name_body = $rename;
				$handle->image_resize = true;
					//$handle->image_ratio_crop = "T";
				$handle->image_x = '326';
				$handle->image_y = '218';
					//$handle->image_ratio_y        = true;
					//$handle->jpeg_quality = '100';
					//$handle->image_watermark = '../../class.upload/bg.png';

				$handle->process('assets/upload');
			}

			if ($handle->processed) {
				$photo_name = $handle->file_dst_name;
				
				$data = array(
					'category_Images' => $photo_name,
				);
				$this->db->where('category_ID', $id);
				$this->db->update('tb_category', $data);

				unlink("assets/upload/$_POST[news_Images]");
			}
			
		}
		
		
		
		
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
			
			
			

			
			$query = $this->db->get_where('tb_category', array('category_ID' => $id));
			$row = $query->row_array();
			unlink("assets/upload/$row[category_Images]");
			
			
			$this->db->set('category_Sort', 'category_Sort-1', FALSE);
			$this->db->where("category_Sort > '$row[category_Sort]' ");
			$this->db->where('type', $this->type);
			$this->db->update('tb_category');
			
			
			$tables = array('tb_category');
			$this->db->where('category_ID', $id);
			$this->db->delete($tables);
			$this->dbutil->optimize_table('tb_category');
			
			
			
			
			
		}
		

		
		
	}//function
	
	
	public function delete_All() 
	{ 
		
		for($i=0;$i<count($_POST["id"]);$i++)
		{	
			if($this->input->post('id')[$i]!=""){

				$id = $this->db->escape_str($this->input->post('id')[$i]);
				
				
				$query = $this->db->get_where('tb_category', array('category_ID' => $id));
				$row = $query->row_array();
				unlink("assets/upload/$row[category_Images]");


				$this->db->set('category_Sort', 'category_Sort-1', FALSE);
				$this->db->where("category_Sort > '$row[category_Sort]' ");
				$this->db->where('type', $this->type);
				$this->db->update('tb_category');


				
				$this->db->where('category_ID', $id);
				$this->db->delete('tb_category');
				
				
				


			}

		}
		
		
		$this->dbutil->optimize_table('tb_category');

		
		
	}//function
	
	
	public function status() 
	{ 

		if($this->input->post('id')!=""){

			$id = $this->db->escape_str($this->input->post('id'));
			
			$query = $this->db->get_where('tb_category', array('category_ID' => $id));
			$row = $query->row_array();
			if($row["category_Status"] == 1){
				$Status = 0;
			}else{
				$Status = 1;
			}
			
			
			$data = array(
				'category_Status' => $Status,
			);
			$this->db->where('category_ID', $id);
			$this->db->update('tb_category', $data);

		}
		
		
		
	}//function
	
	

	public function Sort() 
	{ 
		
		$id = $this->db->escape_str($this->input->post('id'));

		$query = $this->db->get_where('tb_category', array('category_ID' => $id));
		$row = $query->row_array();

		$old_sort = $row["category_Sort"];
		$new_sort = $_POST["value"];

		if($new_sort > $old_sort){ 

			$this->db->set('category_Sort', 'category_Sort-1', FALSE);
			$this->db->where("category_Sort Between '$old_sort' and '$new_sort' AND type = '$this->type' AND category_ID != '$id' ");
			$this->db->update('tb_category');
			
		}else{

			$this->db->set('category_Sort', 'category_Sort+1', FALSE);
			$this->db->where("category_Sort Between '$new_sort' and '$old_sort' AND type = '$this->type' AND category_ID != '$id' ");
			$this->db->update('tb_category');

		}

		$data = array(
			'category_Sort' => $_POST["value"],
		);
		$this->db->where('category_ID', $id);
		$this->db->update('tb_category', $data);
		
		
	}//function
	
	
	
	
	

}
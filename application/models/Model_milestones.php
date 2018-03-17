<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_milestones extends CI_Model {
	
	private $type = 'milestones';
	
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

		$query = $this->db->where('news_Type', $this->type)
		->group_start()
		->like('news_Name_TH', $word)->or_like('news_Name_EN', $word)
		->group_end()
		->get('tb_news');
		
		$Num_Rows = $query->num_rows();
		$total_pages = paging_total_pages($Num_Rows, $rows_per_page);
		$page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url);

		$query = $this->db->where('news_Type', $this->type)
		->group_start()
		->like('news_Name_TH', $word)->or_like('news_Name_EN', $word)
		->group_end()
		->order_by('news_Sort', 'ASC')->limit($rows_per_page, $start_row)->get('tb_news');


		if($Num_Rows > 0 ) {
			$data["news"] = $query->result_array();
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
	
	public function get_home($home = null) 
	{ 
		if($home){
			$this->db->where('news_Home', 1);
			$data = $this->db->where('news_Type', $this->type)->where('news_Status', 1)->get('tb_news')->result_array();
			
		}else{
			
			
			$rows_per_page = 12;
			$current_page = 1;
			$page_range = 5;
			$qry_string = "";
			$page_url = base_url('news');
			
			if($this->input->get_post('page')) {
				$current_page = $this->input->get_post('page');
			}
			
			
			
			$start_row = paging_start_row($current_page, $rows_per_page);
			
			$this->db->start_cache();		
			//$this->db->join('tb_file', 'tb_file.news_ID = tb_news.news_ID', 'left');	
			$this->db->where('news_Type', $this->type);
			$this->db->where('news_Status', 1);
			$this->db->order_by('news_Sort', 'ASC');
			$this->db->stop_cache();
			
			$query = $this->db->get('tb_news');
			//echo $this->db->last_query();
			
			$Num_Rows = $query->num_rows();
			$total_pages = paging_total_pages($Num_Rows, $rows_per_page);
			
			$themePaging["next"]='>>';
			$themePaging["prev"]='<<';
			$themePaging["theme"]='<a href="{{link}}#view" title="{{str_page}}"><div class="page2 {{active}}">{{str_page}}</div></a>';
			
			$page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url,$themePaging);
			
			$this->db->limit($rows_per_page, $start_row);
			$query = $this->db->get('tb_news');
			$this->db->flush_cache();
			
			//echo $this->db->last_query();
			

			if($Num_Rows > 0 ) {
				$data["news"] = $query->result_array();
			}



			if($Num_Rows > $rows_per_page){
				$data["page_str"] = $page_str;

			}
			
			
		}
		/*echo "<pre>";
		print_r($data);
		echo "</pre>";
		*/		
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
		$query = $this->db->get_where('tb_news', array('news_ID' => $id));
		
		
		
		foreach ($query->result_array() as $row){
			
			
			$data["news"] = array(
				'news_ID' => $row["news_ID"],
				'news_Name_TH' => $row["news_Name_TH"],
				'news_Name_EN' => $row["news_Name_EN"],
				'news_Detail_TH' => $row["news_Detail_TH"],
				'news_Detail_EN' => $row["news_Detail_EN"],
				'news_Des_TH' => $row["news_Des_TH"],
				'news_Des_EN' => $row["news_Des_EN"],
				'news_Date' => $row["news_Date"],
				'news_Images' => $row["news_Images"],
			);
			
			
			$query2 = $this->db->where('ID', $row["news_ID"])->where('Type', $row["news_Type"])->order_by('gallery_Sort', 'ASC')->get('tb_gallery');
			
			foreach ($query2->result_array() as $row2){
				
				$data["news"]["news_gallery"][] = array(
					'gallery_ID' => $row2["gallery_ID"],
					'gallery_Images' => $row2["gallery_Images"],
					// 'gallery_Sort' => $row2["gallery_Sort"],

				);

			}
			
			// $query2 = $this->db->where('news_ID', $row["news_ID"])->where('file_Title_TH !=', '')->get('tb_file');
			
			// foreach ($query2->result_array() as $row2){
			
			// 	$data["news"]["news_file_TH"][] = array(
			// 		'file_ID' => $row2["file_ID"],
			// 		'file_Title_TH' => $row2["file_Title_TH"],
			// 		'file_name_TH' => $row2["file_name_TH"],
			// 		'file_Type' => $row2["file_Type"],
			// 		'file_Size' => $row2["file_Size"],
			// 		'file_Date' => $row2["file_Date"],
			
			// 	);

			// }
			
			
		}
		
		
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		
		//echo $this->db->last_query();
		if (isset($data)) {
			return $data;
		}
		
		
	}//function
	
	
	
	public function insert() 
	{ 
		
		
		
		$query = $this->db->where('news_Type', $this->type)->get('tb_news');
		$Num_Rows = $query->num_rows();
		$Sort = $Num_Rows+1;

		$data = array(
			'news_Name_TH' => $_POST["news_Name_TH"],
			'news_Name_EN' => $_POST["news_Name_EN"],		
			// 'news_Des_TH' => str_replace("\n", "<br>\n", $_POST["news_Des_TH"]),
			// 'news_Des_EN' => str_replace("\n", "<br>\n", $_POST["news_Des_EN"]),
			'news_Detail_TH' => $_POST["news_Detail_TH"],
			'news_Detail_EN' => $_POST["news_Detail_EN"],
			'news_Sort' => $Sort,
			'news_Type' => $this->type,
			
		);
		
		$this->db->insert('tb_news', $data);
		$id = $this->db->insert_id();

		if ($_FILES["news_Images"]["name"] != "") {


			$rename = "PHOTO_news_" . date("d-m-Y_Hms");


			$handle = new upload($_FILES["news_Images"]);


			if ($handle->uploaded) {
				$handle->file_new_name_body = $rename;
				$handle->image_resize = true;
				$handle->image_ratio_crop = true;
				$handle->image_x = '360';
				$handle->image_y = '240';
				//$handle->image_ratio_y        = true;
				$handle->jpeg_quality = '100';
					//$handle->image_watermark = '../../class.upload/bg.png';

				$handle->process('assets/upload/news');
			}

			if ($handle->processed) {
				$photo_name = $handle->file_dst_name;
			}

			$data = array(
				'news_Images' => $photo_name,
			);
			$this->db->where('news_ID', $id);
			$this->db->update('tb_news', $data);

			
		}

		$files = array();
		foreach ($_FILES['news_gallery'] as $k => $l)
		{
			foreach ($l as $i => $v)
			{
				if (!array_key_exists($i, $files))
					$files[$i] = array();
				$files[$i][$k] = $v;
				$imagename = $_FILES['news_gallery']['name'];
			}
		}

		$filesnum = count($files)-2;
		foreach ($files as $file) {

			$filenamex = "gallery_news_".date("d-m-Y_Hms");


			$handle = new upload($file);



			if ($handle->uploaded) {					
				$handle->file_new_name_body = $filenamex;
				$handle->file_name_body_pre = 'full_';
				$handle->process('assets/upload/gallery');
			}

			if ($handle->uploaded) {
				$handle->file_new_name_body   = $filenamex;
				$handle->image_resize         = true;
				//$handle->image_ratio_crop     = "T";
				$handle->image_x = '358';
				$handle->image_y = '237';
				//$handle->image_ratio_y        = true;
				//$handle->jpeg_quality = '100';

				$handle->process('assets/upload/gallery');
				$image_name_thumb =  $handle->file_dst_name;

				if ($handle->processed) {

					$data = array(
						'gallery_Images' => $image_name_thumb,
						'gallery_Sort' => $_POST["sort"][$filesnum],
						'Type' => $this->type,
						'ID' => $id,
					);
					$this->db->insert('tb_gallery', $data);						

				}

			}
			$filesnum--;
		}
		
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
			'news_Name_TH' => $_POST["news_Name_TH"],
			'news_Name_EN' => $_POST["news_Name_EN"],				
			'news_Detail_TH' => $_POST["news_Detail_TH"],
			'news_Detail_EN' => $_POST["news_Detail_EN"],
			// 'news_Des_TH' => str_replace("\n", "<br>\n", $_POST["news_Des_TH"]),
			// 'news_Des_EN' => str_replace("\n", "<br>\n", $_POST["news_Des_EN"]),

		);

		$this->db->where('news_ID', $id);
		$this->db->set('news_Date', 'NOW()', FALSE);
		$this->db->update('tb_news', $data);
		
		if (!empty($_FILES["news_Images"]["name"])) {


			$rename = "PHOTO_news_" . date("d-m-Y_Hms");

			$handle = new upload($_FILES["news_Images"]);


			if ($handle->uploaded) {
				$handle->file_new_name_body = $rename;
				$handle->image_resize = true;
					//$handle->image_ratio_crop = "T";
				$handle->image_x = '360';
				$handle->image_y = '240';
				$handle->image_ratio_y        = true;
					//$handle->jpeg_quality = '100';
					//$handle->image_watermark = '../../class.upload/bg.png';

				$handle->process('assets/upload/news');
			}

			if ($handle->processed) {
				$photo_name = $handle->file_dst_name;
				
				$data = array(
					'news_Images' => $photo_name,
				);
				$this->db->where('news_ID', $id);
				$this->db->update('tb_news', $data);

				@unlink("assets/upload/news/$_POST[news_Images]");
			}
			
		}
		
		
		if(is_array(@$_POST["gallery_ID"])){
			foreach (@$_POST["gallery_ID"] as $keyConf => $valConf) {
				$data = array(
					'gallery_Sort' => $_POST["sort-".$valConf],
				);

				$this->db->where('gallery_ID', $valConf);
				$this->db->update('tb_gallery', $data);
			}
		}		
		
		$files = array();
		foreach (@$_FILES['news_gallery'] as $k => $l)
		{
			foreach ($l as $i => $v)
			{
				if (!array_key_exists($i, $files))
					$files[$i] = array();
				$files[$i][$k] = $v;
				$imagename = $_FILES['news_gallery']['name'];
			}
		}

		$filesnum = count($files)-2;
		foreach ($files as $file) {

			$filenamex = "gallery_news_".date("d-m-Y_Hms");


			$handle = new upload($file);



			if ($handle->uploaded) {					
				$handle->file_new_name_body = $filenamex;
				$handle->file_name_body_pre = 'full_';
				$handle->process('assets/upload/gallery');
			}

			if ($handle->uploaded) {
				$handle->file_new_name_body   = $filenamex;
				$handle->image_resize         = true;
				//$handle->image_ratio_crop     = "T";
				$handle->image_x = '358';
				$handle->image_y = '237';
				//$handle->image_ratio_y        = true;
				//$handle->jpeg_quality = '100';

				$handle->process('assets/upload/gallery');
				$image_name_thumb =  $handle->file_dst_name;

				if ($handle->processed) {

					$data = array(
						'gallery_Images' => $image_name_thumb,
						'gallery_Sort' => $_POST["sort"][$filesnum],
						'Type' => $this->type,
						'ID' => $id,
					);
					$this->db->insert('tb_gallery', $data);	

					@unlink("assets/upload/news/$_POST[gallery_Images]");
				}

			}
			$filesnum--;
		}
		
		if($this->db->trans_status() === TRUE)
		{
			
			return TRUE;

		}else{
			
			return FALSE;
			

		}
		
		
	}//function
	
	
	
	
	
	public function delete_gallery() 
	{ 
		
		
		if($this->input->post('id')!=""){
			
			$id = $this->db->escape_str($this->input->post('id'));
			$query = $this->db->get_where('tb_gallery', array('gallery_ID' => $id));
			$row = $query->row_array();
			$photos_Name = $row["gallery_Images"];

			@unlink("assets/upload/gallery/full_$photos_Name");
			@unlink("assets/upload/gallery/$photos_Name");
			
			
			$this->db->where('gallery_ID', $id);
			$this->db->delete('tb_gallery');
			$this->dbutil->optimize_table('tb_gallery');

		}
		
		
		
	}//function
	
	
	
	public function delete() 
	{ 
		
		
		if($this->input->post('id')!=""){
			
			$id = $this->db->escape_str($this->input->post('id'));
			
			$query = $this->db->get_where('tb_gallery', array('ID' => $id));
			foreach ($query->result_array() as $row)
			{

				@unlink("assets/upload/gallery/full_$row[gallery_Images]");
				@unlink("assets/upload/gallery/$row[gallery_Images]");
				
			}
			
			
			
			$query = $this->db->get_where('tb_news', array('news_ID' => $id));
			$row = $query->row_array();
			@unlink("assets/upload/$row[news_Images]");
			
			
			$this->db->set('news_Sort', 'news_Sort-1', FALSE);
			$this->db->where("news_Sort > '$row[news_Sort]' ");
			$this->db->where('news_Type', $this->type);
			$this->db->update('tb_news');
			
			
			$this->db->where('news_ID', $id);
			$this->db->delete('tb_news');

			$this->db->where('ID', $id);
			$this->db->delete('tb_gallery');

			$this->dbutil->optimize_table('tb_news');
			$this->dbutil->optimize_table('tb_gallery');
			
			
			
			
			
			
			
			
			
		}
		
		
		
		
	}//function
	
	
	public function delete_All() 
	{ 
		
		for($i=0;$i<count($_POST["id"]);$i++)
		{	
			if($this->input->post('id')[$i]!=""){

				$id = $this->db->escape_str($this->input->post('id')[$i]);
				
				$query = $this->db->get_where('tb_gallery', array('ID' => $id));
				foreach ($query->result_array() as $row)
				{

					@unlink("assets/upload/gallery/full_$row[gallery_Images]");
					@unlink("assets/upload/gallery/$row[gallery_Images]");

				}
				
				
				$query = $this->db->get_where('tb_news', array('news_ID' => $id));
				$row = $query->row_array();
				unlink("assets/upload/$row[news_Images]");
				
				
				$this->db->set('news_Sort', 'news_Sort-1', FALSE);
				$this->db->where("news_Sort > '$row[news_Sort]' ");
				$this->db->where('news_Type', $this->type);
				$this->db->update('tb_news');


				
				$this->db->where('news_ID', $id);
				$this->db->delete('tb_news');
				
				$this->db->where('ID', $id);
				$this->db->delete('tb_gallery');
				


			}
			
		}
		
		
		$this->dbutil->optimize_table('tb_news');
		$this->dbutil->optimize_table('tb_gallery');
		
		
	}//function
	
	
	public function status() 
	{ 
		
		if($this->input->post('id')!=""){

			$id = $this->db->escape_str($this->input->post('id'));
			
			$query = $this->db->get_where('tb_news', array('news_ID' => $id));
			$row = $query->row_array();
			if($row["news_Status"] == 1){
				$Status = 0;
			}else{
				$Status = 1;
			}
			
			
			$data = array(
				'news_Status' => $Status,
			);
			$this->db->where('news_ID', $id);
			$this->db->update('tb_news', $data);

		}
		
		
		
	}//function
	
	
	public function home() 
	{ 
		
		if($this->input->post('id')!=""){

			$id = $this->db->escape_str($this->input->post('id'));
			
			$query = $this->db->where('news_Type', $this->type)->where('news_Home', 1)->get('tb_news');
			$Num_Rows = $query->num_rows();
			
			if($Num_Rows < 4){
				
				$query = $this->db->get_where('tb_news', array('news_ID' => $id));
				$row = $query->row_array();
				if($row["news_Home"] == 1){
					$Home = 0;
				}else{
					$Home = 1;
				}

				$data = array(
					'news_Home' => $Home,
				);
				$this->db->where('news_ID', $id);
				$this->db->update('tb_news', $data);
				
				
				
			}else{

				$data = array(
					'news_Home' => '0',
				);
				$this->db->where('news_ID', $id);
				$this->db->update('tb_news', $data);


			}

			
		}
		
		
		
	}//function
	
	
	public function Sort() 
	{ 
		
		$id = $this->db->escape_str($this->input->post('id'));
		
		$query = $this->db->get_where('tb_news', array('news_ID' => $id));
		$row = $query->row_array();
		
		$old_sort = $row["news_Sort"];
		$new_sort = $_POST["value"];
		
		if($new_sort > $old_sort){ 
			
			$this->db->set('news_Sort', 'news_Sort-1', FALSE);
			$this->db->where("news_Sort Between '$old_sort' and '$new_sort' AND news_Type = '$this->type' AND news_ID != '$id' ");
			$this->db->update('tb_news');
			
		}else{
			
			$this->db->set('news_Sort', 'news_Sort+1', FALSE);
			$this->db->where("news_Sort Between '$new_sort' and '$old_sort' AND news_Type = '$this->type' AND news_ID != '$id' ");
			$this->db->update('tb_news');
			
		}
		
		$data = array(
			'news_Sort' => $_POST["value"],
		);
		$this->db->where('news_ID', $id);
		$this->db->update('tb_news', $data);
		
		
	}//function
	
	
	
	
	

}
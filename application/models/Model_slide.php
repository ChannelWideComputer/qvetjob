<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_slide extends CI_Model {

	private $type = 'slide';

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

		$query = $this->db->group_start()
		->like('slide_Images_TH', $word)
		->group_end()
		->where('slide_Type','main')
		->get('tb_slide');
		
		$Num_Rows = $query->num_rows();
		$total_pages = paging_total_pages($Num_Rows, $rows_per_page);
		$page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url);

		$query = $this->db->group_start()
		->like('slide_Images_TH', $word)
		->group_end()
		->where('slide_Type','main')
		->order_by('slide_Sort', 'ASC')->limit($rows_per_page, $start_row)->get('tb_slide');


		if($Num_Rows > 0 ) {
			$data["slide"] = $query->result_array();
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

		$query = $this->db->where('slide_Status', 1)->where('slide_Type','main')->order_by('slide_Sort', 'ASC')->get('tb_slide')->result_array();
		$data = $query
		;/*echo "<pre>";
		print_r($data);
		echo "</pre>";*/
		return $data;

		
	}
	
	public function get_detail() 
	{ 
		
		$id = $this->db->escape_str($this->input->get('id'));
		$query = $this->db->get_where('tb_slide', array('slide_ID' => $id));
		$data["row_edit"] = $query->row_array();
		
		
		return $data;

	}//function
	
	
	public function insert() 
	{ 
		
		
		$this->load->helper(array('classupload'));

		

		$query = $this->db->get('tb_slide');

		$Num_Rows = $query->num_rows();
		$Sort = $Num_Rows+1;

		$data = array(
			'slide_Title_TH' => $_POST["slide_title_TH"],
			'slide_Title_EN' => $_POST["slide_title_EN"],
			'slide_Des_TH' => str_replace("\n", "<br>\n", $_POST["slide_Des_TH"]),
			'slide_Des_EN' => str_replace("\n", "<br>\n", $_POST["slide_Des_EN"]),
			'slide_Type'=> 'main',
			    //'slide_title_EN' => $_POST["title_EN"],
			// 'slide_Url' => $_POST['slide_Url'],
			'slide_sort' => $Sort,
		);
		
		$this->db->insert('tb_slide', $data);
		$id = $this->db->insert_id();

		
		
		if (!empty($_FILES["slide_Images"]["name"])) {


			$rename = "PHOTO_slide_" . date("d-m-Y_Hms");


			$handle = new upload($_FILES["slide_Images"]);


			if ($handle->uploaded) {
				$handle->file_new_name_body = $rename;
				$handle->image_resize = true;
				// $handle->image_ratio_crop = "T";
				$handle->image_x = '1170';
				$handle->image_y = '544';
				//$handle->image_ratio_y        = true;
				//$handle->jpeg_quality = '100';
				//$handle->image_watermark = '../../class.upload/bg.png';

				$handle->process('assets/upload/slide');
			}

			if ($handle->processed) {
				$photo_name = $handle->file_dst_name;

				$data = array(
					'slide_Images_TH' => $photo_name,
				);
				$this->db->where('slide_ID', $id);
				$this->db->update('tb_slide', $data);
			}
		}
		
		if (!empty($_FILES["slide_Images_min"]["name"])) {


			$rename = "PHOTO_slide_mobie_" . date("d-m-Y_Hms");


			$handle = new upload($_FILES["slide_Images_min"]);


			if ($handle->uploaded) {
				$handle->file_new_name_body = $rename;
				$handle->image_resize = true;
					//$handle->image_ratio_crop = "T";
				$handle->image_x = '474';
				$handle->image_y = '647';
					//$handle->image_ratio_y        = true;
					//$handle->jpeg_quality = '100';
					//$handle->image_watermark = '../../class.upload/bg.png';

				$handle->process('assets/upload/slide');
			}

			if ($handle->processed) {
				$photo_name = $handle->file_dst_name;
				$data = array(
					'slide_Images_min' => $photo_name,
				);
				$this->db->where('slide_ID', $id);
				$this->db->update('tb_slide', $data);
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
	
	public function update() 
	{ 
		$this->load->helper(array('classupload'));
		$id = $this->db->escape_str($this->input->post('id'));
		
		$data = array(
			'slide_Title_TH' => $_POST["slide_title_TH"],
			'slide_Title_EN' => $_POST["slide_title_EN"],
			'slide_Des_TH' => str_replace("\n", "<br>\n", $_POST["slide_Des_TH"]),
			'slide_Des_EN' => str_replace("\n", "<br>\n", $_POST["slide_Des_EN"]),
			'slide_Type'=> 'main',
		    //'slide_title_EN' => $_POST["title_EN"],
			// 'slide_Url' => $_POST['slide_Url'],
		);

		$this->db->where('slide_ID', $id);
		$this->db->set('slide_Date', 'NOW()', FALSE);
		$this->db->update('tb_slide', $data);
		
		
		if (!empty($_FILES["slide_Images"]["name"])) {


			$rename = "PHOTO_slide_" . date("d-m-Y_Hms");


			$handle = new upload($_FILES["slide_Images"]);


			if ($handle->uploaded) {
				$handle->file_new_name_body = $rename;
				$handle->image_resize = true;
				// $handle->image_ratio_crop = "T";
				$handle->image_x = '1170';
				$handle->image_y = '544';
				//$handle->image_ratio_y        = true;
				//$handle->jpeg_quality = '100';
				//$handle->image_watermark = '../../class.upload/bg.png';

				$handle->process('assets/upload/slide');
			}

			if ($handle->processed) {
				$photo_name = $handle->file_dst_name;

				$data = array(
					'slide_Images_TH' => $photo_name,
				);
				$this->db->where('slide_ID', $id);
				$this->db->update('tb_slide', $data);

				unlink("assets/upload/slide/$_POST[slide_Images]");
			}
		}

		if (!empty($_FILES["slide_Images_min"]["name"])) {


			$rename = "PHOTO_slide_mobie_" . date("d-m-Y_Hms");


			$handle = new upload($_FILES["slide_Images_min"]);


			if ($handle->uploaded) {
				$handle->file_new_name_body = $rename;
				$handle->image_resize = true;
				//$handle->image_ratio_crop = "T";
				$handle->image_x = '474';
				$handle->image_y = '647';
				//$handle->image_ratio_y        = true;
				//$handle->jpeg_quality = '100';
				//$handle->image_watermark = '../../class.upload/bg.png';

				$handle->process('assets/upload/slide');
			}

			if ($handle->processed) {
				$photo_name = $handle->file_dst_name;

				$data = array(
					'slide_Images_min' => $photo_name,
				);
				$this->db->where('slide_ID', $id);
				$this->db->update('tb_slide', $data);

				unlink("assets/upload/slide/$_POST[slide_Images_min]");
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
			

			$query = $this->db->get_where('tb_slide', array('slide_ID' => $id));
			$row = $query->row_array();
			unlink("assets/upload/slide/$row[slide_Images_TH]");
			unlink("assets/upload/slide/$row[slide_Images_min]");

			$this->db->set('slide_Sort', 'slide_Sort-1', FALSE);
			$this->db->where("slide_Sort > '$row[slide_Sort]' ");
			$this->db->update('tb_slide');

			$this->db->where('slide_ID', $id);
			$this->db->delete('tb_slide');

			
		}
		

		
		
	}//function
	
	
	public function delete_All() 
	{ 
		
		for($i=0;$i<count($_POST["id"]);$i++)
		{	
			if($this->input->post('id')[$i]!=""){

				$id = $this->db->escape_str($this->input->post('id')[$i]);
				
				$query = $this->db->get_where('tb_slide', array('slide_ID' =>$id));
				
				$row = $query->row_array();
				
				
				unlink("assets/upload/slide/$row[slide_Images_TH]");
				unlink("assets/upload/slide/$row[slide_Images_min]");
				
				$this->db->set('slide_Sort', 'slide_Sort-1', FALSE);
				$this->db->where("slide_Sort > '$row[slide_Sort]' ");
				$this->db->update('tb_slide');
				
				//$tables = array('tb_slide');
				$this->db->where('slide_ID', $id);
				$this->db->delete('tb_slide');
				


			}

		}
		
		
		$this->dbutil->optimize_table('tb_slide');

		
		
	}//function
	
	
	public function status() 
	{ 

		if($this->input->post('id')!=""){

			$id = $this->db->escape_str($this->input->post('id'));
			
			$query = $this->db->get_where('tb_slide', array('slide_ID' => $id));
			$row = $query->row_array();
			if($row["slide_Status"] == 1){
				$Status = 0;
			}else{
				$Status = 1;
			}
			
			
			$data = array(
				'slide_Status' => $Status,
			);
			$this->db->where('slide_ID', $id);
			$this->db->update('tb_slide', $data);

		}
		
		
		
	}//function
	
	
	public function Sort() 
	{ 
		
		$id = $this->db->escape_str($this->input->post('id'));

		$query = $this->db->get_where('tb_slide', array('slide_ID' => $id));
		$row = $query->row_array();

		$old_sort = $row["slide_Sort"];
		$new_sort = $_POST["value"];

		if($new_sort > $old_sort){ 

			$this->db->set('slide_Sort', 'slide_Sort-1', FALSE);
			$this->db->where("slide_Sort Between '$old_sort' and '$new_sort' AND slide_ID != '$id' ");
			$this->db->update('tb_slide');
			


			
		}else{

			$this->db->set('slide_Sort', 'slide_Sort+1', FALSE);
			$this->db->where("slide_Sort Between '$new_sort' and '$old_sort'AND slide_ID != '$id' ");
			$this->db->update('tb_slide');




		}

		$data = array(
			'slide_Sort' => $_POST["value"],
		);
		$this->db->where('slide_ID', $id);
		$this->db->update('tb_slide', $data);
		
		
	}//function
	
	
	
	
	

}
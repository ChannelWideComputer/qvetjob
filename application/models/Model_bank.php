<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_bank extends CI_Model {

	private $type = 'bank';

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
		$this->db->like('bank_accout', $word)->or_like('bank_name', $word);
		$this->db->group_end();
		$this->db->order_by('bank_type2', 'ASC');
		$this->db->order_by('bank_sort', 'ASC');
		$this->db->stop_cache();

		$query = $this->db->get('tb_bank');

		
		$Num_Rows = $query->num_rows();
		$total_pages = paging_total_pages($Num_Rows, $rows_per_page);
		$page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url);


		$this->db->limit($rows_per_page, $start_row);
		$query = $this->db->get('tb_bank');
		$this->db->flush_cache();

			//echo $this->db->last_query();


		if($Num_Rows > 0 ) {
			$data["bank"] = $query->result_array();
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

	public function get_payment()
	{
		if ($this->session->userdata('user_id')) {

			$id = $this->session->userdata('user_id');

			$this->db->where('sales_buyer_id',$id)->where('sales_payment',0)->where('sales_pay_status',0);

			$data = $this->db->get('tb_sales')->result_array();

			return $data;

		}else{
			redirect('login');
		}
	}

	public function get_order()
	{
		if ($this->session->userdata('user_id')) {

			$id = $this->session->userdata('user_id');

			$this->db->where('sales_buyer_id',$id)->where('sales_payment',1);

			$data = $this->db->get('tb_sales')->result_array();

			return $data;

		}else{
			redirect('login');
		}
	}
	
	public function get_home() 
	{ 
		

		$rows_per_page = 50;
		$current_page = 1;
		$page_range = 5;
		$qry_string = "";
		$page_url = base_url('how2pay');

		if($this->input->get_post('page')) {
			$current_page = $this->input->get_post('page');
		}



		$start_row = paging_start_row($current_page, $rows_per_page);

		$this->db->start_cache();
		$this->db->where('bank_status', 1);
		$this->db->order_by('bank_sort', 'ASC');
		$this->db->stop_cache();

		$query = $this->db->get('tb_bank');
		$query2 = $this->db->where('bank_type2','บัตรเครดิต')->get('tb_bank');
		$query4 = $this->db->where('bank_type2','paypal')->get('tb_bank');
		$query3 = $this->db->where('bank_type2','บัญชีธนาคาร')->get('tb_bank');

		
		$Num_Rows = $query->num_rows();
		$total_pages = paging_total_pages($Num_Rows, $rows_per_page);

		//$themePaging["next"]='>>';
		//$themePaging["prev"]='<<';
		//$themePaging["theme"]='<a href="{{link}}#view" title="{{str_page}}"><div class="page2 {{active}}">{{str_page}}</div></a>';

		$page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url);

		$this->db->limit($rows_per_page, $start_row);
		$query = $this->db->get('tb_bank');
		$this->db->flush_cache();

			//


		if($Num_Rows > 0 ) {
			$data["bank"] = $query->result_array();
			$data["bank1"] = $query3->result_array();
			$data["bank2"] = $query2->result_array();
			$data["paypal"] = $query4->result_array();
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
		

		return $data;
	}
	
	
	
	
	public function get_detail($id = null) 
	{ 
		
		if($id){
			$id = $this->db->escape_str($id);	
		}else{
			$id = $this->db->escape_str($this->input->get('id'));
		}
		$query = $this->db->get_where('tb_bank', array('bank_ID' => $id));
		
		
		foreach ($query->result_array() as $row){
			

			$data["bank"] = array(
				'bank_ID' => $row["bank_ID"],
				'bank_accout' => $row["bank_accout"],
				'bank_name' => $row["bank_name"],
				'bank_branch' => $row["bank_branch"],
				'bank_number' => $row["bank_number"],
				'bank_type' => $row["bank_type"],
				'bank_type2' => $row["bank_type2"],
				'bank_image' => $row["bank_image"],
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
		
		
		$this->db->where('bank_type2',$_POST["bank_type2"]);
		$query = $this->db->get('tb_bank');	
		$Num_Rows = $query->num_rows();
		$Sort = $Num_Rows+1;

		$data = array(
			'bank_accout' => $_POST["bank_accout"],
			'bank_name' => $_POST["bank_name"],
			'bank_branch' => $_POST["bank_branch"],
			'bank_number' => $_POST["bank_number"],
			'bank_type' => $_POST["bank_type"],
			'bank_type2' => $_POST["bank_type2"],
			'bank_sort' => $Sort,

		);
		
		$this->db->insert('tb_bank', $data);
		$id = $this->db->insert_id();

		if (!empty($_FILES["bank_image"]["name"])) {


			$rename = "PHOTO_bank_" . date("d-m-Y_Hms");


			$handle = new upload($_FILES["bank_image"]);


			if ($handle->uploaded) {
				$handle->file_new_name_body = $rename;
				$handle->image_resize = true;
					//$handle->image_ratio_crop = "T";
				$handle->image_x = '100';
				$handle->image_y = '100';
					//$handle->image_ratio_y        = true;
					//$handle->jpeg_quality = '100';
					//$handle->image_watermark = '../../class.upload/bg.png';

				$handle->process('assets/upload');
			}

			if ($handle->processed) {
				$photo_name = $handle->file_dst_name;
			}

			$data = array(
				'bank_image' => $photo_name,
			);
			$this->db->where('bank_ID', $id);
			$this->db->update('tb_bank', $data);

			
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
			'bank_accout' => $_POST["bank_accout"],
			'bank_name' => $_POST["bank_name"],
			'bank_branch' => $_POST["bank_branch"],
			'bank_number' => $_POST["bank_number"],
			'bank_type' => $_POST["bank_type"],
			'bank_type2' => $_POST["bank_type2"],
		);

		$this->db->where('bank_ID', $id);
		$this->db->set('bank_date', 'NOW()', FALSE);
		$this->db->update('tb_bank', $data);

		if (!empty($_FILES["bank_image"]["name"])) {


			$rename = "PHOTO_bank_" . date("d-m-Y_Hms");


			$handle = new upload($_FILES["bank_image"]);


			if ($handle->uploaded) {
				$handle->file_new_name_body = $rename;
				$handle->image_resize = true;
					//$handle->image_ratio_crop = "T";
				$handle->image_x = '100';
				$handle->image_y = '100';
				$handle->image_ratio_y        = true;
					//$handle->jpeg_quality = '100';
					//$handle->image_watermark = '../../class.upload/bg.png';

				$handle->process('assets/upload');
			}

			if ($handle->processed) {
				$photo_name = $handle->file_dst_name;
				
				$data = array(
					'bank_image' => $photo_name,
				);
				$this->db->where('bank_ID', $id);
				$this->db->update('tb_bank', $data);

				unlink("assets/upload/$_POST[bank_image]");
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
			
			$query = $this->db->get_where('tb_bank', array('bank_ID' => $id));
			$row = $query->row_array();
			unlink("assets/upload/$row[bank_image]");
			
			
			$this->db->set('bank_sort', 'bank_sort-1', FALSE);
			$this->db->where("bank_sort > '$row[bank_sort]' ");
			$this->db->update('tb_bank');
			
			
			/*$tables = array('tb_bank','tb_file','tb_bank_gallery');
			$this->db->where('bank_ID', $id);
			$this->db->delete($tables);*/

			$this->db->where('bank_ID', $id);
			$this->db->delete('tb_bank');

			$this->dbutil->optimize_table('tb_bank');

		}
		

		
		
	}//function
	public function delete_All() 
	{ 
		
		for($i=0;$i<count($_POST["id"]);$i++)
		{	
			if($this->input->post('id')[$i]!=""){

				$id = $this->db->escape_str($this->input->post('id')[$i]);

				$query = $this->db->get_where('tb_bank', array('bank_ID' =>$id));
				$row = $query->row_array();
				unlink("assets/upload/how2/$row[bank_image]");
				
				$this->db->set('bank_sort', 'bank_sort-1', FALSE);
				$this->db->where("bank_sort > '$row[bank_sort]' ");
				$this->db->update('tb_bank');

				
				$this->db->where('bank_ID', $id);
				$this->db->delete('tb_bank');

			}

		}
		
		
		$this->dbutil->optimize_table('tb_bank');

		
		
	}//function
	
	
	public function status() 
	{ 

		if($this->input->post('id')!=""){

			$id = $this->db->escape_str($this->input->post('id'));
			
			$query = $this->db->get_where('tb_bank', array('bank_ID' => $id));
			$row = $query->row_array();
			if($row["bank_status"] == 1){
				$Status = 0;
			}else{
				$Status = 1;
			}
			
			
			$data = array(
				'bank_status' => $Status,
			);
			$this->db->where('bank_ID', $id);
			$this->db->update('tb_bank', $data);

		}
		
		
		
	}//function

	public function Sort() 
	{ 
		
		$id = $this->db->escape_str($this->input->post('id'));

		$query = $this->db->get_where('tb_bank', array('bank_ID' => $id));
		$row = $query->row_array();

		$type = $row["bank_type2"];
		$old_sort = $row["bank_sort"];
		$new_sort = $_POST["value"];


		if($new_sort > $old_sort){ 

			$this->db->set('bank_sort', 'bank_sort-1', FALSE);
			$this->db->where("bank_sort Between '$old_sort' and '$new_sort' AND bank_type2 = '$type' AND bank_ID != '$id' ");
			$this->db->update('tb_bank');
			


			
		}else{

			$this->db->set('bank_sort', 'bank_sort+1', FALSE);
			$this->db->where("bank_sort Between '$new_sort' and '$old_sort' AND bank_type2 = '$type' AND bank_ID != '$id' ");
			$this->db->update('tb_bank');




		}

		$data = array(
			'bank_sort' => $_POST["value"],
		);
		$this->db->where('bank_ID', $id);
		$this->db->update('tb_bank', $data);
		
		
	}//function
	
}
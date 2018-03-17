<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_register extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('classupload'));
			// Your own constructor code
	}

	public function get_all($page_url,$id = null) 
	{ 
		
		$rows_per_page = 15;
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
		$this->db->join('tb_category','re_posi = category_ID');
		$this->db->group_start();
		$this->db->like('re_name', $word);
		$this->db->group_end();
		$this->db->stop_cache();
		
		$query = $this->db->get('tb_resume');
		

		$Num_Rows = $query->num_rows();
		$total_pages = paging_total_pages($Num_Rows, $rows_per_page);
		$page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url);


		$this->db->order_by('re_Date', 'DESC');
		$this->db->limit($rows_per_page, $start_row);
		$query = $this->db->get('tb_resume');
		$this->db->flush_cache();
		
			//echo $this->db->last_query();
		

		if($Num_Rows > 0 ) {
			$data["job"] = $query->result_array();
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

	public function get_detail($id = null) 
	{ 
		
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
			
			
		}
		
		return $data;

	}//function

	public function detail($id = null) 
	{ 
		
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
			
			
		}

		return $data;


	}//function

	public function get_detail_query($id)
	{
		$query = $this->db->get_where('tb_register', array('register_ID' => $id));
		return $query->result();
	}
	
	
	public function sent()
	{
		
		$this->load->library('email');
		
		if(isset($_POST['g-recaptcha-response'])){
			$captcha=$_POST['g-recaptcha-response'];
		}

		// $secret = '6LdKizQUAAAAANK_U7SYlLkG3HzNZu0fogvWpWAc';local
		$secret = '6LelrjMUAAAAAKkNLbYrzV4okYSVQ8JdqJ0gKCai';//ftp
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$response = file_get_contents($url."?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);

		$data = json_decode($response);

		$chk_captcha = $data->success;

		if($chk_captcha)
		{	               

			$data = array(
				'register_Fname' => $_POST["name"],
				'register_Email' => $_POST["email"],
				'register_Add' => $_POST["address"],
				'register_City' => $_POST["city"],
				'register_State' => $_POST["state"],
				'register_Country' => $_POST["country"],			
			);

			$this->db->insert('tb_register', $data);
			$id = $this->db->insert_id();

			if ($_FILES["file"]["name"] != "") {


				$rename = "file" . date("d-m-Y_Hms");


				$handle = new upload($_FILES["file"]);


				if ($handle->uploaded) {
					$handle->file_new_name_body = $rename;
					$handle->image_resize = true;
					//$handle->image_ratio_crop = "T";
					$handle->image_x = '384';
					$handle->image_y = '328';
					//$handle->image_ratio_y        = true;
					//$handle->jpeg_quality = '100';
					//$handle->image_watermark = '../../class.upload/bg.png';

					$handle->process('assets/upload/resume');
				}

				if ($handle->processed) {
					$photo_name = $handle->file_dst_name;
				}
				
				$data = array(
					'register_File' => $photo_name,
				);
				$this->db->where('register_ID', $id);
				$this->db->update('tb_register', $data);
				

			}

			if($this->db->trans_status() === TRUE)
			{

				return TRUE;

			}else{

				return FALSE;


			}
			

			
		}else{
			
			return "code";
			
		}
		
		
	}//function

		
	public function delete() 
	{ 
		

		if($this->input->post('id')!=""){

			$id = $this->db->escape_str($this->input->post('id'));
			
			/*$query = $this->db->get_where('tb_member', array('ID' => $id));
			$row = $query->row_array();
			unlink("assets/upload/$row[member_Images]");*/
			
			
			$tables = array('tb_resume');
			$this->db->where('re_ID', $id);
			$this->db->delete($tables);
			$this->dbutil->optimize_table('tb_resume');
			
			
			
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

				
				$this->db->where('re_ID', $id);
				$this->db->delete('tb_resume');
				


			}

		}
		
		
		$this->dbutil->optimize_table('tb_resume');

		
		
	}//function
	

}
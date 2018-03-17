<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_about extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function get_about($type) 
	{ 
				
		$query = $this->db->get_where('tb_about', array('about_Type' => $this->db->escape_str($type)));
		
		if($query->num_rows() > 0 ) {
			return $query->row_array();
		} else {
			return array();
		}
	}
	
	public function update() 
	{ 
		$this->load->helper(array('classupload'));
		$id = $this->db->escape_str($this->input->post('id'));

		$data = array(
			'about_Detail_TH' => $_POST["about_Detail_TH"],
			'about_Youtube' => @$_POST['about_Youtube'],
			//'about_Images' => $_POST["about_Images"],
			//'about_Detail2_TH' => $_POST["about_Detail2_TH"],
			//'about_Detail2_EN' => $_POST["about_Detail2_EN"],
			
		);
		
		$this->db->where('about_ID', $id);
		$this->db->set('about_Date', 'NOW()', FALSE);
		$this->db->update('tb_about', $data);
		
		if (!empty($_FILES["about_Images"]["name"])) {

        
				$rename = "PHOTO_about_" . date("d-m-Y_Hms");


				$handle = new upload($_FILES["about_Images"]);


				 if ($handle->uploaded) {
					$handle->file_new_name_body = $rename;
					$handle->image_resize = true;
					$handle->image_ratio_crop = "T";
					$handle->image_x = '560';
					$handle->image_y = '320';
					//$handle->image_ratio_y        = true;
					//$handle->jpeg_quality = '100';
					//$handle->image_watermark = '../../class.upload/bg.png';

					$handle->process('assets/upload/about');
				}

				if ($handle->processed){
				$photo_name = $handle->file_dst_name;
				$data = array(
					'about_Images' => $photo_name,
				);
				$this->db->where('about_ID', $id);
				$this->db->update('tb_about', $data);
				unlink("assets/upload/about/$_POST[about_Images]");
				//unlink("assets/upload/about/full_$_POST[about_Images]");
			
		}
		}
		
		if($this->db->trans_status() === TRUE)
		{
		
			return TRUE;

		}else{
			
			return FALSE;
		

		}

	}

	public function delete_img()
	{	

		if($_POST["id"]!=""){

			$id = $this->db->escape_str($this->input->post('id'));
			
			$query = $this->db->get_where('tb_about', array('about_ID' => $id));
			$row = $query->row_array();				
			
				$photos_Name = $row["about_Images"];
				$Name = "about_Images";
			
			unlink("assets/upload/about/$photos_Name");
			//unlink("assets/upload/about/full_$photos_Name");

			$data = array(
				$Name => "",
			);
			$this->db->where('about_ID', $_POST["id"]);
			$this->db->update('tb_about', $data);

		}
		
	}//function

}
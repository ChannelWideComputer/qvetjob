<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_about extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('classupload'));
	}
	
	public function get_about($type) 
	{ 
		
		$query = $this->db->get_where('tb_about', array('about_Type' => $this->db->escape_str($type)))->row_array();
		$query['gallery'] = $this->db->where('Type','about')->get('tb_gallery')->result_array();
		// $query['gallery'] = $this->db->where('Type','about')->get('tb_gallery');
		$a=1;
		if($a=1) {
			return $query;
			// return $query['gallery']->$this->db->where('Type','about')->get('tb_gallery')->result_array();
		} else {
			return array();
		}
	}
	
	public function update() 
	{ 
		
		$id = $this->db->escape_str($this->input->post('id'));

		$data = array(
			'about_Detail_TH' => $_POST["about_Detail_TH"],
			'about_Detail_EN' => $_POST["about_Detail_EN"],
			'about_Des_TH' => @$_POST["about_Des_TH"],
			'about_Des_EN' => @$_POST["about_Des_EN"],
			'about_Des2_TH' => @$_POST["about_Des2_TH"],
			'about_Des2_EN' => @$_POST["about_Des2_EN"],
			'about_Des3_TH' => @$_POST["about_Des3_TH"],
			'about_Des3_EN' => @$_POST["about_Des3_EN"],
			// 'about_Images' => $_POST["about_Images"],
			//'about_Images2' => $_POST["about_Images2"],
			
		);
		
		$this->db->where('about_ID', $id);
		$this->db->set('about_Date', 'NOW()', FALSE);
		$this->db->update('tb_about', $data);

		if (!empty($_FILES["about_Images"])) {
			if ($_FILES["about_Images"]["name"] != "") {


				$rename = "PHOTO_about_" . date("d-m-Y_Hms");


				$handle = new upload($_FILES["about_Images"]);


				if ($handle->uploaded) {
					$handle->file_new_name_body = $rename;
					$handle->image_resize = true;
					$handle->image_ratio_crop = true;
					$handle->image_x = '430';
					$handle->image_y = '287';
				//$handle->image_ratio_y        = true;
					$handle->jpeg_quality = '100';
					//$handle->image_watermark = '../../class.upload/bg.png';

					$handle->process('assets/upload/about');
				}

				if ($handle->processed) {
					$photo_name = $handle->file_dst_name;
				}

				$data = array(
					'about_Images' => $photo_name,
				);
				$this->db->where('about_ID', $id);
				$this->db->update('tb_about', $data);


			}
		}
		if (!empty($_FILES["about_Images2"])) {
			if ($_FILES["about_Images2"]["name"] != "") {


				$rename = "PHOTO_about_" . date("d-m-Y_Hms");


				$handle = new upload($_FILES["about_Images2"]);


				if ($handle->uploaded) {
					$handle->file_new_name_body = $rename;
					$handle->image_resize = true;
					$handle->image_ratio_crop = true;
					$handle->image_x = '280';
					$handle->image_y = '330';
				//$handle->image_ratio_y        = true;
					$handle->jpeg_quality = '100';
					//$handle->image_watermark = '../../class.upload/bg.png';

					$handle->process('assets/upload/about');
				}

				if ($handle->processed) {
					$photo_name = $handle->file_dst_name;
				}

				$data = array(
					'about_Images2' => $photo_name,
				);
				$this->db->where('about_ID', $id);
				$this->db->update('tb_about', $data);
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
		if (!empty($_FILES["gallery"])) {
			foreach (@$_FILES['gallery'] as $k => $l)
			{
				foreach ($l as $i => $v)
				{
					if (!array_key_exists($i, $files))
						$files[$i] = array();
					$files[$i][$k] = $v;
					$imagename = @$_FILES['gallery']['name'];
				}
			}

			$filesnum = count($files)-2;
			foreach ($files as $file) {

				$filenamex = "gallery_about_".date("d-m-Y_Hms");


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
					$handle->image_x = '190';
					$handle->image_y = '190';
				//$handle->image_ratio_y        = true;
				//$handle->jpeg_quality = '100';

					$handle->process('assets/upload/gallery');
					$image_name_thumb =  $handle->file_dst_name;

					if ($handle->processed) {

						$data = array(
							'gallery_Images' => $image_name_thumb,
							'gallery_Sort' => $_POST["sort"][$filesnum],
							'Type' => 'about',
							'ID' => $id,
						);
						$this->db->insert('tb_gallery', $data);						

					}

				}
				$filesnum--;
			}
		}

		if($this->db->trans_status() === TRUE)
		{

			return TRUE;

		}else{

			return FALSE;

		}

	}

	public function delete_gallery() 
	{ 
		
		
		if($this->input->post('id')!=""){

			$id = $this->db->escape_str($this->input->post('id'));
			$query = $this->db->get_where('tb_gallery', array('gallery_ID' => $id));
			$row = $query->row_array();
			$photos_Name = $row["gallery_Images"];

			unlink("assets/upload/gallery/full_$photos_Name");
			unlink("assets/upload/gallery/$photos_Name");


			$this->db->where('gallery_ID', $id);
			$this->db->delete('tb_gallery');
			$this->dbutil->optimize_table('tb_gallery');

		}
		
		
		
	}//function

}
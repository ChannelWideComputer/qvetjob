<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_product extends CI_Model {

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
		$this->db->join('tb_news', 'tb_news.news_ID = tb_product.category_ID', 'left');
		$this->db->group_start();
		$this->db->like('product_Name_TH', $word)->or_like('product_Name_TH', $word);
		$this->db->or_like('news_Name_TH', $word)->or_like('news_Name_EN', $word);
		$this->db->group_end();
		$this->db->order_by('tb_product.category_ID','ASC');
		$this->db->stop_cache();

		$query = $this->db->get('tb_product');

		
		$Num_Rows = $query->num_rows();
		$total_pages = paging_total_pages($Num_Rows, $rows_per_page);
		$page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url);
		
		
		//$this->db->order_by('category_Sort', 'ASC');
		$this->db->order_by('product_Sort', 'ASC');
		$this->db->limit($rows_per_page, $start_row);
		$query = $this->db->get('tb_product');
		$this->db->flush_cache();




		if($Num_Rows > 0 ) {
			$data["product"] = $query->result_array();
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
		if (isset($data)) {
			return $data;
		}
		
		
		
	}//function
	
	public function get_home($home = null) 
	{ 

		
		if($home == "home"){
			$this->db->where('product_Home', 1);
			$data = $this->db->where('product_Status', 1)->get('tb_product')->result_array();

		}else{

			$rows_per_page = 12;
			$current_page = 1;
			$page_range = 5;
			$qry_string = "";
			$page_url = base_url('product');

			if($this->input->get_post('page')) {
				$current_page = $this->input->get_post('page');
			}
			if(!empty($this->input->get_post('Keyword'))){

				$word = $this->input->get_post('Keyword');
				$qry_string .= "Keyword=$word";
				$data["word"] = $word;
			}else{	

				$word = "";
			}

			/*if(!empty($_GET['b'])){
				$b = $_GET['b'];
				$qry_string .= "b=$b";
				$data["b"] = $b;
			}else{	
				$b = "";
			}*/
			/*if(!empty($this->input->get_post('c'))){

				$c = $this->input->get_post('c');
				$qry_string .= "b=$b&c=$c";
				$data["c"] = $c;
			}else{	
				$c = "";
			}*/

			$start_row = paging_start_row($current_page, $rows_per_page);

			

			$this->db->start_cache();
			$this->db->join('tb_news', 'tb_news.news_ID = tb_product.category_ID', 'left');
			/*if (!empty($_GET['b'])) {
				$this->db->where('tb_product.brand_ID', $b);
			}*/

			if (!empty($word)) {
				$this->db->like('product_Name_TH', $word)->or_like('product_Name_EN', $word);
				$this->db->or_like('news_Name_TH', $word)->or_like('news_Name_EN', $word);
			}
			

			$this->db->where('product_Status', 1);
			/*
			if(!empty($c)){ 
				$this->db->where('tb_product.category_ID', $c);
			}*/
			// $this->db->order_by('tb_category.category_Sort','ASC');

			$this->db->order_by('product_Sort', 'ASC');

			$this->db->stop_cache();

			$query = $this->db->get('tb_product');
			// echo $this->db->last_query();
			$Num_Rows = $query->num_rows();
			$total_pages = paging_total_pages($Num_Rows, $rows_per_page);

			$themePaging["next"]='>>';
			$themePaging["prev"]='<<';
			$themePaging["theme"]='<a href="{{link}}" title="{{str_page}}"><div class="page2 {{active}}">{{str_page}}</div></a>';

			$page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url,$themePaging);

			$this->db->limit($rows_per_page, $start_row);
			
			$this->db->flush_cache();

			//


			if($Num_Rows > 0 ) {
				$data["product"] = $query->result_array();
				
			}



			if($Num_Rows > $rows_per_page){
				$data["page_str"] = $page_str;

			}

		}
		// echo "<pre>";
		// print_r($data['product']);
		// echo "</pre>";
		// echo $this->db->last_query();
		// echo "<pre>";
		//print_r($home);
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
		$query = $this->db->get_where('tb_product', array('product_ID' => $id));


		foreach ($query->result_array() as $row){


			$data["product"] = array(
				'product_ID' => $row["product_ID"],
				'product_Name_TH' => $row["product_Name_TH"],
				'product_Name_EN' => $row["product_Name_EN"],
				// 'product_Detail_TH' => $row["product_Detail_TH"],
				// 'product_Detail_EN' => $row["product_Detail_EN"],
				'product_Des_TH' => $row["product_Des_TH"],
				'product_Des_EN' => $row["product_Des_EN"],
				'product_Des2_TH' => $row["product_Des2_TH"],
				'product_Des2_EN' => $row["product_Des2_EN"],
				'product_Des3_TH' => $row["product_Des3_TH"],
				'product_Des3_EN' => $row["product_Des3_EN"],
				// 'product_Special_TH' => $row["product_Special_TH"],
				// 'product_Special_EN' => $row["product_Special_EN"],
				'product_Images' => $row["product_Images"],
				// 'product_Clip' => $row["product_Clip"],
				// 'product_Title' => $row["product_Title"],
			// 'brand_ID' => $row["brand_ID"],////ยี้ห้อ
			// 'category_ID' => $row["category_ID"],//ประเภทใช้งาน
			// 'category2_ID' => $row["category2_ID"],//การใช้งาน
			// 'product_Sale' => $row["product_Sale"],
			// 'product_Price' => $row["product_Price"],
			);
			//echo $this->db->last_query();die();

			$query2 = $this->db->where('product_ID', $row["product_ID"])->where('file_Title_TH !=', '')->order_by('file_ID','DESC')->get('tb_file');

			foreach ($query2->result_array() as $row2){

				$data["product_file_TH"][] = array(
					'file_ID' => $row2["file_ID"],
					'file_Title_TH' => $row2["file_Title_TH"],
					'file_name_TH' => $row2["file_name_TH"],
					'file_Type' => $row2["file_Type"],
					'file_Size' => $row2["file_Size"],
					'file_Date' => $row2["file_Date"],

				);

			}
			// echo $this->db->last_query();die();
			// $query4 = $this->db->where('product_ID', $row["product_ID"])->where('file_Title_EN !=', '')->order_by('file_ID','DESC')->get('tb_file');

			// foreach ($query4->result_array() as $row4){

			// 	$data["product_file_EN"][] = array(
			// 		'file_ID' => $row4["file_ID"],
			// 		'file_Title_EN' => $row4["file_Title_EN"],
			// 		'file_name_EN' => $row4["file_name_EN"],
			// 		'file_Type' => $row4["file_Type"],
			// 		'file_Size' => $row4["file_Size"],
			// 		'file_Date' => $row4["file_Date"],

			// 	);

			// }

			$query3 = $this->db->where('ID', $row["product_ID"])->where('Type', 'product')->order_by('gallery_Sort', 'ASC')->get('tb_gallery');
			//$query3 = $this->db->get_where('tb_product_gallery', array('product_ID' => $row["product_ID"]),$this->db->order_by('gallery_Sort', 'ASC'));

			foreach ($query3->result_array() as $row3){

				$data["product"]["product_gallery"][] = array(
					'gallery_ID' => $row3["gallery_ID"],
					'gallery_Images' => $row3["gallery_Images"],
					'gallery_Sort' => $row3["gallery_Sort"],

				);

			}
			// $query9 = $this->db->where('product_ID', $row["product_ID"])->where('gallery_Images',"")->order_by('gallery_Sort', 'ASC')->get('tb_product_gallery');
			// //$query3 = $this->db->get_where('tb_product_gallery', array('product_ID' => $row["product_ID"]),$this->db->order_by('gallery_Sort', 'ASC'));

			// foreach ($query9->result_array() as $row9){

			// 	$data["product"]["product_gallery2"][] = array(
			// 		'gallery_ID' => $row9["gallery_ID"],
			// 		'gallery_Images2' => $row9["gallery_Images2"],
			// 		'gallery_Sort' => $row9["gallery_Sort"],

			// 	);

			// }


			// $query5 = $this->db->get_where('tb_category', array('category_ID' => $row["category_ID"]));

			// foreach ($query5->result_array() as $row5){


			// 	$data["category"] = array(
			// 		'category_ID' => $row5["category_ID"],
			// 		'category_Name_TH' => $row5["category_Name_TH"],
			// 		'category_Name_EN' => $row5["category_Name_EN"],

			// 	);


			// }

			
			// $this->db->where('category_ID', $row["category_ID"]);
			$this->db->where('product_ID !=', $row["product_ID"]);
			$this->db->where('category_ID', $row["category_ID"]);
			$this->db->where('product_Status ', 1);
			$query6 = $this->db->get('tb_product');
			foreach ($query6->result_array() as $row6){
				
				$data["product"]["product_recom"][] = array(
					'product_ID' => $row6["product_ID"],
					'product_Name_TH' => $row6["product_Name_TH"],
					'product_Name_EN' => $row6["product_Name_EN"],
					// 'product_Detail_TH' => $row6["product_Detail_TH"],
					// 'product_Detail_EN' => $row6["product_Detail_EN"],
					// 'product_Special_TH' => $row6["product_Special_TH"],
					// 'product_Special_EN' => $row6["product_Special_EN"],
					// 'product_Clip' => $row6["product_Clip"],
					'product_Images' => $row6["product_Images"],
					// 'category_ID' => $row6["category_ID"],
					// 'product_Sale' => $row6["product_Sale"],
					// 'product_Price' => $row6["product_Price"],

				);

			}
			
			
			
			
			
		}
		
		
		/*echo "<pre>";
		print_r($data['product_file_EN']);
		echo "</pre>";*/
		
		if (isset($data)) {
			return $data;
		}
		
		

	}//function
	
	public function download($id = null)
	{
		
		$id   = $this->db->escape_str($id);
		
		
		$sql = "SELECT * FROM tb_file WHERE file_ID = '".$id."' ";
		$query = $this->db->query($sql);		
		$row = $query->row_array();
		
		
		$path="assets/upload/file/".$row["file_Name"]; 
		$name=$row["file_Title_".$this->session->lang].".".$row["file_Type"]; 
		$name=iconv("UTF-8","windows-874",$name);

		if (file_exists($path)) { // ตรวจสอบก่อนว่าไฟล์มีอยู่จริงหรือเปล่า
			
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='.urldecode($name)); 
			header('Content-Transfer-Encoding: binary');
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Pragma: public');
			header('Content-Length: ' . filesize($path)); 
			ob_clean();
			flush();
			readfile($path); 

		}    
		
		
	}//function
	
	
	public function insert() 
	{ 
		// echo "<pre>";
		// print_r($_POST);
		// echo "<pre>";
		
		$query = $this->db->/*where('category_ID',$_POST["category_ID"])->*/get('tb_product');
		$Num_Rows = $query->num_rows();
		
		$Sort = $Num_Rows+1;
		// echo $Sort;
		// echo $this->db->last_query();
		// die();
		$data = array(
			'product_Name_TH' => $_POST["product_Name_TH"],
			'product_Name_EN' => $_POST["product_Name_EN"],
			// 'product_Detail_TH' => $_POST["product_Detail_TH"],
			// 'product_Detail_EN' => $_POST["product_Detail_EN"],
			'product_Des_TH' => $_POST["product_Des_TH"],
			'product_Des_EN' => $_POST["product_Des_EN"],
			'product_Des2_TH' => $_POST["product_Des2_TH"],
			'product_Des2_EN' => $_POST["product_Des2_EN"],
			'product_Des3_TH' => $_POST["product_Des3_TH"],
			'product_Des3_EN' => $_POST["product_Des3_EN"],
			// 'product_Price' => $_POST["product_Price"],
			// 'product_Sale' => $_POST["product_Sale"],
			// 'product_Des3_EN' => $_POST["product_Des3_EN"],
			// 'product_Special_TH' => $_POST["product_Special_TH"],
			// 'product_Special_EN' => $_POST["product_Special_EN"],
			// 'product_Title' => $_POST["product_Title"],
			// 'product_Clip' => $_POST["product_Clip"],
			'product_Sort' => $Sort,
			// 'brand_ID' => $_POST["brand_ID"],////ยี้ห้อ
			// 'category_ID' => $_POST["category_ID"],//ประเภทใช้งาน
			// 'category2_ID' => $_POST["category2_ID"],//การใช้งาน
			

		);
		
		$this->db->insert('tb_product', $data);
		$id = $this->db->insert_id();

		
		
		if (@$_FILES["product_Images"]["name"] != "") {


			$rename = "PHOTO_product_" . date("d-m-Y_Hms");


			$handle = new upload(@$_FILES["product_Images"]);

			// if ($handle->uploaded) {					
			// 	$handle->file_new_name_body = $rename;
			// 	$handle->file_name_body_pre = 'M_';
			// 	$handle->image_resize = true;
			// 	$handle->image_x = '1140';
			// 	$handle->image_y = '570';
			// 	$handle->process('assets/upload/gallery');
			// }

			if ($handle->uploaded) {
				$handle->file_new_name_body = $rename;
				$handle->image_resize = true;
					//$handle->image_ratio_crop = "T";
				$handle->image_x = '360';
				$handle->image_y = '240';
					//$handle->image_ratio_y        = true;
					//$handle->jpeg_quality = '100';
					//$handle->image_watermark = '../../class.upload/bg.png';

				$handle->process('assets/upload/product');
			}

			if ($handle->processed) {
				$photo_name = $handle->file_dst_name;
			}

			$data = array(
				'product_Images' => $photo_name,
			);
			$this->db->where('product_ID', $id);
			$this->db->update('tb_product', $data);

			
		}

		
		$files = array();
		foreach (@$_FILES['product_gallery'] as $k => $l)
		{
			foreach ($l as $i => $v)
			{
				if (!array_key_exists($i, $files))
					$files[$i] = array();
				$files[$i][$k] = $v;
				$imagename = @$_FILES['product_gallery']['name'];
			}
		}

		$filesnum = count($files)-2;
		foreach ($files as $file) {

			$filenamex = "gallery_product_".date("d-m-Y_Hms");


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
				$handle->image_x              = '1259';
				$handle->image_y       		  = '840';
				//$handle->image_ratio_y        = true;
				//$handle->jpeg_quality = '100';

				$handle->process('assets/upload/gallery');
				$image_name_thumb =  $handle->file_dst_name;

				if ($handle->processed) {

					$data = array(
						'gallery_Images' => $image_name_thumb,
						'gallery_Sort' => $_POST["sort"][$filesnum],
						'Type' => 'product',
						'ID' => $id,
					);
					$this->db->insert('tb_gallery', $data);						

				}

			}
			$filesnum--;
		}

		// $file = array();
		// foreach ($_FILES['product_gallery2'] as $a => $b)
		// {
		// 	foreach ($b as $c => $d)
		// 	{
		// 		if (!array_key_exists($c, $file))
		// 			$file[$c] = array();
		// 		$file[$c][$a] = $d;
		// 		$imagename = $_FILES['product_gallery2']['name'];
		// 	}
		// }

		// $filesnum = count($file)-2;
		// echo $filesnum;
		// // print_r($file);
		// // die();
		// $x=0;
		// foreach ($file as $file) {
		// 	$x++;
		// 	$filenamex = "gallery_".date("d-m-Y_Hms");


		// 	$handle = new upload($file);



		// 	if ($handle->uploaded) {					
		// 		$handle->file_new_name_body = $filenamex;
		// 		$handle->file_name_body_pre = 'full_';
		// 		$handle->process('assets/upload/gallery');
		// 	}

		// 	if ($handle->uploaded) {
		// 		$handle->file_new_name_body   = $filenamex;
		// 		$handle->image_resize         = true;
		// 		$handle->image_ratio_crop     = "T";
		// 		$handle->image_x              = '60';
		// 		$handle->image_y       		  = '60';
		// 		//$handle->image_ratio_y        = true;
		// 		//$handle->jpeg_quality = '100';

		// 		$handle->process('assets/upload/gallery');
		// 		$image_name_thumb =  $handle->file_dst_name;

		// 		if ($handle->processed) {

		// 			$data = array(
		// 				'gallery_Images2' => $image_name_thumb,
		// 				'gallery_Sort' => $x,
		// 				'product_ID' => $id,
		// 			);
		// 			$this->db->insert('tb_product_gallery', $data);						

		// 		}

		// 	}
		// 	$filesnum--;
		// }
		


		
		
		/*
		$files2 = array();
		foreach (@$_FILES['product_file_TH'] as $k2 => $l2)
		{
			foreach ($l2 as $i2 => $v2)
			{
				if (!array_key_exists($i2, $files2))
					$files2[$i2] = array();
				$files2[$i2][$k2] = $v2;
				
			}
			
		}
		
		$key =count($files2)-2;
		
		foreach ($files2 as $file2) {
			

			$imagename = $file2["name"];
			$ext = explode('.',$imagename);

			$filenamex = "file_TH_".date("d-m-Y_Hms");

			
			$handle = new upload($file2);
			
			
			
			if ($handle->uploaded) {
				$handle->file_new_name_body   = $filenamex;	
				$handle->process('assets/upload/file');
				$image_name_thumb =  $handle->file_dst_name ; 


				if ($handle->processed) {
					
					$data = array(
						'file_Title_TH' => $_POST["file_Title_TH"][$key],
						'file_name_TH' => $image_name_thumb,
						'file_Type' => $ext[1],
						'file_Size' => $file2["size"],
						'product_ID' => $id,
					);
					$this->db->insert('tb_file', $data);			
					
					
				}

			}
			
			$key--;
		}
		
		/*
		$files3 = array();
		foreach ($_FILES['product_file_EN'] as $k3 => $l3)
		{
			foreach ($l3 as $i3 => $v3)
			{
				if (!array_key_exists($i3, $files3))
					$files3[$i3] = array();
				$files3[$i3][$k3] = $v3;

			}

		}
		
		$key3 =count($files3)-2;
		
		foreach ($files3 as $file3) {


			$imagename = $file3["name"];
			$ext = explode('.',$imagename);

			$filenamex = "file_EN_".date("d-m-Y_Hms");


			$handle = new upload($file3);



			if ($handle->uploaded) {
				$handle->file_new_name_body   = $filenamex;	
				$handle->process('assets/upload/file');
				$image_name_thumb =  $handle->file_dst_name ; 


				if ($handle->processed) {

					$data = array(
						'file_Title_EN' => $_POST["file_Title_EN"][$key3],
						'file_name_EN' => $image_name_thumb,
						'file_Type' => $ext[1],
						'file_Size' => $file3["size"],
						'product_ID' => $id,
					);
					$this->db->insert('tb_file', $data);			


				}

			}

			$key3--;
		}
*/
		//exit();
		echo $this->db->last_query();
		if($this->db->trans_status() === TRUE)
		{

			return TRUE;

		}else{
			
			return FALSE;


		}
		
	}//function
	
	public function update() 
	{ 
		/*echo "<pre>";
		print_r($_POST);
		echo "</pre>";
		die();*/
		$id = $this->db->escape_str($this->input->post('id'));
		$data = array(
			'product_Name_TH' => $_POST["product_Name_TH"],
			'product_Name_EN' => $_POST["product_Name_EN"],
			// 'product_Detail_TH' => $_POST["product_Detail_TH"],
			// 'product_Detail_EN' => $_POST["product_Detail_EN"],
			// 'product_Price' => $_POST["product_Price"],
			// 'product_Sale' => $_POST["product_Sale"],
			'product_Des_TH' => $_POST["product_Des_TH"],
			'product_Des_EN' => $_POST["product_Des_EN"],
			'product_Des2_TH' => $_POST["product_Des2_TH"],
			'product_Des2_EN' => $_POST["product_Des2_EN"],
			'product_Des3_TH' => $_POST["product_Des3_TH"],
			'product_Des3_EN' => $_POST["product_Des3_EN"],
			// 'product_Special_TH' => $_POST["product_Special_TH"],
			// 'product_Special_EN' => $_POST["product_Special_EN"],
			// 'product_Title' => $_POST["product_Title"],
			// 'product_Clip' => $_POST["product_Clip"],
			// 'brand_ID' => $_POST["brand_ID"],////ยี้ห้อ
			// 'category_ID' => $_POST["category_ID"],//ประเภทใช้งาน
			// 'category2_ID' => $_POST["category2_ID"],//การใช้งาน

		);

		$this->db->where('product_ID', $id);
		$this->db->set('product_Update', 'NOW()', FALSE);
		$this->db->update('tb_product', $data);
		

		if (!empty(@$_FILES["product_Images"]["name"])) {


			$rename = "PHOTO_product_" . date("d-m-Y_Hms");


			$handle = new upload(@$_FILES["product_Images"]);


			if ($handle->uploaded) {
				$handle->file_new_name_body = $rename;
				$handle->image_resize = true;
					//$handle->image_ratio_crop = "T";
				$handle->image_x = '360';
				$handle->image_y = '240';
				$handle->image_ratio_y        = true;
					//$handle->jpeg_quality = '100';
					//$handle->image_watermark = '../../class.upload/bg.png';

				$handle->process('assets/upload/product');
			}

			if ($handle->processed) {
				$photo_name = $handle->file_dst_name;
				
				$data = array(
					'product_Images' => $photo_name,
				);
				$this->db->where('product_ID', $id);
				$this->db->update('tb_product', $data);

				@unlink("assets/upload/product/$_POST[product_Images]");
			}
			
		}

		
		if(is_array(@$_POST["gallery_ID"])){
			foreach (@$_POST["gallery_ID"] as $keyConf => $valConf) {
				$data = array(
					'gallery_Sort' => $_POST["sort-".$valConf],
				);

				$this->db->where('gallery_ID', $valConf);
				$this->db->update('tb_product_gallery', $data);
			}
		}		
		
		$files = array();
		foreach (@$_FILES['product_gallery'] as $k => $l)
		{
			foreach ($l as $i => $v)
			{
				if (!array_key_exists($i, $files))
					$files[$i] = array();
				$files[$i][$k] = $v;
				$imagename = @$_FILES['product_gallery']['name'];
			}
		}

		$filesnum = count($files)-2;
		foreach ($files as $file) {

			$filenamex = "gallery_product_".date("d-m-Y_Hms");


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
				$handle->image_x = '1259';
				$handle->image_y = '840';
				//$handle->image_ratio_y        = true;
				//$handle->jpeg_quality = '100';

				$handle->process('assets/upload/gallery');
				$image_name_thumb =  $handle->file_dst_name;

				if ($handle->processed) {

					$data = array(
						'gallery_Images' => $image_name_thumb,
						'gallery_Sort' => $_POST["sort"][$filesnum],
						'Type' => 'product',
						'ID' => $id,
					);
					$this->db->insert('tb_gallery', $data);						

				}

			}
			$filesnum--;
		}
	
		$files2 = array();
		foreach ($_FILES['product_file_TH'] as $k2 => $l2)
		{
			foreach ($l2 as $i2 => $v2)
			{
				if (!array_key_exists($i2, $files2))
					$files2[$i2] = array();
				$files2[$i2][$k2] = $v2;
				
			}
			
		}
		/*
		$key =count($files2)-2;
		
		foreach ($files2 as $file2) {
			

			$imagename = $file2["name"];
			$ext = explode('.',$imagename);

			$filenamex = "file_TH_".date("d-m-Y_Hms");

			
			$handle = new upload($file2);
			
			
			
			if ($handle->uploaded) {
				$handle->file_new_name_body   = $filenamex;	
				$handle->process('assets/upload/file');
				$image_name_thumb =  $handle->file_dst_name ; 


				if ($handle->processed) {
					
					$data = array(
						'file_Title_TH' => $_POST["file_Title_TH"][$key],
						'file_name_TH' => $image_name_thumb,
						'file_Type' => $ext[1],
						'file_Size' => $file2["size"],
						'product_ID' => $id,
					);
					$this->db->insert('tb_file', $data);			
					
					
				}

			}
			
			$key--;
		}/*
		/////////////////////////////////////////////////////////
		$files3 = array();
		foreach ($_FILES['product_file_EN'] as $k3 => $l3)
		{
			foreach ($l3 as $i3 => $v3)
			{
				if (!array_key_exists($i2, $files3))
					$files3[$i3] = array();
				$files3[$i3][$k3] = $v3;

			}

		}
		
		$key =count($files3)-2;
		
		foreach ($files3 as $file3) {


			$imagename = $file3["name"];
			$ext = explode('.',$imagename);

			$filenamex = "file_EN_".date("d-m-Y_Hms");


			$handle = new upload($file3);



			if ($handle->uploaded) {
				$handle->file_new_name_body   = $filenamex;	
				$handle->process('assets/upload/file');
				$image_name_thumb =  $handle->file_dst_name ; 


				if ($handle->processed) {

					$data = array(
						'file_Title_EN' => $_POST["file_Title_EN"][$key],
						'file_name_EN' => $image_name_thumb,
						'file_Type' => $ext[1],
						'file_Size' => $file2["size"],
						'product_ID' => $id,
					);
					$this->db->insert('tb_file', $data);			


				}

			}

			$key--;
		}*/
		///////////////////////////////////////////////////////////
		
		//echo $this->db->last_query();
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

			unlink("assets/upload/gallery/full_$photos_Name");
			unlink("assets/upload/gallery/$photos_Name");


			$this->db->where('gallery_ID', $id);
			$this->db->delete('tb_gallery');
			$this->dbutil->optimize_table('tb_gallery');

		}
		
		
		
	}//function
	
	public function delete_file() 
	{ 
		
		if($this->input->post('id')!=""){

			$id = $this->db->escape_str($this->input->post('id'));

			$query = $this->db->get_where('tb_file', array('File_name_EN' => $id));
			$row = $query->row_array();
			if ($row["File_name_TH"] != "") {
				$Name = $row["File_name_TH"];
			}else{
				$Name = $row["File_name_EN"];
			}

			unlink("assets/upload/file/$Name");

			$this->db->where('file_ID', $id);
			$this->db->delete('tb_file');
			$this->dbutil->optimize_table('tb_file');

		}
		
		
		
	}//function
	
	
	public function delete() 
	{ 
		
		if($this->input->post('id')!=""){

			$id = $this->db->escape_str($this->input->post('id'));
			
			$query = $this->db->get_where('tb_product_gallery', array('product_ID' => $id));

			foreach ($query->result_array() as $row)
			{

				@unlink("assets/upload/gallery/full_$row[gallery_Images]");
				@unlink("assets/upload/gallery/$row[gallery_Images]");

			}
			
			$query = $this->db->get_where('tb_file', array('product_ID' => $id));
			foreach ($query->result_array() as $row)
			{

				unlink("assets/upload/file/$row[File_name_TH]");
				unlink("assets/upload/file/$row[File_name_EN]");


			}
			
			// $query = $this->db->get_where('tb_product', array('product_ID' => $id));
			// $row = $query->row_array();
			// unlink("assets/upload/$row[product_Images2]");
			
			$query = $this->db->get_where('tb_product', array('product_ID' => $id));
			$row = $query->row_array();
			unlink("assets/upload/$row[product_Images]");
			
			
			$this->db->set('product_Sort', 'product_Sort-1', FALSE);
			$this->db->where("product_Sort > '$row[product_Sort]' ");
			//$this->db->where('category_ID', $row[category_ID]);
			$this->db->update('tb_product');
			
			
			$tables = array('tb_product','tb_file','tb_product_gallery');
			$this->db->where('product_ID', $id);
			$this->db->delete($tables);
			$this->dbutil->optimize_table('tb_product');
			$this->dbutil->optimize_table('tb_product_detail');
			$this->dbutil->optimize_table('tb_product_gallery');
			
			

			


			
			
			
		}
		

		
		
	}//function
	
	
	public function delete_All() 
	{ 
		
		for($i=0;$i<count($_POST["id"]);$i++)
		{	
			if($this->input->post('id')[$i]!=""){

				$id = $this->db->escape_str($this->input->post('id')[$i]);
				
				$query = $this->db->get_where('tb_product_gallery', array('product_ID' => $id));
				foreach ($query->result_array() as $row)
				{

					@unlink("assets/upload/gallery/full_$row[gallery_Images]");
					@unlink("assets/upload/gallery/$row[gallery_Images]");

				}
				
				$query = $this->db->get_where('tb_file', array('product_ID' => $id));
				foreach ($query->result_array() as $row)
				{

					unlink("assets/upload/file/$row[File_name_TH]");
					unlink("assets/upload/file/$row[File_name_EN]");


				}

				$query = $this->db->get_where('tb_product', array('product_ID' =>$id));
				$row = $query->row_array();
				@unlink("assets/upload/$row[product_Images]");
				
				$this->db->set('product_Sort', 'product_Sort-1', FALSE);
				$this->db->where("product_Sort > '$row[product_Sort]' ");
				//$this->db->where('category_ID', $row[category_ID]);
				$this->db->update('tb_product');

				
				$this->db->where('product_ID', $id);
				$this->db->delete('tb_product');
				
				$this->db->where('product_ID', $id);
				$this->db->delete('tb_file');
				
				$this->db->where('product_ID', $id);
				$this->db->delete('tb_product_gallery');
				


			}

		}
		
		
		$this->dbutil->optimize_table('tb_product');
		$this->dbutil->optimize_table('tb_product_detail');
		$this->dbutil->optimize_table('tb_product_gallery');
		
		
	}//function
	
	
	public function status() 
	{ 

		if($this->input->post('id')!=""){

			$id = $this->db->escape_str($this->input->post('id'));
			
			$query = $this->db->get_where('tb_product', array('product_ID' => $id));
			$row = $query->row_array();
			if($row["product_Status"] == 1){
				$Status = 0;
			}else{
				$Status = 1;
			}
			
			
			$data = array(
				'product_Status' => $Status,
			);
			$this->db->where('product_ID', $id);
			$this->db->update('tb_product', $data);

		}
		
		
		
	}//function
	
	
	public function home() 
	{ 

		if($this->input->post('id')!=""){

			$id = $this->db->escape_str($this->input->post('id'));
			$query = $this->db->where('product_Home', 1)->get('tb_product');
			$Num_Rows = $query->num_rows();
			
			if($Num_Rows < 12){

				$query = $this->db->get_where('tb_product', array('product_ID' => $id));
				$row = $query->row_array();


				if($row["product_Home"] == 1){
					$Home = 0;
				}else{
					$Home = 1;
				}
			}

			$data = array(
				'product_Home' => $Home,
			);
			$this->db->where('product_ID', $id);
			$this->db->update('tb_product', $data);

			
			;}



	}//function
	
	
	public function Sort() 
	{ 
		
		$id = $this->db->escape_str($this->input->post('id'));

		$query = $this->db->get_where('tb_product', array('product_ID' => $id));
		$row = $query->row_array();

		$old_sort = $row["product_Sort"];
		$new_sort = $_POST["value"];
		$category_ID = $row["category_ID"];
		$brand_ID = $row["brand_ID"];

		if($new_sort > $old_sort){ 

			$this->db->set('product_Sort', 'product_Sort-1', FALSE);
			$this->db->where("product_Sort Between '$old_sort' and '$new_sort'  AND category_ID = '$category_ID' AND product_ID != '$id' ");
			$this->db->update('tb_product');
			


			
		}else{

			$this->db->set('product_Sort', 'product_Sort+1', FALSE);
			$this->db->where("product_Sort Between '$new_sort' and '$old_sort' AND category_ID = '$category_ID' AND product_ID != '$id' ");
			$this->db->update('tb_product');




		}

		$data = array(
			'product_Sort' => $_POST["value"],
		);
		$this->db->where('product_ID', $id);
		$this->db->update('tb_product', $data);
		
		
	}//function
	
	
	
	
	

}
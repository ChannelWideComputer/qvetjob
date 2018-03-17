<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_cart extends CI_Model {

	public function __construct()
	{
		parent::__construct();			

		$this->load->helper(array('classupload'));
		$this->load->library('cart');

	}


	public function addcart($id = null) 
	{ 
		
		if($id){
			$id = $this->db->escape_str($id);	
		}else{
			$id = $this->db->escape_str($this->input->get('id'));
		}

		

		$data = array(
			'cart_member_id' => $_SESSION['user_id'],
			'cart_product_id' => $id,
			'cart_quatity' => '1',
		);
		
		$this->db->insert('tb_cart', $data);
		$id = $this->db->insert_id();


		
		if($this->db->trans_status() === TRUE)
		{

			return TRUE;

		}else{
			
			return FALSE;


		}
		
	}//function

	/*

	public function addToCart($reference)
	{		


		$product = $this->db->where('product_ID',$_GET['id'])->get('tb_product')->row_array();
		$member = $this->db->where('ID',$_SESSION['user_id'])->get('tb_member')->row_array();
		$rate = $this->db->get('tb_currency')->row_array();

		
		if($product['product_Sale'] < $product['product_Price'] && $product['product_Sale'] != 0)
		{
			if ($_SESSION['lang'] == "EN") {
				$price = $product['product_Sale']*$rate['cur_price'];
			}
			else
			{
				$price = $product['product_Sale']; 
			}
		}else{
			if ($_SESSION['lang'] == "EN") {
				$price = $product['product_Price']*$rate['cur_price'];
			}
			else
			{
				$price = $product['product_Price'];
			}
		}// name


		

		$order = array 
		(
			'id'        => 'order_'.$reference,
			'qty'       => 1,
			'price'     => $product['product_Price'],
			'name'      => $product['product_Name_EN'],
			'options'   => array
			(
				'order_id'           	=>  '',
				'order_reference'		=>	$reference,
				'order_type'     		=>  'order',
				'order_member'			=>  $member['ID'],
				'order_proid'			=>  $product['product_ID'],
				'order_name'			=>  $product['product_Name_EN'],
				'order_code'			=>  $product['product_Code'],
				'order_images'			=>  $product['product_Images'],
				'order_sale'			=>  $product['product_Sale'],
				'order_rate'			=>  $rate['cur_price'],
				'order_price'           =>  $price
			)
		);

       // var_dump($order); die();

		$aa =  $this->cart->insert($order);




		if($aa){
			redirect('cart');
		}else{ 
			alert('Fail.');
		}

		
		
	}//End insert*/

	public function addToCart($id)
	{		

		// $id = $product['product_ID'].'.'.date('Ymd-His');
		// echo $id;
		$reference = date('Ymd-His');
		
		$product = $this->db->where('product_ID',$_POST['idpro'])->get('tb_product')->row_array();

		$member = $this->db->where('ID',$_SESSION['user_id'])->get('tb_member')->row_array();


		$price = $product['product_Sale'];

		$order = array 
		(
			'id'        => $id,
			'qty'       => $_POST['QTY'],
			'price'     => $price,
			'name'      => $product['product_Name_TH'],
			'options'   => array
			(
				'order_proid'			=>  $product['product_ID'],
				'order_id'           	=> 	'order_'.$reference,
				'order_reference'		=>	$reference,
				'order_images'			=>  $product['product_Images'],
				'order_fullprice'		=>  $product['product_Price'],
				'order_sale'			=>  $product['product_Sale'],
			)
		);   


		//$this->cart->insert($data);
		// echo "<pre>";  
		// print_r($order);   
		// echo "</pre>";    
		$this->cart->insert($order);
		// die();
		// $this->cart->destroy();
		redirect('cart');


		// $order = array(
		// 	'id'        => 'order_'.$reference,
		// 	'qty'       => $_GET['QTY'],
		// 	'price'     => $product['product_Sale'],
		// 	'name'      => $product['product_Name_TH'],
		// 	// 'options'   => array
		// 	// (
		// 	// 	'order_id'           	=>  'order_'.$reference,
		// 	// 	'order_reference'		=>	$reference,
		// 	// 	'order_type'     		=>  'order',
		// 	// 	'order_member'			=>  $member['ID'],
		// 	// 	'order_proid'			=>  $product['product_ID'],
		// 	// 	'order_name'			=>  $product['product_Name_TH'],
		// 	// 	'order_images'			=>  $product['product_Images'],
		// 	// 	'order_fullprice'		=>  $product['product_Price'],
		// 	// 	'order_sale'			=>  $product['product_Sale'],
		// 	// 	// 'color'   => array
		// 	// 	// (
		// 	// 	// 	'color_id'           	=>  '',
		// 	// 	// 	'order_reference'		=>	$reference,
		// 	// 	// 	'color_type'     		=>  $color['color_Name_TH'],
		// 	// 	// 	'color_name'			=>  $subcolor['subcolor_Name_TH'],
		// 	// 	// 	'color_Code'			=>  $subcolor['subcolor_Code'],
		// 	// 	// 	'color_images'			=>  $subcolor['subcolor_Images'],
		// 	// 	// )
		// 	// )
		// 	);

		$this->cart->insert($order);
		

		if($this->cart->insert($order)){
			redirect('cart');
		}else{ 
			alert('Fail.');
		}



	}//End insert

	function update_cart(){

		// echo "<pre>";
		// 	print_r($_POST);
		// 	echo "</pre>";
		// 	die();
			$i=0;
		foreach ($this->cart->contents() as $items)
		{	

			
			$order = array 
			(
				'rowid'     => $items['rowid'],
				'qty'       => $_POST['qty'][$i],
			);
			
			$this->cart->update($order);
			$i++ ;
		}

		

		redirect('cart');  

	}

	function update_chk(){

		//print_r($this->cart->contents());

		if (!empty($this->cart->contents())) {
			
			foreach ($this->cart->contents() as $cart) {

				if ($_SESSION['lang'] == 'EN') {
					$rowid = $cart['rowid'];
					$price = $cart['options']['order_sale'];

					$data = array(
						'rowid'   => $rowid,
						'price'     => $price
					);

					$this->cart->update($data);
				}
				else{
					$rowid = $cart['rowid'];
					$price = $cart['options']['order_sale'];

					$data = array(
						'rowid'   => $rowid,
						'price'     => $price
					);

					$this->cart->update($data);
				}

			}

		}

	}

	public function remove($rowid) {

		// echo $rowid;
		// die();
		if ($rowid==="all"){
			$this->cart->destroy();
		}else{
			$data = array(
				'rowid'   => $rowid,
				'qty'     => 0
			);
			$this->cart->update($data);
		}
		;
		redirect('cart');
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
		$this->db->join('tb_category', 'tb_product.category_ID=tb_category.category_ID');
		$this->db->like('product_Name_EN', $word);
		$this->db->order_by('tb_product.category_ID', 'ASC');
		$this->db->order_by('product_Sort', 'ASC');
		$this->db->group_end();
		$this->db->stop_cache();

		$query = $this->db->get('tb_product');

		//echo $this->db->last_query();

		
		$Num_Rows = $query->num_rows();
		$total_pages = paging_total_pages($Num_Rows, $rows_per_page);
		$page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url);
		
		
		$this->db->select('product_ID,product_Name_EN,category_Name_EN,product_Sort,product_Home,product_Best,product_Update,product_Status,tb_product.category_ID');
		$this->db->limit($rows_per_page, $start_row);
		$query = $this->db->get('tb_product');
		$this->db->flush_cache();

			//echo $this->db->last_query();


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

		
		/*echo "<pre>";
		print_r($data);
		echo "</pre>";
		
		echo $this->db->last_query();*/
		
		return $data;
		
	}//function
	
	public function get_home($home = null) 
	{ 

		if($home == "home"){
			$this->db->select('product_ID,product_Name_EN,product_Des_EN,product_Images,product_Price,product_Sale');
			$this->db->where('product_Home', 1);
			$data = $this->db->where('product_Status', 1)->get('tb_product')->result_array();
			
		}elseif ($home == "best") {
			$this->db->select('product_ID,product_Name_EN,product_Des_EN,product_Images,product_Price,product_Sale');
			$this->db->where('product_Best', 1);
			$data = $this->db->where('product_Status', 1)->get('tb_product')->result_array();
		}else{
			
			
			$rows_per_page = 20;
			$current_page = 1;
			$page_range = 5;
			$qry_string = "";
			$page_url = base_url('cart/'.$home);
			
			if($this->input->get_post('page')) {
				$current_page = $this->input->get_post('page');
			}
			
			$start_row = paging_start_row($current_page, $rows_per_page);
			
			$this->db->start_cache();
			$this->db->join('tb_member', 'cart_member_id = ID');
			$this->db->join('tb_product', 'cart_product_id = product_ID');
			$this->db->order_by('cart_date', 'DESC');
			$this->db->stop_cache();
			
			$query = $this->db->get('tb_cart');

			//echo $this->db->last_query();
			

			$Num_Rows = $query->num_rows();
			$total_pages = paging_total_pages($Num_Rows, $rows_per_page);
			
			//$themePaging["next"]='>>';
			//$themePaging["prev"]='<<';
			//$themePaging["theme"]='<a href="{{link}}" title="{{str_page}}"><div class="page2 {{active}}">{{str_page}}</div></a>';
			
			$page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url);
			
			$this->db->limit($rows_per_page, $start_row);
			$query = $this->db->select('cart_id,cart_member_id,cart_product_id,cart_quatity,cart_date,product_ID,product_Name_EN,product_Images,product_Price,product_Sale')->order_by('cart_date', 'DESC')->get('tb_cart');
			$this->db->flush_cache();

			//echo $this->db->last_query();
			
			//
			

			if($Num_Rows > 0 ) {
				$data["cart"] = $query->result_array();
				$data["numrow"] = $Num_Rows;
			}



			if($Num_Rows > $rows_per_page){
				$data["page_str"] = $page_str;

			}
			
			
		}

		//echo $this->db->last_query();
		//echo "<pre>";
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
				//'product_Name_TH' => $row["product_Name_TH"],
				'product_Name_EN' => $row["product_Name_EN"],
				//'product_Detail_TH' => $row["product_Detail_TH"],
				'product_Detail_EN' => $row["product_Detail_EN"],
				'product_Des_EN' => $row["product_Des_EN"],

				'product_Price' => $row["product_Price"],
				'product_Sale' => $row["product_Sale"],
				'product_Clip' => $row["product_Clip"],
				'product_Images' => $row["product_Images"],
				'category_ID' => $row["category_ID"],
			);
			
			
			$query2 = $this->db->where('file_product_ID', $row["product_ID"])->where('file_Title_TH !=', '')->get('tb_file');
			
			foreach ($query2->result_array() as $row2){
				
				$data["product"]["product_file_TH"][] = array(
					'file_ID' => $row2["file_ID"],
					'file_Title_TH' => $row2["file_Title_TH"],
					'file_Name' => $row2["file_Name"],
					'file_Type' => $row2["file_Type"],
					'file_Size' => $row2["file_Size"],
					'file_Date' => $row2["file_Date"],

				);

			}
			
			$query4 = $this->db->where('file_product_ID', $row["product_ID"])->where('file_Title_EN !=', '')->get('tb_file');
			
			foreach ($query4->result_array() as $row4){
				
				$data["product"]["product_file_EN"][] = array(
					'file_ID' => $row4["file_ID"],
					'file_Title_EN' => $row4["file_Title_EN"],
					'file_Name' => $row4["file_Name"],
					'file_Type' => $row4["file_Type"],
					'file_Size' => $row4["file_Size"],
					'file_Date' => $row4["file_Date"],

				);

			}
			
			$query3 = $this->db->where('product_ID', $row["product_ID"])->order_by('gallery_Sort', 'ASC')->get('tb_product_gallery');
			//$query3 = $this->db->get_where('tb_product_gallery', array('product_ID' => $row["product_ID"]),$this->db->order_by('gallery_Sort', 'ASC'));
			
			foreach ($query3->result_array() as $row3){
				
				$data["product"]["product_gallery"][] = array(
					'gallery_ID' => $row3["gallery_ID"],
					'gallery_Images' => $row3["gallery_Images"],
					'gallery_Sort' => $row3["gallery_Sort"],

				);

			}

			
			
		}
		
		
		/*echo "<pre>";
		print_r($data);
		echo "</pre>";*/
		
		//echo $this->db->last_query();
		
		return $data;

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
		
		
		
		$query = $this->db->where('category_ID', $_POST["category_ID"])->get('tb_product');
		$Num_Rows = $query->num_rows();
		$Sort = $Num_Rows+1;

		$data = array(
			//'product_Name_TH' => $_POST["product_Name_TH"],
			'product_Name_EN' => $_POST["product_Name_EN"],
			//'product_Detail_TH' => $_POST["product_Detail_TH"],
			'product_Detail_EN' => $_POST["product_Detail_EN"],
			//'product_Des_TH' => $_POST["product_Des_TH"],
			'product_Des_EN' => $_POST["product_Des_EN"],
			'product_Price' => $_POST["product_Price"],
			'product_Sale' => $_POST["product_Sale"],
			'product_Clip' => $_POST["product_Clip"],
			'product_Sort' => $Sort,
			'category_ID' => $_POST["category_ID"],

		);
		
		$this->db->insert('tb_product', $data);
		$id = $this->db->insert_id();

		
		
		if (!empty($_FILES["product_Images"]["name"])) {


			$rename = "PHOTO_product_" . date("d-m-Y_Hms");


			$handle = new upload($_FILES["product_Images"]);


			if ($handle->uploaded) {
				$handle->file_new_name_body = $rename;
				$handle->image_resize = true;
				$handle->image_ratio_crop = "T";
				$handle->image_x = '320';
				$handle->image_y = '320';
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
		foreach ($_FILES['product_gallery'] as $k => $l)
		{
			foreach ($l as $i => $v)
			{
				if (!array_key_exists($i, $files))
					$files[$i] = array();
				$files[$i][$k] = $v;
				$imagename = $_FILES['product_gallery']['name'];
			}
		}

		$filesnum = count($files)-2;
		foreach ($files as $file) {

			$filenamex = "gallery_product_".date("d-m-Y_Hms");


			$handle = new upload($file);



			if ($handle->uploaded) {					
				$handle->file_new_name_body = $filenamex;
				$handle->file_name_body_pre = 'full_';
				$handle->process('assets/upload/product/gallery');
			}

			if ($handle->uploaded) {
				$handle->file_new_name_body   = $filenamex;
				$handle->image_resize         = true;
				$handle->image_ratio_crop     = "T";
				$handle->image_x              = '320';
				$handle->image_y       		  = '320';
				//$handle->image_ratio_y        = true;
				//$handle->jpeg_quality = '100';

				$handle->process('assets/upload/product/gallery');
				$image_name_thumb =  $handle->file_dst_name;

				if ($handle->processed) {

					$data = array(
						'gallery_Images' => $image_name_thumb,
						'gallery_Sort' => $_POST["sort"][$filesnum],
						'product_ID' => $id,
					);
					$this->db->insert('tb_product_gallery', $data);						

				}

			}
			$filesnum--;
		}
		
		
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
				$handle->process('assets/upload/product/file');
				$image_name_thumb =  $handle->file_dst_name ; 


				if ($handle->processed) {
					
					$data = array(
						'file_Title_EN' => $_POST["file_Title_EN"][$key3],
						'file_Name' => $image_name_thumb,
						'file_Type' => $ext[1],
						'file_Size' => $file3["size"],
						'file_product_ID' => $id,
					);
					$this->db->insert('tb_file', $data);			
					
					
				}

			}
			
			$key3--;
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
			//'product_Name_TH' => $_POST["product_Name_TH"],
			'product_Name_EN' => $_POST["product_Name_EN"],
			//'product_Detail_TH' => $_POST["product_Detail_TH"],
			'product_Detail_EN' => $_POST["product_Detail_EN"],
			//'product_Des_TH' => $_POST["product_Des_TH"],
			'product_Des_EN' => $_POST["product_Des_EN"],
			'product_Price' => $_POST["product_Price"],
			'product_Sale' => $_POST["product_Sale"],
			'product_Clip' => $_POST["product_Clip"],

			'category_ID' => $_POST["category_ID"],

		);

		$this->db->where('product_ID', $id);
		$this->db->set('product_Update', 'NOW()', FALSE);
		$this->db->update('tb_product', $data);



		if(isset($_POST["update_file_ID_EN"])){
			
			
			foreach($_POST["update_file_ID_EN"] as $ee => $file_ID_EN){
				
				
				$data = array(
					'file_Title_EN' => $_POST["update_file_Title_EN"][$ee],
					


				);
				
				$this->db->where('file_ID', $file_ID_EN);
				$this->db->update('tb_file', $data);
				
			}
			
			
			
		}
		

		if (!empty($_FILES["product_Images"]["name"])) {


			$rename = "PHOTO_product_" . date("d-m-Y_Hms");


			$handle = new upload($_FILES["product_Images"]);


			if ($handle->uploaded) {
				$handle->file_new_name_body = $rename;
				$handle->image_resize = true;
				$handle->image_ratio_crop = "T";
				$handle->image_x = '320';
				$handle->image_y = '320';
				//$handle->image_ratio_y        = true;
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

				unlink("assets/upload/product/$_POST[product_Images]");
			}
			
		}
		
		if(isset($_POST["gallery_ID"]))
		{
			if(is_array($_POST["gallery_ID"])){
				foreach ($_POST["gallery_ID"] as $keyConf => $valConf) {
					$data = array(
						'gallery_Sort' => $_POST["sort-".$valConf],
					);

					$this->db->where('gallery_ID', $valConf);
					$this->db->update('tb_product_gallery', $data);
				}
			}	
		}	
		
		$files = array();
		foreach ($_FILES['product_gallery'] as $k => $l)
		{
			foreach ($l as $i => $v)
			{
				if (!array_key_exists($i, $files))
					$files[$i] = array();
				$files[$i][$k] = $v;
				$imagename = $_FILES['product_gallery']['name'];
			}
		}

		$filesnum = count($files)-2;
		foreach ($files as $file) {

			$filenamex = "gallery_product_".date("d-m-Y_Hms");


			$handle = new upload($file);



			if ($handle->uploaded) {					
				$handle->file_new_name_body = $filenamex;
				$handle->file_name_body_pre = 'full_';
				$handle->process('assets/upload/product/gallery');
			}

			if ($handle->uploaded) {
				$handle->file_new_name_body   = $filenamex;
				$handle->image_resize         = true;
				$handle->image_ratio_crop     = "T";
				$handle->image_x = '320';
				$handle->image_y = '320';
				//$handle->image_ratio_y        = true;
				//$handle->jpeg_quality = '100';

				$handle->process('assets/upload/product/gallery');
				$image_name_thumb =  $handle->file_dst_name;

				if ($handle->processed) {

					$data = array(
						'gallery_Images' => $image_name_thumb,
						'gallery_Sort' => $_POST["sort"][$filesnum],
						'product_ID' => $id,
					);
					$this->db->insert('tb_product_gallery', $data);						

				}

			}
			$filesnum--;
		}

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
				$handle->process('assets/upload/product/file');
				$image_name_thumb =  $handle->file_dst_name ; 


				if ($handle->processed) {
					
					$data = array(
						'file_Title_EN' => $_POST["file_Title_EN"][$key3],
						'file_Name' => $image_name_thumb,
						'file_Type' => $ext[1],
						'file_Size' => $file3["size"],
						'file_product_ID' => $id,
					);
					$this->db->insert('tb_file', $data);			
					
					
				}

			}
			
			$key3--;
		}
		
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
			$query = $this->db->get_where('tb_product_gallery', array('gallery_ID' => $id));
			$row = $query->row_array();
			$photos_Name = $row["gallery_Images"];

			unlink("assets/upload/gallery/full_$photos_Name");
			unlink("assets/upload/gallery/$photos_Name");


			$this->db->where('gallery_ID', $id);
			$this->db->delete('tb_product_gallery');
			$this->dbutil->optimize_table('tb_product_gallery');

		}
		
		
		
	}//function
	
	public function delete_file() 
	{ 
		
		
		if($this->input->post('id')!=""){

			$id = $this->db->escape_str($this->input->post('id'));

			$query = $this->db->get_where('tb_file', array('file_ID' => $id));
			$row = $query->row_array();
			$Name = $row["file_Name"];

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

				unlink("assets/upload/product/gallery/full_$row[gallery_Images]");
				unlink("assets/upload/product/gallery/$row[gallery_Images]");

			}
			
			$query = $this->db->get_where('tb_file', array('file_product_ID' => $id));
			foreach ($query->result_array() as $row)
			{

				unlink("assets/upload/product/file/$row[file_Name]");


			}
			
			
			$query = $this->db->get_where('tb_product', array('product_ID' => $id));
			$row = $query->row_array();
			unlink("assets/upload/product/$row[product_Images]");
			
			
			$this->db->set('product_Sort', 'product_Sort-1', FALSE);
			$this->db->where("product_Sort > '$row[product_Sort]' ");
			$this->db->where('category_ID', $row[category_ID]);
			$this->db->update('tb_product');
			
			
			$this->db->where('product_ID', $id);
			$this->db->delete('tb_product');

			$this->db->where('file_product_ID', $id);
			$this->db->delete('tb_file');

			$this->db->where('product_ID', $id);
			$this->db->delete('tb_product_gallery');
			// $this->dbutil->optimize_table('tb_product');
			// $this->dbutil->optimize_table('tb_product_detail');
			// $this->dbutil->optimize_table('tb_product_gallery');
			
			

			


			
			
			
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

					unlink("assets/upload/product/gallery/full_$row[gallery_Images]");
					unlink("assets/upload/product/gallery/$row[gallery_Images]");

				}
				
				$query = $this->db->get_where('tb_file', array('file_product_ID' => $id));
				foreach ($query->result_array() as $row)
				{

					unlink("assets/upload/product/file/$row[file_Name]");


				}

				$query = $this->db->get_where('tb_product', array('product_ID' =>$id));
				$row = $query->row_array();
				unlink("assets/upload/product/$row[product_Images]");
				
				$this->db->set('product_Sort', 'product_Sort-1', FALSE);
				$this->db->where("product_Sort > '$row[product_Sort]' ");
				$this->db->where('category_ID', $row[category_ID]);
				$this->db->update('tb_product');

				
				$this->db->where('product_ID', $id);
				$this->db->delete('tb_product');
				
				$this->db->where('file_product_ID', $id);
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
			
			$query = $this->db->get_where('tb_product', array('product_ID' => $id));
			$row = $query->row_array();
			if($row["product_Home"] == 1){
				$Home = 0;
			}else{
				$Home = 1;
			}

			$data = array(
				'product_Home' => $Home,
			);
			$this->db->where('product_ID', $id);
			$this->db->update('tb_product', $data);


		}
		
		
		
	}//function

	public function best() 
	{ 

		if($this->input->post('id')!=""){

			$id = $this->db->escape_str($this->input->post('id'));
			
			$query = $this->db->where('product_Best', 1)->get('tb_product');
			$Num_Rows = $query->num_rows();
			
			if($Num_Rows < 5){
				
				$query = $this->db->get_where('tb_product', array('product_ID' => $id));
				$row = $query->row_array();
				if($row["product_Best"] == 1){
					$Home = 0;
				}else{
					$Home = 1;
				}

				$data = array(
					'product_Best' => $Home,
				);
				$this->db->where('product_ID', $id);
				$this->db->update('tb_product', $data);
				
				
				
			}else{

				$data = array(
					'product_Best' => '0',
				);
				$this->db->where('product_ID', $id);
				$this->db->update('tb_product', $data);


			}


		}

		
	}//function
	
	
	public function Sort() 
	{ 
		
		$id = $this->db->escape_str($this->input->post('id'));

		$query = $this->db->get_where('tb_product', array('product_ID' => $id));
		$row = $query->row_array();

		$old_sort = $row["product_Sort"];
		$new_sort = $_POST["value"];
		$category_ID = $row["category_ID"];

		if($new_sort > $old_sort){ 

			$this->db->set('product_Sort', 'product_Sort-1', FALSE);
			$this->db->where("product_Sort Between '$old_sort' and '$new_sort' AND category_ID = '$category_ID' AND product_ID != '$id' ");
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
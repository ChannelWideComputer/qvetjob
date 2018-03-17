<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_contact extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('classupload'));
			// Your own constructor code
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
		//$this->db->join('tb_category', 'tb_category.category_ID = tb_product.category_ID', 'left');
		$this->db->group_start();
		$this->db->like('contact_Title_TH', $word)->or_like('contact_Title_EN', $word);
		//$this->db->or_like('category_Name_TH', $word)->or_like('category_Name_EN', $word);
		$this->db->group_end();
		$this->db->stop_cache();

		$query = $this->db->get('tb_contact');
		//echo $this->db->last_query();die();

		$Num_Rows = $query->num_rows();
		$total_pages = paging_total_pages($Num_Rows, $rows_per_page);
		$page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url);

		//echo $Num_Rows;die();

		$this->db->order_by('contact_Sort', 'ASC');
		$this->db->limit($rows_per_page, $start_row);
		$query = $this->db->get('tb_contact');
		$this->db->flush_cache();
		//echo $this->db->last_query();die();

		if($Num_Rows > 0 ) {
			$data["contact"] = $query->result_array();
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
		
		//echo $this->db->last_query();
		
		if (!isset($data)=="") {
			return $data;
		}
		
	}//function
	
	public function get_home($home = null) 
	{ 
		if($home== "home"){
			/*$this->db->where('contact_Home', 1);
			$data = $this->db->where('contact', 1)->get('tb_contact')->result_array();*/
			$data['15'] = $this->db->get('tb_contact',5,0)->result_array();
			$data['610'] = $this->db->get('tb_contact',5,5)->result_array();
		}else{
			
			$rows_per_page = 4;
			$current_page = 1;
			$page_range = 5;
			$qry_string = "";
			$page_url = base_url('franchise/'.$home);

			if($this->input->get_post('Keyword') != "")
			{

				$word = $this->input->get_post('Keyword');
				$qry_string .= "Keyword=$word";
				$data["word"] = $word;
			}else{	

				$word = "";
			}
			
			if($this->input->get_post('page')) {
				$current_page = $this->input->get_post('page');
				
			}
			if(!empty($this->input->get_post('c'))){

				$c = $this->input->get_post('c');
				$qry_string .= "c=$c";
				$data["c"] = $c;
			}else{
				$c = "";
			}
			
			
			$start_row = paging_start_row($current_page, $rows_per_page);
			
			

			if(!empty($home))
			{
				$this->db->where('tb_contact.category_ID',$home);
			}
			
			// $this->db->where('contact_Status', 1);
			// if(!empty($c)){
			// 	$this->db->where('tb_contact.category_ID', $c);
			// }
			// $this->db->order_by('category_Sort', 'ASC');
			$this->db->order_by('contact_Sort', 'ASC');
			$this->db->stop_cache();
			
			$query = $this->db->get('tb_contact');
			

			$Num_Rows = $query->num_rows();
			$total_pages = paging_total_pages($Num_Rows, $rows_per_page);
			
			//$themePaging["next"]='>>';
			//$themePaging["prev"]='<<';
			//$themePaging["theme"]='<a href="{{link}}#view" title="{{str_page}}"><div class="page2 {{active}}">{{str_page}}</div></a>';
			
			$page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url);
			
			$this->db->limit($rows_per_page, $start_row);
			$query = $this->db->order_by('contact_Sort', 'ASC')->get('tb_contact');
			$this->db->flush_cache();
			
			//echo $this->db->last_query();
			

			if($Num_Rows > 0 ) {
				$data["contact"] = $query->result_array();
			}



			if($Num_Rows > $rows_per_page){
				$data["page_str"] = $page_str;

			}
			
			$query = $this->db->get_where('tb_category', array('category_ID' => $home));
			
			foreach ($query->result_array() as $row){


				$data["category"] = array(
					'category_ID' => $row["category_ID"],
					'category_Name_TH' => $row["category_Name_TH"],
					'category_Name_EN' => $row["category_Name_EN"],

				);


			}
			
		}
		/*
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		die();
		*/
		if (!isset($data)=="") {
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
		$query = $this->db->get_where('tb_contact', array('contact_ID' => $id));
		
		
		foreach ($query->result_array() as $row){
			

			$data["contact"] = array(
				'contact_ID' => $row["contact_ID"],
				'contact_Title_TH' => $row["contact_Title_TH"],
				'contact_Title_EN' => $row["contact_Title_EN"],
				'contact_Add_TH' => $row["contact_Add_TH"],
				'contact_Add_EN' => $row["contact_Add_EN"],
				'contact_Detail1_TH' => $row["contact_Detail1_TH"],
				'contact_Detail2_TH' => $row["contact_Detail2_TH"],
			//'contact_Detail1_EN' => $_POST["contact_Detail1_EN"],
				'contact_Images_TH' => $row["contact_Images_TH"],
				'contact_Phone' => $row["contact_Phone"],
				// 'contact_Fax' => $row["contact_Fax"],
				// 'contact_lat' => $row["contact_lat"],
				// 'contact_lng' => $row["contact_lng"],
				// 'contact_zm' => $row["contact_zm"],
				// 'facebook' => $row["facebook"],
			//'line_ID' => $row["line"],
				// 'instagram' => $row["instagram"],
			//'youtube' => $_POST["youtube"],
				'cus_mail_TH' => $row["cus_mail_TH"],
				// 'contact_Mail' => $row["contact_Mail"],
			);
			
			
			// $query2 = $this->db->where('contact_ID', $row["contact_ID"])->order_by('gallery_Sort', 'ASC')->get('tb_contact_gallery');
			
			// foreach ($query2->result_array() as $row2){

			// 	$data["contact"]["contact_gallery"][] = array(
			// 		'gallery_ID' => $row2["gallery_ID"],
			// 		'gallery_Images' => $row2["gallery_Images"],
			// 		'gallery_Sort' => $row2["gallery_Sort"],

			// 	);

			// // }
			// $query5 = $this->db->get_where('tb_category', array('category_ID' => $row["category_ID"]));

			// foreach ($query5->result_array() as $row5){


			// 	$data["category"] = array(
			// 		'category_ID' => $row5["category_ID"],
			// 		'category_Name_TH' => $row5["category_Name_TH"],
			// 		//'category_Name_EN' => $row5["category_Name_EN"],

			// 	);


			// }

			
		}
		
		
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		
		
		
		if (!isset($data)=="") {
			return $data;
		}

	}

	public function insert() 
	{ 
		
		
		$this->load->helper(array('classupload'));
		$query = $this->db->get('tb_contact');
		$Num_Rows = $query->num_rows();
		$Sort = $Num_Rows+1;

		$data = array(		
			//'contact_ID' => $_POST["contact_ID"],
			'contact_Title_TH' => $_POST["contact_Title_TH"],
			'contact_Add_TH' => $_POST["contact_Add_TH"],
			'contact_Title_EN' => $_POST["contact_Title_EN"],
			'contact_Add_EN' => $_POST["contact_Add_EN"],
			'contact_Detail1_TH' => $_POST["contact_Detail1_TH"],
			'contact_Detail2_TH' => $_POST["contact_Detail2_TH"],
			// 'contact_lat' => $_POST["contact_lat"],
			// 'contact_lng' => $_POST["contact_lng"],
			'contact_Sort' => $Sort,
			//'contact_Detail1_EN' => $_POST["contact_Detail1_EN"],
			'contact_Phone' => $_POST["contact_Phone"],
			// 'contact_Fax' => $_POST["contact_Fax"],
			//'contact_lat' => $_POST["contact_lat"],
			//'contact_lng' => $_POST["contact_lng"],
			//'contact_zm' => $_POST["contact_zm"],
			// 'facebook' => $_POST["facebook"],
			// 'line_ID' => $_POST["line"],
			// 'instagram' => $_POST["instagram"],
			//'youtube' => $_POST["youtube"],
			'cus_mail_TH' => $_POST["cus_mail_TH"],
			// 'contact_Mail' => $_POST["contact_Mail"],
			
			
		);
		
		$this->db->insert('tb_contact', $data);

		$id = $this->db->insert_id();

		
		
		if (!empty($_FILES["contact_Images_TH"]["name"])) {


			$rename = "PHOTO_contact_" . date("d-m-Y_Hms");


			$handle = new upload($_FILES["contact_Images_TH"]);


			if ($handle->uploaded) {
				$handle->file_contact_name_body = $rename;
				$handle->image_resize = true;
				$handle->image_ratio_crop = "T";
				$handle->image_x = '360';
				$handle->image_y = '200';
					//$handle->image_ratio_y        = true;
					//$handle->jpeg_quality = '100';
					//$handle->image_watermark = '../../class.upload/bg.png';

				$handle->process('assets/upload/contact');;
			}

			if ($handle->processed) {
				$photo_name = $handle->file_dst_name;
			}

			$data = array(
				'contact_Images_TH' => $photo_name,
			);
			$this->db->where('contact_ID', $id);
			$this->db->update('tb_contact', $data);

		}
		if($this->db->trans_status() === TRUE)
		{

			return TRUE;

		}else{
			
			return FALSE;


		}
	}


	public function update() 
	{ 
		$this->load->helper(array('classupload'));
		$id = $this->db->escape_str($this->input->post('id'));
		
		$data = array(		
			'contact_Title_TH' => $_POST["contact_Title_TH"],
			'contact_Title_EN' => $_POST["contact_Title_EN"],
			'contact_Add_TH' => $_POST["contact_Add_TH"],
			'contact_Add_EN' => $_POST["contact_Add_EN"],
			'contact_Detail1_TH' => $_POST["contact_Detail1_TH"],
			'contact_Detail2_TH' => $_POST["contact_Detail2_TH"],
			//'contact_Detail1_EN' => $_POST["contact_Detail1_EN"],
			'contact_Phone' => $_POST["contact_Phone"],
			// 'contact_Fax' => $_POST["contact_Fax"],
			// 'contact_lat' => $_POST["contact_lat"],
			// 'contact_lng' => $_POST["contact_lng"],
			//'contact_zm' => $_POST["contact_zm"],
			// 'facebook' => $_POST["facebook"],
			// 'line_ID' => $_POST["line"],
			// 'instagram' => $_POST["instagram"],
			//'youtube' => $_POST["youtube"],
			'cus_mail_TH' => $_POST["cus_mail_TH"],
			// 'contact_Mail' => $_POST["contact_Mail"],
			
			
		);

		$this->db->where('contact_ID', $id);
		$this->db->set('contact_Update', 'NOW()', FALSE);
		$this->db->update('tb_contact', $data);
		
		
		if (!empty($_FILES["contact_Images_TH"]["name"])) {


			$rename = "PHOTO_contact_" . date("d-m-Y_Hms");


			$handle = new upload($_FILES["contact_Images_TH"]);
			
			if ($handle->uploaded) {
				$handle->file_contact_name_body = $rename;
				$handle->file_name_body_pre = 'full_';
				$handle->process('assets/upload/contact');
			}


			if ($handle->uploaded) {
				$handle->file_contact_name_body = $rename;
				$handle->image_resize = true;
				$handle->image_ratio_crop = "T";
				$handle->image_x = '360';
				$handle->image_y = '200';
				$handle->image_ratio_y        = true;
				$handle->jpeg_quality = '100';
					//$handle->image_watermark = '../../class.upload/bg.png';

				$handle->process('assets/upload/contact');
			}

			if ($handle->processed) {
				$photo_name = $handle->file_dst_name;
				$data = array(
					'contact_Images_TH' => $photo_name,
				);
				$this->db->where('contact_ID', $id);
				$this->db->update('tb_contact', $data);
				unlink("assets/upload/contact/$_POST[contact_Images_TH]");
				unlink("assets/upload/contact/full_$_POST[contact_Images_TH]");
			}


			
		}
		
		
		if($this->db->trans_status() === TRUE)
		{

			return TRUE;

		}else{
			
			return FALSE;


		}

	}//function
	
	public function update_cus_mail() 
	{ 
		
		$id = $this->db->escape_str($this->input->post('id'));
		
		$data = array(		
			
			'cus_mail_TH' => $_POST["cus_mail_TH"],
			
		);

		//$this->db->where('contact_ID', $id);
		$this->db->set('contact_Update', 'NOW()', FALSE);
		$this->db->update('tb_contact', $data);
		

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
			
			$query = $this->db->get_where('tb_contact', array('contact_ID' => $id));
			$row = $query->row_array();				
			if($_POST["type"]=="TH"){

				$photos_Name = $row["contact_Images_TH"];
				$Name = "contact_Images_TH";
			}else{
				$photos_Name = $row["contact_Images_TH_EN"];
				$Name = "contact_Images_TH_EN";
			}

			unlink("assets/upload/contact/$photos_Name");
			unlink("assets/upload/contact/full_$photos_Name");

			$data = array(
				$Name => "",
			);
			$this->db->where('contact_ID', $_POST["id"]);
			$this->db->update('tb_contact', $data);

		}
		
	}//function
	

	public function delete() 
	{ 
		

		if($this->input->post('id')!=""){

			$id = $this->db->escape_str($this->input->post('id'));

			
			$query = $this->db->get_where('tb_contact', array('contact_ID' => $id));
			$row = $query->row_array();
			unlink("assets/upload/$row[contact_Images_TH]");
			
			
			$this->db->set('contact_Sort', 'contact_Sort-1', FALSE);
			$this->db->where("contact_Sort > '$row[contact_Sort]' ");
			$this->db->update('tb_contact');
			
			
			$tables = array('tb_contact');
			$this->db->where('contact_ID', $id);
			$this->db->delete($tables);
			$this->dbutil->optimize_table('tb_contact');

			
		}
		
		
	}//function
	
	
	public function delete_All() 
	{ 
		
		for($i=0;$i<count($_POST["id"]);$i++)
		{	
			if($this->input->post('id')[$i]!=""){

				$id = $this->db->escape_str($this->input->post('id')[$i]);
				
				
				
				$query = $this->db->get_where('tb_contact', array('contact_ID' => $id));
				$row = $query->row_array();
				unlink("assets/upload/$row[contact_Images_TH]");
				
				
				$this->db->set('contact_Sort', 'contact_Sort-1', FALSE);
				$this->db->where("contact_Sort > '$row[contact_Sort]' ");
				$this->db->where('contact_Type', $this->type);
				$this->db->update('tb_contact');


				
				$this->db->where('contact_ID', $id);
				$this->db->delete('tb_contact');
				
				$this->db->where('contact_ID', $id);
				$this->db->delete('tb_contact_gallery');
				


			}

		}
		
		
		$this->dbutil->optimize_table('tb_contact');
		$this->dbutil->optimize_table('tb_contact_gallery');
		
		
	}//function

	
	
	public function Sort() 
	{ 
		
		$id = $this->db->escape_str($this->input->post('id'));

		$query = $this->db->get_where('tb_contact', array('contact_ID' => $id ));
		$row = $query->row_array();

		$old_sort = $row["contact_Sort"];
		$contact_sort = $_POST["value"];
		//$category_ID = $row["category_ID"];

		if($contact_sort > $old_sort){ 

			$this->db->set('contact_Sort', 'contact_Sort-1', FALSE);
			$this->db->where("contact_Sort Between '$old_sort' and '$contact_sort' AND contact_ID != '$id' ");
			$this->db->update('tb_contact');
			
		}else{

			$this->db->set('contact_Sort', 'contact_Sort+1', FALSE);
			$this->db->where("contact_Sort Between '$contact_sort' and '$old_sort' AND contact_ID != '$id'");
			$this->db->update('tb_contact');

		}

		$data = array(
			'contact_Sort' => $_POST["value"],
		);
		$this->db->where('contact_ID', $id);
		$this->db->update('tb_contact', $data);
		
		
	}//f

	public function sentmail()
	{
		
		$this->load->library('email');

		if(isset($_POST['g-recaptcha-response'])){
			$captcha=$_POST['g-recaptcha-response'];
		}



		/*
		localhost
		Site key : 6LcSEDoUAAAAAHyi5AK_zlZxpvvOX_E1_M81EO2h
		Secret Key : 6LcSEDoUAAAAAD0Otpcw_Jfpte0ymizp4KssM_Mw
		*/
		// $secret = '6LcSEDoUAAAAAD0Otpcw_Jfpte0ymizp4KssM_Mw'; // local
		
		$secret = '6LelrjMUAAAAAKkNLbYrzV4okYSVQ8JdqJ0gKCai'; // ftp


		
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$response = file_get_contents($url."?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
		// $response = file_get_contents($url."?secret=".apikey("secret_key")."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);

		$data = json_decode($response);

		$chk_captcha = $data->success;
		
		// echo "<pre>";
		// print_r($response);
		// echo  $captcha; 
		// echo  $chk_captcha;
		// echo $_POST['g-recaptcha-response'];
		// print_r($data);
		// echo "</pre";
		//$chk_captcha = "1";
		//die();
		//echo $_FILES['emailpic']['name'];
		

//////////////////////////////////////////////////////////////////////////////////////////////////////////////		

//////////////////////////////////////////////////////////////////////////////////////////////////////////////
		if($chk_captcha)
		{
			
			//echo '<a href=upload/file/'.$_FILES["emailpic"].'></a>';
			//die();

			$query = $this->db->get('tb_contact');
			$row = $query->row_array();

			$config['protocol'] = 'smtp';
			$config['charset'] = 'utf-8';
	        $config['smtp_host'] = 'ns1.chinhosting.com';		//ns1.chinhosting.com
	        $config['smtp_user'] = 'noreply@primamech.com';		//noreply@primamech.com
	        $config['smtp_pass'] = 'cw774411';		//cw774411
	        $config['smtp_port'] = 465;		//465
	        $config['smtp_crypto'] = 'ssl';
	        $config['mailtype'] = 'html';
	        
	        
	        $this->email->initialize($config);
	        

	        $strMessage = "";
	        //$strMessage .= "ติดต่อเรื่อง :".$_POST["name"]."<br>";
	        $strMessage .= "ชื่อผู้ติดต่อ :".$_POST["name"]."<br>";			
	        $strMessage .= "เบอร์ติดต่อ :".$_POST["tel"]."<br>";			
	        $strMessage .= "อีเมล :".$_POST["email"]."<br>";
	        $strMessage .= "รายละเอียด :".$_POST["message"]."<br>";
	        //$strMessage .= "<a href=upload/file/".$_FILES["emailpic"]."></a>";
	        $strMessage .= "<br>";      
	        $strSubject = $this->input->post("name");
	        
	        if ($_FILES["emailpic"]["name"] != "") {

	        	$rename = "emailpic_" . date("d-m-Y_Hms");

	        	$imagename = $_FILES["emailpic"]["name"];
	        	$ext = explode('.', $imagename);				


	        	$handle = new upload($_FILES["emailpic"]);
	        	
	        	if ($handle->uploaded) {
	        		$handle->file_new_name_body   = $rename;	
	        		$sentname = $handle->file_dst_name;

	        		$attach = asset_url()."upload/file/".$rename.".".$ext[1];

	        		$handle->process('assets/upload/file');

					//$this->email->attach('/upload/file/'.$sentname);



	        	}

	        }
	        


	        //echo $_FILES["emailpic"]["name"];
	        //echo $strMessage;
	        //echo "ผู้รับ".$row["cus_mail_TH"];
	        //echo $_FILES['emailpic']['name'];
			// echo "<pre>";
			// print_r($config);
			// echo "</pre>";


	        $this->email->from($_POST["email"],$_POST["name"]);
			        //$this->email->to($row["cus_mail_TH"]);
			        //$this->email->to($row["cus_mail_TH"]);info@smrtint.com
	        $this->email->to('info@cw.in.th');
			        // $this->email->to('keeree@chinhosting.com');
			       	//$this->email->to('keereetoo@gmail.com');
	        $this->email->subject($strSubject);
	        $this->email->message($strMessage);
	        $this->email->attach($attach);
	        if($this->email->send()){
	        	echo "pass";
			        	// die();
	        	return TRUE;


	        }else{
	        	echo "die";
			        	// die();

	        	return FALSE;

	        }
	        
	        // $this->email->attach(base_url().'assets/upload/file/emailpic_22-12-2017_171200.docx');
	        //echo base_url();
	        //echo base_url().'assets/upload/file/'.$sentname;
			// echo "<pre>";
	  //       echo $this->email->print_debugger();
			// echo "</pre>";
			 //die();
	        


	    }else{

	    	return "code";

	    }


	}//function
	

}
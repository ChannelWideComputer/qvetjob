<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_contact extends CI_Model {

	public function __construct()
	{
		parent::__construct();
			// Your own constructor code
	}
	
	public function get_detail() 
	{ 
		
		$query = $this->db->get('tb_contact');
		
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
			// 'contact_Title_TH' => $_POST["contact_Title_TH"],
			// 'contact_Title_EN' => $_POST["contact_Title_EN"],
			'contact_Add_TH' => str_replace("\n", "<br>\n", $_POST["contact_Add_TH"]),
			'contact_Add_EN' => str_replace("\n", "<br>\n", $_POST["contact_Add_EN"]),
			'contact_Add2_TH' => str_replace("\n", "<br>\n", $_POST["contact_Add2_TH"]),
			'contact_Add2_EN' => str_replace("\n", "<br>\n", $_POST["contact_Add2_EN"]),
			// 'news_Des_EN' => str_replace("\n", "<br>\n", $_POST["news_Des_EN"]),
			'contact_Detail1_TH' => $_POST["contact_Detail1_TH"],
			//'contact_Detail1_EN' => $_POST["contact_Detail1_EN"],
			'contact_Detail2_TH' => $_POST["contact_Detail2_TH"],
			//'contact_Detail2_EN' => $_POST["contact_Detail2_EN"],
			'contact_Phone' => $_POST["contact_Phone"],
			'contact_Fax' => $_POST["contact_Fax"],
			'contact_Fax2' => $_POST["contact_Fax2"],
			'facebook' => $_POST["facebook"],
			'line_ID' => $_POST["line"],
			// 'twitter' => $_POST["twitter"],
			// 'instagram' => $_POST["instagram"],
			'youtube' => $_POST["youtube"],

			'cus_mail_TH' => $_POST["cus_mail_TH"],
			'cus_mail_EN' => $_POST["cus_mail_EN"],
			'contact_Mail' => $_POST["contact_Mail"],
			'contact_Tel' => str_replace("\n", "<br>\n", $_POST["contact_Tel"]),
			'contact_Tel2' => str_replace("\n", "<br>\n", $_POST["contact_Tel2"]),
			'contact_lat' => $_POST["contact_lat"],
			'contact_lng' => $_POST["contact_lng"],
			'contact_lat2' => $_POST["contact_lat2"],
			'contact_lng2' => $_POST["contact_lng2"],
			
			
		);

		$this->db->where('contact_ID', $id);
		$this->db->set('contact_Update', 'NOW()', FALSE);
		$this->db->update('tb_contact', $data);
		
		
		if (!empty($_FILES["contact_Images_TH"]["name"])) {


			$rename = "PHOTO_contact_TH_" . date("d-m-Y_Hms");


			$handle = new upload($_FILES["contact_Images_TH"]);
			
			if ($handle->uploaded) {
				$handle->file_new_name_body = $rename;
				$handle->file_name_body_pre = 'full_';
				$handle->process('assets/upload/contact');
			}


			if ($handle->uploaded) {
				$handle->file_new_name_body = $rename;
				$handle->image_resize = true;
					//$handle->image_ratio_crop = "T";
				$handle->image_x = '800';
				$handle->image_y = '442';
				//$handle->image_ratio_y        = true;
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
				@unlink("assets/upload/contact/$_POST[contact_Images_TH]");
				@unlink("assets/upload/contact/full_$_POST[contact_Images_TH]");
			}


			
		}
		if (!empty($_FILES["contact_Images_EN"]["name"])) {


			$rename2 = "PHOTO_contact_EN_" . date("d-m-Y_Hms");


			$handle = new upload($_FILES["contact_Images_EN"]);

			if ($handle->uploaded) {
				$handle->file_new_name_body = $rename2;
				$handle->file_name_body_pre = 'full_';
				$handle->process('assets/upload/contact');
			}


			if ($handle->uploaded) {
				$handle->file_new_name_body = $rename2;
				$handle->image_resize = true;
					//$handle->image_ratio_crop = "T";
				$handle->image_x = '540';
				$handle->image_y = '235';
				//$handle->image_ratio_y        = true;
				$handle->jpeg_quality = '100';
					//$handle->image_watermark = '../../class.upload/bg.png';

				$handle->process('assets/upload/contact');
			}

			if ($handle->processed) {
				$photo_name2 = $handle->file_dst_name;
				$data = array(
					'contact_Images_EN' => $photo_name2,
				);
				$this->db->where('contact_ID', $id);
				$this->db->update('tb_contact', $data);
				@unlink("assets/upload/contact/$_POST[contact_Images_EN]");
				@unlink("assets/upload/contact/full_$_POST[contact_Images_EN]");
			}



		}
		
		
		if($this->db->trans_status() === TRUE)
		{

			return TRUE;

		}else{
			
			return FALSE;


		}

	}//function
	
	
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
				$photos_Name = $row["contact_Images_EN"];
				$Name = "contact_Images_EN";
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
	
	public function sentmail()
	{
		
		$this->load->library('email');

		if(isset($_POST['g-recaptcha-response'])){
			$captcha=$_POST['g-recaptcha-response'];
		}
		// $secret = '6LcSEDoUAAAAAD0Otpcw_Jfpte0ymizp4KssM_Mw'; local
		$secret = '6LelrjMUAAAAAKkNLbYrzV4okYSVQ8JdqJ0gKCai';//ftp
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$response = file_get_contents($url."?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);

		$data = json_decode($response);

		$chk_captcha = $data->success;
		// $chk_captcha = "1";

		if($chk_captcha)
		{	               

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
	        $strMessage .= "ชื่อหน่วยงานที่ติดต่อ :".$_POST["company"]."<br>";			
	        $strMessage .= "ชื่อผู้ติดต่อ :".$_POST["name"]."<br>";			
	        $strMessage .= "เบอร์ติดต่อ :".$_POST["phone"]."<br>";			
	        $strMessage .= "อีเมล :".$_POST["email"]."<br>";
	        $strMessage .= "ติดต่อเรื่อง :".$_POST["subject"]."<br>";
	        $strMessage .= "รายละเอียด :".$_POST["message"]."<br>";							
	        $strMessage .= "<br>";      
	        
	        $strSubject = $this->input->post("supject");

	        if (@$_FILES["emailpic"]["name"] != "") {

	        	$rename = "email_" . date("d-m-Y_Hms");

	        	$imagename = @$_FILES["emailpic"]["name"];
	        	$ext = explode('.', $imagename);				


	        	$handle = new upload($_FILES["emailpic"]);

	        	if ($handle->uploaded) {
	        		$handle->file_new_name_body   = $rename;	
	        		$sentname = $handle->file_dst_name;

	        		$attach = asset_url()."upload/mail/".$rename.".".$ext[1];

	        		$handle->process('assets/upload/mail');

					//$this->email->attach('/upload/file/'.$sentname);



	        	}

	        }

	        
			/*
	        echo $strMessage;
			echo "<pre>";
			print_r($config);
			echo $row["contact_Mail"];
	        die();
	        */	        
	        
	        $this->email->from($_POST["email"]);
	        // $this->email->to($row["cus_mail_TH"]);
	        $this->email->to($row["contact_Mail"]);
	        // $this->email->to('keereetoo@gmail.com');
	        $this->email->subject($strSubject);
	        $this->email->message($strMessage);
	        $this->email->attach(@$attach);
			//echo $this->email->print_debugger();

	        if($this->email->send()){

	        	return TRUE;


	        }else{


	        	return FALSE;

	        }


	    }else{

	    	return "code";

	    }


	}//function
	

}
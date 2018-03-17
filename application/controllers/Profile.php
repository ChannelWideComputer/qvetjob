<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	protected $default_page = 'profile';
	
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_contact');
		$this->load->model('Model_slide');
		$this->load->library('cart');
		$this->load->library('session');


		if ($this->session->userdata('lang') == NULL) {
			$lang = "EN";
			$this->session->set_userdata('lang', $lang);                
			
		}else{          
			$lang = $this->session->userdata('lang');  
		}
		
		$this->lang->load($lang, $lang);

		

	}
	
	
	public function index()
	{
		
		$lang = $this->session->lang;
		$id   = $this->db->escape_str($_SESSION["user_id"]);

		//echo $id;
		
		$sql = "SELECT * FROM tb_member WHERE ID = '".$id."' ";
		$query = $this->db->query($sql);	
		$data['page_url'] = base_url($this->default_page); 
		$data['page'] = array(
			"H_TH"=>"หน้าแรก",
			"H_EN"=>"Home",
			"TH"=>"จัดการข้อมูล",
			"EN"=>"DASHBOARD",	
		);
		foreach ($query->result_array() as $row){

			$data["member"] = array(
				'ID' => $row["ID"],
				'member_Email' => $row["member_Email"],
				'member_title' => $row["member_title"],
				'member_Name' => $row["member_Name"],
				'member_Nickname' => $row["member_Nickname"],
				'member_Type' => $row["member_Type"],
				'member_Pass' => base64_encode($row["member_Pass"]),
				'member_Phone' => $row["member_Phone"],
				'member_birthday' => $row["member_birthday"],
				'member_old' => $row["member_old"],
				'idcard' => $row["idcard"],
				'member_Province' => $row["member_Province"],
				'member_District' => $row["member_District"],
				'member_zone' => $row["member_zone"],
				'member_State' => $row["member_State"],
				'member_Village' => $row["member_Village"],
				'member_Zip' => $row["member_Zip"],
				'member_Province2' => $row["member_Province"],
				'member_District2' => $row["member_District"],
				'member_zone2' => $row["member_zone"],
				'member_State2' => $row["member_State"],
				'member_Village2' => $row["member_Village"],
				'member_Zip2' => $row["member_Zip"],
				'member_Province2' => $row["member_Province2"],
				'member_District2' => $row["member_District2"],
				'member_zone2' => $row["member_zone2"],
				'member_State2' => $row["member_State2"],
				'member_Village2' => $row["member_Village2"],
				'member_Zip2' => $row["member_Zip2"],
				'member_Phone' => $row["member_Phone"],
				'line_ID' => $row["line_ID"],
				'facebook' => $row["facebook"],
				'member_Images' => $row["member_Images"],
				'pic_idcard' => $row["pic_idcard"],
				'bookbank' => $row["bookbank"],
				'gt' => $row["gt"],
				'st' => $row["st"],
				'cpr' => $row["cpr"],
				'endo' => $row["endo"],
				'slt' => $row["slt"],
				'sllt' =>  $row["sllt"],
				'gbs' => $row["gbs"],
				'cpc' => $row["cpc"],
				'remove' => $row["remove"],
				'ht' => $row["ht"],
				'eye' => $row["eye"],
				'caesar' => $row["caesar"],
				'dh' => $row["dh"],
				'chest' => $row["chest"],
				'mrm' => $row["mrm"],
				'gtw' => $row["gtw"],
				'eyeball' => $row["eyeball"],
				'cl' => $row["cl"],
				'bs' => $row["bs"],
				'itc' => $row["itc"],
				'pm' => $row["pm"],
				'mam' => $row["mam"],
				'transgender' => $row["transgender"],
				'ventilators' => $row["ventilators"],
				'at' => $row["at"],
				'bc' => $row["bc"],
				'cbc' => $row["cbc"],
				'x_ray' => $row["x_ray"],
				'ultra' => $row["ultra"],
				'ss' => $row["ss"],
				'other' => $row["other"],
				'g1' => $row["g1"],
				'g2' => $row["g2"],
				'g3' => $row["g3"],
				'g4' => $row["g4"],
				'g5' => $row["g5"],
				'g6' => $row["g6"],
				'wlocation1' => $row["wlocation1"],
				'wlocation2' => $row["wlocation2"],
				'wlocation3' => $row["wlocation3"],
				'wlocation4' => $row["wlocation4"],
				'wlocation5' => $row["wlocation5"],
				'optradio' => $row["optradio"],
				'daywork1' => $row["daywork1"],
				'daywork2' => $row["daywork2"],
				'daywork3' => $row["daywork3"],
				'daywork4' => $row["daywork4"],
				'daywork5' => $row["daywork5"],
				'daywork6' => $row["daywork6"],
				'daywork7' => $row["daywork7"],
				'sday' => $row["sday"],
				'Message1' => $row["Message1"],
				'Message2' => $row["Message2"],
				'Message3' => $row["Message3"],

			);


		}

		$query3 = $this->db->where('member_ID', $row["ID"])->order_by('study_ID', 'ASC')->get('tb_study');
		foreach ($query3->result_array() as $row3){

			$data["member"]["study"][] = array(
				'study_ID' => $row3["study_ID"],
				'study_univer' => $row3["study_univer"],
				'study_branch' => $row3["study_branch"],
				'study_end' => $row3["study_end"],
				'study_grade' => $row3["study_grade"],
				'study_univer2' => $row3["study_univer2"],
				'study_branch2' => $row3["study_branch2"],
				'study_end2' => $row3["study_end2"],
				'study_grade2' => $row3["study_grade2"],
				'ecducation' => $row3["ecducation"],

			);

		}
		$query4 = $this->db->where('member_ID', $row["ID"])->order_by('work_ID', 'ASC')->get('tb_workexp');
		foreach ($query4->result_array() as $row4){

			$data["member"]["work"][] = array(
				'work_ID' => $row4["work_ID"],
				'work_work' => $row4["work_work"],
				'work_location' => $row4["work_location"],
				'work_province' => $row4["work_province"],
				'work_start' => $row4["work_start"],
				'work_end' => $row4["work_end"],
			);

		}
		// $this->db->where('ID', $id);
		// $data['member'] = $this->db->get('tb_member')->result_array();
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		//echo $this->db->last_query();
		$data["slide"] = $this->Model_slide->get_home();
		$data["contact"] = $this->Model_contact->get_detail();

		if ($_SESSION["user_Type"]!="") {
			$this->load->view('dashboard-m',$data);
		}


	}

	public function edit()
	{

		$lang = $this->session->lang;
		$id   = $this->db->escape_str($_POST["id"]);

		$chk_captcha = "1";

		//echo $chk_captcha ;

		//die();

		if($chk_captcha){

			$data = array(
				//////////////////ส่วนที่1////////////////////
				'member_Email' => $_POST["member_Email"],
				'member_title' => $_POST["member_title"],
				'member_Name' => $_POST["member_Name"],
				'member_Nickname' => $_POST["member_Nickname"],
				'member_Type' => $_POST["member_Type"],
				'member_Pass' => base64_encode($_POST["member_Pass"]),
				'member_Phone' => $_POST["member_Phone"],
				'member_birthday' => $_POST["member_birthday"],
				'member_old' => $_POST["member_old"],
				'idcard' => $_POST["idcard"],
				/////////////////จบส่วนที่1///////////////////

				//////////////////ส่วนที่2////////////////////
				/*---------------ส่วนการติดต่อ---------------*/
				'member_Province' => $_POST["member_Province"],
				'member_District' => $_POST["member_District"],
				'member_zone' => $_POST["member_zone"],
				'member_State' => $_POST["member_State"],
				'member_Village' => $_POST["member_Village"],
				'member_Zip' => $_POST["member_Zip"],);

			$this->db->where('ID', $id);
			$this->db->set('member_date_reg', 'NOW()', FALSE);
			$this->db->update('tb_member', $data);
			if(isset($_POST['same'])=="1") {
				$data = array(
					'member_Province2' => $_POST["member_Province"],
					'member_District2' => $_POST["member_District"],
					'member_zone2' => $_POST["member_zone"],
					'member_State2' => $_POST["member_State"],
					'member_Village2' => $_POST["member_Village"],
					'member_Zip2' => $_POST["member_Zip"],);
				$this->db->where('ID', $id);
				$this->db->update('tb_member', $data);
			}else{
				$data = array(
					'member_Province2' => $_POST["member_Province2"],
					'member_District2' => $_POST["member_District2"],
					'member_zone2' => $_POST["member_zone2"],
					'member_State2' => $_POST["member_State2"],
					'member_Village2' => $_POST["member_Village2"],
					'member_Zip2' => $_POST["member_Zip2"],);
				$this->db->where('ID', $id);
				$this->db->update('tb_member', $data);
			}
			$data = array(
				'member_Phone' => $_POST["member_Phone"],
				'line_ID' => $_POST["line_ID"],
				'facebook' => $_POST["facebook"],
				/*-------------จบส่วนการติดต่อ---------------*/
				////////////////จบ//ส่วนที่2//////////////////

				//////////////////ส่วนที่3////////////////////
				/*---------------ส่วนความสามารถ---------------*/
				'gt' => @$_POST["gt"],
				'st' => @$_POST["st"],
				'cpr' => @$_POST["cpr"],
				'endo' => @$_POST["endo"],
				'slt' => @$_POST["slt"],
				'sllt' => @$_POST["sllt"],
				'gbs' => @$_POST["gbs"],
				'cpc' => @$_POST["cpc"],
				'remove' => @$_POST["remove"],
				'ht' => @$_POST["ht"],
				'eye' => @$_POST["eye"],
				'caesar' => @$_POST["caesar"],
				'dh' => @$_POST["dh"],
				'chest' => @$_POST["chest"],
				'mrm' => @$_POST["mrm"],
				'gtw' => @$_POST["gtw"],
				'eyeball' => @$_POST["eyeball"],
				'cl' => @$_POST["cl"],
				'bs' => @$_POST["bs"],
				'itc' => @$_POST["itc"],
				'pm' => @$_POST["pm"],
				'mam' => @$_POST["mam"],
				'transgender' => @$_POST["transgender"],
				'ventilators' => @$_POST["ventilators"],
				'at' => @$_POST["at"],
				'bc' => @$_POST["bc"],
				'cbc' => @$_POST["cbc"],
				'x_ray' => @$_POST["x_ray"],
				'ultra' => @$_POST["ultra"],
			);
			$this->db->where('ID', $id);
			$this->db->update('tb_member', $data);

			if (isset($_POST["ss"])) {
				$data = array(
					'ss' => $_POST["ssdetail"],
				);
				$this->db->where('ID', $id);
				$this->db->update('tb_member', $data);
			}
			if (isset($_POST["other"])) {
				$data = array(
					'other' => $_POST["otherdetail"],
				);
				$this->db->where('ID', $id);
				$this->db->update('tb_member', $data);
			}
			/*--------------จบส่วนความสามารถ--------------*/
				////////////////จบ//ส่วนที่3//////////////////

				//////////////////ส่วนที่4//////////////////
			/*-------------ส่วนทักษะพิเศษ--------------*/
			$data = array(
				'g1' => @$_POST["g1"],
				'g2' => @$_POST["g2"],
				'g3' => @$_POST["g3"],
				'g4' => @$_POST["g4"],
				'g5' => @$_POST["g5"],
				'g6' => @$_POST["g6"],
				/*-------------จบส่วนทักษะพิเศษ--------------*/
				//////////////////จบส่วนที่4//////////////////

				//////////////////ส่วนที่5//////////////////
				/*-------------ส่วนworkdetail-------------*/
				'wlocation1' => @$_POST["wlocation1"],
				'wlocation2' => @$_POST["wlocation2"],
				'wlocation3' => @$_POST["wlocation2"],
			);
			$this->db->where('ID', $id);
			$this->db->update('tb_member', $data);


			if (isset($_POST["wlocation4"])) {
				$data = array(
					'wlocation4' => @$_POST["locationdetail1"],
				);	
				$this->db->where('ID', $id);
				$this->db->update('tb_member', $data);
			}
			if (isset($_POST["wlocation5"])) {
				$data = array(
					'wlocation5' => @$_POST["locationdetail2"],
				);	
				$this->db->where('ID', $id);
				$this->db->update('tb_member', $data);
			}
			$data = array(
				'optradio' => @$_POST["optradio"],
				'daywork1' => @$_POST["daywork1"],
				'daywork2' => @$_POST["daywork2"],
				'daywork3' => @$_POST["daywork3"],
				'daywork4' => @$_POST["daywork4"],
				'daywork5' => @$_POST["daywork5"],
				'daywork6' => @$_POST["daywork6"],
				'daywork7' => @$_POST["daywork7"],
			);
			$this->db->where('ID', $id);
			$this->db->update('tb_member', $data);
			if (isset($_POST["sday"]) == "3") {
				$data = array(
					'sday' => $_POST["sdaydetail"],
				);
				$this->db->where('ID', $id);
				$this->db->update('tb_member', $data);
			}else{
				$data = array(
					'sday' => $_POST["sday"],	
				);
				$this->db->where('ID', $id);
				$this->db->update('tb_member', $data);
			}
			$data = array(
				'Message1' => @$_POST["Message1"],
				'Message2' => @$_POST["Message2"],
				'Message3' => @$_POST["Message3"],
			);
			/*-------------จบส่วนworkdetail-------------*/
			//////////////////จบส่วนที่5//////////////////
			$this->db->where('ID', $id);
			$this->db->update('tb_member', $data);
			/*-------------------------------------------------------------------------*/
			////////////////////ส่วนที่6//////////////////
			/*-----------------ส่วนการศึกษา---------------*/
			$data2 = array(
				'study_univer' => @$_POST["study_univer"],
				'study_branch' => @$_POST["study_branch"],
				'study_end' => @$_POST["study_end"],
				'study_grade' => @$_POST["study_grade"],
				'study_univer2' => @$_POST["study_univer2"],
				'study_branch2' => @$_POST["study_branch2"],
				'study_end2' => @$_POST["study_end2"],
				'ecducation' => @$_POST["ecducation"],
				'study_grade2' => @$_POST["study_grade2"],
				'member_ID' => $id,
			);
			$this->db->insert('tb_study', $data2);
			/*----------------จบส่วนการศึกษา--------------*/
			//////////////////จบส่วนที่6///////////////////

			////////////////////ส่วนที่7//////////////////
			/*----------------ประสบการณ์การ--------------*/
			$data3 = array(
				'work_work' => @$_POST["work_work"],
				'work_location' => @$_POST["work_location"],
				'work_province' => @$_POST["work_province"],
				'work_start' => @$_POST["work_start"],
				'work_end' => @$_POST["work_end"],
				'member_ID' => $id,
			);
			$this->db->insert('tb_workexp', $data3);



			if ($_FILES["pic_idcard"]["name"] != "") {


				$rename = "pic_idcard_" . date("d-m-Y_Hms");


				$handle = new upload($_FILES["pic_idcard"]);

				if ($handle->uploaded) {
					$handle->file_new_name_body = $rename;
					$handle->image_resize = true;
					$handle->image_x = '555';
					$handle->image_y = '320';
					$handle->process('assets/upload/member/idcard');
				}
				if ($handle->processed) {
					$photo_name = $handle->file_dst_name;
				}

				$data = array(
					'pic_idcard' => $photo_name,
				);
				$this->db->where('ID', $id);
				$this->db->update('tb_member', $data);
				@unlink("assets/upload/member/idcard/$_POST[pic_idcard]");
			}


			if (@$_FILES["bookbank"]["name"] != "") {


				$rename2 = "bookbank_" . date("d-m-Y_Hms");


				$handle = new upload(@$_FILES["bookbank"]);


				if ($handle->uploaded) {
					$handle->file_new_name_body   = $rename2;
					$handle->image_resize         = true;
				//$handle->image_ratio_crop     = "T";
					$handle->image_x              = '555';
					$handle->image_y       		  = '320';
				//$handle->image_ratio_y        = true;
				//$handle->jpeg_quality = '100';

					$handle->process('assets/upload/member/bookbank');
				}

				if ($handle->processed) {
					$photo_name2 = $handle->file_dst_name;
				}

				$data = array(
					'bookbank' => $photo_name2,
				);
				$this->db->where('ID', $id);
				$this->db->update('tb_member', $data);
				@unlink("assets/upload/member/bookbank/$_POST[bookbank]");

			}
			if (@$_FILES["member_Images"]["name"] != "") {


				$rename3 = "bookbank_" . date("d-m-Y_Hms");


				$handle = new upload(@$_FILES["member_Images"]);


				if ($handle->uploaded) {
					$handle->file_new_name_body   = $rename3;
					$handle->image_resize         = true;
				//$handle->image_ratio_crop     = "T";
					$handle->image_x              = '555';
					$handle->image_y       		  = '320';
				//$handle->image_ratio_y        = true;
				//$handle->jpeg_quality = '100';

					$handle->process('assets/upload/member/member_pic');
				}

				if ($handle->processed) {
					$photo_name3 = $handle->file_dst_name;
				}

				$data = array(
					'member_Images' => $photo_name3,
				);
				$this->db->where('ID', $id);
				$this->db->update('tb_member', $data);
				@unlink("assets/upload/member/member_pic/$_POST[member_Images]");

			}




			$this->db->trans_complete();
			if ($this->db->trans_status() === TRUE)
			{

				$data_page = array(
					'page' => "profile",
					'label' => constant('Profile-'.$_SESSION["lang"]),
					'labeltext' => constant('Success-'.$_SESSION["lang"]),
				);


				$this->load->view('cwcontrol/modal/front_success',$data_page);


			}else{

				$data_page = array(
					'page' => "profile",
					'label' => constant('Profile-'.$_SESSION["lang"]),
					'labeltext' => constant('Error-'.$_SESSION["lang"]),
				);

				$this->load->view('cwcontrol/modal/front_error',$data_page);



			}

		}else{


			$data_page = array(
				'page' => "profile",
				'label' => constant('Profile-'.$_SESSION["lang"]),
				'labeltext' => constant('Security-'.$_SESSION["lang"]),
			);


			$this->load->view('cwcontrol/modal/code',$data_page);

		}	



	}//function
	
	
	
	
}

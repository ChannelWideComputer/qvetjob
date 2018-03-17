<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	

	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_register');
		$this->load->model('Model_slide');
		$this->load->model('Model_contact');

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

		if ($this->input->get('type') == "m") {
			$lang = $this->session->lang;

			$data["slide"] = $this->Model_slide->get_home();

			$sql = "SELECT * FROM tb_about WHERE about_Type = 'images' ";
			$query = $this->db->query($sql);
			$row = $query->row_array();
			$data["about_Images"] = $row["about_Images"];

			$data["contact"] = $this->Model_contact->get_detail();	

			$data['page_url'] = base_url('Register'); 
			$data['page'] = array(
				"H_TH"=>"หน้าแรก",
				"H_EN"=>"Home",
				"TH"=>"สมัครสมาชิก",
				"EN"=>"Register",
			);

			if ($this->input->get('m') == "1") {
				$this->load->view('register-detail-m01',$data);
			}elseif ($this->input->get('m') == "2") {
				$this->load->view('register-detail-m02',$data);
			}

		}
		if ($this->input->get('type') == "h") {
			$lang = $this->session->lang;

			$data["slide"] = $this->Model_slide->get_home();

			$sql = "SELECT * FROM tb_about WHERE about_Type = 'images' ";
			$query = $this->db->query($sql);
			$row = $query->row_array();
			$data["about_Images"] = $row["about_Images"];

			$data["contact"] = $this->Model_contact->get_detail();	

			$data['page_url'] = base_url('Register'); 
			$data['page'] = array(
				"H_TH"=>"หน้าแรก",
				"H_EN"=>"Home",
				"TH"=>"สมัครสมาชิก",
				"EN"=>"Register",
			);
			

			$this->load->view('register-detail-h',$data);
		}
		
	}

	public function formm01 ()
	{
		$this->load->view('register-m01');
	}

	public function formm02 ()
	{
		$this->load->view('register-m02');
	}

	public function formh ()
	{
		$this->load->view('register-h');
	}

	public function sent()
	{
		
		$lang = $this->session->lang;

		$query = $this->Model_register->sent();

		if($query == TRUE){
			
			$data_page = array(
				'page' => "contact",
				'label' => constant('Contact-TH'),
				'labeltext' => constant('Weget-TH'),
			);

			$this->load->view('cwcontrol/modal/front_success',$data_page);
			
		}elseif($query == "code"){
			
			$data_page = array(
				'page' => "contact",
				'label' => constant('Contact-TH'),
				'labeltext' => constant('Security-TH'),
			);
			
			
		}else{
			
			$data_page = array(
				'page' => "contact",
				'label' => constant('Contact-TH'),
				'labeltext' => constant('Error-TH'),
			);
			$this->load->view('cwcontrol/modal/front_error',$data_page);
			
		}
		


	}

	
	
	public function add()
	{
		$this->load->library('email');
		$lang = $this->session->lang;
		
		if(isset($_POST['g-recaptcha-response'])){
			$captcha=$_POST['g-recaptcha-response'];
		}
		
		// $secret = '6LcSEDoUAAAAAD0Otpcw_Jfpte0ymizp4KssM_Mw'; 

		$secret = '6LdElT4UAAAAACdBKfBQ6pwH8AOmrzzGC8ZijzaM';// ftp
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$response = file_get_contents($url."?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
		// $response = file_get_contents($url."?secret=".apikey("secret_key")."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);

		$data = json_decode($response);

		$chk_captcha = $data->success;

		//$chk_captcha = "1";

		
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

			$this->db->insert('tb_member', $data);
			$id = $this->db->insert_id();

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

			/*----------------ประสบการณ์การ--------------*/
			//////////////////จบส่วนที่7///////////////////



			////////////////////ส่วนที่8//////////////////
			/*-----------------ส่วนรูปภาพ1---------------*/

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

			}
			/*---------------จบส่วนรูปภาพ1---------------*/
			/*-----------------ส่วนรูปภาพ2---------------*/
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


			}
			/*-----------------จบส่วนรูปภาพ2---------------*/

			/*-----------------ส่วนรูปภาพ3---------------*/
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


			}
			/*-----------------จบส่วนรูปภาพ3---------------*/
			///////////////////จบส่วนที่8///////////////////




			$config['protocol'] = 'smtp';
			$config['charset'] = 'utf-8';
			$config['smtp_host'] = 'ns1.chinhosting.com';
			$config['smtp_user'] = 'noreply@primamech.com';
			$config['smtp_pass'] = 'cw774411';
			$config['smtp_port'] = 465;
			$config['smtp_crypto'] = 'ssl';
			$config['mailtype'] = 'html';


			$this->email->initialize($config);


			$sql = "SELECT * FROM tb_member WHERE ID = '".$id."'  ";
			$query = $this->db->query($sql);
			$row = $query->row_array();



			$member_ID = $row["ID"];
			$member_Name = $row["member_Name"];
			$pass = base64_decode($row['member_Pass']);
			$email = $row["member_Email"];


			$message = '<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3">
			<tbody>

			<tr>
			<td colspan="2" valign="middle" align="left">

			<div style="padding:10px; margin:0; border:1px #0C4DA0 solid; color:#666666; font-family: Tahoma, Geneva, sans-serif; font-size:14px; -o-border-radius: 5px;
			-ms-border-radius: 5px;
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			-khtml-border-radius: 5px;
			border-radius: 5px;	">
			<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">

			<!-- =============================== Header ====================================== -->         



			<tr bgcolor="#FFFFFF">
			<td width="445" colspan="2" align="left" valign="bottom">
			<img src="'.asset_url().'images/logo.png" border="0" />
			</td>
			</tr>

			<tr><td height="3" colspan="3"  style="border-bottom:1px solid #DDDDDD;"></td></tr>





			<!-- =============================== Body ====================================== -->

			<tr>
			<td colspan="2" valign="top">

			<div class="movableContent">
			<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr><td height="20"></td></tr>
			<tr>
			<td align="center">
			<div class="contentEditableContainer contentTextEditable">
			<div class="contentEditable" align="center">
			<h1 style="text-align:center; color:#848383; font-size:19px;font-weight:normal;">'.constant("regis4-$_SESSION[lang]").' '.$member_Name.'</h1>
			</div>
			</div>
			</td>
			</tr>

			<tr><td height="15"> </td></tr>

			<tr>
			<td align="center"><span style="text-align:left; color:#848383;">'.constant("regis2-$_SESSION[lang]").'</span></td>
			</tr>
			<tr>
			<td align="center">&nbsp;</td>
			</tr>
			<tr>
			<td align="center"><table>
			<tr>
			<td align="center" bgcolor="#DC2828" style="background:#0C4DA0; padding:15px 18px;-webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;">
			<div class="contentEditableContainer contentTextEditable">
			<div class="contentEditable" align="center">
			<a href="'.base_url().'confirm?sid='.session_id().'&v='.$member_ID.'&type=Register&lg='.$_SESSION["lang"].'" style="font-size:16px;text-decoration:none;color:#ffffff;">'.constant("regis3-$_SESSION[lang]").'</a>
			</div>
			</div>
			</td>
			</tr>
			</table></td>
			</tr>
			<tr><td height="20"></td></tr>
			</table>
			</div>

			</td>
			</tr>



			<!-- =============================== footer ====================================== -->

			<tr><td colspan="2"  style="border-bottom:1px solid #DDDDDD;"></td></tr>

			<tr>
			<td colspan="2">
			<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr>
			<td valign="top" align="left" width="362">
			<div class="contentEditableContainer contentTextEditable">
			<div class="contentEditable" align="center">
			<p  style="text-align:left;color:#999999;font-size:12px;font-weight:normal;line-height:20px;">
			<span style="font-weight:bold;">Dashing Girl</span>
			<br>
			'.constant("Call-$_SESSION[lang]").'. :062 492 3555<br>

			E-mail. :support@dashing.com<br>								
			Website :www.dashing.com<br>

			</p>
			</div>
			</div>
			</td>



			</tr>
			</table>
			</td>
			</tr>


			</table>





			</div>

			</td>
			</tr>

			</tbody>
			</table>';


	//echo $message;
	//exit();
			$Subject = constant("regis3-$_SESSION[lang]").' dashing.com';

			//$this->email->from('noreply@cba.co.th','cba.co.th');
			$this->email->from('oil@chinhosting.com');
			$this->email->to($email);


			$this->email->subject($Subject);
			$this->email->message($message);


			if($this->email->send()){

			//exit();
				$data_page = array(
					'page' => "home",
					'label' => constant('Register-'.$_SESSION["lang"]),
					'labeltext' => constant('Register_Success-'.$_SESSION["lang"]),
				);


				$this->load->view('cwcontrol/modal/front_success',$data_page);


			}else{


				$data_page = array(
					'page' => "home",
					'label' => constant('Register-'.$_SESSION["lang"]),
					'labeltext' => constant('Error-'.$_SESSION["lang"]),
				);

				$this->load->view('cwcontrol/modal/front_error',$data_page);



			}
			//echo $this->email->print_debugger();


		}else{


			$data_page = array(
				'page' => "home",
				'label' => constant('Register-'.$_SESSION["lang"]),
				'labeltext' => constant('Security-'.$_SESSION["lang"]),
			);


			$this->load->view('cwcontrol/modal/code',$data_page);

		}	



	}//function
	
	
	public function chk_mail()
	{
		$Email = $this->input->post('member_Email');
		$strSQL = "SELECT * FROM tb_member WHERE member_Email = '".$Email."'  ";
		$query = $this->db->query($strSQL);
		if(!$row = $query->row_array()){
			echo "n";
		}
	}//function
	
	
	
	
	
	
	
	
}

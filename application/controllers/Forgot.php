<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot extends CI_Controller {
	

	public function __construct()
	{
		parent::__construct();

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
		
		$sql = "SELECT * FROM tb_about WHERE about_Type = 'images' ";
		$query = $this->db->query($sql);
		$row = $query->row_array();
		$data["about_Images"] = $row["about_Images"];
		$data['page_url'] = base_url('forgot'); 
		$data['page'] = array(
			"H_TH"=>"หน้าแรก",
			"H_EN"=>"Home",
			"TH"=>"ลืมรหัสผ่าน",
			"EN"=>"forgot",
		);
		$this->load->view('forgot-password',$data);
	}
	
	
	public function send()
	{
		
		$lang = $this->session->lang;
		
		if(isset($_POST['g-recaptcha-response'])){
			$captcha=$_POST['g-recaptcha-response'];
		}
		
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$secret = '6LelrjMUAAAAAKkNLbYrzV4okYSVQ8JdqJ0gKCai';
		// $response = file_get_contents($url."?secret=".apikey("secret_key")."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
		$response = file_get_contents($url."?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);

		$data = json_decode($response);

		$chk_captcha = $data->success;

		
		if($chk_captcha){
			
			$this->load->library('email');
			
			
			$id = $this->db->escape_str($_POST["member_Email"]);
			
			
			
			$config['protocol'] = 'smtp';
			$config['charset'] = 'utf-8';
			$config['smtp_host'] = 'ns1.chinhosting.com';
			$config['smtp_user'] = 'noreply@logisticjournal.ssru.ac.th';
			$config['smtp_pass'] = 'cw774411';
			$config['smtp_port'] = 465;
			$config['smtp_crypto'] = 'ssl';
			$config['mailtype'] = 'html';
			

			$this->email->initialize($config);
			
			
			$sql = "SELECT * FROM tb_member WHERE member_Email = '".$id."'  ";
			$query = $this->db->query($sql);
			$row = $query->row_array();



			
			$member_Name = $row["member_Name"];
			$pass = base64_decode($row['member_Pass']);
			$email = $row["member_Email"];
			
			
			$message = '<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3">
			<tbody>
			
			<tr>
			<td colspan="2" valign="middle" align="left">
			
			<div style="padding:10px; margin:0; border:1px #EA5B0C solid; color:#666666; font-family: Tahoma, Geneva, sans-serif; font-size:14px; -o-border-radius: 5px;
			-ms-border-radius: 5px;
			-webkit-border-radius: 5px;
			-moz-border-radius: 5px;
			-khtml-border-radius: 5px;
			border-radius: 5px;	">
			<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">

			<!-- =============================== Header ====================================== -->         

			

			<tr bgcolor="#FFFFFF">
			<td width="445" colspan="2" align="left" valign="bottom">
			<img src="'.asset_url().'/images/logo2.png" border="0" />
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
			<td align="center"><table width="100%">
			<tr>
			<td colspan="2" align="center"><span style="color:#848383;">'.constant("YourUser-$_SESSION[lang]").'</span></td>
			</tr>
			<tr>
			<td colspan="2" align="center">&nbsp;</td>
			</tr>
			<tr>
			<td width="239" align="right"><span style="color:#848383;">User :</span></td>
			<td width="281" align="left"><span style="color:#848383;">'.$email.'</span></td>
			</tr>
			<tr>
			<td align="right"><span style="color:#848383;">Password :  </span></td>
			<td align="left"><span style="color:#848383;">'.$pass.'</span></td>
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
			<span style="font-weight:bold;">'.constant("College2-$_SESSION[lang]").'</span>
			<br>
			'.constant("Call-$_SESSION[lang]").'. :034-964917, 08-162-12871 , 08-537-90315<br>
			
			E-mail. :drchairit@hotmail.com | weerachet.mangwane79@gmail.com<br>								
			Website :www.logisticjournal.ssru.ac.th<br>
			
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
			$Subject = constant("forgot-$_SESSION[lang]").' logisticjournal.ssru.ac.th';
			
			$this->email->from('noreply@logisticjournal.ssru.ac.th','logisticjournal.ssru.ac.th');
			$this->email->to($email);
			

			$this->email->subject($Subject);
			$this->email->message($message);

			
			if($this->email->send()){
				
			//exit();
				$data_page = array(
					'page' => "home",
					'label' => constant('forgot-'.$_SESSION["lang"]),
					'labeltext' => constant('Success-'.$_SESSION["lang"]),
				);
				
				
				$this->load->view('cwcontrol/modal/front_success',$data_page);
				
				
			}else{
				
				
				$data_page = array(
					'page' => "forgot",
					'label' => constant('forgot-'.$_SESSION["lang"]),
					'labeltext' => constant('Error-'.$_SESSION["lang"]),
				);
				
				$this->load->view('cwcontrol/modal/front_error',$data_page);
				
				
				
			}
			//echo $this->email->print_debugger();
			
			
		}else{
			
			
			$data_page = array(
				'page' => "forgot",
				'label' => constant('forgot-'.$_SESSION["lang"]),
				'labeltext' => constant('Security-'.$_SESSION["lang"]),
			);
			
			
			$this->load->view('cwcontrol/modal/code',$data_page);
			
		}	
		
		
		
	}//function
	
}

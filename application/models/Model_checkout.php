<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_checkout extends CI_Model
{
	function __construct() {

		parent::__construct();
		$this->load->library('cart');
		$this->load->library('session');

		
	}
	
	function paysuccess($ref,$total)
	{
		// echo "<pre>";
		// print_r($total);
		// print_r($_POST);
		// echo $cur = "THB";
		// echo "</pre>";
		if ($this->input->post('sub')) {

			// print_r($_SESSION); die();

			$cur = "THB";


			if (!empty($_POST)) {

				// Insert member detail
				$bankid = $this->input->post('bank_id');
				$obj_bank = $this->db->where('bank_ID',$bankid)->get('tb_bank')->row_array();

				$bank = $obj_bank['bank_name'];
				$uid	= $this->session->userdata('user_id');
				$email = $this->input->post('email');
				$name = $this->input->post('name');
				$tel = $this->input->post('tel');
				
				$poname = $this->db->where('PROVINCE_ID',$_POST['province'])->get('provinces')->row_array();
				$province = $poname['PROVINCE_NAME_TH'];

				$amname = $this->db->where('AMPHUR_ID',$_POST['amphur'])->get('amphures')->row_array();
				$amphur = $amname['AMPHUR_NAME_TH'];

				$dtname = $this->db->where('DISTRICT_ID',$_POST['district'])->get('districts')->row_array();
				$district = $dtname['DISTRICT_NAME_TH'];
				//บ้านเลขที่ ถนน ต. อ. จ. zip 
				$zip = $this->input->post('zip');

				$type = "";
				$des = $this->input->post('des');

				$add = $this->input->post('add')." ต. ".$district." อ. ".$amphur." จ. ".$province." ".$zip;
				//$district = $this->input->post('district');
				$state = $province ;
				

				$insert_id = $this->Model_checkout->add_chkout($uid,$email,$name,$tel,$add,$type,$des,$bank,$district,$state,$zip);
				$in = $this->db->insert_id();

				$sachk_id=$this->session->userdata('sachk_id');
				$this->session->set_userdata('sachk_id',$in);

			}

			// Insert Sales 

			if (!empty($this->cart->contents())) {
				$total_cart = $this->cart->total_items();
				$total_amount = $this->cart->total();
				$ship = "";
				$paypal = "";
				$this->Model_checkout->insertcart($total_cart,$total_amount,$ship,$cur,$paypal);
				$sales_id=$this->db->insert_id();
				//echo $sales_id;
			}

			// Insert Product

			if (!empty($sales_id) && !empty($in)) {
				$this->Model_checkout->insert_prodetail($sales_id,$in,$cur);
				$pro_de_id = $this->db->trans_status();
			}

			// Insert mail 

			if (!empty($this->cart->contents())) {
				$total_cart = $this->cart->total_items();
				$total_amount = $this->cart->total();

				$bcd = $this->db->where('bank_ID',$_POST['bank_id'])->get('tb_bank')->row_array();
				$bank_code = $bcd['bank_number'];
				$bank_accout = $bcd['bank_accout'];
				$bank_name = $bcd['bank_name'];
				$bank_branch = $bcd['bank_branch'];
				$pay = "เลนที่บัญชี ".$bank_code." ธนาคาร ".$bank_accout." สาขา ".$bank_branch." ชื่อบัญชี ".$bank_name;
				$paypal = "";
				$idp= $sales_id;
				// echo $in;echo "<br>";
				// echo $in;echo "<br>";
				// echo $tel;echo "<br>";
				// echo $add;echo "<br>";
				// echo $pay;echo "<br>";
				// die();
				$this->Model_checkout->mail($idp,$tel,$add,$pay);
				//echo $sales_id;
			}

			// if (!empty($sales_id) && !empty($in) && !empty($pro_de_id)) {
			// 	$this->Model_checkout->pay_complete();
			// }


		}


		//print_r($_SESSION); die();



	}

	function paypaypal($ref,$total)
	{
		// echo "<pre>";
		// print_r($total);
		// print_r($_POST);
		// echo "</pre>";
		if ($this->input->post('sub')) {

			//print_r($_SESSION); die();

			$cur = "THB";


			if (!empty($_POST)) {

				// Insert member detail

				$bankid = $this->input->post('bank_id');
				$obj_bank = $this->db->where('bank_ID',$bankid)->get('tb_bank')->row_array();

				$bank = $obj_bank['bank_name'];
				$uid	= $this->session->userdata('user_id');
				$email = $this->input->post('email');
				$name = $this->input->post('name');
				$tel = $this->input->post('tel');
				$poname = $this->db->where('PROVINCE_ID',$_POST['province'])->get('province')->row_array();
				$province = $poname['PROVINCE_NAME'];

				$amname = $this->db->where('AMPHUR_ID',$_POST['amphur'])->get('amphur')->row_array();
				$amphur = $amname['AMPHUR_NAME'];

				$dtname = $this->db->where('DISTRICT_ID',$_POST['district'])->get('district')->row_array();
				$district = $dtname['DISTRICT_NAME'];

				$add = $this->input->post('add');
				$state = $this->input->post('state');
				$zip = $this->input->post('zip');
				
				$type = "";
				$des = $this->input->post('des');

				$insert_id = $this->Model_checkout->add_chkout($uid,$email,$type,$des,$name,$tel,$add,$bank,$district,$state,$zip);
				$in = $this->db->insert_id();

				$sachk_id=$this->session->userdata('sachk_id');
				$this->session->set_userdata('sachk_id',$in);

			}

			// Insert Sales 

			if (!empty($this->cart->contents())) {
				$total_cart = $this->cart->total_items();
				$total_amount = $this->cart->total();
				$ship = "";
				$paypal = 1;
				$this->Model_checkout->insertcart($total_cart,$total_amount,$ship,$cur,$paypal);
				$sales_id=$this->db->insert_id();
				//echo $sales_id;
			}

			if (!empty($sales_id) && !empty($in)) {
				$this->Model_checkout->insert_prodetail($sales_id,$in,$cur);
				$pro_de_id = $this->db->trans_status();
			}

			if (!empty($this->cart->contents())) {
				$total_cart = $this->cart->total_items();
				$total_amount = $this->cart->total();
				$pay = "paypal";
				$idp= $sales_id;
				// echo $in;echo "<br>";
				// echo $in;echo "<br>";
				// echo $tel;echo "<br>";
				// echo $add;echo "<br>";
				// echo $pay;echo "<br>";
				// die();
				$this->Model_checkout->mail($idp,$tel,$add,$pay);
				//echo $sales_id;
			}

			if (!empty($sales_id) && !empty($in) && !empty($pro_de_id)) {

				$sales = $this->db->join('tb_sales_chkout ','sales_id=sachk_sales_id ')->where('sales_id',$sales_id)->get('tb_sales')->row_array();


			// Seller Detail

			$config['business'] 			= $obj_bank['bank_accout']; // อีเมลบัญชีบิสิเนสผู้รับเงิน
			$config['cpp_header_image'] 	= base_url("assets/images/logo1.png"); // รูปที่จะแสดงในหน้าทำธุรกรรม
			$config['return'] 				= site_url("checkout/pay_complete"); // หน้าที่จะแสดงหลังจากทำธุรกรรมเสร็จ
			$config['cancel_return'] 		= site_url("checkout/cancle_order/".$sales['sales_id']); // หน้าที่จะแสดงกรณีกดปุ่มยกเลิก
			$config['notify_url'] 			= site_url("checkout/confirm"); // หน้าที่เราจะใช้รับข้อมูลในกรณีการสั่งซื้อสำเร็จเสร็จสิ้นด้วยดี
			$config['production'] 			= FALSE; // ระบุการทดสอบว่าอยู่ในขั้นตอนพัฒนาหรือใช้งานจริง
			$config["invoice"]				= $sales['sales_inv']; // ระบุเลขที่ใบแจ้งชำระเงิน
			$config["currency_code"]		= $sales['sales_amount_lang']; // ระบุค่าเงินในการทำธุรกรรม


			// Buyer Detail

			$config["first_name"] 		= $sales['sachk_name']; // ชื่อจริงผู้สั่งซื้อ
			$config["last_name"] 		= ''; // นามสกุลผู้สั่งซื้อ
			$config["address1"] 		= $sales['sachk_add']; // ที่อยู่ช่องแรก
			$config["address2"] 		= ''; // ที่อยู่ช่องสอง ถ้ามี
			$config["city"] 			= $sales['sachk_district'];; // เมือง
			$config["state"] 			= $sales['sachk_state'];; // รัฐ
			$config["zip"] 				= $sales['sachk_zip'];; // รหัสไปรษณีย์
			$config["email"] 			= $sales['sachk_email']; // อีเมลผู้สั่งซื้อ
			$config["night_phone_a"] 	= $sales['sachk_tel']; // เบอร์โทร 1
			$config["night_phone_b"] 	= ''; // เบอร์โทร 2


			// Pay

			//print_r($config); die();

			$this->load->library('paypal',$config); // โหลด paypal library มาใช้งานและกำหนดการตั้งค่าใหม่
			$this->paypal->add($sales['sales_inv'],$sales['sales_total_amount'],1); // ระบุชื่อสินค้า จำนวน และราคา
			$this->paypal->pay(); // เริ่มส่งข้อมูลไปให้ paypal เพื่อเริ่มขั้นตอนการชำระเงิน


		}

	}

}


function add_chkout($uid,$email,$name,$type,$des,$tel,$add,$bank,$district,$state,$zip)
{
	$this->db->set('sachk_mem_id',$uid);
	$this->db->set('sachk_email',$email);
	$this->db->set('sachk_name',$name);
	$this->db->set('sachk_tel',$tel);
	$this->db->set('sachk_add',$add);
	$this->db->set('sachk_type',$type);
	$this->db->set('sachk_des',$des);
	$this->db->set('sachk_district',$district);
	$this->db->set('sachk_state',$state);
	$this->db->set('sachk_zip',$zip);
	$this->db->set('sachk_payment',$bank);
	$this->db->insert('tb_sales_chkout'); 

	} // Insert member detail



	function insertcart($total_cart,$total_amount,$ship,$cur,$paypal)
	{


		$reference = "REF".date('Ymd-His');
		$userid	= $this->session->userdata('user_id');
		$this->db->set('sales_buyer_id',$userid);
		$this->db->set('sales_inv',$reference);
		$this->db->set('sales_amount_lang',$cur);
		$this->db->set('sales_total_amount',$total_amount);
		$this->db->set('sales_ship',$ship);
		$this->db->set('sales_total_qty',$total_cart);
		if (!empty($paypal)) {
			$this->db->set('sales_payment',$paypal);
			$this->db->set('sales_pay_status',$paypal);
		}
		$this->db->insert('tb_sales');  
	}  // Insert dales Detail

	function insert_prodetail($sales_id,$in,$cur)
	{
		foreach ($this->cart->contents() as $item) {
			$ip = $_SERVER['REMOTE_ADDR'];

			$data = array(
				'sade_sales_id' => $sales_id,
				'sade_pro_id' => $item['options']['order_proid'],
				'sade_qty' => $item['qty'],
				'sade_price_lang' => $cur,
				'sade_price' => $item['price'],
				'sade_ip' => $ip,

			);

			$this->db->insert('tb_sales_details', $data);

		}

		$this->db->set('sachk_sales_id',$sales_id);
		$this->db->where('sachk_id',$in);
		$this->db->update('tb_sales_chkout');  

	}

	function pay_complete()
	{
		
		//redirect('cart');

		$this->cart->destroy();

		if($this->db->trans_status() === TRUE)
		{
			$data_page = array
			(
				'page' => 'payment',
				'label' => 'Confirm Order',
				'labeltext' => '
				หากท่านไม่ได้รับการแจ้งราคาจัดส่งสินค้ากรุณา ติดต่อที่นี่ 
				หรือโทร. +66(2)-806-6881-6
				E-Mail. info@compacpaint.com'
			);
			$this->load->view('cwcontrol/modal/front_success',$data_page);                          
		}
		else
		{
			$data_page = array
			(
				'page' => 'product',
				'label' => 'Order Fail',
				'labeltext' => 'Please Order again . . '
			);                  
			$this->load->view('cwcontrol/modal/front_error',$data_page);            
		}
	}

	public function cancle_order($id = null) 
	{ 

		//print_r($id); die();
		if(!empty($id)){

			$this->db->where('sales_id', $id);
			$this->db->delete('tb_sales');

			$this->db->where('sachk_sales_id', $id);
			$this->db->delete('tb_sales_chkout');

			$this->db->where('sade_sales_id', $id);
			$this->db->delete('tb_sales_details');

			
		}

		$this->dbutil->optimize_table('tb_sales');

		redirect('checkout');

		
	}//function

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
		redirect('checkout');
	}


	public function mail($idp,$tel,$add,$pay)
	{
		$this->load->library('email');
		$lang = $this->session->lang;
		
		$chk_captcha = "1";

		
		if($chk_captcha){

			
			$config['protocol'] = 'smtp';
			$config['charset'] = 'utf-8';
			$config['smtp_host'] = 'ns1.chinhosting.com';
			$config['smtp_user'] = 'noreply@primamech.com';
			$config['smtp_pass'] = 'cw774411';
			$config['smtp_port'] = 465;
			$config['smtp_crypto'] = 'ssl';
			$config['mailtype'] = 'html';
			

			$this->email->initialize($config);
			
			
			// $sql = "SELECT * FROM tb_sales_chkout WHERE ID = '".$uid."'  ";
			// $query = $this->db->query($sql);
			// $row = $query->row_array();



			// $member_ID = $row["ID"];
			// $member_Name = $row["member_Name"];
			// $pass = base64_decode($row['member_Pass']);
			// $email = $row["member_Email"];
			// echo $idp;echo "<br>";
			// echo $tel;echo "<br>";
			// echo $add;echo "<br>";
			// echo $pay;echo "<br>";
			// die();

			$this->db->join('tb_sales_chkout','sales_id=sachk_sales_id');
			$query = $this->db->get_where('tb_sales', array('sales_id' => $idp));
			$admin = $this->db->get('tb_contact')->row_array();
			// echo $this->db->last_query();

			foreach ($query->result_array() as $row){


				$data["sales"] = array(
					'sales_id' => $row["sales_id"],
					'sales_inv' => $row["sales_inv"],
					'sales_amount_lang' => $row["sales_amount_lang"],
					'sales_total_amount' => $row["sales_total_amount"],
					'sales_ship' => $row["sales_ship"],
					'sales_total_qty' => $row["sales_total_qty"],
					'sales_date' => $row["sales_date"],
					'sachk_name' => $row["sachk_name"],
					'sachk_email' => $row["sachk_email"],
					'sachk_tel' => $row["sachk_tel"],

				);	
				// $add,$bank_code,$bank_accout,$bank_name,$bank_branch
				$member_ID = $row["sales_inv"];
				$member_Name = $row["sachk_name"];
				$total = $row["sales_total_amount"];
				$date = $row["sales_date"];
				$email = $row["sachk_email"];

				// echo $member_ID;echo "<br>";
				// echo $member_Name;echo "<br>";
				// echo $total;echo "<br>";
				// echo $date;echo "<br>";
				// echo $email;echo "<br>";
				// echo $add;echo "<br>";
				// echo $tel;echo "<br>";
				// echo $pay;echo "<br>";
				
				$message = 
				'<table width="100%" border="0" align="center" cellpadding="3" cellspacing="3">
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
				<h1 style="text-align:center; color:#848383; font-size:19px;font-weight:normal;">ขอขอบคุณ คุณ'.$member_Name.' ที่ใช้บริการ</h1>
				</div>
				</div>
				</td>
				</tr>

				<tr><td height="15"> </td></tr>
				<tr>
				<td align="center"><span style="text-align:left; color:#848383;">รายละเอียดการสั่งซื้อและช่องทางชำระเงิน</span></td>
				</tr>
				<tr>
				<td td height="10"></td>
				</tr>
				<tr>
				<td align="center"><span style="text-align:left; color:#848383;">เลขที่บิล '.$member_ID.'</span></td>
				</tr>
				<tr>
				<td td height="10"></td>
				</tr>
				<tr>
				<td align="center"><span style="text-align:left; color:#848383;">ที่อยู่จัดส่ง '.$add.'</span></td>
				</tr>
				<tr>
				<td td height="10"></td>
				</tr>
				<tr>
				<td align="center"><span style="text-align:left; color:#848383;">ชำระค่าบริการที่ '.$pay.'</span></td>
				</tr>
				<tr>
				<td td height="10"></td>
				</tr>
				<tr>
				<td align="center"><span style="text-align:left; color:#848383;">จำนวนเงิน '.$total.' บาท</span></td>
				</tr>
				<tr>
				<td align="center"><span style="text-align:left; color:#848383;">เมื่อท่านชำระเงินเสร็จแล้ว กรุณาแจ้งชำระเงินผ่านระบบสมาชิก</span></td>
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
				<a href="'.base_url('payment').'" style="font-size:16px;text-decoration:none;color:#ffffff;">ยืนยันการชำระเงิน</a>
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
				<span style="font-weight:bold;">'.base_url().'</span>
				<br>
				'.constant("Call-$_SESSION[lang]").'. :'.$admin['contact_Phone'].'<br>

				E-mail. :'.$admin['cus_mail_TH'].'<br>								
				Website :'.base_url().'<br>

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
				$Subject = 'ยืนยันการสั่งซื้อ  '.$admin['cus_mail_TH'].;
				// echo $Subject;echo "<br>";
				// echo $message;echo "<br>";
				// die();

			//$this->email->from('noreply@cba.co.th','cba.co.th');
				

				$this->email->from($admin['contact_Mail']);
				$this->email->to($email,$admin['contact_Mail']);


				$this->email->subject($Subject);
				$this->email->message($message);


				if($this->email->send()){

					$this->Model_checkout->pay_complete();

				}else{
					$this->Model_checkout->pay_complete();
				}
			//echo $this->email->print_debugger();

			}
		}

	}
}
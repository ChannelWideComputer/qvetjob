<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_payment extends CI_Model {

	public function __construct()
	{
		parent::__construct();
			// Your own constructor code
	}
	
	public function sentpayment()
	{
		
		// if(isset($_POST['g-recaptcha-response'])){
		// 	$captcha=$_POST['g-recaptcha-response'];
		// }
		// // $secret = '6LfzDjsUAAAAAPwEoCfmtMaPkZD_jitSCXhfjHuT';
		// $secret = '6LcSEDoUAAAAAD0Otpcw_Jfpte0ymizp4KssM_Mw' ;
		// $url = 'https://www.google.com/recaptcha/api/siteverify';
		// $response = file_get_contents($url."?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);

		// $data = json_decode($response);

		// $chk_captcha = $data->success;

		$chk_captcha = "1";

		if($chk_captcha)
		{	     
		echo $this->input->post('account_ID');     

			$bankid = $this->input->post('account_ID');
			$obj_bank = $this->db->where('bank_ID',$bankid)->get('tb_bank')->row_array();

			

			// print_r($_FILES); die();

			$ref = $this->input->get('id');
			$transfer = $this->input->post('Transfer');
			$bank = "";
			$name = $this->session->userdata('user_Name');
			$date = date('Ymd-His');


			$data = array(
				'pay_sales_id' => $ref,
				'pay_tranfer' => "",
				'pay_name' => $name,
				'pay_time' => $date,
				'pay_bank' => $bank,
			);

			$this->db->insert('tb_payment',$data); 
			$id = $this->db->insert_id();

			if (!empty($_FILES["txbFile"]["name"])) {


				$rename = "PHOTO_payment_" . $ref . date("d-m-Y_Hms");


				$handle = new upload($_FILES["txbFile"]);


				if ($handle->uploaded) {
					$handle->file_new_name_body = $rename;
				// $handle->image_resize = true;
				// $handle->image_ratio_crop = "T";
				// $handle->image_x = '320';
				// $handle->image_y = '320';
					//$handle->image_ratio_y        = true;
					//$handle->jpeg_quality = '100';
					//$handle->image_watermark = '../../class.upload/bg.png';

					$handle->process('assets/upload/payment');
				}

				if ($handle->processed) {
					$photo_name = $handle->file_dst_name;
				}

				$data = array(
					'pay_image' => $photo_name,
				);
				$this->db->where('pay_id', $id);
				$this->db->update('tb_payment', $data);


			}


			$data = array(
				'sales_payment' => '1',
				
			);

			$this->db->where('sales_id', $ref);
			$this->db->update('tb_sales', $data);

			if($this->db->trans_status() === TRUE)
			{
				$data_page = array
				(
					'page' => 'payment',
					'label' => 'Confirm Order',
					'labeltext' => 'Confirm Order'
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



		}else{

			return "code";

		}


	}//function
	

}
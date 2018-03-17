<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_resume extends CI_Model {

	private $type = 'resume';

	public function __construct()
	{
		parent::__construct();
		
	}
	
	// public function get_full() 
	// { 

	// 	$query = $this->db->where('job_Status','1')
	// 	->where('job_Type',$this->type)
	// 	->where('job_cat_id','26')
	// 	->order_by('job_Sort','ASC')
	// 	->get('tb_job');

	// 	//echo $this->db->last_query();


	// 	if($query->num_rows() > 0 ){
	// 		return $query->result_array();

	// 	} else {

	// 		return array();
	// 	}
	// }

	// public function get_intern() 
	// { 

	// 	$query = $this->db->where('job_Status','1')
	// 	->where('job_Type',$this->type)
	// 	->where('job_cat_id','27')
	// 	->order_by('job_Sort','ASC')
	// 	->get('tb_job');

	// 	//echo $this->db->last_query();


	// 	if($query->num_rows() > 0 ){
	// 		return $query->result_array();

	// 	} else {

	// 		return array();
	// 	}
	// }

	public function get_detail($id = null) 
	{ 
		
		if($id){
			$id = $this->db->escape_str($id);	
		}else{
			$id = $this->db->escape_str($this->input->get('id'));
		}
		$query = $this->db->get_where('tb_resume', array('re_ID' => $id));
		
		foreach ($query->result_array() as $row){
			

			$data["job"] = array(
				're_ID' => $row["re_ID"],
				're_name' => $row["re_name"],
				're_phone' => $row["re_phone"],
				're_email' => $row["re_email"],
				're_add' => $row["re_add"],
				're_birthday' => $row["re_birthday"],
				're_age' => $row["re_age"],
				're_status' => $row["re_status"],
				're_height' => $row["re_height"],
				're_weight' => $row["re_weight"],
				're_nationality' => $row["re_nationality"],
				're_religion' => $row["re_religion"],
				're_optradio' => $row["re_optradio"],
				're_odetail' => $row["re_odetail"],
				're_hoptradio' => $row["re_hoptradio"],
				're_hodetail' => $row["re_hodetail"],
				're_place' => $row["re_place"],
				're_gpa' => $row["re_gpa"],
				're_images' => $row["re_images"],
				're_Date' => $row["re_Date"],
			);

			$query2 = $this->db->get_where('tb_re_job', array('re_ID' => $row['re_ID']));


			foreach ($query2->result_array() as $row2){


				$data["job"]["old"][] = array(
					're_job_id' => $row2["re_job_id"],
					're_job_job' => $row2["re_job_job"],
					're_job_place' => $row2["re_job_place"],
					're_job_add' => $row2["re_job_add"],
					're_job_datest' => $row2["re_job_datest"],
					're_job_dateen' => $row2["re_job_dateen"],

				);

			}

		}
		
		
		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		
		//echo $this->db->last_query();
		
		return $data;

	}//function


	public function insert() 
	{ 
		
		$this->load->helper(array('classupload'));
		
		$query = $this->db->get('tb_job');
		$Num_Rows = $query->num_rows();
		$Sort = $Num_Rows+1;

		$data = array(
			'job_Name_TH' => $_POST["job_Name_TH"],
			'job_Name_EN' => $_POST["job_Name_EN"],
			'job_No' => $_POST["job_No"],
			'job_Salary' => $_POST["job_Salary"],
			'job_Condition_TH' => $_POST["job_Condition_TH"],
			'job_Condition_EN' => $_POST["job_Condition_EN"],
			'job_Educa_TH' => $_POST["job_Educa_TH"],
			'job_Educa_EN' => $_POST["job_Educa_EN"],
			'job_Detail_TH' => $_POST["job_Detail_TH"],
			'job_Detail_EN' => $_POST["job_Detail_EN"],
			'job_cat_id' => $_POST["job_cat_id"],	
			'job_Sort' => $Sort,
			'job_Type' => $this->type,

		);
		
		$this->db->insert('tb_job', $data);
		$id = $this->db->insert_id();

		
		
		if (!empty($_FILES["job_Images"]["name"])) {


			$rename = "PHOTO_team_" . date("d-m-Y_Hms");


			$handle = new upload($_FILES["job_Images"]);


			if ($handle->uploaded) {
				$handle->file_new_name_body = $rename;
				$handle->image_resize = true;
				$handle->image_ratio_crop = "T";
				$handle->image_x = '305';
				$handle->image_y = '75';
					//$handle->image_ratio_y        = true;
					//$handle->jpeg_quality = '100';
					//$handle->image_watermark = '../../class.upload/bg.png';

				$handle->process('assets/upload/job');
			}

			if ($handle->processed) {
				$photo_name = $handle->file_dst_name;
			}

			$data = array(
				'job_Images' => $photo_name,
			);
			$this->db->where('job_ID', $id);
			$this->db->update('tb_job', $data);

			
		}


		$files2 = array();
		foreach ($_FILES['job_file_TH'] as $k2 => $l2)
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
				$handle->process('assets/upload/job/file');
				$image_name_thumb =  $handle->file_dst_name ; 


				if ($handle->processed) {
					
					$data = array(
						'file_Title_TH' => $_POST["file_Title_TH"][$key],
						'file_Name' => $image_name_thumb,
						'file_Type' => $ext[1],
						'file_Size' => $file2["size"],
						'file_job_ID' => $id,
					);
					$this->db->insert('tb_file', $data);			
					
					
				}

			}
			
			$key--;
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
		$this->load->helper(array('classupload'));
		
		$id = $this->db->escape_str($this->input->post('id'));

		$data = array(
			'job_Name_TH' => $_POST["job_Name_TH"],
			'job_Name_EN' => $_POST["job_Name_EN"],
			'job_No' => $_POST["job_No"],
			'job_Salary' => $_POST["job_Salary"],
			'job_Condition_TH' => $_POST["job_Condition_TH"],
			'job_Condition_EN' => $_POST["job_Condition_EN"],
			'job_Educa_TH' => $_POST["job_Educa_TH"],
			'job_Educa_EN' => $_POST["job_Educa_EN"],
			'job_Detail_TH' => $_POST["job_Detail_TH"],
			'job_Detail_EN' => $_POST["job_Detail_EN"],
			'job_cat_id' => $_POST["job_cat_id"],			
		);
		
		$this->db->where('job_ID', $id);
		$this->db->set('job_Update', 'NOW()', FALSE);
		$this->db->update('tb_job', $data);


		if (!empty($_FILES["job_Images"]["name"])) {


			$rename = "PHOTO_team_" . date("d-m-Y_Hms");


			$handle = new upload($_FILES["job_Images"]);


			if ($handle->uploaded) {
				$handle->file_new_name_body = $rename;
				$handle->image_resize = true;
				$handle->image_ratio_crop = "T";
				$handle->image_x = '305';
				$handle->image_y = '75';
					//$handle->image_ratio_y        = true;
				//$handle->jpeg_quality = '100';
					//$handle->image_watermark = '../../class.upload/bg.png';

				$handle->process('assets/upload/job');
			}

			if ($handle->processed) {
				$photo_name = $handle->file_dst_name;
				
				$data = array(
					'job_Images' => $photo_name,
				);
				$this->db->where('job_ID', $id);
				$this->db->update('tb_job', $data);

				unlink("assets/upload/job/$_POST[job_Images]");
			}
			
		}

		$files2 = array();
		foreach ($_FILES['job_file_TH'] as $k2 => $l2)
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
				$handle->process('assets/upload/job/file');
				$image_name_thumb =  $handle->file_dst_name ; 


				if ($handle->processed) {
					
					$data = array(
						'file_Title_TH' => $_POST["file_Title_TH"][$key],
						'file_Name' => $image_name_thumb,
						'file_Type' => $ext[1],
						'file_Size' => $file2["size"],
						'file_job_ID' => $id,
					);
					$this->db->insert('tb_file', $data);			
					
					
				}

			}
			
			$key--;
		}



		
		if($this->db->trans_status() === TRUE)
		{

			return TRUE;

		}else{
			
			return FALSE;

		}

	}

	public function get_all($page_url) 
	{ 
		$rows_per_page = 15;
		$current_page = 1;
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
		
		// $this->db->start_cache();
		// $this->db->where('job_Type', $this->type);
		$this->db->group_start();
		$this->db->like('re_name', $word)->or_like('re_name', $word);
		$this->db->group_end();
		// $this->db->order_by('job_Sort', 'ASC');
		// $this->db->stop_cache();

		$query = $this->db->get('tb_resume');

		
		$Num_Rows = $query->num_rows();
		$total_pages = paging_total_pages($Num_Rows, $rows_per_page);
		$page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url);

		$this->db->limit($rows_per_page, $start_row);
		$query = $this->db->get('tb_resume');
		$this->db->flush_cache();


		if($Num_Rows > 0 ) {
			$data["team"] = $query->result_array();
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
		echo "</pre>";*/
		
		//echo $this->db->last_query();
		
		return $data;
		
	}//function

	public function delete() 
	{ 
		

		if($this->input->post('id')!=""){

			$id = $this->db->escape_str($this->input->post('id'));

			$query = $this->db->get_where('tb_resume', array('re_ID' => $id));
			$row = $query->row_array();
			unlink("assets/upload/resume/$row[re_images]");
			$this->db->update('tb_resume');
			
			
			$tables = array('tb_resume');
			$this->db->where('re_ID', $id);
			$this->db->delete($tables);
			$this->dbutil->optimize_table('tb_resume');
			
			
			
			
			
		}
		

		
		
	}//function

	public function download($id = null)
	{
		
		$id   = $this->db->escape_str($id);
		
		
		$sql = "SELECT * FROM tb_file WHERE file_ID = '".$id."' ";
		$query = $this->db->query($sql);		
		$row = $query->row_array();
		
		
		$path="assets/upload/job/file/".$row["file_Name"]; 
		//$name=$row["file_Title_".$this->session->lang].".".$row["file_Type"]; 
		$name=$row["file_Title_TH"].".".$row["file_Type"]; 

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
	
	
	public function delete_All() 
	{ 
		
		for($i=0;$i<count($_POST["id"]);$i++)
		{	
			if($this->input->post('id')[$i]!=""){

				$id = $this->db->escape_str($this->input->post('id')[$i]);
				
				
				$query = $this->db->get_where('tb_resume', array('re_ID' => $id));
				$row = $query->row_array();
				unlink("assets/upload/resume/$row[re_images]");
				$this->db->update('tb_resume');


				
				$this->db->where('re_ID', $id);
				$this->db->delete('tb_resume');
				
			}

		}
		
		$this->dbutil->optimize_table('tb_resume');

		
		
	}//function
	

	public function sent()
	{
		
		$this->load->library('email');

		$this->load->helper(array('classupload'));
		
		if(isset($_POST['g-recaptcha-response'])){
			$captcha=$_POST['g-recaptcha-response'];
		}

		$secret = '6LdKizQUAAAAANK_U7SYlLkG3HzNZu0fogvWpWAc';
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$response = file_get_contents($url."?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);

		$data = json_decode($response);

		$chk_captcha = "1";

		if($chk_captcha)
		{	   
			
			

			

			$district = $this->db->where('DISTRICT_ID',$_POST['district'])->get('districts')->row_array();
			$amphures = $this->db->where('AMPHUR_ID',$_POST['amphur'])->get('amphures')->row_array();
			$provinces = $this->db->where('PROVINCE_ID',$_POST['province'])->get('provinces')->row_array();

			$re_name = $_POST['title']." ". $_POST['name'];
			$re_add = $district['DISTRICT_NAME_TH']." ". $amphures['AMPHUR_NAME_TH']." ". $provinces['PROVINCE_NAME_TH'];



			$data = array(
				're_name' => $re_name,
				're_phone' => $_POST['phone'],
				're_email' => $_POST['email'],
				're_add' => $re_add,
				're_birthday' => $_POST['birthday'],
				're_age' => $_POST['age'],
				're_status' => $_POST['status'],
				're_height' => $_POST['height'],
				're_weight' => $_POST['weight'],
				're_nationality' => $_POST['nationality'],
				're_religion' => $_POST['religion'],
				're_optradio' => $_POST['optradio'],
				're_odetail' => @$_POST['odetail'],
				're_place' => $_POST['place'],
				're_gpa' => $_POST['gpa'],

			);
			if (isset($_POST['hoptradio'])) {
				$data =array(
					're_hoptradio' => @$_POST['hoptradio'],
					're_hodetail' => @$_POST['hodetail'],
				);

			}

			// echo "<pre>";
			// print_r($data);
			// print_r($_POST);
			// echo "</pre>";
			// die();
			$this->db->insert('tb_resume', $data);
			$id = $this->db->insert_id();


			if (isset($_POST['job'])) {
				foreach ($_POST['job'] as  $job){
					$add = $this->db->where('PROVINCE_ID',$job['add'])->get('provinces')->row_array();
					$data = array(

						're_job_job' => $job['job'],
						're_job_place' => $job['place'],
						're_job_add' => $add['PROVINCE_NAME_TH'],
						're_job_datest' => $job['datest'],
						're_job_dateen' => $job['dateen'],
						're_id' => $id,
					);
				// echo "<pre>";
				// print_r($data);
				// echo "</pre>";
				// die();

					$this->db->insert('tb_re_job', $data);
				}

			}


			if (isset($_FILES["re_images"]["name"])) {


				$rename = "PHOTO_resume_" . date("d-m-Y_Hms");


				$handle = new upload($_FILES["re_images"]);


				if ($handle->uploaded) {
					$handle->file_new_name_body = $rename;
					$handle->image_resize = true;
					$handle->image_ratio_crop = true;
					$handle->image_x = '202';
					$handle->image_y = '214';
				//$handle->image_ratio_y        = true;
					$handle->jpeg_quality = '100';
					//$handle->image_watermark = '../../class.upload/bg.png';

					$handle->process('assets/upload/resume');
				}

				if ($handle->processed) {
					$photo_name = $handle->file_dst_name;
				}

				$data = array(
					're_images' => $photo_name,
				);
				$this->db->where('re_id', $id);
				$this->db->update('tb_resume', $data);


			}

			if($this->db->trans_status() === TRUE)
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
	        
	        // echo asset_url().'upload/resume/'.$rename;
	        $strSubject = 'ประวัติ สมัครงาน ของ'.$re_name;
	        $strMessage = "";
	        $strMessage .= '<div class="row">



	        <div class="col-lg-5 col-md-5 col-sm-6">
	        <div style="text-align:left; margin-bottom:10px;">
	        <img src="'.asset_url().'upload/resume/'.$rename.' border="0" />
	        </div>

	        </div>


	        <div class="col-lg-7 col-md-7 col-sm-6">
	        <div class="row">
	        <div class="col-md-4">
	        <div class="form-group">
	        <label for="email">
	        ชื่อ-นามสกุล : '.$re_name.'
	        </label>
	        </div>
	        </div>

	        <div class="col-md-12">
	        <div class="form-group">
	        <label for="email">
	        เบอร์โทรติดต่อ :'.$_POST['phone'].'
	        </label>
	        </div>
	        </div>

	        <div class="col-md-12">
	        <div class="form-group">
	        <label for="email">
	        E-mail :'.$_POST['email'].'
	        </label>
	        </div>
	        </div>

	        </div>
	        </div>

	        <div class="clearfix"></div>

	        <div class="col-lg-12">
	        <div class="form-group">
	        <label for="email">
	        ที่อยู่ : '.$re_add.'
	        </label>
	        </div>
	        </div>


	        <div class="col-md-6">
	        <div class="form-group">
	        <label for="email">
	        วัน/เดือน/ปีเกิด : '.$_POST['birthday'].'
	        </label>
	        </div>
	        </div>

	        <div class="col-md-6">
	        <div class="form-group">
	        <label for="email">
	        อายุ : '.$_POST['age'].'
	        </label>
	        </div>
	        </div>

	        <div class="col-md-6">
	        <div class="form-group">
	        <label for="email">
	        สถานะสมรส : '.$_POST['status'].'
	        </label>
	        </div>
	        </div>


	        <div class="col-md-6">
	        <div class="form-group">
	        <label for="email">
	        ส่วนสูง : '.$_POST['height'].'
	        </label>
	        </div>
	        </div>

	        <div class="col-md-6">
	        <div class="form-group">
	        <label for="email">
	        น้ำหนัก : '.$_POST['weight'].'
	        </label>
	        </div>
	        </div>

	        <div class="col-md-6">
	        <div class="form-group">
	        <label for="email">
	        สัญชาติ : '.$_POST['nationality'].'
	        </label>
	        </div>
	        </div>

	        <div class="col-md-6">
	        <div class="form-group">
	        <label for="email">
	        ศาสนา : '.$_POST['religion'].'
	        </label>
	        </div>
	        </div>


	        <div class="col-lg-12">
	        <label for="email">
	        การศึกษา <span class="red" style="font-size: 20px;">*</span>
	        </label><br>
	        <label for="email">
	        ระดับการศึกษา : '.$_POST['optradio'].'
	        </label>
	        </div>

	        <div class="col-md-6">
	        <div class="form-group">
	        <label for="email">
	        ชื่อสถานศึกษา : '.$_POST['place'].'
	        </label>
	        </div>
	        </div>

	        <div class="col-md-6">
	        <div class="form-group">
	        <label for="email">
	        เกรดเฉลี่ย (GPA.) : '.$_POST['gpa'].'
	        </label>
	        </div>
	        </div>

	        <div class="clearfix"></div>
	        <br>
	        <div class="col-md-12">
	        <div class="form-group">
	        <label for="email">
	        <h4>ประสบการณ์การทำงานของท่าน </h4>
	        
	        </label>
	        </div>
	        </div>
	        </div>';
	        foreach (@$_POST['job'] as  $job){
	        	@$add = $this->db->where('PROVINCE_ID',$job['add'])->get('provinces')->row_array(); 
	        	$strMessage .= '	<div class="col-lg-4 col-md-4 col-sm-12">
	        	<div class="form-group">
	        	<label for="email">
	        	อาชีพ : '.$job['job'] .'
	        	</label>
	        	</div>
	        	
	        	<div class="form-group">
	        	สถานที่ : '.$job['place'] .' จังหวัด : '.$add['PROVINCE_NAME_TH'] .'
	        	</div>

	        	<div class="col-lg-6 col-md-6 col-sm-12">
	        	<div class="form-group">
	        	<label for="email">
	        	เริ่ม : '.$job['datest'] .' ถึง : '.$job['dateen'] .'
	        	</label>
	        	</div>
	        	
	        	</div>';
	        } 


	        // echo $re_name;
	        // echo $re_add;
	        // echo $_POST['email'].','.$row["contact_Mail"];
	        // print_r($strMessage) ;

	        // echo $row["contact_Mail"].'-'.$strSubject.'-'.$_POST["email"];
	        // die();


	        $this->email->from($_POST["email"],$strSubject);
	// $this->email->to($row["cus_mail_TH"]);
	        $this->email->to($row["contact_Mail"],$_POST['email']);
	// $this->email->to('keereetoo@gmail.com');
	        $this->email->subject($strSubject);
	        $this->email->message($strMessage);
	//echo $this->email->print_debugger();

	        if($this->email->send()){

	        	return TRUE;


	        }else{


	        	return FALSE;

	        }


	    }



	}else{

		return "code";

	}


}//function





}
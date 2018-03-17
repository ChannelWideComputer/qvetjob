<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_order extends CI_Model {
	
	
	
	public function __construct()
	{
		parent::__construct();			
		$this->load->dbutil();
		$this->load->helper(array('classupload'));

	}
	
	
	public function get_all($rows_per_page,$page_url) 
	{ 
		
		//print_r($_GET); die();
		$current_page = 1;
		$rows_per_page = $rows_per_page;
		$page_range = 5;
		$qry_string = "";
		$pagetype = 0;
		$salepay = "sales_pay_status";


		if($this->input->get_post('page')) {
			$current_page = $this->input->get_post('page');
		}
		if($this->input->get('status') == "confirm")
		{
			$pagetype = "0";
			$salepay = "sales_pay_status !=";
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
		$this->db->join('tb_sales_chkout','sales_id=sachk_sales_id');
		$this->db->group_start();
		$this->db->like('sales_inv', $word)->or_like('sales_buyer_id', $word);
		$this->db->group_end();
		$this->db->where($salepay , $pagetype);
		$this->db->order_by('sales_date', 'DESC');
		$this->db->stop_cache();

		$query = $this->db->get('tb_sales');

		//echo $this->db->last_query(); die();
		
		$Num_Rows = $query->num_rows();
		$total_pages = paging_total_pages($Num_Rows, $rows_per_page);
		$page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url);



		$this->db->limit($rows_per_page, $start_row);
		$query = $this->db->select('sales_id,sales_inv,sales_amount_lang,sales_total_amount,sales_ship,sales_total_qty,sales_date,sales_pay_status,sachk_name,sales_payment,sales_pay_status')->get('tb_sales');
		$this->db->flush_cache();


		if($Num_Rows > 0 ) {
			$data["order"] = $query->result_array();
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
		
		//echo $this->db->last_query(); die();
		
		return $data;
		
	}//function

	public function get_detail_query($id)
	{
		$query = $this->db->get_where('tb_payment', array('pay_sales_id' => $id));
		return $query->result();
	}
	
	
	
	public function get_detail($id = null) 
	{ 
		
		if($id){
			$id = $this->db->escape_str($id);	
		}else{
			$id = $this->db->escape_str($this->input->get('id'));
		}

		
		$this->db->join('tb_sales_chkout','sales_id=sachk_sales_id');
		$query = $this->db->get_where('tb_sales', array('sales_id' => $id));

		// echo $this->db->last_query(); die();
		
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
				'sachk_add' => $row["sachk_add"],
				'sachk_district' => $row["sachk_district"],
				'sachk_state' => $row["sachk_state"],
				'sachk_des' => $row["sachk_des"],
				'sachk_zip' => $row["sachk_zip"],
				'sales_pay_status' => $row["sales_pay_status"],

			);	


			$this->db->join('tb_product','sade_pro_id=product_ID');
			$this->db->where('sade_sales_id', $row["sales_id"]);
			$query2 = $this->db->get('tb_sales_details');

			// echo $this->db->last_query(); die();
			
			foreach ($query2->result_array() as $row2){
				
				$data["sales"]["sales_detail"][] = array(
					'sade_id' => $row2["sade_id"],
					'sade_qty' => $row2["sade_qty"],
					'sade_price_lang' => $row2["sade_price_lang"],
					'sade_price' => $row2["sade_price"],
					'product_Name_TH' => $row2["product_Name_TH"],
					'product_Images' => $row2["product_Images"],

				);

			}


			$this->db->where('pay_sales_id', $row["sales_id"]);
			$query3 = $this->db->get('tb_payment');

			//echo $this->db->last_query(); die();
			
			foreach ($query3->result_array() as $row3){
				
				$data["sales"]["pay_detail"][] = array(
					'pay_tranfer' => $row3["pay_tranfer"],
					'pay_time' => $row3["pay_time"],
					'pay_bank' => $row3["pay_bank"],
					'pay_image' => $row3["pay_image"],

				);

			}
			
			
		}
		
		
		//echo "<pre>"; print_r($data); echo "</pre>";
		
		//echo $this->db->last_query();
		
		return $data;

	}//function
	
	
	
	public function insert() 
	{ 
		
		
		$data = array(
			'member_Name' => $_POST["member_Name"],
			'member_Add' => str_replace("\n", "<br>\n", $_POST["member_Add"]),
			'member_Phone' => $_POST["member_Phone"],
			'member_Pass' => base64_encode($_POST["member_Pass"]),
			'member_Email' => $_POST["member_Email"],
			'member_Status' => '1',
			'member_Active' => 'yes',

		);

		$this->db->insert('tb_sales', $data);
		$id = $this->db->insert_id();
		
		
		
		//exit();
		//echo $this->db->last_query();
		if($this->db->trans_status() === TRUE)
		{

			return TRUE;

		}else{
			
			return FALSE;


		}
		
	}//function


	public function update_payment() 
	{ 
		
		$id = $this->db->escape_str($this->input->post('id'));
		$data = array(
			'sales_pay_status' => '1',

		);

		$this->db->where('sales_id', $id);
		$this->db->update('tb_sales', $data);
		
		
		//echo $this->db->last_query();
		if($this->db->trans_status() === TRUE)
		{

			return TRUE;

		}else{
			
			return FALSE;


		}


	}//function

	
	public function delete() 
	{ 
		

		if($this->input->post('id')!=""){

			$id = $this->db->escape_str($this->input->post('id'));	
			
			$this->db->where('sales_id', $id);
			$this->db->delete('tb_sales');

			$this->db->where('sachk_sales_id', $id);
			$this->db->delete('tb_sales_chkout');

			$this->db->where('sade_sales_id', $id);
			$this->db->delete('tb_sales_details');

			

		}

		$this->dbutil->optimize_table('tb_sales');

		
	}//function
	
	
	public function delete_All() 
	{ 
		
		for($i=0;$i<count($_POST["id"]);$i++)
		{	
			if($this->input->post('id')[$i]!=""){

				$id = $this->db->escape_str($this->input->post('id')[$i]);
				
				$this->db->where('sales_id', $id);
				$this->db->delete('tb_sales');

				$this->db->where('sachk_sales_id', $id);
				$this->db->delete('tb_sales_chkout');

				$this->db->where('sade_sales_id', $id);
				$this->db->delete('tb_sales_details');

			}

		}
		
		
		$this->dbutil->optimize_table('tb_sales');

		
		
	}//function
	
	public function chk_mail() 
	{ 

		$Email = $this->db->escape_str($this->input->post('member_Email'));
		$query = $this->db->get_where('tb_sales', array('member_Email' => $Email));

		if(!$row = $query->row_array()){
			echo "n";
		}
	}
	
	
	
	
	public function status() 
	{ 
				
		if($this->input->post('id')!=""){

			$id = $this->db->escape_str($this->input->post('id'));
			
			$query = $this->db->get_where('tb_sales', array('sales_id' => $id));
			$row = $query->row_array();

			$data = array(
				'sales_pay_status' => $_POST["value"],
			);
			$this->db->where('sales_id', $id);
			$this->db->update('tb_sales', $data);

		}
		
		
		
	}//function
	
	
	
	

}
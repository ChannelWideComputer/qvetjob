<?php
class Excel_export_model extends CI_Model
{
	function fetch_data()
	{
		$this->db->order_by("sachk_id", "DESC");
		$query = $this->db->get("tb_sales_chkout");
		return $query->result();
	}

	function get_detail() 
	{ 
		
		$this->db->join('tb_sales_chkout','sales_id=sachk_sales_id');
		$this->db->where('tb_sales.sales_pay_status != 0');
		$query = $this->db->get('tb_sales');

		// echo $this->db->last_query(); die();

		return $query->result();

	}

	function sale_M() 
	{ 
		
		$time = date('m');
		// $this->db->select('MONTH(sales_date)');
		$this->db->join('tb_sales_chkout','sales_id=sachk_sales_id');
		// $this->db->where('tb_sales.sales_pay_status != 0');
		$this->db->where('MONTH(sales_date)',$time);
		// $this->db->where("news_Sort Between '$old_sort' and '$new_sort'")
		// $this->db->group_by('tb_sales.sales_date');
		$query = $this->db->get('tb_sales');

		// echo $this->db->last_query(); die();

		return $query->result();

	}

	function sale_Y() 
	{ 
		
		$time = date('Y');
		// $this->db->select('YEAR(sales_date)');
		$this->db->join('tb_sales_chkout','sales_id=sachk_sales_id');

		// $this->db->where('tb_sales.sales_pay_status != 0');;
		$this->db->where('YEAR(sales_date)',$time);
		// $this->db->group_by('sales_date');
		$query = $this->db->get('tb_sales')->result();
		// echo "<pre>";
		// print_r($query);
		// echo "</pre>";
		// echo $this->db->last_query(); die();

		return $query;

	}

}

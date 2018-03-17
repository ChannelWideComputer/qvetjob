<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_subscribe extends CI_Model {
	
	private $type = 'subscribe';
	
	public function __construct()
	{
		parent::__construct();			
		$this->load->dbutil();
		$this->load->helper(array('classupload'));
		
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

		$query = $this->db->where('subscribe_Type', $this->type)
		->group_start()
		->like('subscribe_Email', $word)
		->group_end()
		->get('tb_subscribe');
		
		$Num_Rows = $query->num_rows();
		$total_pages = paging_total_pages($Num_Rows, $rows_per_page);
		$page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url);

		$query = $this->db->where('subscribe_Type', $this->type)
		->group_start()
		->like('subscribe_Email', $word)
		->group_end()
		->order_by('subscribe_Date', 'DESC')->limit($rows_per_page, $start_row)->get('tb_subscribe');


		if($Num_Rows > 0 ) {
			$data["subscribe"] = $query->result_array();
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
	
	public function get_home($home = null) 
	{ 
		if($home){
			$this->db->where('subscribe_Home', 1);
			$data = $this->db->where('subscribe_Type', $this->type)->where('subscribe_Status', 1)->order_by('subscribe_Sort', 'ASC')->get('tb_subscribe')->result_array();
			
		}else{
			
			
			$rows_per_page = 5;
			$current_page = 1;
			$page_range = 5;
			$qry_string = "";
			$page_url = base_url('subscribe');
			
			if($this->input->get_post('page')) {
				$current_page = $this->input->get_post('page');
			}
			
			
			
			$start_row = paging_start_row($current_page, $rows_per_page);
			
			$this->db->start_cache();			
			$this->db->where('subscribe_Type', $this->type);
			$this->db->where('subscribe_Status', 1);
			$this->db->order_by('subscribe_Sort', 'ASC');
			$this->db->stop_cache();
			
			$query = $this->db->get('tb_subscribe');
			
			
			$Num_Rows = $query->num_rows();
			$total_pages = paging_total_pages($Num_Rows, $rows_per_page);
			
			$themePaging["next"]='&raquo';
			$themePaging["prev"]='&laquo';
			$themePaging["theme"]='<li class="{{active}}"><a href="{{link}}">{{str_page}}</a></li>';
			
			$page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url,$themePaging);
			
			$this->db->limit($rows_per_page, $start_row);
			$query = $this->db->get('tb_subscribe');
			$this->db->flush_cache();
			
			//echo $this->db->last_query();
			

			if($Num_Rows > 0 ) {
				$data["subscribe"] = $query->result_array();
			}



			if($Num_Rows > $rows_per_page){
				$data["page_str"] = $page_str;

			}
			
			
		}
		
		
		return $data;
	}
	
	public function detail($id)
	{
		
		$id = $this->db->escape_str($id);
		
		$sql = "SELECT * FROM tb_subscribe WHERE subscribe_ID =".$id;
		$subscribe = $this->db->query($sql)->result_array();
		$data['subscribe'] = $subscribe;
		
		$sql = "SELECT * FROM tb_subscribe_gallery WHERE subscribe_ID =".$id;
		$subscribe = $this->db->query($sql)->result_array();
		$data['gallery'] = $subscribe;
		
		return ($data);
		
	}
	
	public function get_detail($id = null) 
	{ 
		
		if($id){
			$id = $this->db->escape_str($id);	
		}else{
			$id = $this->db->escape_str($this->input->get('id'));
		}
		$query = $this->db->get_where('tb_subscribe', array('subscribe_ID' => $id));
		
		
		
		foreach ($query->result_array() as $row){
			
			
			$data["subscribe"] = array(
				'subscribe_ID' => $row["subscribe_ID"],
				'subscribe_Email' => $row["subscribe_Email"],
			);
			
			$data["title"] = $row["subscribe_Email"];
			
		}
		
		
		/*echo "<pre>";
		print_r($data);
		echo "</pre>";*/
		
		//echo $this->db->last_query();
		
		return $data;
		
	}//function
	
	
	
	public function insert() 
	{ 
		
		
		
		$query = $this->db->where('subscribe_Type', $this->type)->get('tb_subscribe');
		$Num_Rows = $query->num_rows();
		$Sort = $Num_Rows+1;

		$data = array(
			'subscribe_Email' => $_POST["subscribe_Email"],	
			'subscribe_Sort' => $Sort,
			'subscribe_Type' => $this->type,			

			
		);
		
		$this->db->insert('tb_subscribe', $data);
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
	
	public function update() 
	{ 
		
		$id = $this->db->escape_str($this->input->post('id'));
		$data = array(
			'subscribe_Email' => $_POST["subscribe_Email"],				


		);

		$this->db->where('subscribe_ID', $id);
		$this->db->set('subscribe_Date', 'NOW()', FALSE);
		$this->db->update('tb_subscribe', $data);	
		
		
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

			
			$this->db->set('subscribe_Sort', 'subscribe_Sort-1', FALSE);
			$this->db->where("subscribe_Sort > '$row[subscribe_Sort]' ");
			$this->db->where('subscribe_Type', $this->type);
			$this->db->update('tb_subscribe');


			
			$this->db->where('subscribe_ID', $id);
			$this->db->delete('tb_subscribe');
			
			$this->dbutil->optimize_table('tb_subscribe');
			//$this->dbutil->optimize_table('tb_subscribe_gallery');

			//echo $this->db->last_query();

		}

		
		
		
		
	}//function
	
	
	public function delete_All() 
	{ 
		
		for($i=0;$i<count($_POST["id"]);$i++)
		{	
			if($this->input->post('id')[$i]!=""){

				$id = $this->db->escape_str($this->input->post('id')[$i]);

				
				$this->db->set('subscribe_Sort', 'subscribe_Sort-1', FALSE);
				$this->db->where("subscribe_Sort > '$row[subscribe_Sort]' ");
				$this->db->where('subscribe_Type', $this->type);
				$this->db->update('tb_subscribe');


				
				$this->db->where('subscribe_ID', $id);
				$this->db->delete('tb_subscribe');
				


			}
			
		}
		
		
				//$this->dbutil->optimize_table('tb_news');
				//$this->dbutil->optimize_table('tb_news_gallery');
		
		
	}//function
	
	
	public function status() 
	{ 
		
		if($this->input->post('id')!=""){

			$id = $this->db->escape_str($this->input->post('id'));
			
			$query = $this->db->get_where('tb_subscribe', array('subscribe_ID' => $id));
			$row = $query->row_array();
			if($row["subscribe_Status"] == 1){
				$Status = 0;
			}else{
				$Status = 1;
			}
			
			
			$data = array(
				'subscribe_Status' => $Status,
			);
			$this->db->where('subscribe_ID', $id);
			$this->db->update('tb_subscribe', $data);

		}
		
		
		
	}//function
	
	
	public function home() 
	{ 
		
		if($this->input->post('id')!=""){

			$id = $this->db->escape_str($this->input->post('id'));
			
			$query = $this->db->where('subscribe_Type', $this->type)->where('subscribe_Home', 1)->get('tb_subscribe');
			$Num_Rows = $query->num_rows();
			
			if($Num_Rows < 5){
				
				$query = $this->db->get_where('tb_subscribe', array('subscribe_ID' => $id));
				$row = $query->row_array();
				if($row["subscribe_Home"] == 1){
					$Home = 0;
				}else{
					$Home = 1;
				}

				$data = array(
					'subscribe_Home' => $Home,
				);
				$this->db->where('subscribe_ID', $id);
				$this->db->update('tb_subscribe', $data);
				
				
				
			}else{

				$data = array(
					'subscribe_Home' => '0',
				);
				$this->db->where('subscribe_ID', $id);
				$this->db->update('tb_subscribe', $data);


			}

			
		}
		
		
		
	}//function
	
	
	public function Sort() 
	{ 
		
		$id = $this->db->escape_str($this->input->post('id'));
		
		$query = $this->db->get_where('tb_subscribe', array('subscribe_ID' => $id));
		$row = $query->row_array();
		
		$old_sort = $row["subscribe_Sort"];
		$new_sort = $_POST["value"];
		
		if($new_sort > $old_sort){ 
			
			$this->db->set('subscribe_Sort', 'subscribe_Sort-1', FALSE);
			$this->db->where("subscribe_Sort Between '$old_sort' and '$subscribe_Sort' AND subscribe_Type = '$this->type' AND subscribe_ID != '$id' ");
			$this->db->update('tb_subscribe');
			
		}else{
			
			$this->db->set('subscribe_Sort', 'subscribe_Sort+1', FALSE);
			$this->db->where("subscribe_Sort Between '$subscribe_Sort' and '$old_sort' AND subscribe_Type = '$this->type' AND subscribe_ID != '$id' ");
			$this->db->update('tb_subscribe');
			
		}
		
		$data = array(
			'subscribe_Sort' => $_POST["value"],
		);
		$this->db->where('subscribe_ID', $id);
		$this->db->update('tb_subscribe', $data);
		
		
	}//function
	
	
	
	
	
	
	

}
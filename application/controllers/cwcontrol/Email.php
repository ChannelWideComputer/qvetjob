<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {
	
	protected $default_page = 'email';
	
	public function __construct()
	{
		parent::__construct();		
		if(!isset($_SESSION["user_username"])){
			
			redirect('cwcontrol');  

		}
		
		$this->load->dbutil();
		
	}

	
	public function index()
	{	
		
			
			
			$page_url = base_url('cwcontrol/'.$this->default_page);
		
			$current_page = 1;
			$rows_per_page = 15;
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

			$this->db->start_cache();
			$this->db->group_start();
			$this->db->like('Email', $word);
			$this->db->group_end();
			$this->db->order_by('Add_Date', 'DESC');
			$this->db->stop_cache();
			
			$query = $this->db->get('tb_email');
		
			$Num_Rows = $query->num_rows();
			$total_pages = paging_total_pages($Num_Rows, $rows_per_page);
			$page_str = paging_pagenum($current_page, $total_pages, $page_range, $qry_string, $page_url);

			
			
			$this->db->limit($rows_per_page, $start_row);
			$query = $this->db->get('tb_email');
			$this->db->flush_cache();


			if($Num_Rows > 0 ) {
			 $data["email"] = $query->result_array();
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
			
			$data['page_url'] = $page_url;
			$data['page'] = $this->default_page;
			
		
		$this->load->view('cwcontrol/pages/'.$this->default_page.'/index',$data);
		
	}
	
	
	
	
	public function delete()
	{	
		
		if($this->input->post('id')!=""){
				
			$id = $this->db->escape_str($this->input->post('id'));
			
			
			$tables = array('tb_email');
			$this->db->where('ID', $id);
			$this->db->delete($tables);
			$this->dbutil->optimize_table('tb_email');
			
			
			
		}
		
	}
	
	public function delete_All()
	{	
		
		for($i=0;$i<count($_POST["id"]);$i++)
		{	
			if($this->input->post('id')[$i]!=""){

				$id = $this->db->escape_str($this->input->post('id')[$i]);
				
								
				$this->db->where('ID', $id);
				$this->db->delete('tb_email');
				


			}
		
		}
		
		
				$this->dbutil->optimize_table('tb_email');
		
	}
	
	
	
	
	
}

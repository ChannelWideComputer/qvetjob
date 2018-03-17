<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    protected $default_page = 'admin';

    public function __construct()
    {
        parent::__construct();
        if (! isset($_SESSION["user_username"])) {
            
            redirect('cwcontrol');
        }
        $this->load->model('Model_product');
    }

    public function index()
    {
        $default = $this->default_page;
        $data['page'] = $default;
        //SELECT * FROM `tb_meta` ORDER BY `tb_meta`.`id` ASC
        $query = $this->db->query('SELECT * FROM `tb_manage` ORDER BY `tb_manage`.`manage_sort` ASC');
        $data['row'] = $query->result_array();
        
        $query = $this->db->query('SELECT * FROM `tb_meta` ORDER BY `tb_meta`.`meta_sort` ASC');
        $data['meta'] = $query->result_array();
        
        $this->load->view('cwcontrol/pages/' . $this->default_page . '/index', $data);
    }


    public function status()
    {
       
        if($this->input->post('id')!=""){
            
            $id = $this->db->escape_str($this->input->post('id'));
         
            $query = $this->db->get_where('tb_manage', array('id' => $id));
            $row = $query->row_array();
            print_r($row);
            
            if($row["manage_status"] == 1){
                $Status = 0;
            }else{
                $Status = 1;
            }
           
           
            
           
            $data = array(
                'manage_status' => $Status,
            );
            $this->db->where('id', $id);
            $this->db->update('tb_manage', $data);
            
        }
        
    }
    
    public function meta_status()
    {
        
        if($this->input->post('id')!=""){
            
            $id = $this->db->escape_str($this->input->post('id'));
            
            $query = $this->db->get_where('tb_meta', array('id' => $id));
            $row = $query->row_array();
            print_r($row);
            
            if($row["meta_status"] == 1){
                $Status = 0;
            }else{
                $Status = 1;
            }
            
            
            
            $data = array(
                'meta_status' => $Status,
            );
            $this->db->where('id', $id);
            $this->db->update('tb_meta', $data);
            
            
        }
        
    }

	public function Sort()
	{
		$id = $this->db->escape_str($this->input->post('id'));
			
			$query = $this->db->get_where('tb_manage', array('id' => $id));
			$row = $query->row_array();
			
			$old_sort = $row["manage_sort"];
			$new_sort = $_POST["value"];
			echo $new_sort;
			if($new_sort > $old_sort){ 
				
				$this->db->set('manage_sort', 'manage_sort-1', FALSE);
				$this->db->where("manage_sort Between '$old_sort' and '$new_sort' AND id != '$id' ");
				$this->db->update('tb_manage');
			
			}else{
				
				$this->db->set('manage_sort', 'manage_sort+1', FALSE);
				$this->db->where("manage_sort Between '$new_sort' and '$old_sort' AND id != '$id' ");
				$this->db->update('tb_manage');
				
			}
			
			$data = array(
				'manage_sort' => $_POST["value"],
			);
			$this->db->where('id', $id);
			$this->db->update('tb_manage', $data);
	}
   
    
    
}
?>
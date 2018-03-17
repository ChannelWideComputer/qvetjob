<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribe extends CI_Controller {

    private $type = 'subscribe';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        /*
        $this->load->model('Model_product');
        
        if ($this->session->userdata('lang') == NULL) {
            $lang = "EN";
            $this->session->set_userdata('lang', $lang);                
                      
        }else{          
            $lang = $this->session->userdata('lang');  
        }
        
        $this->lang->load($lang, $lang);
        */
    }

    public function index()
    {   



        //$stamp =  date("Y-m-d h:i:s");
        $row = $this->db->where('subscribe_Email',$_POST['sub_email'])->get('tb_subscribe')->num_rows();
        if($row == 0 )
        {
            $this->db->insert('tb_subscribe', array('subscribe_Email' => $_POST['sub_email'] , 'subscribe_Type' => $this->type));
            if($this->db->trans_status() === TRUE)
            {
                $data_page = array
                (
                    'page' => '',
                    'label' => 'สมัครรับข่าวสาร',
                    'labeltext' => 'สมัครรับข่าวสารสำเร็จ.'
                );
                $this->load->view('cwcontrol/modal/front_success',$data_page);                          
            }
            else
            {
                $data_page = array
                (
                    'page' => '',
                    'label' => 'สมัครรับข่าวสาร',
                    'labeltext' => 'สมัครรับข่าวสารไม่สำเร็จ.'
                );                  
                $this->load->view('cwcontrol/modal/front_error',$data_page);            
            }
        }
        else
        {
            $data_page = array
            (
                'page' => '',
                'label' => 'สมัครรับข่าวสาร',
                'labeltext' => 'คุณได้สมัครรับข่าวสารกับเราแล้ว.'
            );  
            $this->load->view('cwcontrol/modal/front_error',$data_page);   
        }



    }

}

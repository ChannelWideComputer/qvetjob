<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Promotion extends CI_Controller{

    protected $default_page = 'promotion';
    
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Model_promotion');
        $this->load->model('Model_slide');
        $this->load->model('Model_about');
        $this->load->model('Model_contact');
        
        if ($this->session->userdata('lang') == NULL) {
            $lang = "EN";
            $this->session->set_userdata('lang', $lang);
        } else {
            $lang = $this->session->userdata('lang');
        }
        
        $this->lang->load($lang, $lang);
    }

    public function index()
    {
        
        $data = $this->Model_promotion->get_home();
        $data['page_url'] = base_url($this->default_page);
        $data['page'] = array(
            "H_TH"=>"หน้าแรก",
            "H_EN"=>"Home",
            "TH"=>"โปรโมชั่น",
            "EN"=>"Company Profile",
        );
        $data["home"] = $this->Model_about->get_about("about");
        $data["contact"] = $this->Model_contact->get_detail();  
        $data["slide"] = $this->Model_slide->get_home();
        
        $this->load->view('promotion', $data);
    }

    public function detail($id = null)
    {
        // print_r($id);
        $data = $this->Model_promotion->get_detail($id);
        $data['page_url'] = base_url($this->default_page);
        $data['page'] = array(
            "H_TH"=>"หน้าแรก",
            "H_EN"=>"Home",
            "TH"=>"เกี่ยวกับเรา",
            "EN"=>"Company Profile",
        );
        $data["home"] = $this->Model_about->get_about("about");
        $data["contact"] = $this->Model_contact->get_detail();  
        $data["slide"] = $this->Model_slide->get_home();
        $this->load->view('promotion_detail', $data);
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('commondatamodel','commondatamodel',TRUE);
        // $this->load->model('Dashboardmodel','dashboard',TRUE);
       
    }

    public function index(){   
        $session = $this->session->userdata('adminuser_data');
        if($this->session->userdata('adminuser_data'))
        {
            // pre($session);exit;
            $result =  "";
            $header="";
            $session = "";
            $page="admin/dashboard";
            adminbody_method($result, $page, $header, $session);
        }else{
            redirect('admin/login','refresh');    
        }
    }
 
}// end of class
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Useraudit extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('commondatamodel','commondatamodel',TRUE);
        $this->load->model('adminmodel/Userauditmodel','audit',TRUE);       
    }

public function index()
{
    $session = $this->session->userdata('adminuser_data');
	if($this->session->userdata('adminuser_data'))
	{  
        $page = "admin/usermanagement/useraudit";
        $header="";       
        $result['usersAuditList']=$this->audit->getAuditList($session['userid']);
        adminbody_method($result, $page, $header, $session);
    }else{
        redirect('admin/login','refresh');
    }
    
}


}//end of class
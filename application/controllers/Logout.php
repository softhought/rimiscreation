<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Logout extends CI_Controller {
 public function __construct()
 {
   parent::__construct();
    
    $this->load->library('session');
	
 }
	


 public function index()
 {
      if ($this->session->userdata('webuser_data')) {

        $session = $this->session->userdata('webuser_data');
       

            $this->session->sess_destroy();
            redirect('home', 'refresh');
          

      }else{
          redirect('home', 'refresh');
        
      }
 }

}
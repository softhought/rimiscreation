<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('commondatamodel','commondatamodel',TRUE);    
        $this->load->model('Productmodel','product',TRUE);         
       
    }

    public function index(){     
        $session="";
        $header="";
        $result=[];
        

        // pre($result['ProductSideList']);exit;
        $page="user-view/registration/signin";
        createbody_method($result, $page, $header, $session);
   }


 public function verifyLogin()
 {
    $json_response = array();
    $formData = $this->input->post('formDatas');
    parse_str($formData, $dataArry);
    $username =  htmlspecialchars($dataArry['email']);
    $password =  md5(htmlspecialchars($dataArry['password']));

    $result=[];
    
    $where = array(
        "email" => $username,
        "password" => $password
        
    );
    
    if($username=="" OR $password=="")
    {
        $json_response = array(
             "msg_status" => 0,
             "msg_data" => "All fields are required"
        );
        
    }
    else
    {
        $result = $this->commondatamodel->getSingleRowByWhereCls('web_user',$where);
      
        if($result)
        {

            $user_session = [
                                "userid"=>$result->user_id,
                                "username"=>$result->display_name,
                    
                            ];
                            
            
            
            
            $this->setSessionData($user_session);
          

            
            if($result)
            {
                $json_response = array(
                    "msg_status" => 1,
                    "msg_data" => "Logged in successfully..."
                );
            }
            
        }
        else
        {
            $json_response = array(
                "msg_status" => 0,
                 "msg_data" => "Invalid email or password..."
            );
        }
        
    }
    
    header('Content-Type: application/json');
    echo json_encode( $json_response );
    exit;
    
 } 



    private function setSessionData($result = NULL) {

        if ($result) {
            $this->session->set_userdata("webuser_data", $result);
        }
    }







}// end of class
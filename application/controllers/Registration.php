<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

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
        $result['redirectPath']="";
        $redirectPath = $this->input->post('redirectPath');
        if (isset($redirectPath)) {
            $result['redirectPath']=$redirectPath;
        }

        // pre($result['ProductSideList']);exit;
        $page="user-view/registration/signup";
        createbody_method($result, $page, $header, $session);
   }


    public function signup_action() {

  
            $json_response = array();
            $formData = $this->input->post('formDatas');
            parse_str($formData, $dataArry);
            
        
            $first_name = trim(htmlspecialchars($dataArry['first_name']));
            $last_name = trim(htmlspecialchars($dataArry['last_name']));
            $display_name = trim(htmlspecialchars($dataArry['display_name']));
            $email = trim(htmlspecialchars($dataArry['email']));
            $password = trim(htmlspecialchars($dataArry['password']));


            $insert_array = array(
                                'first_name' => $first_name,
                                'last_name' => $last_name,
                                'display_name' => $display_name,
                                'email' => $email,
                                'password' => md5($password),
                                'is_active' => 'Y',
                          );


            $insert=$this->commondatamodel->insertSingleTableData('web_user',$insert_array);

                    if($insert)
                    {
                          $user_session = [
                                "userid"=>$insert,
                                "username"=>$display_name,
                    
                            ];
                             $this->setSessionData($user_session);


                            $json_response = array(
                                "msg_status" => 1,
                                "msg_data" => "Saved successfully",
                                "mode" => "ADD"
                            );
                    }
                    else
                    {
                            $json_response = array(
                                "msg_status" => 1,
                                "msg_data" => "There is some problem.Try again"
                            );
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
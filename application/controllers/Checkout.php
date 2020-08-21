<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('commondatamodel','commondatamodel',TRUE);    
        $this->load->model('Productmodel','product',TRUE);         
       
    }

    public function index(){   
        $session="";
        $result['UserSessionData']=array();
        $result['UserAddress']=array();
        if ($this->session->userdata('webuser_data')) {
            $webuser_data=$this->session->userdata('webuser_data');
            $result['UserSessionData']=$webuser_data;
            $where=[
                'user_id'=>$webuser_data['userid']
            ];
            $result['UserAddress']=$this->commondatamodel->getAllRecordWhere('web_user_address',$where);           
        }
        $Products=[];
        
        if($this->session->userdata('cart_product')){
            foreach ($this->session->userdata('cart_product') as $Product) {
                // pre($Product['product']);exit;
                $Products[]=$this->product->getSingleProductByProductIdForCartList($Product['product'],$Product['count']);          
            }
        }
        $where1=[
            'IsActive'=>'Y'
        ];
        $result['StateList']=$this->commondatamodel->getAllRecordWhereOrderBy('state_master',$where1,'Name');
        $result['CartItemList']=$Products;

        $session_amt_count=$this->session->userdata('cart_amt_count');
        $result['CartProductCount']=$session_amt_count['CartCount'];
        
        $header="";
        $page='user-view/checkout/checkout';
        createbody_method($result, $page, $header, $session);
    }

    public function AddNewAddress() {        
        $json_response = array();
        $formData = $this->input->post('formDatas');
        parse_str($formData, $dataArry);
        if($this->session->userdata('webuser_data'))
        {
            
            $webuser_data=$this->session->userdata('webuser_data');
        
            $name = trim(htmlspecialchars($dataArry['name']));
            $contact_no = trim(htmlspecialchars($dataArry['contact_no']));
            $alt_contact_no = trim(htmlspecialchars($dataArry['alt_contact_no']));
            $alt_contact_no = trim(htmlspecialchars($dataArry['alt_contact_no']));
            $address = $dataArry['address'];
            $landmark = trim(htmlspecialchars($dataArry['landmark']));
            $state_id = trim(htmlspecialchars($dataArry['state_id']));
            $city = trim(htmlspecialchars($dataArry['city']));
            $pincode = trim(htmlspecialchars($dataArry['pincode']));


            $insert_array = array(
                                'user_id' =>$webuser_data['userid'],
                                'name' => $name,
                                'contact_no' => $contact_no,
                                'alt_contact_no' => $alt_contact_no,
                                'landmark' => $landmark,
                                'address' => $address,
                                'city' => $city,
                                'state_id' => $state_id,
                                'pincode' => $pincode,
                                'is_active' => 'Y',
                        );


            $insert=$this->commondatamodel->insertSingleTableData('web_user_address',$insert_array);

            if($insert)
            {
                $json_response = array(
                        "msg_status" => 1,
                        "msg_data" => "Saved successfully"
                    );
            }else{
                $json_response = array(
                        "msg_status" => 0,
                        "msg_data" => "There is some problem.Try again"
                    );
            }
        }else{
            $json_response = array(
                "msg_status" => 22,
                "msg_data" => "User Session Out! Try Login"
            );
        }


        header('Content-Type: application/json');
        echo json_encode( $json_response );
        exit;

    } 




}// end of class
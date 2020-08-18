<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Productmedia extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('commondatamodel','commondatamodel',TRUE);         
        $this->load->model('adminmodel/Brandmodel','brand',TRUE);          
        $this->load->model('adminmodel/Productmodel','product',TRUE);          
        $this->load->model('adminmodel/Productmediamodel','media',TRUE);          
       
    }


    public function index(){   
        $session = $this->session->userdata('adminuser_data');
        if($this->session->userdata('adminuser_data'))
        {            
            $header="";
            $result['MediaList']=$this->media->MediaList();
            $page="admin/product_media/list";
            adminbody_method($result, $page, $header, $session);
        }else{
            redirect('admin/login','refresh');    
        }
    }

    public function create(){   
        $session = $this->session->userdata('adminuser_data');
        if($this->session->userdata('adminuser_data'))
        {            
            $header="";
            $result['MODE']='ADD';
            $result['ProductList']=$this->product->getOnlyActiveProductList();
            $result['ProductMediaId']='';
            $page="admin/product_media/create_and_edit";
            adminbody_method($result, $page, $header, $session);
        }else{
            redirect('admin/login','refresh');    
        }
    }

    
    public function store(){   
        $session = $this->session->userdata('adminuser_data');
        if($this->session->userdata('adminuser_data'))
        {
            
            $MediaType=$this->input->post('MediaType');
            $ProductId=$this->input->post('ProductId');            
            $SerialNo=$this->input->post('SerialNo');            
            $IsActive=$this->input->post('IsActive');

            if ($MediaType=='URL') {
                $Media=$this->input->post('Url');

                $insert_Arr=[
                    'ProductId'=> $ProductId,
                    'Media' => $Media,
                    'MediaPath'  =>$Media,
                    'MediaType'  => $MediaType,
                    'SerialNo'  => $SerialNo,
                    'IsActive' => $IsActive                 
                ];
        
                $id= $this->commondatamodel->insertSingleTableData('product_media',$insert_Arr);
                if ($id>0) {

                    /** audit trail */
                    $user_activity = array(
                        "activity_module_admin" => 'Create Media',
                        "activity_module" => 'Media',
                        "action" => 'Insert',
                        "from_method" => 'productmedia/store',
                        "module_master_id" => $id,
                        "user_id" =>$session['userid'],
                        "table_name" => 'product_media',
                        "user_browser" => getUserBrowserName(),
                        "user_platform" =>  getUserPlatform(),
                        'ip_address'=>getUserIPAddress()
                    );

                    $this->commondatamodel->insertSingleTableData('activity_log',$user_activity);


                    $this->session->set_flashdata('success', 'Created successfully');
                }else{
                    $this->session->set_flashdata('error', 'oops! an error occur');
                }
                
            } else if($MediaType=='VIDEO') {
                $upload_path=$_SERVER['DOCUMENT_ROOT'].'/rimiscreation/assets/product-media/video/';


                foreach($_FILES['Media']['name'] as $key => $image){

                    $_FILES['multi_upload'] ['name'] = $_FILES['Media'] ['name'] [$key];
                    $_FILES['multi_upload'] ['tmp_name'] = $_FILES['Media'] ['tmp_name'] [$key];
                    $_FILES['multi_upload'] ['error'] = $_FILES['Media'] ['error'] [$key];
                    $_FILES['multi_upload'] ['size'] = $_FILES['Media'] ['size'] [$key];
                    $_FILES['multi_upload'] ['type'] = $_FILES['Media'] ['type'] [$key];
                    $config1 = array(
                        'upload_path' => $upload_path,
                        'max_filename' => '1000',                        
                        'allowed_types' =>'mp4|3gp|flv|',
                        'file_path'=>$_FILES ['multi_upload'] ['tmp_name'],
                        'encrypt_name' => TRUE,
                        'remove_spaces' => TRUE,
                        'file_name'=>$_FILES ['multi_upload'] ['name'],			
                    );
                    // pre($config1);exit;     
                    $this->load->library('upload',$config1);
                    $this->upload->initialize($config1);
                    
                    if ($this->upload->do_upload('multi_upload')) {
                        $finfo1=$this->upload->data();
                        // pre($finfo1);exit;
                        $insert_Arr=[
                            'ProductId'=> $ProductId,
                            'Media' => $finfo1['file_name'],
                            'MediaPath'  => 'assets/product-media/video/'.$finfo1['file_name'],
                            'MediaType'  => $MediaType,
                            'SerialNo'  => $SerialNo,
                            'IsActive' => $IsActive                 
                        ];
                
                        $id= $this->commondatamodel->insertSingleTableData('product_media',$insert_Arr);
                        if ($id>0) {
        
                            /** audit trail */
                            $user_activity = array(
                                "activity_module_admin" => 'Create Media',
                                "activity_module" => 'Media',
                                "action" => 'Insert',
                                "from_method" => 'productmedia/store',
                                "module_master_id" => $id,
                                "user_id" =>$session['userid'],
                                "table_name" => 'product_media',
                                "user_browser" => getUserBrowserName(),
                                "user_platform" =>  getUserPlatform(),
                                'ip_address'=>getUserIPAddress()
                            );
        
                            $this->commondatamodel->insertSingleTableData('activity_log',$user_activity);
        
        
                            $this->session->set_flashdata('success', 'Saved successfully');
                            // $this->session->set_flashdata('success', $this->upload->display_errors());
                        }else{
                            $this->session->set_flashdata('error', 'oops! an error occur');
                            
                        }
                    }
                    else{
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                    } 
                }


            }else{
                $upload_path=$_SERVER['DOCUMENT_ROOT'].'/rimiscreation/assets/product-media/image/'; 

                foreach($_FILES['Media']['name'] as $key => $image){

                    $_FILES['multi_upload'] ['name'] = $_FILES['Media'] ['name'] [$key];
                    $_FILES['multi_upload'] ['tmp_name'] = $_FILES['Media'] ['tmp_name'] [$key];
                    $_FILES['multi_upload'] ['error'] = $_FILES['Media'] ['error'] [$key];
                    $_FILES['multi_upload'] ['size'] = $_FILES['Media'] ['size'] [$key];
                    $_FILES['multi_upload'] ['type'] = $_FILES['Media'] ['type'] [$key];
                    $config1 = array(
                        'upload_path' => $upload_path,
                        'allowed_types' => 'jpeg|jpg|png',
                        'max_filename' => '1000',
                        'file_path'=>$_FILES ['multi_upload'] ['tmp_name'],
                        'encrypt_name' => TRUE,
                        'file_name'=>$_FILES ['multi_upload'] ['name'],			
                    );

                    
    
                    $this->load->library('upload',$config1);
                    $this->upload->initialize($config1);
                    
                    if ($this->upload->do_upload('multi_upload')) {
                        $finfo1=$this->upload->data();
                        
                        $insert_Arr=[
                            'ProductId'=> $ProductId,
                            'Media' => $finfo1['file_name'],
                            'MediaPath'  => 'assets/product-media/image/'.$finfo1['file_name'],
                            'MediaType'  => $MediaType,
                            'SerialNo'  => $SerialNo,
                            'IsActive' => $IsActive                 
                        ];
                        // pre($insert_Arr);exit;
                        $id= $this->commondatamodel->insertSingleTableData('product_media',$insert_Arr);
                        if ($id>0) {
        
                            /** audit trail */
                            $user_activity = array(
                                "activity_module_admin" => 'Create Media',
                                "activity_module" => 'Media',
                                "action" => 'Insert',
                                "from_method" => 'productmedia/store',
                                "module_master_id" => $id,
                                "user_id" =>$session['userid'],
                                "table_name" => 'product_media',
                                "user_browser" => getUserBrowserName(),
                                "user_platform" =>  getUserPlatform(),
                                'ip_address'=>getUserIPAddress()
                            );
        
                            $this->commondatamodel->insertSingleTableData('activity_log',$user_activity);
        
        
                            $this->session->set_flashdata('success', 'Saved successfully');
                        }else{
                            $this->session->set_flashdata('error', 'oops! an error occur');
                        }
                    }
                    else{
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        
                    }
                } 
            }
            


            
            
            
            
            
            redirect('admin/productmedia');
        }else{
            redirect('admin/login','refresh');    
        }
    }

    
    public function activeInactiveMedia()
    {
        $session = $this->session->userdata('adminuser_data');
        if($this->session->userdata('adminuser_data'))
        {
            $json_response="";
            $ProductMediaId=$this->input->post('ProductMediaId');
            $Status=$this->input->post('Status');
            $img="";
            $IsActive="";
            if($Status=='N')
            {               
                $img=ASSETS_PATH.'img/cross.png';
                $IsActive='Y';
            }else{
                $img=ASSETS_PATH.'img/tick.png';
                $IsActive='N';
            }

            $update=$this->commondatamodel->updateSingleTableData('product_media',array('IsActive'=>$Status),array('ProductMediaId'=>$ProductMediaId));
            if ($update) {

                /** audit trail */
                $user_activity = array(
                    "activity_module_admin" => 'Media List',
                    "activity_module" => 'Media',
                    "action" => 'Update',
                    "from_method" => 'productmedia/update',
                    "module_master_id" => $ProductMediaId,
                    "user_id" =>$session['userid'],
                    "table_name" => 'product_media',
                    "user_browser" => getUserBrowserName(),
                    "user_platform" =>  getUserPlatform(),
                    'ip_address'=>getUserIPAddress()
                );

                $json_response = array(
                    "status" =>1,
                    "msg" => "Updated Successfylly",
                    'img'=>$img,
                    'IsActive'=>$IsActive
                );
            }else{
                $json_response = array(
                    "status" =>0,
                    "msg" => "Unable Change"
                );
            }
            $this->commondatamodel->insertSingleTableData('activity_log',$user_activity);
            header("Access-Control-Allow-Origin: *");       
            header('Content-Type: application/json');
            echo json_encode( $json_response );
            exit;
        }else{
            redirect('admin/login','refresh');    
        }
    }


    public function delete()
    {
        $session = $this->session->userdata('adminuser_data');
        if($this->session->userdata('adminuser_data'))
        {
            $ProductMediaId=$this->uri->segment(4);
            

            $this->commondatamodel->deleteTableData('product_media',array('ProductMediaId'=>$ProductMediaId));
            

                /** audit trail */
                $user_activity = array(
                    "activity_module_admin" => 'Media List',
                    "activity_module" => 'Media',
                    "action" => 'Delete',
                    "from_method" => 'productmedia/delete',
                    "module_master_id" => $ProductMediaId,
                    "user_id" =>$session['userid'],
                    "table_name" => 'product_media',
                    "user_browser" => getUserBrowserName(),
                    "user_platform" =>  getUserPlatform(),
                    'ip_address'=>getUserIPAddress()
                );
                $this->commondatamodel->insertSingleTableData('activity_log',$user_activity);

                redirect('admin/productmedia');
                        
        }else{
            redirect('admin/login','refresh');    
        }
    }
 


}// end of class
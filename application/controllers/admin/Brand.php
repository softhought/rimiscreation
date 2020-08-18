<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('commondatamodel','commondatamodel',TRUE);         
        $this->load->model('adminmodel/Brandmodel','brand',TRUE);          
       
    }


    public function index(){   
        $session = $this->session->userdata('adminuser_data');
        if($this->session->userdata('adminuser_data'))
        {            
            $header="";
            $result['BrandList']=$this->brand->BrandList();
            $page="admin/brand/list";
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
            $result['BrandId']='';
            $page="admin/brand/create_and_edit";
            adminbody_method($result, $page, $header, $session);
        }else{
            redirect('admin/login','refresh');    
        }
    }

    public function edit(){   
        $session = $this->session->userdata('adminuser_data');
        if($this->session->userdata('adminuser_data'))
        {            
            $BrandId=$this->uri->segment(4);
            $header="";
            $result['MODE']='EDIT';
            $result['BrandId']=$BrandId;
            $where=['BrandId'=>$BrandId];
            $result['BrandData']=$this->commondatamodel->getSingleRowByWhereCls('brand_master',$where);
// pre($result['ProductData']);exit;
            
            $page="admin/brand/create_and_edit";
            adminbody_method($result, $page, $header, $session);
        }else{
            redirect('admin/login','refresh');    
        }
    }

    public function store(){   
        $session = $this->session->userdata('adminuser_data');
        if($this->session->userdata('adminuser_data'))
        {
            $upload_path=$_SERVER['DOCUMENT_ROOT'].'/rimiscreation/assets/brand-logo/';
            $Name=$this->input->post('Name');
            $IsActive=$this->input->post('IsActive');
            
            $config1 = array(
                'upload_path' => $upload_path,
                'allowed_types' => 'jpeg|jpg|png',
                'max_filename' => '255',
                'file_path'=>$_FILES['Logo']['tmp_name'],
                'encrypt_name' => TRUE,
                'file_name'=>$_FILES['Logo']['name'],			
            );       
            $this->load->library('upload',$config1);
            $this->upload->initialize($config1);
            
            if ($this->upload->do_upload('Logo'))
            {     
                $finfo1=$this->upload->data();
                // pre($upload_path);exit;
                $file_name=$finfo1['file_name'];           
                $insert_Arr=[
                    'Name'=>$Name,                    
                    'Logo'=>$file_name,                    
                    'LogoPath'=>$upload_path,                    
                    'IsActive'=>$IsActive
                ];

                // pre($detail_Arr);
            
                $id= $this->commondatamodel->insertSingleTableData('brand_master',$insert_Arr);
                if ($id>0) {

                    /** audit trail */
                    $user_activity = array(
                        "activity_module_admin" => 'Create Brand',
                        "activity_module" => 'Brand',
                        "action" => 'Insert',
                        "from_method" => 'brand/store',
                        "module_master_id" => $id,
                        "user_id" =>$session['userid'],
                        "table_name" => 'brand_master',
                        "user_browser" => getUserBrowserName(),
                        "user_platform" =>  getUserPlatform(),
                        'ip_address'=>getUserIPAddress()
                    );

                    $this->commondatamodel->insertSingleTableData('activity_log',$user_activity);


                    $this->session->set_flashdata('success', 'Created successfully');
                }else{
                    $this->session->set_flashdata('error', 'oops! an error occur');
                }
            }
            else
            {
                $this->session->set_flashdata('error', 'oops! an error occur');
            } 
            redirect('admin/brand');
        }else{
            redirect('admin/login','refresh');    
        }
    }

    public function update(){   
        $session = $this->session->userdata('adminuser_data');
        if($this->session->userdata('adminuser_data'))
        {
            $upload_path=$_SERVER['DOCUMENT_ROOT'].'/rimiscreation/assets/brand-logo/';

            $BrandId=$this->input->post('BrandId'); 
            $Name=$this->input->post('Name');
            $original_chng=$this->input->post('original_chng');
            $IsActive=$this->input->post('IsActive');

            if ($original_chng=='Y') {

                $config1 = array(
                    'upload_path' => $upload_path,
                    'allowed_types' => 'jpeg|jpg|png',
                    'max_filename' => '255',
                    'file_path'=>$_FILES['Logo']['tmp_name'],
                    'encrypt_name' => TRUE,
                    'file_name'=>$_FILES['Logo']['name'],			
                );     
                // pre($config1);exit;
                $this->load->library('upload',$config1);
                $this->upload->initialize($config1);
                

                if ($this->upload->do_upload('Logo'))
                {   
                    $finfo1=$this->upload->data();                    
                    $file_name=$finfo1['file_name'];             
                    $Update_Arr=[
                        'Name'=>$Name,                    
                        'Logo'=>$file_name,                    
                        'LogoPath'=>$upload_path,                    
                        'IsActive'=>$IsActive
                    ];
                    // pre($Update_Arr);exit;
                    $where=['BrandId'=>$BrandId];
                    $update= $this->commondatamodel->updateSingleTableData('brand_master',$Update_Arr,$where);

                    if ($update) 
                    {
                        /** audit trail */
                        $user_activity = array(
                            "activity_module_admin" => 'Create Brand',
                            "activity_module" => 'Brand',
                            "action" => 'Update',
                            "from_method" => 'brand/store',
                            "module_master_id" => $BrandId,
                            "user_id" =>$session['userid'],
                            "table_name" => 'brand_master',
                            "user_browser" => getUserBrowserName(),
                            "user_platform" =>  getUserPlatform(),
                            'ip_address'=>getUserIPAddress()
                        );

                        $this->commondatamodel->insertSingleTableData('activity_log',$user_activity);
                        $this->session->set_flashdata('success', 'Updated successfully');
                    }else{
                        $this->session->set_flashdata('error', 'oops! an error occur');
                    }
                }else{
                    $this->session->set_flashdata('error', 'oops! file type is not supported');
                } 
            } else {
                    $Update_Arr=[
                        'Name'=>$Name,                        
                        'IsActive'=>$IsActive
                    ];

                    // pre($Update_Arr);exit;
                    $where=['BrandId'=>$BrandId];
                    $update= $this->commondatamodel->updateSingleTableData('brand_master',$Update_Arr,$where);

                    if ($update) {
                        /** audit trail */
                        $user_activity = array(
                            "activity_module_admin" => 'Create Brand',
                            "activity_module" => 'Brand',
                            "action" => 'Update',
                            "from_method" => 'brand/store',
                            "module_master_id" => $BrandId,
                            "user_id" =>$session['userid'],
                            "table_name" => 'brand_master',
                            "user_browser" => getUserBrowserName(),
                            "user_platform" =>  getUserPlatform(),
                            'ip_address'=>getUserIPAddress()
                        );

                        $this->commondatamodel->insertSingleTableData('activity_log',$user_activity);
                        $this->session->set_flashdata('success', 'Updated successfully');
                    }else{
                        $this->session->set_flashdata('error', 'oops! an error occur ..');
                    }
            }
            redirect('admin/brand');
        }else{
            redirect('admin/login','refresh');    
        }
    }

 


}// end of class
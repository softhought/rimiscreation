<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('commondatamodel','commondatamodel',TRUE);         
        $this->load->model('adminmodel/Vendormodel','vendor',TRUE);          
       
    }


    public function index(){   
        $session = $this->session->userdata('adminuser_data');
        if($this->session->userdata('adminuser_data'))
        {            
            $header="";
            $result['VendorList']=$this->vendor->VendorList();
            $page="admin/vendor/list";
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
            $result['VendorId']='';
            $page="admin/vendor/create_and_edit";
            adminbody_method($result, $page, $header, $session);
        }else{
            redirect('admin/login','refresh');    
        }
    }

    public function edit(){   
        $session = $this->session->userdata('adminuser_data');
        if($this->session->userdata('adminuser_data'))
        {            
            $VendorId=$this->uri->segment(4);
            $header="";
            $result['MODE']='EDIT';
            $result['VendorId']=$VendorId;
            $where=['VendorId'=>$VendorId];
            $result['VendorData']=$this->commondatamodel->getSingleRowByWhereCls('vendor_master',$where);
// pre($result['ProductData']);exit;
            
            $page="admin/vendor/create_and_edit";
            adminbody_method($result, $page, $header, $session);
        }else{
            redirect('admin/login','refresh');    
        }
    }

    public function store(){   
        $session = $this->session->userdata('adminuser_data');
        if($this->session->userdata('adminuser_data'))
        {
            $Name=$this->input->post('Name');
            $Address=$this->input->post('Address');
            $BusinessName=$this->input->post('BusinessName');
            $BusinessAddress=$this->input->post('BusinessAddress');
            $GstNo=$this->input->post('GstNo');
            $PanNo=$this->input->post('PanNo');
            $IsActive=$this->input->post('IsActive');
           
             $insert_Arr=[
                 'Name'=>$Name,
                 'Address'=>$Address,
                 'BusinessName'=>$BusinessName,
                 'BusinessAddress'=>$BusinessAddress,
                 'GstNo'=>$GstNo,
                 'PanNo'=>$PanNo,
                 'IsActive'=>$IsActive
             ];

// pre($detail_Arr);
            
            $id= $this->commondatamodel->insertSingleTableData('vendor_master',$insert_Arr);
            if ($id>0) {

                /** audit trail */
                $user_activity = array(
                    "activity_module_admin" => 'Create Vendor',
                    "activity_module" => 'Vendor',
                    "action" => 'Insert',
                    "from_method" => 'vendor/store',
                    "module_master_id" => $id,
                    "user_id" =>$session['userid'],
                    "table_name" => 'vendor_master',
                    "user_browser" => getUserBrowserName(),
                    "user_platform" =>  getUserPlatform(),
                    'ip_address'=>getUserIPAddress()
                );

                $this->commondatamodel->insertSingleTableData('activity_log',$user_activity);


                $this->session->set_flashdata('success', 'Created successfully');
            }else{
                $this->session->set_flashdata('error', 'oops! an error occur');
            }
            redirect('admin/vendor');
        }else{
            redirect('admin/login','refresh');    
        }
    }

    public function update(){   
        $session = $this->session->userdata('adminuser_data');
        if($this->session->userdata('adminuser_data'))
        {
            $VendorId=$this->input->post('VendorId');
            $Name=$this->input->post('Name');
            $Address=$this->input->post('Address');
            $BusinessName=$this->input->post('BusinessName');
            $BusinessAddress=$this->input->post('BusinessAddress');
            $GstNo=$this->input->post('GstNo');
            $PanNo=$this->input->post('PanNo');
            $IsActive=$this->input->post('IsActive');
           
             $Update_Arr=[
                 'Name'=>$Name,
                 'Address'=>$Address,
                 'BusinessName'=>$BusinessName,
                 'BusinessAddress'=>$BusinessAddress,
                 'GstNo'=>$GstNo,
                 'PanNo'=>$PanNo,
                 'IsActive'=>$IsActive
             ];

// pre($Update_Arr);

            $where=['VendorId'=>$VendorId];
            $update= $this->commondatamodel->updateSingleTableData('vendor_master',$Update_Arr,$where);
            if ($update) {

                /** audit trail */
                $user_activity = array(
                    "activity_module_admin" => 'Create Vendor',
                    "activity_module" => 'Vendor',
                    "action" => 'Update',
                    "from_method" => 'vendor/update',
                    "module_master_id" => $VendorId,
                    "user_id" =>$session['userid'],
                    "table_name" => 'vendor_master',
                    "user_browser" => getUserBrowserName(),
                    "user_platform" =>  getUserPlatform(),
                    'ip_address'=>getUserIPAddress()
                );

                $this->commondatamodel->insertSingleTableData('activity_log',$user_activity);


                $this->session->set_flashdata('success', 'Updated successfully');
            }else{
                $this->session->set_flashdata('error', 'oops! an error occur');
            }
            redirect('admin/vendor');
        }else{
            redirect('admin/login','refresh');    
        }
    }

 


}// end of class
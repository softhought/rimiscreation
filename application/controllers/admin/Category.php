<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('commondatamodel','commondatamodel',TRUE);
        $this->load->model('adminmodel/Categorymodel','category',TRUE);
       
    }

    public function index(){   
        $session = $this->session->userdata('adminuser_data');
        if($this->session->userdata('adminuser_data'))
        {            
            $header="";
            $result['categoryList']=$this->category->getCategoryList();
            $page="admin/category/category_list";
            adminbody_method($result, $page, $header, $session);
        }else{
            redirect('admin/login','refresh');    
        }
    }
    public function create(){   
        $session = $this->session->userdata('adminuser_data');
        if($this->session->userdata('adminuser_data'))
        {
            // pre($session);exit;
            $header="";            
            $result['MODE']='ADD';
            $result['CategoryId']='';
            $page="admin/category/create_category";
            adminbody_method($result, $page, $header, $session);
        }else{
            redirect('admin/login','refresh');    
        }
    }
    public function Edit(){   
        $session = $this->session->userdata('adminuser_data');
        if($this->session->userdata('adminuser_data'))
        {
            $CategoryId=$this->uri->segment(4);
            $header="";            
            $result['MODE']='EDIT';
            $result['CategoryId']=$CategoryId;
            $where=['CategoryId'=>$CategoryId];
            $result['CatagoryData']=$this->commondatamodel->getSingleRowByWhereCls('category_master',$where);
            // pre( $result['CatagoryData']);exit;
            $page="admin/category/create_category";
            adminbody_method($result, $page, $header, $session);
        }else{
            redirect('admin/login','refresh');    
        }
    }

    public function store(){   
        $session = $this->session->userdata('adminuser_data');
        if($this->session->userdata('adminuser_data'))
        {
            $Description=$this->input->post('Description');
            $AppearanceSerial=$this->input->post('AppearanceSerial');
            $IsCustomizable=$this->input->post('IsCustomizable');
            $HavingSubCategory=$this->input->post('HavingSubCategory');
            $IsActive=$this->input->post('IsActive');
           
            $date=date('Y-m-d H:i:s');
             $insert_Arr=[
                 'Description'=>$Description,
                 'AppearanceSerial'=>$AppearanceSerial,
                 'IsCustomizable'=>$IsCustomizable,
                 'HavingSubCategory'=>$HavingSubCategory,
                 'IsActive'=>$IsActive,
                 'created_at'=>$date,
                 'updated_at'=>$date
             ];

            
            $id= $this->commondatamodel->insertSingleTableData('category_master',$insert_Arr);
            if ($id>0) {

                /** audit trail */
                $user_activity = array(
                    "activity_module_admin" => 'Create Category',
                    "activity_module" => 'Category',
                    "action" => 'Insert',
                    "from_method" => 'category/store',
                    "module_master_id" => $id,
                    "user_id" =>$session['userid'],
                    "table_name" => 'category_master',
                    "user_browser" => getUserBrowserName(),
                    "user_platform" =>  getUserPlatform(),
                    'ip_address'=>getUserIPAddress()
                );

                $this->commondatamodel->insertSingleTableData('activity_log',$user_activity);


                $this->session->set_flashdata('success', 'Created successfully');
            }else{
                $this->session->set_flashdata('error', 'oops! an error occur');
            }
            redirect('admin/category');
        }else{
            redirect('admin/login','refresh');    
        }
    }
    public function update(){   
        $session = $this->session->userdata('adminuser_data');
        if($this->session->userdata('adminuser_data'))
        {
            $Description=$this->input->post('Description');
            $AppearanceSerial=$this->input->post('AppearanceSerial');
            $IsCustomizable=$this->input->post('IsCustomizable');
            $HavingSubCategory=$this->input->post('HavingSubCategory');
            $IsActive=$this->input->post('IsActive');
            $CategoryId=$this->input->post('CategoryId');
           
            $date=date('Y-m-d H:i:s');
             $Update_Arr=[
                 'Description'=>$Description,
                 'AppearanceSerial'=>$AppearanceSerial,
                 'IsCustomizable'=>$IsCustomizable,
                 'HavingSubCategory'=>$HavingSubCategory,
                 'IsActive'=>$IsActive,
                 'updated_at'=>$date
             ];
            //  pre($Update_Arr);exit;
             $where=['CategoryId'=>$CategoryId];
             $update=$this->commondatamodel->updateSingleTableData('category_master',$Update_Arr,$where);
            if ($update) {

                /** audit trail */
                $user_activity = array(
                    "activity_module_admin" => 'Create Category',
                    "activity_module" => 'Category',
                    "action" => 'Update',
                    "from_method" => 'category/update',
                    "module_master_id" => $CategoryId,
                    "user_id" =>$session['userid'],
                    "table_name" => 'category_master',
                    "user_browser" => getUserBrowserName(),
                    "user_platform" =>  getUserPlatform(),
                    'ip_address'=>getUserIPAddress()
                );

                $this->commondatamodel->insertSingleTableData('activity_log',$user_activity);


                $this->session->set_flashdata('success', 'Updated successfully');
            }else{
                $this->session->set_flashdata('error', 'oops! an error occur');
            }
            redirect('admin/category');
        }else{
            redirect('admin/login','refresh');    
        }
    }
 
}// end of class
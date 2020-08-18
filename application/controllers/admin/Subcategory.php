<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategory extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('commondatamodel','commondatamodel',TRUE);
        $this->load->model('adminmodel/Categorymodel','category',TRUE);
        $this->load->model('adminmodel/Subcategorymodel','subcategory',TRUE);
       
    }

    public function index(){   
        $session = $this->session->userdata('adminuser_data');
        if($this->session->userdata('adminuser_data'))
        {            
            $header="";
            $result['subCategoryList']=$this->subcategory->getSubCategoryList();
            $page="admin/sub_category/sub_category_list";
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
            $result =  "";
            $header="";            
            $result['MODE']='ADD';
            $result['SubCategoryId']='';
            $result['CategoryList']=$this->category->getOnlyListOfCatagoryhavingSubCatagoryAndActive();
            $page="admin/sub_category/create_sub_category";
            adminbody_method($result, $page, $header, $session);
        }else{
            redirect('admin/login','refresh');    
        }
    }
    public function Edit(){   
        $session = $this->session->userdata('adminuser_data');
        if($this->session->userdata('adminuser_data'))
        {
            $SubCategoryId=$this->uri->segment(4);
            $result =  "";
            $header="";            
            $result['MODE']='EDIT';
            $result['SubCategoryId']=$SubCategoryId;
            $result['CategoryList']=$this->category->getOnlyActiveCategoryList();
            $where=['SubCategoryId'=>$SubCategoryId];
            $result['SubCatagoryData']=$this->commondatamodel->getSingleRowByWhereCls('sub_category',$where);
            $page="admin/sub_category/create_sub_category";
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
            $CategoryId=$this->input->post('CategoryId');
            $IsActive=$this->input->post('IsActive');
           
            $date=date('Y-m-d H:i:s');
             $insert_Arr=[
                 'Description'=>$Description,
                 'AppearanceSerial'=>$AppearanceSerial,
                 'CategoryId'=>$CategoryId,
                 'IsActive'=>$IsActive,
                 'created_at'=>$date,
                 'updated_at'=>$date
             ];

            
            $id= $this->commondatamodel->insertSingleTableData('sub_category',$insert_Arr);
            if ($id>0) {

                /** audit trail */
                $user_activity = array(
                    "activity_module_admin" => 'Create Sub Category',
                    "activity_module" => 'Sub Category',
                    "action" => 'Insert',
                    "from_method" => 'subcategory/store',
                    "module_master_id" => $id,
                    "user_id" =>$session['userid'],
                    "table_name" => 'sub_category',
                    "user_browser" => getUserBrowserName(),
                    "user_platform" =>  getUserPlatform(),
                    'ip_address'=>getUserIPAddress()
                );

                $this->commondatamodel->insertSingleTableData('activity_log',$user_activity);


                $this->session->set_flashdata('success', 'Created successfully');
            }else{
                $this->session->set_flashdata('error', 'oops! an error occur');
            }
            redirect('admin/subcategory');
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
            $CategoryId=$this->input->post('CategoryId');
            $IsActive=$this->input->post('IsActive');
            $SubCategoryId=$this->input->post('SubCategoryId');
           
            $date=date('Y-m-d H:i:s');
             $Update_Arr=[
                 'Description'=>$Description,
                 'AppearanceSerial'=>$AppearanceSerial,
                 'CategoryId'=>$CategoryId,
                 'IsActive'=>$IsActive,
                 'updated_at'=>$date
             ];
             $where=['SubCategoryId'=>$SubCategoryId];
             $update=$this->commondatamodel->updateSingleTableData('sub_category',$Update_Arr,$where);
            if ($update) {

                /** audit trail */
                $user_activity = array(
                    "activity_module_admin" => 'Create Category',
                    "activity_module" => 'Category',
                    "action" => 'Update',
                    "from_method" => 'category/update',
                    "module_master_id" => $CategoriId,
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
            redirect('admin/subcategory');
        }else{
            redirect('admin/login','refresh');    
        }
    }
 
}// end of class
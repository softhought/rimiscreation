<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('commondatamodel','commondatamodel',TRUE);            
        $this->load->model('adminmodel/productmodel','product',TRUE);  
        $this->load->model('adminmodel/Subcategorymodel','subcategory',TRUE);          
        $this->load->model('adminmodel/Brandmodel','brand',TRUE);          
        $this->load->model('adminmodel/Vendormodel','vendor',TRUE);          
        $this->load->model('adminmodel/Categorymodel','category',TRUE);          
       
    }


    public function index(){   
        $session = $this->session->userdata('adminuser_data');
        if($this->session->userdata('adminuser_data'))
        {            
            $header="";
            $result['productList']=$this->product->productList();
            $page="admin/product/list";
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
            $result['ProductId']='';
            $result['SubCategoryList']=$this->subcategory->getOnlyActiveSubCategoryList();
            $result['CategoryList']=$this->category->getOnlyActiveCategoryList();
            $result['VendorList']=$this->vendor->getOnlyActiveVendorList();
            $result['BrandList']=$this->brand->getOnlyActiveBrandList();
            $page="admin/product/create_and_edit";
            adminbody_method($result, $page, $header, $session);
        }else{
            redirect('admin/login','refresh');    
        }
    }

    public function edit(){   
        $session = $this->session->userdata('adminuser_data');
        if($this->session->userdata('adminuser_data'))
        {            
            $ProductId=$this->uri->segment(4);
            $header="";
            $result['MODE']='EDIT';
            $result['ProductId']=$ProductId;
            $result['ProductData']=$this->product->getProductDataByID($ProductId);
            // pre($result['ProductData']);exit;
            $result['CategoryList']=$this->category->getOnlyActiveCategoryList();
            $result['SubCategoryList']=$this->subcategory->getOnlyActiveSubCategoryList();
            $result['VendorList']=$this->vendor->getOnlyActiveVendorList();
            $result['BrandList']=$this->brand->getOnlyActiveBrandList();
            $page="admin/product/create_and_edit";
            adminbody_method($result, $page, $header, $session);
        }else{
            redirect('admin/login','refresh');    
        }
    }

    public function store(){   
        $session = $this->session->userdata('adminuser_data');
        if($this->session->userdata('adminuser_data'))
        {
            $CategoryId=$this->input->post('CategoryId');
            $SubCategoryId=$this->input->post('SubCategoryId');
            $VendorId=$this->input->post('VendorId');
            $ProductName=$this->input->post('ProductName');
            $Description=$this->input->post('Description');
            $BrandId=$this->input->post('BrandId');
            $IsActive=$this->input->post('IsActive');

            $ProductCode=$this->input->post('ProductCode');
            $Price=$this->input->post('Price');
            $Size=$this->input->post('Size');
            $Color=$this->input->post('Color');
            $InStock=$this->input->post('InStock');
           
             $master_Arr=[
                 'CategoryId'=>$CategoryId,
                 'SubCategoryId'=>$SubCategoryId,
                 'VendorId'=>$VendorId,
                 'ProductName'=>$ProductName,
                 'Description'=>$Description,
                 'BrandId'=>$BrandId,
                 'IsActive'=>$IsActive
             ];

             $detail_Arr=[
                'ProductCode'=>$ProductCode,
                'Price'=>$Price,
                'Size'=>$Size,
                'Color'=>$Color,
                'InStock'=>$InStock
            ];
// pre($detail_Arr);
            
            $id= $this->product->insertProductMasterDetail($master_Arr,$detail_Arr);
            if ($id>0) {

                /** audit trail */
                $user_activity = array(
                    "activity_module_admin" => 'Create Product',
                    "activity_module" => 'Product',
                    "action" => 'Insert',
                    "from_method" => 'product/store',
                    "module_master_id" => $id,
                    "user_id" =>$session['userid'],
                    "table_name" => 'product_master,product_detail',
                    "user_browser" => getUserBrowserName(),
                    "user_platform" =>  getUserPlatform(),
                    'ip_address'=>getUserIPAddress()
                );

                $this->commondatamodel->insertSingleTableData('activity_log',$user_activity);


                $this->session->set_flashdata('success', 'Created successfully');
            }else{
                $this->session->set_flashdata('error', 'oops! an error occur');
            }
            redirect('admin/product');
        }else{
            redirect('admin/login','refresh');    
        }
    }

    public function update(){   
        $session = $this->session->userdata('adminuser_data');
        if($this->session->userdata('adminuser_data'))
        {
            $CategoryId=$this->input->post('CategoryId');
            $SubCategoryId=$this->input->post('SubCategoryId');
            $VendorId=$this->input->post('VendorId');
            $ProductName=$this->input->post('ProductName');
            $Description=$this->input->post('Description');
            $BrandId=$this->input->post('BrandId');
            $IsActive=$this->input->post('IsActive');

            $ProductCode=$this->input->post('ProductCode');
            $Price=$this->input->post('Price');            
            $Size=$this->input->post('Size');
            $Color=$this->input->post('Color');
            $InStock=$this->input->post('InStock');            
            $ProductId=$this->input->post('ProductId');
           
             $master_Arr=[
                 'CategoryId'=>$CategoryId,
                 'SubCategoryId'=>$SubCategoryId,
                 'VendorId'=>$VendorId,
                 'ProductName'=>$ProductName,
                 'Description'=>$Description,
                 'BrandId'=>$BrandId,
                 'IsActive'=>$IsActive
             ];

             $detail_Arr=[
                'ProductCode'=>$ProductCode,
                'Price'=>$Price,
                'Size'=>$Size,
                'Color'=>$Color,
                'InStock'=>$InStock
            ];
// pre($detail_Arr);
            
            $update= $this->product->updateProductMasterDetail($master_Arr,$detail_Arr,$ProductId);
            if ($update) {

                /** audit trail */
                $user_activity = array(
                    "activity_module_admin" => 'Create Product',
                    "activity_module" => 'Product',
                    "action" => 'Update',
                    "from_method" => 'product/update',
                    "module_master_id" => $ProductId,
                    "user_id" =>$session['userid'],
                    "table_name" => 'product_master,product_detail',
                    "user_browser" => getUserBrowserName(),
                    "user_platform" =>  getUserPlatform(),
                    'ip_address'=>getUserIPAddress()
                );

                $this->commondatamodel->insertSingleTableData('activity_log',$user_activity);


                $this->session->set_flashdata('success', 'Updated successfully');
            }else{
                $this->session->set_flashdata('error', 'oops! an error occur');
            }
            redirect('admin/product');
        }else{
            redirect('admin/login','refresh');    
        }
    }

 


}// end of class
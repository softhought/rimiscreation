<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library("pagination");
        $this->load->helper('url');
        $this->load->model('commondatamodel','commondatamodel',TRUE);    
        $this->load->model('Productmodel','product',TRUE);         
       
    }

    public function index(){    
        $session="";
        $header="";
        $result['SessionData']=array();
        $result['ProductList']=[];
        $config = array();
        $result["links"] ="";
        $page = 1;
        $where=['IsActive'=>'Y'];
        $Catagory=$this->commondatamodel->getSingleRowByWhereOrderBy('category_master',$where,'CategoryId');
        if(sizeof($Catagory)>0){
            $CategoryId=$Catagory->CategoryId;
            
            $config["base_url"] = base_url().'home/Catagory/'.$CategoryId;
            $config["total_rows"] = $this->product->getTotalProductCountByCatagoryId($CategoryId);
            $config["per_page"] = 10;
            $config["uri_segment"] = 4;

            $config['full_tag_open'] = '<ul>';
            $config['full_tag_close'] ='</ul>';
            $config['cur_tag_open'] ='<li class="active"><span>';
            $config['cur_tag_close'] ='</span></li>';
            $config['next_tag_open'] ='<li>';
            $config['next_tag_close'] ='</li>';            
            $config['prev_link'] = '&lt;';
            $config['prev_tag_open'] ='<li>';
            $config['prev_tag_close'] ='</li>';
            $config['num_tag_open'] ='<li>';
            $config['num_tag_close'] ='</li>';
            $config['last_link'] ='>>';
            $config['last_tag_open'] ='<li>';
            $config['last_tag_close'] ='</li>';

            $this->pagination->initialize($config);
            
            $result["links"] = $this->pagination->create_links();

           $start = ($page-1)*$config["per_page"];

            $result['ProductList']=$this->product->getproductByCatagoryId($CategoryId,$config["per_page"],$start);
        }
        $result['ProductSideList']=$this->product->GeAllActiveCatagorySubcatagoryList();
        if($this->session->userdata('cart_product'))
        {
            $result['SessionData']=$this->session->userdata('cart_product');
        }
       

        // pre($result['SessionData']);exit;
        $page="user-view/product/product-list";
        createbody_method($result, $page, $header, $session);
    }

    public function view(){     
        $ProductId=$this->uri->segment(3);
        $session="";
        $result['ProductData']=$this->product->getproductWithAllImgByProductId($ProductId);
        $header="";
        $result['SessionData']=array();
        $result['ProductId']=$ProductId;

        if($this->session->userdata('cart_product'))
        {
            $result['SessionData']=$this->session->userdata('cart_product');
        }


        $page="user-view/product/product-view";
        createbody_method($result, $page, $header, $session);


    }

    public function getproductByCatagoryId(){  
        
        $CategoryId=($this->input->post('CatagoryId'))? $this->input->post('CatagoryId') :  $this->uri->segment(3); 
        $result['SessionData']=array();
        $where=['IsActive'=>'Y'];
        $page = 1;
        $config["base_url"] = base_url().'home/Catagory/'.$CategoryId;
        $config["total_rows"] = $this->product->getTotalProductCountByCatagoryId($CategoryId);
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;

        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] ='</ul>';
        $config['cur_tag_open'] ='<li class="active"><span>';
        $config['cur_tag_close'] ='</span></li>';
        $config['next_tag_open'] ='<li>';
        $config['next_tag_close'] ='</li>';            
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] ='<li>';
        $config['prev_tag_close'] ='</li>';
        $config['num_tag_open'] ='<li>';
        $config['num_tag_close'] ='</li>';
        $config['last_link'] ='>>';
        $config['last_tag_open'] ='<li>';
        $config['last_tag_close'] ='</li>';

        $this->pagination->initialize($config);
        
        $result["links"] = $this->pagination->create_links();

        $start = ($page-1)*$config["per_page"];

        $result['ProductList']=$this->product->getproductByCatagoryId($CategoryId,$config["per_page"],$start);    
        if($this->session->userdata('cart_product'))
        {
            $result['SessionData']=$this->session->userdata('cart_product');
        } 

        // pre($result['ProductSideList']);exit;
        $page="user-view/product/product-list-partialview";
        echo $this->load->view($page, $result, TRUE);
    }
 

    public function getproductBySubCatagoryId()
    {  
        
        $SubCategoryId=($this->input->post('SubCategoryId'))? $this->input->post('SubCategoryId') :  $this->uri->segment(3); 
        $page = 1;
        $where=['IsActive'=>'Y'];
        $result['SessionData']=array();
        $config["base_url"] = base_url().'home/SubCatagory/'.$SubCategoryId;
        $config["total_rows"] = $this->product->getproductTotalCountBySubCatagoryId($SubCategoryId);
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;

        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] ='</ul>';
        $config['cur_tag_open'] ='<li class="active"><span>';
        $config['cur_tag_close'] ='</span></li>';
        $config['next_tag_open'] ='<li>';
        $config['next_tag_close'] ='</li>';            
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] ='<li>';
        $config['prev_tag_close'] ='</li>';
        $config['num_tag_open'] ='<li>';
        $config['num_tag_close'] ='</li>';
        $config['last_link'] ='>>';
        $config['last_tag_open'] ='<li>';
        $config['last_tag_close'] ='</li>';

        $this->pagination->initialize($config);
        
        $result["links"] = $this->pagination->create_links();

        $start = ($page-1)*$config["per_page"];

       $result['ProductList']=$this->product->getproductBySubCatagoryId($SubCategoryId,$config["per_page"],$start); 
       if($this->session->userdata('cart_product'))
        {
            $result['SessionData']=$this->session->userdata('cart_product');
        }      

        // pre($result['ProductSideList']);exit;
        $page="user-view/product/product-list-partialview";
        echo $this->load->view($page, $result, TRUE);
    }





    public function Catagory(){  
        
        $CategoryId=($this->input->post('CatagoryId'))? $this->input->post('CatagoryId') :  $this->uri->segment(3); 

        $where=['IsActive'=>'Y'];
        $result['SessionData']=array();
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
        $config["base_url"] = base_url().'home/Catagory/'.$CategoryId;
        $config["total_rows"] = $this->product->getTotalProductCountByCatagoryId($CategoryId);
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;

        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] ='</ul>';
        $config['cur_tag_open'] ='<li class="active"><span>';
        $config['cur_tag_close'] ='</span></li>';
        $config['next_tag_open'] ='<li>';
        $config['next_tag_close'] ='</li>';            
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] ='<li>';
        $config['prev_tag_close'] ='</li>';
        $config['num_tag_open'] ='<li>';
        $config['num_tag_close'] ='</li>';
        $config['last_link'] ='>>';
        $config['last_tag_open'] ='<li>';
        $config['last_tag_close'] ='</li>';

        $this->pagination->initialize($config);
        
        $result["links"] = $this->pagination->create_links();

        $start = ($page-1)*$config["per_page"];

        $result['ProductList']=$this->product->getproductByCatagoryId($CategoryId,$config["per_page"],$start);     
        $result['ProductSideList']=$this->product->GeAllActiveCatagorySubcatagoryList();
        if($this->session->userdata('cart_product'))
        {
            $result['SessionData']=$this->session->userdata('cart_product');
        }   
        // pre($result['ProductSideList']);exit;
        $page="user-view/product/product-list";
        createbody_method($result, $page, $header="", $session="");
    }
 

    public function SubCatagory()
    {  
        
        $SubCategoryId=($this->input->post('SubCategoryId'))? $this->input->post('SubCategoryId') :  $this->uri->segment(3); 
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
        $where=['IsActive'=>'Y'];
        $result['SessionData']=array();
        $config["base_url"] = base_url().'home/SubCatagory/'.$SubCategoryId;
        $config["total_rows"] = $this->product->getproductTotalCountBySubCatagoryId($SubCategoryId);
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;

        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] ='</ul>';
        $config['cur_tag_open'] ='<li class="active"><span>';
        $config['cur_tag_close'] ='</span></li>';
        $config['next_tag_open'] ='<li>';
        $config['next_tag_close'] ='</li>';            
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] ='<li>';
        $config['prev_tag_close'] ='</li>';
        $config['num_tag_open'] ='<li>';
        $config['num_tag_close'] ='</li>';
        $config['last_link'] ='>>';
        $config['last_tag_open'] ='<li>';
        $config['last_tag_close'] ='</li>';

        $this->pagination->initialize($config);
        
        $result["links"] = $this->pagination->create_links();

        $start = ($page-1)*$config["per_page"];

       $result['ProductList']=$this->product->getproductBySubCatagoryId($SubCategoryId,$config["per_page"],$start);       
       $result['ProductSideList']=$this->product->GeAllActiveCatagorySubcatagoryList();
       if($this->session->userdata('cart_product'))
        {
            $result['SessionData']=$this->session->userdata('cart_product');
        }   
        // pre($result['ProductSideList']);exit;
        $page="user-view/product/product-list";
        createbody_method($result, $page, $header="", $session="");
    }
 

    











}// end of class
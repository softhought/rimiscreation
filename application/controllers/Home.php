<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
        $result['SessionData']=array();
        // $result['BestSellers']=$this->product->getBestSellers();
        // $result['Bags']=$this->product->getAllProductOnlyByCatagryID(1);
        // $result['HomeDecor']=$this->product->getAllProductOnlyByCatagryID(3);
        // $result['CorporateProducts']=$this->product->getAllProductOnlyByCatagryID(2);
        if($this->session->userdata('cart_product'))
        {
            $result['SessionData']=$this->session->userdata('cart_product');
        }


        $result['BestSellers']=array();
        $result['GenuineLeather']=array();
        $result['Canvas']=array();
        $result['Durie']=array();
        $result['HomeDecor']=array();
        $result['CorporateProducts']=array();

        $BestSellers=$this->product->getBestSellers();
        $GenuineLeather=$this->product->getAllProductOnlyBySubCatagoryId(1);
        $Canvas=$this->product->getAllProductOnlyBySubCatagoryId(2);
        $Durie=$this->product->getAllProductOnlyBySubCatagoryId(3);
        $HomeDecor=$this->product->getAllProductOnlyByCatagryID(3);
        $CorporateProducts=$this->product->getAllProductOnlyByCatagryID(2);

        if (sizeof($BestSellers)>4) {
            $result['BestSellers']=$BestSellers;
        }   
        if (sizeof($GenuineLeather)>4) {
            $result['GenuineLeather']=$GenuineLeather;
        }
        if (sizeof($Canvas)>4) {
            $result['Canvas']=$Canvas;
        }
        if (sizeof($Durie)>4) {
            $result['Durie']=$Durie;
        }
        if (sizeof($HomeDecor)>4) {
            $result['HomeDecor']=$HomeDecor;
        }
        if (sizeof($CorporateProducts)>4) {
            $result['CorporateProducts']=$CorporateProducts;
        }


        $header="";
        $page="user-view/home/home";
        createbody_method($result, $page, $header, $session);


    }
   

    











}// end of class
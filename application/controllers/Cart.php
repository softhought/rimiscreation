<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('commondatamodel','commondatamodel',TRUE);    
        $this->load->model('Productmodel','product',TRUE);         
       
    }

    public function index(){    
        $session=$this->session->userdata('cart_product');
        $header="";
        $Products=[];
        
        if($session){
            foreach ($session as $Product) {
                // pre($Product['product']);exit;
                $Products[]=$this->product->getSingleProductByProductIdForCartList($Product['product'],$Product['count']);          
            }
        }
        
        $result['CartItemList']=$Products;
        //  pre($Products);exit;
        $page="user-view/cart/cart-list";
        createbody_method($result, $page, $header, $session);
    }

    // public function checkout(){     
    //     $session="";
    //     $result="";
    //     $header="";
    //     $page="user-view/cart/checkout";
    //     createbody_method($result, $page, $header, $session);


    // }
    // public function checkout2(){     
    //     $session="";
    //     $result="";
    //     $header="";
    //     $page="user-view/cart/checkout copy";
    //     createbody_method($result, $page, $header, $session);


    // }

    public function BuyNow() // need to impliment  
    {

        //    $this->session->unset_userdata('cart_product');
        $session=$this->session->userdata('cart_product');
        $product=$this->input->post('ProductId');
        $user=array();
        $TotalCartAmount=0;  
        
        if(sizeof($session)>0)
        {
            
            if ($this->CheckIfIdInArray($product, $session)) {
                for ($i=0; $i < sizeof($session) ; $i++) { 

                    if ($session[$i]['product']==$product) {
                        $user[$i]=[
                            "product"=>$session[$i]['product'],
                            "count"=>$session[$i]['count']+1,
                            "price"=>$this->product->getProductTotalPriceProductId($product)
                        ];    
                    }
                }
                $user=array_replace($session,$user);
                // echo 'hello';
                // pre($user);
                // exit;
            } else{
                $user[sizeof($session)] =array(
                    "product"=>$product,
                    "count"=>1,
                    "price"=>$this->product->getProductTotalPriceProductId($product)
        
                );
                $user=array_merge($session,$user);
                // $this->session->unset_userdata('cart_data');
                // echo 'hi';
                // pre($user);
                // exit;
            }
                        

        }else{
            $user[] =array(
                "product"=>$product,
                "count"=>1,
                "price"=>$this->product->getProductTotalPriceProductId($product)
    
            );            
        }

        
        $this->session->set_userdata("cart_product", array_values($user));
        $session=$this->session->userdata('cart_product');

        // pre($user);
        // exit;  
        foreach ($session as $Product) {
            $price=0;
            for ($i=0; $i <$Product['count'] ; $i++) { 
                $price+=$Product['price'];
            }
            $TotalCartAmount+=$price;
        }
        
        
        $cart_amt_count=array(
            "CartCount" => sizeof($session),
            "TotalCartAmount" => $TotalCartAmount
        );
        $this->session->set_userdata("cart_amt_count", $cart_amt_count);

        $json_response = $cart_amt_count;
        header('Content-Type: application/json');
        echo json_encode( $json_response );
        exit;
    }



    public function addToCart()
    {

        //    $this->session->unset_userdata('cart_product');
        $session=$this->session->userdata('cart_product');
        $product=$this->input->post('ProductId');
        $user=array();
        $TotalCartAmount=0;  
        
        if(sizeof($session)>0)
        {
            
            if ($this->CheckIfIdInArray($product, $session)) {
                for ($i=0; $i < sizeof($session) ; $i++) { 

                    if ($session[$i]['product']==$product) {
                        $user[$i]=[
                            "product"=>$session[$i]['product'],
                            "count"=>$session[$i]['count']+1,
                            "price"=>$this->product->getProductTotalPriceProductId($product)
                        ];    
                    }
                }
                $user=array_replace($session,$user);
                // echo 'hello';
                // pre($user);
                // exit;
            } else{
                $user[sizeof($session)] =array(
                    "product"=>$product,
                    "count"=>1,
                    "price"=>$this->product->getProductTotalPriceProductId($product)
        
                );
                $user=array_merge($session,$user);
                // $this->session->unset_userdata('cart_data');
                // echo 'hi';
                // pre($user);
                // exit;
            }
                        

        }else{
            $user[] =array(
                "product"=>$product,
                "count"=>1,
                "price"=>$this->product->getProductTotalPriceProductId($product)
    
            );            
        }

        
        $this->session->set_userdata("cart_product", array_values($user));
        $session=$this->session->userdata('cart_product');

        // pre($user);
        // exit;  
        foreach ($session as $Product) {
            $price=0;
            for ($i=0; $i <$Product['count'] ; $i++) { 
                $price+=$Product['price'];
            }
            $TotalCartAmount+=$price;
        }
        
        
        $cart_amt_count=array(
            "CartCount" => sizeof($session),
            "TotalCartAmount" => $TotalCartAmount
        );
        $this->session->set_userdata("cart_amt_count", $cart_amt_count);

        $json_response = $cart_amt_count;
        header('Content-Type: application/json');
        echo json_encode( $json_response );
        exit;
    }


    public function RemoveCart()
    {
        
        $session = $this->session->userdata('cart_product');

        $product=$this->input->post('ProductId');
        $RemoveMode=$this->input->post('RemoveMode'); /*$RemoveMode='Count' means substaract 1 from product count, and $RemoveMode='Product' means remove the whole product from session*/
        $user=array();
        $TotalCartAmount=0;  
            
            if ($RemoveMode=="Count") {
                for ($i=0; $i < sizeof($session) ; $i++) { 
                    $count=$session[$i]['count']-1;
                    if ($session[$i]['product']==$product && $count!=0) {
                        $user[$i]=[
                            "product"=>$session[$i]['product'],
                            "count"=>$count,
                            "price"=>$this->product->getProductTotalPriceProductId($product)
                        ];    
                    }
                }
                $user=array_replace($session,$user);
                // echo 'hello';
                // pre($user);
                // exit;
            } else{
                for ($i=0; $i < sizeof($session) ; $i++) { 

                    if ($session[$i]['product']==$product) {
                        unset($session[$i]);                          
                    }
                }
                $user=$session; 
            }
               

        
        $this->session->set_userdata("cart_product", array_values($user));
        $session=$this->session->userdata('cart_product');

        // pre($session);
        // pre($user);
        // exit;  
        foreach ($session as $Product) {
            $price=0;
            for ($i=0; $i <$Product['count'] ; $i++) { 
                $price+=$Product['price'];
            }
            $TotalCartAmount+=$price;
        }
        
        
        $cart_amt_count=array(
            "CartCount" => sizeof($session),
            "TotalCartAmount" => $TotalCartAmount
        );
        $this->session->set_userdata("cart_amt_count", $cart_amt_count);

        $json_response = $cart_amt_count;
        

        // $ProductId=$this->input->post('ProductId');
        // $array= explode(",",$session['ProductId']);
        // array_splice($array, array_search($ProductId, $array ), 1);
        // $TotalCartAmount=0;
        // foreach ($array as $ProductId) {
        //     $TotalCartAmount+=$this->product->getProductTotalPriceProductId($ProductId);
        // }
        // $session['ProductId']=implode(',', $array);
        // $session['CartCount']=$session['CartCount']-1;
        // $session['TotalCartAmount']=$TotalCartAmount;
        // $this->session->set_userdata("cart_product", $session);

        // $session = $this->session->userdata('cart_product');
        
        // $json_response = array(
        //     "ProductId" => $session['ProductId'],
        //     "CartCount" => $session['CartCount'],
        //     "CartAmt" => $session['TotalCartAmount']
        // );


        header('Content-Type: application/json');
        echo json_encode( $json_response );
        exit;
    }


    public function clear(){
        $this->session->unset_userdata('cart_amt_count');
           $this->session->unset_userdata('cart_product');
    }


    function CheckIfIdInArray($id, $array) {
        $did=0;
       foreach ($array as $key => $val) {
           if ($val['product'] === $id) {               
               $did++;
           }
       }
        if($did !=0) {
            return true;
        }else {
            return false;
        }
    }



}// end of class
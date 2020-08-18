<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('createbody_method'))
{
    function createbody_method($body_content_data = '',$body_content_page = '',$body_content_header='',$data,$heared_menu_content='')
    {
    //   pre($body_content_data);exit;
	  
	  $CI =& get_instance();
	  
	  $CI->load->library('template');
	  $CI->load->library('session');
	 //  $CI->load->model('homemodel'); // For Testimonial
	  $CI->load->model('commondatamodel'); 
	//   $CI->load->model('menumodel','menumodel',TRUE);
	  $session_cart=$CI->session->userdata('cart_product');
	  $session=$CI->session->userdata('webuser_data');
	  $session_amt_count=$CI->session->userdata('cart_amt_count');
	  /* menu */
	  $menu = array();
	//   $menu = $CI->menumodel->getAllAdministrativeMenu($session['userid']);
		  
	  $data['bodyview'] = $body_content_page;
	  $data['leftmenusidebar'] = '';
	  $data['headermenu'] = $body_content_header;
	 //  $data['career_enquery'] =  $CI->commondatamodel->rowcount('career_enquery');  
	if($session_amt_count){
		$data['CartAmt']=$session_amt_count['TotalCartAmount'];
		$data['CartProductCount']=$session_amt_count['CartCount'];
	}else{
		$data['CartAmt']=0;
		$data['CartProductCount']=0;
	}
	 
	$data['userid']=$session['userid'];
	$data['username']=$session['username'];
	
	 $CI->template->setHeader($heared_menu_content);
	 $CI->template->setBody($body_content_data);
	 $CI->template->setMenu($menu);
	
	 $CI->template->view('layout/default_view', array('body'=>$body_content_page), $data);
		
	
    }   
}
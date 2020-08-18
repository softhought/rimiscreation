<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('adminbody_method'))
{
    function adminbody_method(
    		$body_content_data = '',
    		$body_content_page = '',
    		$body_content_header='',
    		$data,
    		$heared_menu_content=''
    	)
    {
      
	  $data = [];
	  $CI =& get_instance();
	  
	
	 $CI->load->library('template');
	 $CI->load->library('session');
	//  $CI->load->model('homemodel'); // For Testimonial
	 $CI->load->model('commondatamodel'); 
	 $CI->load->model('adminmodel/menumodel','menumodel',TRUE);
	 $session=$CI->session->userdata('adminuser_data');
	 /* menu */
	 $menu = $CI->menumodel->getAllAdministrativeMenu($session['userid']);
		 
	 $data['bodyview'] = $body_content_page;
	 $data['leftmenusidebar'] = '';
	 $data['headermenu'] = $body_content_header;
	//  $data['career_enquery'] =  $CI->commondatamodel->rowcount('career_enquery');
	//  $data['enquery'] = $CI->commondatamodel->rowcount('enquery');
	//  $data['subscribe_details'] = $CI->commondatamodel->rowcount('subscribe_details');
	//  $data['product_details'] = $CI->commondatamodel->rowcount('product_details');
	//  $data['career_job'] = $CI->commondatamodel->rowcount('career_job');
	 
	
	 $CI->template->setHeader($heared_menu_content);
	 $CI->template->setBody($body_content_data);
	 $CI->template->setMenu($menu);
	 $data['user']=$session['name'];
	//  pre($session['adminData']);
	//  $data['firstname'] =$session['adminData']->firstname;
	//  $data['lastname'] =$session['adminData']->lastname;
	//  $data['type'] =$session['adminData']->type;
	//  $data['userName'] =$session['adminData']->userName;
	 
	// $CI->template->view('default_view', array('body'=>$body_content_page,'leftmenu'=>'leftmenu_view'), $data);
	   $CI->template->view('layout/admin_default_view', array('body'=>$body_content_page), $data);
		
	
    }   
}
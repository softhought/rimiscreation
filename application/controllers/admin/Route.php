<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Route extends CI_Controller {

    public function index(){     
        redirect('admin/login', 'refresh');
     }
 
}// end of class
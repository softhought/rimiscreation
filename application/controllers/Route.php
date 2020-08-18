<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Route extends CI_Controller {

    public function index(){     
        redirect('Home', 'refresh');
     }
 
}// end of class
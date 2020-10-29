<?php
/**
 * Home page of DoctorU
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 1. Render the home page of the patient side
 */

class Home extends CI_Controller {

    function __construct(){
        parent:: __construct();
		$this->load->helper('url');
        $this->load->library('session');
    }

    public function index(){
        $this->load->view('users/nav');
        $this->load->view('users/homePage');
        
    }
}

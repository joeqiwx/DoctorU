<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 1. Render the diagnosis page of the patient side
 */
class Ddiagnosis extends CI_Controller {

    function __construct(){
        parent:: __construct();
		$this->load->helper('url');
        $this->load->library('session');
        $this->load->model('symptoms');
    }

    public function index(){
        $this->load->view('users/nav');
        $this->load->view('users/diagnosis');
        
    }
}

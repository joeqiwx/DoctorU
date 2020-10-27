<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checker extends CI_Controller {

    function __construct(){
        parent:: __construct();
		$this->load->helper('url');
		$this->load->library('session');
    }

    public function index()
    {
        $this->load->view('users/sympton-checker');
    }


}
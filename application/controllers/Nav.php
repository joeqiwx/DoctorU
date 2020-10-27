<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nav extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');

    }
    public function index()
    {
        $this->load->view('users/nav');
    }
}
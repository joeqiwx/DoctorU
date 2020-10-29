<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 1. Retrieve different symptoms description from the database
 */
class Checker extends CI_Controller {

    function __construct(){
        parent:: __construct();
		$this->load->helper('url');
        $this->load->library('session');
        $this->load->model('symptoms');
    }

    /**
     * 1. Render the front-end web page
     */
    public function index(){
        $this->load->view('users/nav');
        $this->load->view('users/sympton-checker');
        
    }
    /**
     * 1. Get the symptoms description from the database
     * 2. Parse the data to the front-end
     */
    public function result($symptomName){
        $result = $this->symptoms->showSymptoms($symptomName);
        echo json_encode($result);
    }


}
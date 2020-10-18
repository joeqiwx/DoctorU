<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checker extends CI_Controller {

    function __construct(){
        parent:: __construct();
		$this->load->helper('url');
        $this->load->library('session');
        $this->load->model('symptoms');
    }

    public function index(){
        print_r($this->input->post('symptoms'));
        $this->load->view('users/sympton-checker');
        
    }

    public function result($symptomName){
        $result = $this->symptoms->showSymptoms($symptomName);
        echo json_encode($result);
    }


}
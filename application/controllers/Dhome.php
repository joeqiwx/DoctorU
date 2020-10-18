<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dhome extends  CI_Controller{
	public function __construct(){
		parent:: __construct();
		$this->load->database();
		$this->load->model('user_calendar_model');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
	}

	function index(){
		$this->load->view('users/dhome');
    }
}
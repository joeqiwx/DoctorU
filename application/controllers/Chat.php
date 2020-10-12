<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

    function __construct(){
        parent:: __construct();
        $this->load->model('message', 'm');
        $this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
    }

    public function index()
    {
        $this->load->view('users/chat');
    }

    public function showAllMessage(){
        $result = $this->m->showAllMessage();
        echo json_encode($result);
    }

    public function addMessage($user_name){
        $result = $this->m->addMessage($user_name);
        $msg['success'] = false;
        $msg['type'] = 'add';
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }
}

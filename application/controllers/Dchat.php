<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dchat extends CI_Controller {

    function __construct(){
        parent:: __construct();
        $this->load->model('message');
        $this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
        $this->load->model('relation');
    }

    public function index(){
        $userId = $this->getUserId();
        if ($this->relation->hasFriend($userId)) {
            $patientId = $this->relation->getFirstFriend($userId);
            redirect('Dchat/haveChat/'.$userId.'/'.$patientId);
//            print_r("yes");
        }else {
            $this->load->view('users/doctor_no_match');
//            print_r("no");
        }
    }

    public function haveChat($userId, $patientId){
        $relationList['user_id'] = $userId;
        $relationList['patient_id'] = $patientId;
        $relationList['user_name'] = $this->getUserName($userId);
        $relationList['patient_name'] = $this->getUserName($patientId);
        $relationList['friends'] = $this->relation->getFriends($userId);
        $this->load->view('users/doctor_chat',$relationList);
    }

    public function getUserId() {
        $user_sess = $this->session->userdata('logged_in_doctor');
        $user_email = $user_sess['email'];
        $userIdArray = $this->relation->getUserId($user_email);
        $userId = $userIdArray[0]['userid'];
        return $userId;
    }

    public function showAllMessage($user_id, $patient_id){
        $result = $this->message->showAllMessage($user_id, $patient_id);
        echo json_encode($result);
    }

    public function addMessage($sender_name, $receiver_name, $sender_id, $receiver_id){
        $result = $this->message->doctorAddMessage($sender_name, $receiver_name, $sender_id, $receiver_id);
        $msg['success'] = false;
        $msg['type'] = 'add';
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    // Obtain the current user name and the doctor name
    public function getUserName($userId) {
        $userNameArray = $this->relation->getUserName($userId);
        $userName = $userNameArray[0];
        return $userName['username'];
    }
    
}

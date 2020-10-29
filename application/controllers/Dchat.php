<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 1. Display the content of the chat in doctor side
 * 2. Add the new message to the database
 */

class Dchat extends CI_Controller {

    function __construct(){
        parent:: __construct();
        $this->load->model('message');
        $this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
        $this->load->model('relation');
    }

    /**
     * 1. An entry of the other function
     */
    public function index(){
        $userId = $this->getUserId();
        if ($this->relation->hasFriend($userId)) {
            $patientId = $this->relation->getFirstFriend($userId);
            redirect('Dchat/haveChat/'.$userId.'/'.$patientId);
        }else {
            $this->load->view('users/doctor_no_match');
        }
    }

    /**
     * 1. Chat to specific patient
     */
    public function haveChat($userId, $patientId){
        $relationList['user_id'] = $userId;
        $relationList['patient_id'] = $patientId;
        $relationList['user_name'] = $this->getUserName($userId);
        $relationList['patient_name'] = $this->getUserName($patientId);
        $relationList['friends'] = $this->relation->getFriends($userId);
        $this->load->view('users/doctor_chat',$relationList);
    }
    /**
     * 1. Get the doctor id from the database
     */
    public function getUserId() {
        $user_sess = $this->session->userdata('logged_in_doctor');
        $user_email = $user_sess['email'];
        $userIdArray = $this->relation->getUserId($user_email);
        $userId = $userIdArray[0]['userid'];
        return $userId;
    }

    /**
     * 1. Get the message from database and then parse to the front-end
     */
    public function showAllMessage($user_id, $patient_id){
        $result = $this->message->showAllMessage($user_id, $patient_id);
        echo json_encode($result);
    }

    /**
     * 1. Add the new message to the database
     */
    public function addMessage($sender_name, $receiver_name, $sender_id, $receiver_id){
        $result = $this->message->doctorAddMessage($sender_name, $receiver_name, $sender_id, $receiver_id);
        $msg['success'] = false;
        $msg['type'] = 'add';
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    /**
     * 1. Get the user name from the database
     */
    public function getUserName($userId) {
        $userNameArray = $this->relation->getUserName($userId);
        $userName = $userNameArray[0];
        return $userName['username'];
    }
    
}

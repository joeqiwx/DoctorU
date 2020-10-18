<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

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
            $doctorId = $this->relation->getFirstFriend($userId);
            redirect('chat/haveChat/'.$userId.'/'.$doctorId);
        }else {
            $this->load->view('users/patient_no_match');
        }
    }

    public function matchingDoctor(){
        $userId = $this->getUserId();
        $doctorId = $this->matchDoctor();
        $userName = $this->getUserName($userId);
        $doctorName = $this->getUserName($doctorId);
        $isFriend = $this->relation->isFriend($userId, $doctorId);

        $idList['user_id'] = $userId;
        $idList['doctor_id'] = $doctorId;

        if (count($isFriend) == 0) {
            $relation = array(
                'user_id' => $userId,
                'user_name' => $userName,
                'friend_id' => $doctorId,
                'friend_name' => $doctorName
            );
            $this->relation->createRelation($relation);
            $relation = array(
                'user_id' => $doctorId,
                'user_name' => $doctorName,
                'friend_id' => $userId,
                'friend_name' => $userName
            );
            $this->relation->createRelation($relation);
        }
        redirect('chat/haveChat/'.$userId.'/'.$doctorId);
    }

    public function haveChat($userId, $doctorId){
        $relationList['user_id'] = $userId;
        $relationList['doctor_id'] = $doctorId;
        $relationList['user_name'] = $this->getUserName($userId);
        $relationList['doctor_name'] = $this->getUserName($doctorId);
        $relationList['friends'] = $this->relation->getFriends($userId);
        $this->load->view('users/chat',$relationList);
    }

    public function showAllMessage($user_id, $doctor_id){
        $result = $this->message->showAllMessage($user_id, $doctor_id);
        echo json_encode($result);
    }

    public function addMessage($sender_name, $receiver_name, $sender_id, $receiver_id){
        $result = $this->message->addMessage($sender_name, $receiver_name, $sender_id, $receiver_id);
        $msg['success'] = false;
        $msg['type'] = 'add';
        if($result){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    // Obtain the random doctor id
    public function matchDoctor(){
        $doctorList = $this->relation->selectDoctor();
        $randomMatch = rand(0, count($doctorList) - 1);
        $selectedDoctor = $doctorList[$randomMatch];
        return $selectedDoctor['userid'];
    }

    // Obtain the current user id according to their email stored in session
    public function getUserId() {
        $user_sess = $this->session->userdata('logged_in');
        $user_email = $user_sess['email'];
        $userIdArray = $this->relation->getUserId($user_email);
        $userId = $userIdArray[0]['userid'];
        return $userId;
    }

    // Obtain the current user name and the doctor name
    public function getUserName($userId) {
        $userNameArray = $this->relation->getUserName($userId);
        $userName = $userNameArray[0];
        return $userName['username'];
    }
}

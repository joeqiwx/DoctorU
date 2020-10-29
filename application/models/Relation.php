<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 1. Load the user_relation table from database
 * 2. Load the userInfor table from database
 * 3. Retrieve the corresponding data from user_relation table
 * 4. Retrieve the corresponding data from userInfor table
 * 5. Create the friend relation once the chat 
 * happened between the doctor and patient
 */
class Relation extends CI_Model{
    function __construct() {
        $this->load->database();
        $this->relation = 'user_relation';
        $this->userTable = 'userInfor';
    }

    /**
     * 1. Retrieve the user name from the user_relation table
     */
    public function showAllFriendNames() {
        $this->db->order_by('friend_name', 'asc');
        $query = $this->db->get($this->relation);
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    /**
     * 1. Create the friend relation between patient and doctor
     */
    public function createRelation($relation = array()) {
        $insert = $this->db->insert($this->relation, $relation);
        return $insert?true:false;
    }

    /**
     * 1. Judge whether the specific doctor and patient was friend 
     */
    public function isFriend($user_id, $friend_id) {
        $this->db->select('*');
        $this->db->from($this->relation);
        $this->db->where('user_id', $user_id);
        $this->db->where('friend_id', $friend_id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;

    }

    /**
     * 1. Judge whether the doctor/patient has the friend
     */
    public function hasFriend($user_id) {
        $this->db->select('*');
        $this->db->from($this->relation);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        $result = $query->result_array();
        return !empty($result)?true:false;
    }

    /**
     * 1. Get the all friends of the doctor/patient
     */
    public function getFriends($user_id) {
        $this->db->select('*');
        $this->db->from($this->relation);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        $friends = $query->result_array();
        return !empty($friends)?$friends:false;
    }

    /**
     * Get the frist friend of the doctor/patient
     */
    public function getFirstFriend($user_id) {
        $this->db->select('friend_id');
        $this->db->from($this->relation);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        $result = $query->row();
        return $result->friend_id;
    }


    /**
     * 1. Get related data from the userInfo table
     */
    public function selectDoctor() {
        $this->db->select('*');
        $this->db->from($this->userTable);
        $this->db->where('userType', 'doctor');
        $query = $this->db->get();
        $doctorInformation = $query->result_array();
        return !empty($doctorInformation)?$doctorInformation:false;
    }

    /**
     * 1. Retrieve data from userInfor table
     */
    public function getUserId($email) {
        $this->db->select('userid');
        $this->db->from($this->userTable);
        $this->db->where('email', $email);
        $query = $this->db->get();
        $user_id = $query->result_array();
        return !empty($user_id)?$user_id:false;
    }

    /**
     * 1. Retrieve name from userInfor table
     */
    public function getUserName($userId) {
        $this->db->select('username');
        $this->db->from($this->userTable);
        $this->db->where('userid', $userId);
        $query = $this->db->get();
        $user_name = $query->result_array();
        return !empty($user_name)?$user_name:false;
    }
}
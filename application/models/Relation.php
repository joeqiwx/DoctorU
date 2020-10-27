<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Relation extends CI_Model{
    function __construct() {
        $this->load->database();
        $this->relation = 'user_relation';
        $this->userTable = 'userInfor';
    }

    public function showAllFriendNames() {
        $this->db->order_by('friend_name', 'asc');
        // $query = $this->db->get('message');
        $query = $this->db->get($this->relation);
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function createRelation($relation = array()) {
        $insert = $this->db->insert($this->relation, $relation);
        return $insert?true:false;
    }

    public function isFriend($user_id, $friend_id) {
        $this->db->select('*');
        $this->db->from($this->relation);
        $this->db->where('user_id', $user_id);
        $this->db->where('friend_id', $friend_id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;

    }

    public function hasFriend($user_id) {
        $this->db->select('*');
        $this->db->from($this->relation);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        $result = $query->result_array();
        return !empty($result)?true:false;
    }

    public function getFriends($user_id) {
        $this->db->select('*');
        $this->db->from($this->relation);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        $friends = $query->result_array();
        return !empty($friends)?$friends:false;
    }

    public function getFirstFriend($user_id) {
        $this->db->select('friend_id');
        $this->db->from($this->relation);
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        $result = $query->row();
        return $result->friend_id;
    }


    /*
     * Get related data from the userInfo table
     * */

    // Retrieve data from userInfor table
    public function selectDoctor() {
        $this->db->select('*');
        $this->db->from($this->userTable);
        $this->db->where('userType', 'doctor');
        $query = $this->db->get();
        $doctorInformation = $query->result_array();
        return !empty($doctorInformation)?$doctorInformation:false;
    }

    // Retrieve data from userInfor table
    public function getUserId($email) {
        $this->db->select('userid');
        $this->db->from($this->userTable);
        $this->db->where('email', $email);
        $query = $this->db->get();
        $user_id = $query->result_array();
        return !empty($user_id)?$user_id:false;
    }

    // Retrieve name from userInfor table
    public function getUserName($userId) {
        $this->db->select('username');
        $this->db->from($this->userTable);
        $this->db->where('userid', $userId);
        $query = $this->db->get();
        $user_name = $query->result_array();
        return !empty($user_name)?$user_name:false;
    }
}
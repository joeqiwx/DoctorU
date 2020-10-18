<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Model{
    function __construct() {
        $this->load->database();
        // Set table name
        $this->table = 'information';
    }

    public function showAllMessage($user_id, $doctor_id){

        $sql = "SELECT * from information 
        where (sender_id = $user_id AND receiver_id = $doctor_id) 
        OR (sender_id = $doctor_id AND receiver_id = $user_id)
        ORDER BY created_at ASC";
        $query = $this->db->query($sql);

        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function addMessage($sender_name, $receiver_name, $sender_id, $receiver_id){
        $field = array(
            'message'=>$this->input->post('chat-input'),
            'sender_name'=>$sender_name,
            'receiver_name' =>$receiver_name,
            'sender_id' =>$sender_id,
            'receiver_id' =>$receiver_id,
            'sender_type' => 'patient',
            'receiver_type' => 'doctor',
            'created_at'=>date('Y-m-d H:i:s')
        );
        $this->db->insert($this->table, $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function doctorAddMessage($sender_name, $receiver_name, $sender_id, $receiver_id){
        $field = array(
            'message'=>$this->input->post('chat-input'),
            'sender_name'=>$sender_name,
            'receiver_name' =>$receiver_name,
            'sender_id' =>$sender_id,
            'receiver_id' =>$receiver_id,
            'sender_type' => 'doctor',
            'receiver_type' => 'patient',
            'created_at'=>date('Y-m-d H:i:s')
        );
        $this->db->insert($this->table, $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
    
}
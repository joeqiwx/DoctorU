<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 1. Load the "information table" from the database, 
 * the "information table " stores the chat log between doctor and patient
 * 2. Search the chat content from the database
 * 3. Add the new chat content to the database
 */
class Message extends CI_Model{
    function __construct() {
        $this->load->database();
        // Set table name
        $this->table = 'information';
    }

    /**
     * 1. Search the chat log from the specific doctor-patient relation
     */
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

    /**
     * 1. Add the chat content into the "information table" in patient side
     */
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

    /**
     * 1. Add the chat content into the "information table" in doctor side
     */
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
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Model{
    function __construct() {
        $this->load->database();
        // Set table name
        $this->table = 'message';
    }

    public function showAllMessage(){
        $this->db->order_by('created_at', 'asc');
        // $query = $this->db->get('message');
        $query = $this->db->get($this->table);
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }

    public function addMessage($user_name){
        $field = array(
            'message'=>$this->input->post('chat-input'),
            'username'=>$user_name,
            'created_at'=>date('Y-m-d H:i:s')
        );
        // $this->db->insert('message', $field);
        $this->db->insert($this->table, $field);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }
}
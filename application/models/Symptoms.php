<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Symptoms extends CI_Model{
    function __construct() {
        $this->load->database();
        // Set table name
        $this->symptom = 'symptomInfo';
    }

    public function showSymptoms($symptomName) {
        $this->db->select('*');
        $this->db->from($this->symptom);
        $this->db->where('title', $symptomName);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->result();
        }else{
            return false;
        }
    }
}
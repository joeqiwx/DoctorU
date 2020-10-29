<?php
/** 1. Get the User information in dataset according to the 
 * userdate which get from controller
  */
class Appointment_model extends CI_Model {
    function fetch_patient($pName) {
        $this->db->select('*');
        $this->db->from('userInfor');
        $this->db->where('username', $pName);
        return $this->db->get();
    }
}
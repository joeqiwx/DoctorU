<?php
class Appointment_model extends CI_Model {
    function fetch_patient($pName) {
        $this->db->select('*');
        $this->db->from('userInfor');
        $this->db->where('username', $pName);
        return $this->db->get();
    }
}
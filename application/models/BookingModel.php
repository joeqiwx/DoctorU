<?php

class BookingModel extends CI_Model{

	function fetch_data($language, $dept){
        
        $this->db->select('*');
        $this->db->from('doctor');
        $this->db->join('doctorLanguages', 'doctorLanguages.doctorId = doctor.id');
        $this->db->where('specialist', $dept);
        $this->db->where_in('languageName', $language);
        return $this->db->get();
	}
}
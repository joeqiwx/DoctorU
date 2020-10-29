<?php
/**
 * 1. This model is used to get doctor information from 'doctor' and 'doctorLanguage' 
 * from data set
 */
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
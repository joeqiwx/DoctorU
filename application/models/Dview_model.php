<?php
/**
 * 1. Get the user information from data base 
 */
class Dview_model extends CI_Model{
	function fetch_data($query){
		$this->db->from('userInfor');
		if($query != ''){
			$this->db->where('userType', 'patient');
			$this->db->like('username', $query);
		}
		return $this->db->get();
		
	}
}
<?php


class Dview_model extends CI_Model{
	function fetch_data($query){
		$this->db->from('userInfor');
		if($query != ''){
			$this->db->like('username', $query);
		}
		return $this->db->get();
		
	}
}
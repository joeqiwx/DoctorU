<?php
/**
 * 1.This Model for load,insert,update,deletle data with datebase
 */
class User_calendar_model extends CI_Model {
	function fetch_all_event($user){
		$this->db->order_by('id');
		$this->db->where('user',$user);
		return $this->db->get('events');
	}

	function insert_event($data){
		$this->db->insert('events', $data);
	}

	function update_event($data, $id){
		$this->db->where('id', $id);
		$this->db->update('events', $data);
	}

	function delete_event( $id){
		$this->db->where('id', $id);
		$this->db->delete('events');
	}
}
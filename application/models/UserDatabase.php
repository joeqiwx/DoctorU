<?php
class UserDatabase extends CI_Model {
	public function __construct() {
		$this->load->library('encryption');
	}
	public function registration($data) {
		//$this->load->library('encryption');

		$condition = 'email='."'".$data['email']."'".'or username='."'".$data['username']."'";
		$this->db->select('*');
		$this->db->from('userInfor');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 0) {
			$this->db->insert('userInfor', $data);
			return true;
		} else {
			return false;
		}
	}

	public function login($data) {
		$this->load->library('encryption');
		$query =  $this->db->query('select * from userInfor where email='."'".$data['email']."'");
		$this->db->limit(1);
		$rows = $query->row();
		if ($query->num_rows() == 1) {
			$strongPassword = $rows->password;
			$decode_pass = $this->encryption->decrypt($strongPassword);
		if($decode_pass == $data['password']){
				return true;
			} else {
				return false;
		}
	} else {
		return false;
	}
}

	public function userType($data) {
		$query =  $this->db->query('select * from userInfor where userType = "doctor" and email='."'".$data['email']."'");
		$this->db->limit(1);
		$rows = $query->row();

		if ($query->num_rows() == 1) {
				return true;
		} else {
			return false;
		}
}

	public function read_user_information($email) {
		$condition = "email =" . "'" . $email . "'";
		$this->db->select('*');
		$this->db->from('userInfor');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	
}
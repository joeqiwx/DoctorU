<?php
class UserDatabase extends CI_Model {
	public function __construct() {
		$this->load->library('encryption');
	}
	public function registration($data) {
		//$this->load->library('encryption');

		$condition = 'email='."'".$data['email']."'";
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
			//print_r("dsdsd");
			$this->load->library('encryption');
			//$decode_pass = $this->encryption->decrypt($rows->password);
			// print_r($rows);
			print_r($this->encryption->decrypt('6d36876f6a5bc2c9d8b1188dc3b367deee9f1634b9a48ce5c4'));
			//if ($decode_pass == $data['password']) {
			//	print_r("111");
			$password = $rows->password;
			$type = $rows->userType;
			if($password == $data['password']){
				return true;
				if($data['userType'] == 'doctor') {
					return 1;
				} else {
					print_r("222");
					return 2;
				}
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
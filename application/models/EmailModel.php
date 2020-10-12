<?php
class EmailModel extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->library('email');
	}

	public function sendEmail($receiver){
		$from = "noreply@deco3801-zelda.uqcloud.net";
		$subject = 'Verify email address';

		$message =
			'Dear User,<br><br> Please click on the below activation link to verify your email address<br><br>
        <a href=\'https://deco3801-zelda.uqcloud.net/DoctorU/Users/confirmEmail/'.md5($receiver).'\'>https://deco3801-zelda.uqcloud.net/DoctorU/Users/confirmEmail/'. md5($receiver) .'</a><br><br>Thanks,<br><br>Zelda Team';


		$config = array(
			'protocol' => 'smtp', 
			'smtp_host'=> 'mailhub.eait.uq.edu.au',
			'smtp_port' => 25,
			'mailtype' => 'html', 
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
		);

		$this->load->library('email', $config);
		$this->email->initialize($config);
		$this->email->from('noreply@deco3801-zelda.uqcloud.net');
		$this->email->to($receiver);
		$this->email->subject($subject);
		$this->email->message($message);
		
		
		if($this->email->send()){
			return true;
		}else{
			return false;
		}
	}

	function verifyEmail($key){
		$data = array('status' => 1);
		$this->db->where('md5(email)',$key);
		return $this->db->update('userInfor', $data);    
	}

}
?>

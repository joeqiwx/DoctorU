<?php

class Booking extends CI_Controller {
    function __construct() {
        parent:: __construct();
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('users/booking');
       
    }
    
    function sendEmail()
	{   

        $username = $this->session->userdata['logged_in']['username'];
        $useremail = $this->session->userdata['logged_in']['email'];
		

		$subject = "Thank you for your booking";
		$message = " <p>Hi " . $username . " </p>";
		// print_r($username);
		// print_r($message);
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => 'mailhub.eait.uq.edu.au',
			'smtp_port' => 25,
			'mailtype' => 'html',
			'charset' => 'iso-8859-1',
			'wordwrap' => TRUE
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from('weixin.qi@uqconnect.edu.au');
		$this->email->to($useremail);
		$this->email->subject($subject);
		$this->email->message($message);
		if ($this->email->send()) {
			redirect('Users/homePage');
		}

	}
}


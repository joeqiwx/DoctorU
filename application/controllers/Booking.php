<?php

class Booking extends CI_Controller {
    function __construct() {
		parent:: __construct();
		$this->load->database();
		$this->load->model('BookingModel');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('user_calendar_model');
    }

    public function index() {
		$this->load->view('users/nav');
		$this->load->view('users/booking');
    }
    
    function sendEmail()
	{   
        $username = $this->session->userdata['logged_in']['username'];
		$useremail = $this->session->userdata['logged_in']['email'];
		$dnmae = $this->input->post('name');
		$dept = $this->input->post('specialist');
		$languages = $this->input->post('languages');
		$bookingDate = $this->input->post('bookingDate');
		$bookingTime = $this->input ->post('bookingTime');
		$bookingStartDate = $bookingDate . " " . $bookingTime;
		$bookingEndData = date("Y-m-d H:i:s", strtotime($bookingStartDate . "+30 minutes"));

		$subject = "Thank you for your booking";
		$message = " <p>Hi " . $username . " </p>
					 <p>Visting Person: " . $username . "</p>
					 <p>Hospital: PA Hospital </p>
					 <p>Doctor: " . $dnmae . "</p>
					 <p>Department: " . $dept . "</p>
					 <p>Treatment Time: " . $bookingDate . "," . $bookingTime . "</p>
		";
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
		$this->email->from('noreply@deco3801-zelda.uqcloud.net');
		$this->email->to($useremail);
		$this->email->subject($subject);
		$this->email->message($message);
		if ($this->email->send()) {
			$data_appointment = array(
				'title' => "Appointment by " . $username,
				'start_event' => $bookingStartDate,
				'end_event' => $bookingEndData,
				'user' => $dnmae
			);
			$this->user_calendar_model->insert_event($data_appointment);
			redirect('Users/homePage');
		}

	}

	function fetch()
	{
		$dept = $this->input->post('dept');
		$distance = $this->input->post('distance');
		$languages = $this->input->post('languages');
		$bookingDate = $this->input->post('bookingDate');
		$bookingTime = $this->input ->post('bookingTime');
		$data = $this->BookingModel->fetch_data($languages, $dept);

		foreach ($data -> result_array() as $data_row) {
			$back_data = array(
				'name' => $data_row['name'],
				'specialist' => $data_row['specialist'],
				'email' => $data_row['email'],
				'workingHours' => $data_row['workingHours'],
				'languages' => $data_row['languageName'],
				'bookingDate' => $bookingDate,
				'bookingTime' => $bookingTime
			);
		}
		echo json_encode($back_data);
		// echo $dept, $distance,  $bookingDate, $bookingTime;	
	}
}


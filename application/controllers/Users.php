<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('form');
		$this->load->helper('cookie');
		$this->load->database();
		$this->load->library('form_validation');
		$this->load->library('encryption');
        $this->load->helper('url');
        $this->load->model('UserDatabase');
        $this->load->library('session');
        $this->load->model('EmailModel');
    }
    public function index()
    {
        $this->load->view('users/index');
    }

    public function login(){
       $this->form_validation->set_rules('email', 'Email', 'required');
       $this->form_validation->set_rules('password', 'Password', 'required');
       $this->load->library('encryption');
       if ($this->form_validation->run() == false) {
            $this->load->view('users/login');
       } else {
            $data = array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
            );

            $result = $this->UserDatabase->login($data);
            if($result == true) {
                $email = $this->input->post('email');
                $result = $this->UserDatabase->read_user_information($email);
                
                if ($result != false) {
                    $session_data = array(
                        'username' => $result[0]->username,
						'email' => $result[0]->email,
                    );
                    $type = $this->UserDatabase->userType($data);
                    if($type == true) {
                        $this->load->library('session');
                        $this->session->set_userdata('logged_in_doctor', $session_data);
                        $this->load->view('users/dhome');
                    } else {
                        $this->load->library('session');
                        $this->session->set_userdata('logged_in', $session_data);
                        $this->load->view('users/nav');
                        $this->load->view('users/homePage');
                    }
            }
        } else {
                $data = array (
                    'error_message'=>'Invalid Email or Password',
                );
                $this->load->view('users/login', $data);
            }
        
            //cookies
			if ($result) {
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				if ($this->input->post("remember")) {
					$this->input->set_cookie('email', $email, 86500);
					$this->input->set_cookie('password', $password, 86500);
				} else {
					delete_cookie('email');
					delete_cookie('password');
				}
			}
		}
    }

    public function registration(){
       $this->form_validation->set_rules('username', 'Username', 'required');
       $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
	   $this->form_validation->set_rules('password', 'Password', 'required|callback_valid_password');

	    if ($this->form_validation->run() == false) {
            $this->load->view('users/registration');
        } else {
                $this->load->library('encryption');
                    $data = array(
                        'username' => $this->input->post('username'),
                        'email' => $this->input->post('email'),
                        'password'=>$this->encryption->encrypt($this->input->post('password'))
                    //    'password' => $this->input->post('password'),
                    );
                    if($this->input->post('password') == $this->input->post('conpassword')) {
                        $result = $this->UserDatabase->registration($data);
                        if ($result == true) {
                            if($this->EmailModel->sendEmail($this->input->post('email'))){
                                $data['message_display'] = 'Registration Successfully ! Please confirm the mail that has been sent to your email. ';
                                $this->load->view('users/login', $data);
                            }else {
                                $data['message_display'] = 'Failed send email! Please try again. ';
                                $this->load->view('users/registration', $data);
                            }
                        } else {
                                $data['message_display'] = 'Email or Username already exist!';
                                $this->load->view('users/registration', $data);
                            }
                    } else {
                        $data['message_display'] = 'Password not match !';
                        $this->load->view('users/registration', $data);
                    }
            }
    }

    public function valid_password($password = ''){
        
		$password = trim($password);
		$regex_lowercase = '/[a-zA-Z]/';
		$regex_number = '/[0-9]/';

		if (preg_match_all($regex_lowercase, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The password must be at least one letter.');
			return FALSE;
		}

		if (preg_match_all($regex_number, $password) < 1)
		{
			$this->form_validation->set_message('valid_password', 'The password must have at least one number.');
			return FALSE;
		}

		if (strlen($password) < 5)
		{
			$this->form_validation->set_message('valid_password', 'The password must be at least 5 characters in length.');
			return FALSE;
		}
		return TRUE;
    }
    
    public function logout() {
		$logout_array = array(
			'username' => ''
		);
		$this->load->library('session');
		$this->session->unset_userdata('logged_in', $logout_array);
		$data['message_display'] = 'Successfully Logout';
		$this->load->view('users/login', $data);
    }
    
	public function confirmEmail($hashcode){
		if($this->EmailModel->verifyEmail($hashcode)){
			$data['message_display'] = 'Email address is confirmed !';
			$this->load->view('users/login', $data);
		}else{
			$this->session->set_flashdata('verify', '<div class="alert alert-danger text-center">Email address is not confirmed. Please try to re-register.</div>');
			redirect('users/registration');
		}
	}

    public function homePage(){
        $this->load->view('users/homePage');
    }

    public function profile(){
        $this->load->view('users/profile');
    }

    public function doctor_profile(){
        $this->load->view('users/doctor_profile');
    }
}
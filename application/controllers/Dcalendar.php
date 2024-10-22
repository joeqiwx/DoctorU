<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 1. help data transation from webpagg to dataset
 */
class Dcalendar extends  CI_Controller{
	public function __construct(){
		parent:: __construct();
		$this->load->database();
		$this->load->model('user_calendar_model');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
	}

	function index(){
		$this->load->view('users/dcalendar');
	}

	// get the data from dataset by User_callendar model
	function load(){
		$doctorName = $this->session->userdata['logged_in_doctor']['username'];
		$event_data = $this->user_calendar_model->fetch_all_event($this->session->userdata($doctorName));
		foreach ($event_data->result_array() as $event_row){
			$data[] = array(
				'id' => $event_row['id'],
				'title' => $event_row['title'],
				'start' => $event_row['start_event'],
				'end' => $event_row['end_event']
			);
		}
		echo json_encode($data);
	}

	// get the data from view(webpage) and then insert it to dataset by model function
	function insert(){
		$doctorName = $this->session->userdata['logged_in_doctor']['username'];
		if($this->input->post('title')){
			$data = array(
				'title' => $this->input->post('title') . PHP_EOL. "--from ". $doctorName,
				'start_event' => $this->input->post('start'),
				'end_event' => $this->input->post('end'),
				'user' =>  $this->session->userdata($doctorName)
			);
			$this->user_calendar_model->insert_event($data);
		}
	}

	// get the data from view(webpage) and then update it to dataset by model function
	function update(){
		if($this->input->post('id')) {
			$data = array(
				'title' => $this->input->post('title'),
				'start_event' => $this->input->post('start'),
				'end_event' => $this->input->post('end'),
			);
			$this->user_calendar_model->update_event($data, $this->input->post('id'));
		}
	}

	// get the data from view(webpage) and then delete it to dataset by model function
	function delete(){
		if($this->input->post('id')) {
			$this->user_calendar_model->delete_event($this->input->post('id'));

		}

	}
}
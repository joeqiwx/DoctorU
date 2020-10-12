<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
		// $this->load->view('users/nav');
		$this->load->view('users/dcalendar');
	}

	function load(){
		$event_data = $this->user_calendar_model->fetch_all_event($this->session->userdata['logged_in']['username']);
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

	function insert(){
		if($this->input->post('title')){

			$data = array(
				'title' => $this->input->post('title'),
				'start_event' => $this->input->post('start'),
				'end_event' => $this->input->post('end'),
				'user' => $this->session->userdata['logged_in']['username']
			);
			$this->user_calendar_model->insert_event($data);
		}
	}

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

	function delete(){
		if($this->input->post('id')) {
			$this->user_calendar_model->delete_event($this->input->post('id'));

		}

	}
}
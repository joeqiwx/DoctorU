<?php
/**
 * 1.Controller for data transmation between dataset and webpage
 */
class Dview extends CI_Controller {
    public function __construct(){
		parent:: __construct();
		$this->load->database();
		$this->load->model('Dview_model');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
    }
    
    public function index(){
        $this->load->view('users/dview');
	}
	// fetch the data according to search bar in webpage
	function fetch(){
		$this->load->database();
		$output='';
		$query ='';
		$this->load->model('Dview_model');

		if($this->input->post('query'))
		{
			$query = $this->input->post('query');
		}
		$data = $this->Dview_model->fetch_data($query);
		$output .= '
  		<div class="table-responsive">
     	<table class="table table-bordered table-striped">
      	<tr>
       		<th>Patient Name</th>
       		<th>age</th>
			<th>allergy</th>
			<th>medical history</th>
      	</tr>
  		';

		if($data->num_rows() > 0) {
			$doctorName = $this->session->userdata['logged_in_doctor']['username'];
			foreach($data->result() as $row) {
				$session_data = array(
					'patientName' => $row->username
				);
				$this->session->set_userdata($doctorName, $row->username);
				$output .= '
		  <tr>
			   <td><a href="'.
			   base_url('dcalendar').
			   '">' .$row->username. '</a></td>
		   	<td>'.$row->age.'</td>
			   <td>'.$row->allergy.'</td>
			   <td>'.$row->medicalHistory.'</td>
		  	</tr>
		';}
		}
		else{
			$output .= '<tr>
       <td colspan="5">No Event Found</td>
      </tr>';
		}
		$output .= '</table>';
		echo $output;
	}
}
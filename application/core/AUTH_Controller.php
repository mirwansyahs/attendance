<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AUTH_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_employee');
		date_default_timezone_set('asia/jakarta');

		$this->session->set_flashdata('segment', explode('/', $this->uri->uri_string()));

		if ($this->session->userdata('status') == '') {
			redirect('Auth');
		}else{
			$data = $this->M_employee->select(['EmployeeEmail' => $this->session->userdata('userdata')->EmployeeEmail]);
			if ($data->num_rows() > 0){
				$cekData = $data->row();
				$this->userdata = $cekData;
			}else{
				redirect('Auth');
			}
			
		}
	}

}

/* End of file MY_Auth.php */
/* Location: ./application/core/MY_Auth.php */
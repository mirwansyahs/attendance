<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AUTH_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		date_default_timezone_set('asia/jakarta');

		$this->session->set_flashdata('segment', explode('/', $this->uri->uri_string()));

		if ($this->session->userdata('status') == '') {
			redirect('Login');
		}else{
			if (@$this->session->userdata('userdata') == "Admin"){
				$data = $this->api->CallAPI('POST', core_api('/api/v1/Authentication/after_auth') , ['EmployeePersonalEmail' => (@$this->session->userdata('userdata')->result->EmployeePersonalEmail)]);
			}else{
				$data = $this->api->CallAPI('POST', core_api('/api/v1/Authentication/after_auth') , ['EmployeeCorporateEmail' => (@$this->session->userdata('userdata')->result->EmployeeCorporateEmail)]);
			}

			$data = json_decode($data);
			if ($data->status == true){
				$cekData = $data;
				$this->userdata = $cekData->userdata;
				$this->modul	= $cekData->modul;
			}else{
				// redirect('Login');
			}
			
		}
	}

}

/* End of file MY_Auth.php */
/* Location: ./application/core/MY_Auth.php */
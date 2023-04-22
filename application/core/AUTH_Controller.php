<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AUTH_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		date_default_timezone_set('asia/jakarta');

		$this->session->set_flashdata('segment', explode('/', $this->uri->uri_string()));

		if ($this->session->userdata('status') == '') {
			redirect('Auth');
		}else{
			$data = $this->api->CallAPI('POST', core_api('/api/v1/Authentication/after_auth') , ['EmployeePersonalEmail' => (@$this->session->userdata('userdata')->result->EmployeePersonalEmail)]);
// echo $data;
			// $this->modul = json_decode($this->api->CallAPI('GET', core_api('/api/v1/Modul')))->result;
			$data = json_decode($data);
			// var_dump($data);
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
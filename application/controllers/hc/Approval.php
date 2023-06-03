<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Approval extends AUTH_Controller {

	public function __construct()

	{
		parent::__construct();
	}


	public function index()
	{
		$getData = $this->api->CallAPI('GET', human_capital_api('/api/v1/Leave/getApproval'), ['PositionName' => $this->userdata->EmployeePositionName, 'OrganizationName' => $this->userdata->EmployeeOrganization, 'RequestStatus' => ["SSSUBM", 'APWAIT']]);
		// var_dump($getData);
		$data['data']		= @json_decode($getData)->result;

		// var_dump($data['data']);

		$this->backend->views("_backend/hc/approval/list", $data);
	}

	public function approve($id = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal diapprove."));
			redirect('hc/approval');
		}else{

			$deleteData = $this->api->CallAPI('PUT', human_capital_api('/api/v1/Approval/approve'), ['ID' => $id]);
			
			$result = json_decode($deleteData);
			
			if ($result->status){
				$this->session->set_flashdata('msg', toast("success", $result->message));
			}else{
				$this->session->set_flashdata('msg', toast("danger", $result->message));
			}
			redirect("hc/approval");
		}
	}

	public function reject($id = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal direject."));
			redirect('hc/approval');
		}else{

			$deleteData = $this->api->CallAPI('PUT', human_capital_api('/api/v1/Approval/reject'), ['ID' => $id]);
			
			$result = json_decode($deleteData);
			
			if ($result->status){
				$this->session->set_flashdata('msg', toast("success", $result->message));
			}else{
				$this->session->set_flashdata('msg', toast("danger", $result->message));
			}
			redirect("hc/approval");
		}
	}

}
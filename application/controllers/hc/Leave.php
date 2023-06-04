<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Leave extends AUTH_Controller {

	public function __construct()

	{
		parent::__construct();
	}


	public function index()
	{
		$getData = $this->api->CallAPI('GET', human_capital_api('/api/v1/Leave'), ['RequestTenant' => $this->userdata->TenantName, 'EmployeeID' => $this->userdata->EmployeeID]);
		$getDataApproval = $this->api->CallAPI('GET', human_capital_api('/api/v1/Leave/getApproval'), ['PositionName' => $this->userdata->EmployeePositionName, 'OrganizationName' => $this->userdata->EmployeeOrganization, 'RequestStatus' => ["SSSUBM", 'APWAIT']]);
		// var_dump($getDataApproval);
		
		$data['data']		= @json_decode($getData)->result;
		$data['dataApproval'] = @json_decode($getDataApproval);

		$this->backend->views("_backend/hc/leave/list", $data);
	}

	public function add()
	{
		$getData = $this->api->CallAPI('GET', human_capital_api('/api/v1/RequestType'), ['RequestTenant' => $this->userdata->TenantName]);
		$getDataLeave = $this->api->CallAPI('GET', human_capital_api('/api/v1/LeaveType'), ['LeaveTypeTenant' => $this->userdata->TenantName]);
		$data['RequestType'] = json_decode($getData);
		$data['LeaveType'] = json_decode($getDataLeave);
		
		$this->backend->views("_backend/hc/leave/add", $data);
	}

	public function addProses()
	{
		$data = $this->input->post();
		if ($data['RequestType'] == 1){
			$data['LeaveTypeID'] = $data['LeaveType'];
		}else{
			$data['LeaveTypeID'] = NULL;
		}
		$data['EmployeeID'] = $this->userdata->EmployeeID;
		$data['RequestTypeID'] = $data['RequestType'];
		unset($data['RequestType']);
		unset($data['LeaveType']);
		$data['FileRequest']	= NULL;
		
		$saveData = $this->api->CallAPI('POST', human_capital_api('/api/v1/Leave'), $data);

		$result = json_decode($saveData);
		
		if ($result->status){
			$this->session->set_flashdata('msg', toast("success", $result->message));
		}else{
			$this->session->set_flashdata('msg', toast("danger", $result->message));
		}
		redirect("hc/leave");
	}

	public function update($id = '')
	{
		if ($id == ''){
			redirect('hc/leave');
		}

		$getDataRequestType= $this->api->CallAPI('GET', human_capital_api('/api/v1/RequestType'), ['RequestTenant' => $this->userdata->TenantName]);
		$getDataLeave = $this->api->CallAPI('GET', human_capital_api('/api/v1/LeaveType'), ['LeaveTypeTenant' => $this->userdata->TenantName]);
		$getData = $this->api->CallAPI('GET', human_capital_api('/api/v1/Leave/getRow'), ['ID' => $id]);
		var_dump($getData);
		
		$data = array(
			'id'	=> $id,
			'data'	=> json_decode($getData)->result
		);

		$data['RequestType'] = json_decode($getDataRequestType);
		$data['LeaveType'] = json_decode($getDataLeave);
		
		$this->backend->views("_backend/hc/leave/update", $data);

	}

	public function updateProses($id = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal diubah."));
			redirect('hc/leave');
		}

		$data = $this->input->post();
		$data['ID'] = $id;

		$updateData = $this->api->CallAPI('PUT', human_capital_api('/api/v1/Leave'), $data);

		$result = json_decode($updateData);
		
		if ($result->status){
			$this->session->set_flashdata('msg', toast("success", $result->message));
		}else{
			$this->session->set_flashdata('msg', toast("danger", $result->message));
		}
		redirect("hc/leave");
	}

	public function delete($id = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal dihapus."));
			redirect('hc/leave');
		}else{

			$deleteData = $this->api->CallAPI('DELETE', human_capital_api('/api/v1/Leave'), ['ID' => $id]);
			
			$result = json_decode($deleteData);
			
			if ($result->status){
				$this->session->set_flashdata('msg', toast("success", $result->message));
			}else{
				$this->session->set_flashdata('msg', toast("danger", $result->message));
			}
			redirect("hc/leave");
		}
	}

}
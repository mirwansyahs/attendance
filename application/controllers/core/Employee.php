<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Employee extends AUTH_Controller {

	public function __construct()

	{

		parent::__construct();

		$this->load->library('upload');

	}



	public function index()
	{
		$getData = $this->api->CallAPI('GET', core_api('/api/v1/Employee'), ['EmployeeTenant' => $this->userdata->EmployeeTenant]);
			
		$data['data']		= json_decode($getData)->result;

		$this->backend->views("_backend/core/employee/list", $data);
	}

	public function add()
	{
		$getDataPosition = $this->api->CallAPI('GET', core_api('/api/v1/Position'));
		$getDataTenant = $this->api->CallAPI('GET', core_api('/api/v1/Tenant'));

		$data = array(
			'position'	=> json_decode($getDataPosition)->result,
			'tenant'	=> json_decode($getDataTenant)->result
		);

		$this->backend->views("_backend/core/employee/add", $data);

	}

	public function addProses()
	{
		$data = $this->input->post();
		
		$saveData = $this->api->CallAPI('POST', core_api('/api/v1/Employee'), $data);

		$result = json_decode($saveData);
		
		if ($result->status){
			$this->session->set_flashdata('msg', toast("success", $result->message));
		}else{
			$this->session->set_flashdata('msg', toast("danger", $result->message));
		}
		redirect("core/employee");
	}

	public function update($id = '')
	{
		if ($id == ''){
			redirect('core/employee');
		}

		$getData = $this->api->CallAPI('GET', core_api('/api/v1/Employee/getRow'), ['EmployeeID' => $id]);
		
		$getDataPosition = $this->api->CallAPI('GET', core_api('/api/v1/Position'));
		$getDataTenant = $this->api->CallAPI('GET', core_api('/api/v1/Tenant'));

		$data = array(
			'id'	=> $id,
			'data'	=> json_decode($getData)->result,
			'position'=> json_decode($getDataPosition)->result,
			'tenant'	=> json_decode($getDataTenant)->result
		);
		
		$this->backend->views("_backend/core/employee/update", $data);

	}

	public function updateProses($id = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal diubah."));
			redirect('core/employee');
		}

		$data = $this->input->post();
		$data['EmployeeID'] = $id;

		if ($data['EmployeePassword'] == ""){
			unset($data['EmployeePassword']);
		}
		

		$updateData = $this->api->CallAPI('PUT', core_api('/api/v1/Employee'), $data);

		$result = json_decode($updateData);
		
		if ($result->status){
			$this->session->set_flashdata('msg', toast("success", $result->message));
		}else{
			$this->session->set_flashdata('msg', toast("danger", $result->message));
		}
		redirect("core/employee");
	}

	public function delete($id = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal dihapus."));
			redirect('core/employee');
		}else{

			$deleteData = $this->api->CallAPI('DELETE', core_api('/api/v1/Employee'), ['EmployeeID' => $id]);
			
			$result = json_decode($deleteData);
			
			if ($result->status){
				$this->session->set_flashdata('msg', toast("success", $result->message));
			}else{
				$this->session->set_flashdata('msg', toast("danger", $result->message));
			}
			redirect("core/employee");
		}
	}

}
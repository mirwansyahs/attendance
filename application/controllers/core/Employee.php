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
		if ($this->uri->segment(1) == "core"){
			$getData = $this->api->CallAPI('GET', core_api('/api/v1/Employee'));
		}else{
			$getData = $this->api->CallAPI('GET', core_api('/api/v1/Employee'), ['EmployeeTenant' => $this->userdata->EmployeeTenant]);
		}
			
		$data['data']		= json_decode($getData)->result;

		$this->backend->views("_backend/core/employee/list", $data);
	}

	public function getModulByTenant()
	{
		$post = $this->input->post();
		$getData = $this->api->CallAPI('GET', core_api('/api/v1/TenantSettingModul'), ['Tenant' => $post['Tenant']]);
			
		$result	= json_decode($getData);

		$html = '';
		if ($result->status){
			foreach ($result->result as $key) {
				$html .= '<div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">'.lang('modul_name').'</label>
                            <input type="text" class="form-control" id="ModulName" name="ModulName[]" value="'.$key->ModulName.'" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">'.lang('role_name').'</label>
                            <select class="form-control" id="RoleName" name="RoleName[]">
								'.$this->getRoleComponent().'
							</select>
                        </div>
                    </div>';
			}
		}
		echo $html;
	}

	public function getRoleComponent()
	{

		$getData = $this->api->CallAPI('GET', core_api('/api/v1/Role'));
		$result	= json_decode($getData)->result;

		$html = '';
		foreach ($result as $key) {
			$html .= '<option value="'.$key->RoleName.'">'.$key->RoleName.'</option>';
		}

		return $html;
	}

	public function add()
	{

		if ($this->uri->segment(1) == "core"){
			$getDataTenant = $this->api->CallAPI('GET', core_api('/api/v1/Tenant'));
		}else{
			$getDataTenant = $this->api->CallAPI('GET', core_api('/api/v1/Tenant'), ['TenantName' => $this->userdata->EmployeeTenant]);
		}

		$data = array(
			'tenant'	=> json_decode($getDataTenant)->result
		);

		$this->backend->views("_backend/core/employee/add", $data);

	}

	public function addProses()
	{
		$data = $this->input->post();
		$data['addEmployeeRole'] = true;
		
		$saveData = $this->api->CallAPI('POST', core_api('/api/v1/Employee'), $data);
		$result = json_decode($saveData);
		
		if ($result->status){
			$this->session->set_flashdata('msg', toast("success", $result->message));
		}else{
			$this->session->set_flashdata('msg', toast("danger", $result->message));
		}
		redirect($this->uri->segment(1)."/employee");
	}

	public function update($id = '')
	{
		if ($id == ''){
			redirect($this->uri->segment(1).'/employee');
		}

		$getData = $this->api->CallAPI('GET', core_api('/api/v1/Employee/getRow'), ['EmployeeID' => $id]);
		
		$getDataRole = $this->api->CallAPI('GET', core_api('/api/v1/Role'));

		if ($this->uri->segment(1) == "core"){
			$getDataTenant = $this->api->CallAPI('GET', core_api('/api/v1/Tenant'));
		}else{
			$getDataTenant = $this->api->CallAPI('GET', core_api('/api/v1/Tenant'), ['TenantName' => $this->userdata->EmployeeTenant]);
		}

		$data = array(
			'id'	=> $id,
			'data'	=> json_decode($getData)->result,
			'role'=> json_decode($getDataRole)->result,
			'tenant'	=> json_decode($getDataTenant)->result
		);
		
		$this->backend->views("_backend/core/employee/update", $data);

	}

	public function updateProses($id = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal diubah."));
			redirect($this->uri->segment(1).'/employee');
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
		redirect($this->uri->segment(1)."/employee");
	}

	public function delete($id = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal dihapus."));
			redirect($this->uri->segment(1).'/employee');
		}else{

			$deleteData = $this->api->CallAPI('DELETE', core_api('/api/v1/Employee'), ['EmployeeID' => $id]);
			
			$result = json_decode($deleteData);
			
			if ($result->status){
				$this->session->set_flashdata('msg', toast("success", $result->message));
			}else{
				$this->session->set_flashdata('msg', toast("danger", $result->message));
			}
			redirect($this->uri->segment(1)."/employee");
		}
	}

}
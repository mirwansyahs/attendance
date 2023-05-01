<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Tenant extends AUTH_Controller {

	public function __construct()

	{

		parent::__construct();

		$this->load->library('upload');

	}



	public function index()
	{
		$getData = $this->api->CallAPI('GET', core_api('/api/v1/Tenant'));
			
		$data['data']		= json_decode($getData)->result;

		$this->backend->views("_backend/core/tenant/list", $data);
	}

	public function add()
	{
		$this->backend->views("_backend/core/tenant/add");

	}

	public function addProses()
	{
		$data = $this->input->post();
		
		$saveData = $this->api->CallAPI('POST', core_api('/api/v1/Tenant'), $data);

		$result = json_decode($saveData);
		
		if ($result->status){
			$this->session->set_flashdata('msg', toast("success", $result->message));
		}else{
			$this->session->set_flashdata('msg', toast("danger", $result->message));
		}
		redirect("core/tenant");
	}

	public function update($id = '')
	{
		if ($id == ''){
			redirect('core/tenant');
		}

		$getData = $this->api->CallAPI('GET', core_api('/api/v1/Tenant/getRow'), ['TenantID' => $id]);
		
		$data = array(
			'id'	=> $id,
			'data'	=> json_decode($getData)->result
		);
		
		$this->backend->views("_backend/core/tenant/update", $data);

	}

	public function updateProses($id = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal diubah."));
			redirect('core/tenant');
		}

		$data = $this->input->post();
		$data['TenantID'] = $id;

		if ($data['EmployeePassword'] == ""){
			unset($data['EmployeePassword']);
		}
		

		$updateData = $this->api->CallAPI('PUT', core_api('/api/v1/Tenant'), $data);

		$result = json_decode($updateData);
		
		if ($result->status){
			$this->session->set_flashdata('msg', toast("success", $result->message));
		}else{
			$this->session->set_flashdata('msg', toast("danger", $result->message));
		}
		redirect("core/tenant");
	}

	public function delete($id = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal dihapus."));
			redirect('core/tenant');
		}else{

			$deleteData = $this->api->CallAPI('DELETE', core_api('/api/v1/Tenant'), ['TenantID' => $id]);
			
			$result = json_decode($deleteData);
			
			if ($result->status){
				$this->session->set_flashdata('msg', toast("success", $result->message));
			}else{
				$this->session->set_flashdata('msg', toast("danger", $result->message));
			}
			redirect("core/tenant");
		}
	}

	public function core($id = '', $status = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal menjadi core."));
			redirect('core/tenant');
		}else{

			$coreData = $this->api->CallAPI('PUT', core_api('/api/v1/Tenant'), ['TenantID' => $id, 'TenantCore' => 1]);
			
			$result = json_decode($coreData);
			echo $coreData;
			
			if ($result->status){
				$this->session->set_flashdata('msg', toast("success", $result->message));
			}else{
				$this->session->set_flashdata('msg', toast("danger", $result->message));
			}
			redirect("core/tenant");
		}
	}

}
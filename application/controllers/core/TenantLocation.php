<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class TenantLocation extends AUTH_Controller {

	public function __construct()

	{

		parent::__construct();

		$this->load->library('upload');

	}



	public function index()
	{
		redirect('core/Tenant');
	}

	public function a($id)
	{
		$getData = $this->api->CallAPI('GET', core_api('/api/v1/TenantLocation'), ['TenantID' => $id]);
			
		$data['data']		= json_decode($getData)->result;
		$data['id']			= $id;

		$this->backend->views("_backend/core/tenant_location/list", $data);
	}

	public function add($id)
	{
		$data['dataTenant']	= json_decode($this->api->CallAPI('GET', core_api('/api/v1/Tenant/getRow'), ['TenantID' => $id]))->result;
		$data['id']	= $id;
		$this->backend->views("_backend/core/tenant_location/add", $data);

	}

	public function addProses($id)
	{
		$data = $this->input->post();
		
		$saveData = $this->api->CallAPI('POST', core_api('/api/v1/TenantLocation'), $data);

		$result = json_decode($saveData);
		
		if ($result->status){
			$this->session->set_flashdata('msg', toast("success", $result->message));
		}else{
			$this->session->set_flashdata('msg', toast("danger", $result->message));
		}
		redirect("core/tenantlocation/a/".$id);
	}

	public function update($id = '', $tenant = '')
	{
		if ($id == ''){
			redirect('core/tenant');
		}

		$getData = $this->api->CallAPI('GET', core_api('/api/v1/TenantLocation/getRow'), ['TenantLocationID' => $id]);
		
		$data = array(
			'id'	=> $id,
			'tenant'=> $tenant,
			'data'	=> json_decode($getData)->result
		);
		
		$this->backend->views("_backend/core/tenant_location/update", $data);

	}

	public function updateProses($id = '', $tenant = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal diubah."));
			redirect('core/tenant');
		}

		$data = $this->input->post();
		$data['TenantLocationID'] = $id;

		$updateData = $this->api->CallAPI('PUT', core_api('/api/v1/TenantLocation'), $data);

		$result = json_decode($updateData);
		
		if ($result->status){
			$this->session->set_flashdata('msg', toast("success", $result->message));
		}else{
			$this->session->set_flashdata('msg', toast("danger", $result->message));
		}
		redirect("core/tenantlocation/a/".$tenant);
	}

	public function delete($id = '', $tenant = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal dihapus."));
			redirect('core/tenantlocation/a/'.$tenant);
		}else{

			$deleteData = $this->api->CallAPI('DELETE', core_api('/api/v1/TenantLocation'), ['TenantLocationID' => $id]);
			
			$result = json_decode($deleteData);
			
			if ($result->status){
				$this->session->set_flashdata('msg', toast("success", $result->message));
			}else{
				$this->session->set_flashdata('msg', toast("danger", $result->message));
			}
			redirect("core/tenantlocation/a/".$tenant);
		}
	}

}
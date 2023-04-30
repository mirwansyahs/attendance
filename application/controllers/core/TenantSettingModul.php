<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class TenantSettingModul extends AUTH_Controller {

	public function __construct()

	{

		parent::__construct();

		$this->load->library('upload');

	}



	public function index()
	{
		$getData = $this->api->CallAPI('GET', core_api('/api/v1/TenantSettingModul'));
			
		$data['data']		= json_decode($getData)->result;

		$this->backend->views("_backend/core/tenant_setting_modul/list", $data);
	}

	public function a($id)
	{
		$getData = $this->api->CallAPI('GET', core_api('/api/v1/TenantSettingModul'), ['Tenant' => base64_decode($id)]);
			
		$data['data']		= json_decode($getData)->result;
		$data['id']			= $id;

		$this->backend->views("_backend/core/tenant_setting_modul/list", $data);
	}

	public function add($id)
	{
		$data['id']	= $id;
		$data['dataTenant']	= json_decode($this->api->CallAPI('GET', core_api('/api/v1/Tenant')))->result;
		$data['dataModul']	= json_decode($this->api->CallAPI('GET', core_api('/api/v1/Modul')))->result;
		$this->backend->views("_backend/core/tenant_setting_modul/add", $data);

	}

	public function addProses($id)
	{
		$data = $this->input->post();
		
		$saveData = $this->api->CallAPI('POST', core_api('/api/v1/TenantSettingModul'), $data);

		$result = json_decode($saveData);
		
		if ($result->status){
			$this->session->set_flashdata('msg', toast("success", $result->message));
		}else{
			$this->session->set_flashdata('msg', toast("danger", $result->message));
		}
		redirect("core/TenantSettingModul/a/".$id);
	}

	public function update($id = '', $tenant = '')
	{
		if ($id == ''){
			redirect('core/TenantSettingModul');
		}

		$getData = json_decode($this->api->CallAPI('GET', core_api('/api/v1/TenantSettingModul/getRow'), ['TenantSettingModulID' => $id]));
		
		$data = array(
			'id'	=> $id,
			'data'	=> $getData->result,
			'dataModul' => json_decode($this->api->CallAPI('GET', core_api('/api/v1/Modul')))->result
		);
		
		$this->backend->views("_backend/core/tenant_setting_modul/update", $data);

	}

	public function updateProses($id = '', $tenant = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal diubah."));
			redirect('core/Tenant');
		}

		$data = $this->input->post();	
		$data['TenantSettingModulID'] = $id;


		$updateData = $this->api->CallAPI('PUT', core_api('/api/v1/TenantSettingModul'), $data);

		$result = json_decode($updateData);
		
		if ($result->status){
			$this->session->set_flashdata('msg', toast("success", $result->message));
		}else{
			$this->session->set_flashdata('msg', toast("danger", $result->message));
		}
		redirect("core/TenantSettingModul/a/".$tenant);
	}

	public function delete($id = '', $tenant = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal dihapus."));
			redirect('core/TenantSettingModul');
		}else{

			$deleteData = $this->api->CallAPI('DELETE', core_api('/api/v1/TenantSettingModul'), ['TenantSettingModulID' => $id]);
			echo $deleteData;
			$result = json_decode($deleteData);
			
			if ($result->status){
				$this->session->set_flashdata('msg', toast("success", $result->message));
			}else{
				$this->session->set_flashdata('msg', toast("danger", $result->message));
			}
			redirect("core/TenantSettingModul/a/".$tenant);
		}
	}

}
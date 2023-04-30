<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Shift extends AUTH_Controller {

	public function __construct()

	{
		parent::__construct();
	}


	public function index()
	{
		$getData = $this->api->CallAPI('GET', human_capital_api('/api/v1/Shift'), ['group_by' => 'ShiftName']);
		
		$data['data']		= json_decode($getData)->result;

		$this->backend->views("_backend/hc/shift/list", $data);
	}

	public function a($id)
	{
		$getData = $this->api->CallAPI('GET', human_capital_api('/api/v1/Shift'), ['TimeProfileID' => $id]);
		echo $getData;
		$data['data']		= json_decode($getData)->result;
		$data['id']			= $id;

		$this->backend->views("_backend/hc/shift/list", $data);
	}

	public function add()
	{
		$this->backend->views("_backend/hc/shift/add");
	}

	public function addProses($id)
	{
		$data = $this->input->post();
		
		$saveData = $this->api->CallAPI('POST', human_capital_api('/api/v1/Shift'), $data);

		$result = json_decode($saveData);
		
		if ($result->status){
			$this->session->set_flashdata('msg', toast("success", $result->message));
		}else{
			$this->session->set_flashdata('msg', toast("danger", $result->message));
		}
		redirect("core/Shift/a/".$id);
	}

	public function update($id = '', $tenant = '')
	{
		if ($id == ''){
			redirect('core/tenant');
		}

		$getData = $this->api->CallAPI('GET', human_capital_api('/api/v1/Shift/getRow'), ['TenantLocationID' => $id]);
		
		$data = array(
			'id'	=> $id,
			'tenant'=> $tenant,
			'data'	=> json_decode($getData)->result
		);
		
		$this->backend->views("_backend/hc/shift/update", $data);

	}

	public function updateProses($id = '', $tenant = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal diubah."));
			redirect('core/tenant');
		}

		$data = $this->input->post();
		$data['TenantLocationID'] = $id;

		$updateData = $this->api->CallAPI('PUT', human_capital_api('/api/v1/Shift'), $data);

		$result = json_decode($updateData);
		
		if ($result->status){
			$this->session->set_flashdata('msg', toast("success", $result->message));
		}else{
			$this->session->set_flashdata('msg', toast("danger", $result->message));
		}
		redirect("core/Shift/a/".$tenant);
	}

	public function delete($id = '', $tenant = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal dihapus."));
			redirect('core/Shift/a/'.$tenant);
		}else{

			$deleteData = $this->api->CallAPI('DELETE', human_capital_api('/api/v1/Shift'), ['TenantLocationID' => $id]);
			
			$result = json_decode($deleteData);
			
			if ($result->status){
				$this->session->set_flashdata('msg', toast("success", $result->message));
			}else{
				$this->session->set_flashdata('msg', toast("danger", $result->message));
			}
			redirect("core/Shift/a/".$tenant);
		}
	}

}
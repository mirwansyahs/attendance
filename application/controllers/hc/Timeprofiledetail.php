<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Timeprofiledetail extends AUTH_Controller {

	public function __construct()

	{

		parent::__construct();

	}

	public function index()
	{
		$getData = $this->api->CallAPI('GET', human_capital_api('/api/v1/TimeProfileDetail'));
		
		$data['data']		= json_decode($getData)->result;

		$this->backend->views("_backend/hc/time_profile_detail/list", $data);
	}

	public function add()
	{
		$getDataTenant = $this->api->CallAPI('GET', core_api('/api/v1/Tenant'));

		$data = array(
			'tenant'	=> json_decode($getDataTenant)->result
		);

		$this->backend->views("_backend/hc/time_profile_detail/add", $data);

	}

	public function addProses()
	{
		$data = $this->input->post();
		if (!@$data['ProfileShift']){
			$data['ProfileShift'] = 'n';
		}else{
			$data['ProfileShift'] = 'y';

		}
		$data['TimeProfileTenant']	= $this->userdata->TenantName;
		$data['addTimeProfileDetail'] = true;
		
		$saveData = $this->api->CallAPI('POST', human_capital_api('/api/v1/TimeProfileDetail'), $data);

		$result = json_decode($saveData);
		
		if ($result->status){
			$this->session->set_flashdata('msg', toast("success", $result->message));
		}else{
			$this->session->set_flashdata('msg', toast("danger", $result->message));
		}
		redirect("hc/TimeProfileDetail");
	}

	public function update($id = '')
	{
		if ($id == ''){
			redirect('hc/TimeProfileDetail');
		}

		$getData = $this->api->CallAPI('GET', human_capital_api('/api/v1/TimeProfile/getRow'), ['TimeProfileDetailID' => $id, 'addTimeProfileDetail' => true]);
		
		$getDataTenant = $this->api->CallAPI('GET', core_api('/api/v1/Tenant'));

		$data = array(
			'id'	=> $id,
			'data'	=> json_decode($getData)->result,
			'tenant'	=> json_decode($getDataTenant)->result
		);
		
		$this->backend->views("_backend/hc/time_profile_detail/update", $data);

	}

	public function updateProses($id = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal diubah."));
			redirect('hc/TimeProfileDetail');
		}

		$data = $this->input->post();
		$data['TimeProfileDetailID'] = $id;

		$updateData = $this->api->CallAPI('PUT', human_capital_api('/api/v1/TimeProfileDetail'), $data);

		$result = json_decode($updateData);
		
		if ($result->status){
			$this->session->set_flashdata('msg', toast("success", $result->message));
		}else{
			$this->session->set_flashdata('msg', toast("danger", $result->message));
		}
		redirect("hc/TimeProfile");
	}

	public function delete($id = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal dihapus."));
			redirect('hc/TimeProfile');
		}else{

			$deleteData = $this->api->CallAPI('DELETE', human_capital_api('/api/v1/TimeProfileDetail'), ['TimeProfileDetailID' => $id]);
			
			$result = json_decode($deleteData);
			
			if ($result->status){
				$this->session->set_flashdata('msg', toast("success", $result->message));
			}else{
				$this->session->set_flashdata('msg', toast("danger", $result->message));
			}
			redirect("hc/TimeProfile");
		}
	}

}
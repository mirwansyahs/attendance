<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Timeprofile extends AUTH_Controller {

	public function __construct()

	{

		parent::__construct();

		$this->load->library('upload');

	}

	public function index()
	{
		$getData = $this->api->CallAPI('GET', human_capital_api('/api/v1/TimeProfile'), ['group_by' => 'TimeProfileName']);
		
		$data['data']		= json_decode($getData)->result;

		$this->backend->views("_backend/hc/time_profile/list", $data);
	}

	public function add()
	{
		$getDataTenant = $this->api->CallAPI('GET', core_api('/api/v1/Tenant'));

		$data = array(
			'tenant'	=> json_decode($getDataTenant)->result
		);

		$this->backend->views("_backend/hc/time_profile/add", $data);

	}

	public function addProses()
	{
		$data = $this->input->post();
		if (!@$data['ProfileShift']){
			$data['ProfileShift'] = 'n';
		}else{
			$data['ProfileShift'] = 'y';

		}
		// var_dump($data);
		
		$saveData = $this->api->CallAPI('POST', human_capital_api('/api/v1/TimeProfile'), $data);

		// echo $saveData;
		$result = json_decode($saveData);
		
		if ($result->status){
			$this->session->set_flashdata('msg', toast("success", $result->message));
		}else{
			$this->session->set_flashdata('msg', toast("danger", $result->message));
		}
		redirect("hc/timeprofile");
	}

	public function update($id = '')
	{
		if ($id == ''){
			redirect('hc/timeprofile');
		}

		$getData = $this->api->CallAPI('GET', human_capital_api('/api/v1/TimeProfile/getRow'), ['TimeProfileID' => $id]);
		
		$getDataTenant = $this->api->CallAPI('GET', core_api('/api/v1/Tenant'));

		$data = array(
			'id'	=> $id,
			'data'	=> json_decode($getData)->result,
			'tenant'	=> json_decode($getDataTenant)->result
		);
		
		$this->backend->views("_backend/hc/time_profile/update", $data);

	}

	public function updateProses($id = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal diubah."));
			redirect('hc/timeprofile');
		}

		$data = $this->input->post();
		$data['TimeProfileID'] = $id;

		if (!@$data['ProfileShift']){
			$data['ProfileShift'] = 'n';
		}else{
			$data['ProfileShift'] = 'y';

		}

		$updateData = $this->api->CallAPI('PUT', human_capital_api('/api/v1/TimeProfile'), $data);

		$result = json_decode($updateData);
		
		if ($result->status){
			$this->session->set_flashdata('msg', toast("success", $result->message));
		}else{
			$this->session->set_flashdata('msg', toast("danger", $result->message));
		}
		redirect("hc/timeprofile");
	}

	public function delete($id = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal dihapus."));
			redirect('hc/timeprofile');
		}else{

			$deleteData = $this->api->CallAPI('DELETE', human_capital_api('/api/v1/TimeProfile'), ['TimeProfileID' => $id]);
			
			$result = json_decode($deleteData);
			
			if ($result->status){
				$this->session->set_flashdata('msg', toast("success", $result->message));
			}else{
				$this->session->set_flashdata('msg', toast("danger", $result->message));
			}
			redirect("hc/timeprofile");
		}
	}

}
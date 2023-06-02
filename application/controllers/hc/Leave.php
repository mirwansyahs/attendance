<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Leave extends AUTH_Controller {

	public function __construct()

	{
		parent::__construct();
	}


	public function index()
	{
		$getData = $this->api->CallAPI('GET', human_capital_api('/api/v1/Leave'), ['RequestTenant' => $this->userdata->TenantName]);
		// var_dump($getData);
		$data['data']		= @json_decode($getData)->result;

		$this->backend->views("_backend/hc/leave/list", $data);
	}

	public function add()
	{
		$this->backend->views("_backend/hc/leave/add");
	}

	public function addProses()
	{
		$data = $this->input->post();
		$data['addShiftDay']	= true;
		$data['HolidayTenant']	= $this->userdata->TenantName;
		
		$saveData = $this->api->CallAPI('POST', human_capital_api('/api/v1/leave'), $data);
		
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

		$getData = $this->api->CallAPI('GET', human_capital_api('/api/v1/leave/getRow'), ['HolidayID' => $id]);
		
		$data = array(
			'id'	=> $id,
			'data'	=> json_decode($getData)->result
		);
		
		$this->backend->views("_backend/hc/leave/update", $data);

	}

	public function updateProses($id = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal diubah."));
			redirect('hc/leave');
		}

		$data = $this->input->post();
		$data['HolidayID'] = $id;

		$updateData = $this->api->CallAPI('PUT', human_capital_api('/api/v1/leave'), $data);

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
			redirect('hc/leave/a/'.$tenant);
		}else{

			$deleteData = $this->api->CallAPI('DELETE', human_capital_api('/api/v1/leave'), ['HolidayID' => $id]);
			
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
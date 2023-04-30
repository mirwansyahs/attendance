<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Shift extends AUTH_Controller {

	public function __construct()

	{
		parent::__construct();
	}


	public function index()
	{
		$getData = $this->api->CallAPI('GET', human_capital_api('/api/v1/Shift'), ['group_by' => 'ShiftName', 'ShiftTenant' => $this->userdata->TenantName]);
		// echo $getData;
		$data['data']		= json_decode($getData)->result;

		$this->backend->views("_backend/hc/shift/list", $data);
	}

	public function add()
	{
		$this->backend->views("_backend/hc/shift/add");
	}

	public function addProses()
	{
		$data = $this->input->post();
		$data['addShiftDay']	= true;
		$data['ShiftTenant']	= $this->userdata->TenantName;
		
		$saveData = $this->api->CallAPI('POST', human_capital_api('/api/v1/Shift'), $data);

		$result = json_decode($saveData);
		
		if ($result->status){
			$this->session->set_flashdata('msg', toast("success", $result->message));
		}else{
			$this->session->set_flashdata('msg', toast("danger", $result->message));
		}
		redirect("hc/Shift");
	}

	public function update($id = '')
	{
		if ($id == ''){
			redirect('hc/shift');
		}

		$getData = $this->api->CallAPI('GET', human_capital_api('/api/v1/Shift/getRow'), ['ShiftID' => $id]);
		$getDataShiftDay = $this->api->CallAPI('GET', human_capital_api('/api/v1/ShiftDay'), ['ShiftID' => $id]);

		$data = array(
			'id'	=> $id,
			'data'	=> json_decode($getData)->result,
			'dataShiftDay' => json_decode($getDataShiftDay)->result
		);

		
		$this->backend->views("_backend/hc/shift/update", $data);

	}

	public function updateProses($id = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal diubah."));
			redirect('hc/shift');
		}

		$data = $this->input->post();
		$data['ShiftID'] = $id;

		$updateData = $this->api->CallAPI('PUT', human_capital_api('/api/v1/Shift'), $data);

		$result = json_decode($updateData);
		
		if ($result->status){
			$this->session->set_flashdata('msg', toast("success", $result->message));
		}else{
			$this->session->set_flashdata('msg', toast("danger", $result->message));
		}
		redirect("hc/Shift");
	}

	public function delete($id = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal dihapus."));
			redirect('hc/Shift');
		}else{

			$deleteData = $this->api->CallAPI('DELETE', human_capital_api('/api/v1/Shift'), ['ShiftID' => $id]);
			
			$result = json_decode($deleteData);
			
			if ($result->status){
				$this->session->set_flashdata('msg', toast("success", $result->message));
			}else{
				$this->session->set_flashdata('msg', toast("danger", $result->message));
			}
			redirect("hc/Shift");
		}
	}

}
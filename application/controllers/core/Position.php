<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Position extends AUTH_Controller {

	public function __construct()

	{

		parent::__construct();

		$this->load->library('upload');

	}



	public function index()
	{
		$getData = $this->api->CallAPI('GET', core_api('/api/v1/Position'));
			
		$data['data']		= json_decode($getData)->result;

		$this->backend->views("_backend/core/position/list", $data);
	}

	public function add()
	{
		$this->backend->views("_backend/core/position/add");

	}

	public function addProses()
	{
		$data = $this->input->post();
		
		$saveData = $this->api->CallAPI('POST', core_api('/api/v1/Position'), $data);

		$result = json_decode($saveData);
		
		if ($result->status){
			$this->session->set_flashdata('msg', toast("success", $result->message));
		}else{
			$this->session->set_flashdata('msg', toast("danger", $result->message));
		}
		redirect("core/position");
	}

	public function update($id = '')
	{
		if ($id == ''){
			redirect('core/position');
		}

		$getData = $this->api->CallAPI('GET', core_api('/api/v1/Position/getRow'), ['PositionID' => $id]);
		
		$data = array(
			'id'	=> $id,
			'data'	=> json_decode($getData)->result
		);
		
		$this->backend->views("_backend/core/position/update", $data);

	}

	public function updateProses($id = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal diubah."));
			redirect('core/position');
		}

		$data = $this->input->post();
		$data['PositionID'] = $id;

		$updateData = $this->api->CallAPI('PUT', core_api('/api/v1/Position'), $data);

		$result = json_decode($updateData);
		
		if ($result->status){
			$this->session->set_flashdata('msg', toast("success", $result->message));
		}else{
			$this->session->set_flashdata('msg', toast("danger", $result->message));
		}
		redirect("core/position");
	}
	
	public function delete($id = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal dihapus."));
			redirect('core/position');
		}else{

			$deleteData = $this->api->CallAPI('DELETE', core_api('/api/v1/Position'), ['PositionID' => $id]);

			$result = json_decode($deleteData);
			
			if ($result->status){
				$this->session->set_flashdata('msg', toast("success", $result->message));
			}else{
				$this->session->set_flashdata('msg', toast("danger", $result->message));
			}
			redirect("core/position");
		}
	}

}
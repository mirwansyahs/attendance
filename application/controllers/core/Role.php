<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Role extends AUTH_Controller {

	public function __construct()

	{

		parent::__construct();

		$this->load->library('upload');

	}



	public function index()
	{
		$getData = $this->api->CallAPI('GET', core_api('/api/v1/Role'));
			
		$data['data']		= json_decode($getData)->result;

		$this->backend->views("_backend/core/role/list", $data);
	}

	public function add()
	{
		$this->backend->views("_backend/core/role/add");

	}

	public function addProses()
	{
		$data = $this->input->post();
		
		$saveData = $this->api->CallAPI('POST', core_api('/api/v1/Role'), $data);

		$result = json_decode($saveData);
		
		if ($result->status){
			$this->session->set_flashdata('msg', toast("success", $result->message));
		}else{
			$this->session->set_flashdata('msg', toast("danger", $result->message));
		}
		redirect("core/role");
	}

	public function update($id = '')
	{
		if ($id == ''){
			redirect('core/role');
		}

		$getData = $this->api->CallAPI('GET', core_api('/api/v1/Role/getRow'), ['RoleID' => $id]);
		
		$data = array(
			'id'	=> $id,
			'data'	=> json_decode($getData)->result
		);
		
		$this->backend->views("_backend/core/role/update", $data);

	}

	public function updateProses($id = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal diubah."));
			redirect('core/role');
		}

		$data = $this->input->post();
		$data['RoleID'] = $id;

		$updateData = $this->api->CallAPI('PUT', core_api('/api/v1/Role'), $data);

		$result = json_decode($updateData);
		
		if ($result->status){
			$this->session->set_flashdata('msg', toast("success", $result->message));
		}else{
			$this->session->set_flashdata('msg', toast("danger", $result->message));
		}
		redirect("core/role");
	}
	
	public function delete($id = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal dihapus."));
			redirect('core/role');
		}else{

			$deleteData = $this->api->CallAPI('DELETE', core_api('/api/v1/Role'), ['RoleID' => $id]);

			$result = json_decode($deleteData);
			
			if ($result->status){
				$this->session->set_flashdata('msg', toast("success", $result->message));
			}else{
				$this->session->set_flashdata('msg', toast("danger", $result->message));
			}
			redirect("core/role");
		}
	}

}
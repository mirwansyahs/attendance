<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Letter extends AUTH_Controller {

	public function __construct()

	{
		parent::__construct();
	}

	public function index()
	{
		// $getData = $this->api->CallAPI('GET', correspondency_api('/api/v1/letter'), ['HolidayTenant' => $this->userdata->TenantName]);
		
		// $data['data']		= json_decode($getData)->result;

		// $this->backend->views("_backend/cp/letter/list", $data);
		// echo "Oooppsss";
		redirect('cp/home');
	}


	#region letter in
	public function in()
	{
		$getData = $this->api->CallAPI('GET', correspondency_api('/api/v1/Letter'), ['LetterType' => 'in', 'LetterTenant' => $this->userdata->TenantName]);
		// var_dump($getData);
		$data['data']		= json_decode($getData)->result;

		$this->backend->views("_backend/cp/letter/in/list", $data);
	}
	#endregion letter in

	#region letter out
	public function out()
	{
		$getData = $this->api->CallAPI('GET', correspondency_api('/api/v1/Letter'), ['LetterType' => 'out', 'LetterTenant' => $this->userdata->TenantName]);
		
		$data['data']		= json_decode($getData)->result;

		$this->backend->views("_backend/cp/letter/out/list", $data);
	}
	#endregion letter out


	#region letter disposisi
	public function disposisi()
	{
		$getData = $this->api->CallAPI('GET', correspondency_api('/api/v1/Disposisi'), ['LetterTenant' => $this->userdata->TenantName]);
		
		$data['data']		= json_decode($getData)->result;

		$this->backend->views("_backend/cp/letter/disposisi/list", $data);
	}
	#endregion letter disposisi




	#region additional
	public function add($type = '')
	{
		$data['type']	= $type;
		$this->backend->views("_backend/cp/letter/".$type."/add", $data);
	}

	public function addProses($type = '')
	{
		$data = $this->input->post();
		// var_dump($data);
		$data['LetterType']		= $type;
		$data['LetterDate'] 	= $data['LetterDate']." ".date('H:i:s');
		$data['DateCreated']	= date('Y-m-d H:i:s');
		$data['EmployeeID']		= $this->userdata->EmployeeID;
		$data['LetterTenant']	= $this->userdata->TenantName;
		
		$saveData = $this->api->CallAPI('POST', correspondency_api('/api/v1/Letter'), $data);
		// var_dump($saveData);
		$result = json_decode($saveData);
		
		if ($result->status){
			$this->session->set_flashdata('msg', toast("success", $result->message));
		}else{
			$this->session->set_flashdata('msg', toast("danger", $result->message));
		}
		redirect("cp/letter/".$type);
	}

	public function update($type = '', $id = '')
	{
		if ($id == ''){
			redirect('cp/letter');
		}

		$getData = $this->api->CallAPI('GET', correspondency_api('/api/v1/Letter/getRow'), ['ID' => $id]);
		
		$data = array(
			'id'	=> $id,
			'type'	=> $type,
			'data'	=> json_decode($getData)->result
		);
		
		$this->backend->views("_backend/cp/letter/".$type."/update", $data);

	}

	public function updateProses($type = '', $id = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal diubah."));
			redirect('cp/letter');
		}

		$data = $this->input->post();
		$data['ID'] = $id;

		$updateData = $this->api->CallAPI('PUT', correspondency_api('/api/v1/Letter'), $data);
		// var_dump($updateData);
		$result = json_decode($updateData);
		
		if ($result->status){
			$this->session->set_flashdata('msg', toast("success", $result->message));
		}else{
			$this->session->set_flashdata('msg', toast("danger", $result->message));
		}
		redirect("cp/letter/".$type);
	}

	public function addtodisposisi($type = '', $id = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal didisposisikan."));
			redirect('cp/letter/'.$type);
		}else{

			$addData = $this->api->CallAPI('POST', correspondency_api('/api/v1/Disposisi'), ['ID' => $id]);

			$result = json_decode($addData);
			
			if ($result->status){
				$update = array(
					'LetterDisposisiDate'	=> date('Y-m-d H:i:s'),
					'ID'					=> $id,
				);

				$addData = $this->api->CallAPI('PUT', correspondency_api('/api/v1/Letter'), $update);

				$this->session->set_flashdata('msg', toast("success", $result->message));
			}else{
				$this->session->set_flashdata('msg', toast("danger", $result->message));
			}
			redirect("cp/letter/".$type);
		}
	}
	
	public function delete($type = '', $id = '')
	{
		if ($id == ''){
			$this->session->set_flashdata('msg', toast("danger", "Data gagal dihapus."));
			redirect('cp/letter/'.$type);
		}else{

			if ($type == "disposisi"){
				$deleteData = $this->api->CallAPI('DELETE', correspondency_api('/api/v1/Disposisi'), ['ID' => $id]);
			}else{
				$deleteData = $this->api->CallAPI('DELETE', correspondency_api('/api/v1/Letter'), ['ID' => $id]);
			}
			$result = json_decode($deleteData);
			
			if ($result->status){
				if ($type == "disposisi"){
					$update = array(
						'LetterDisposisiDate'	=> NULL,
						'ID'					=> $result->MailLetterID,
					);

					$updateData = $this->api->CallAPI('PUT', correspondency_api('/api/v1/Letter'), $update);
				}
				$this->session->set_flashdata('msg', toast("success", $result->message));
			}else{
				$this->session->set_flashdata('msg', toast("danger", $result->message));
			}
			redirect("cp/letter/".$type);
		}
	}
	#endregion additional

}
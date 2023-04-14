<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_employee extends CI_Model {

	public function select($where = ''){
		if ($where != ''){
			$this->db->where($where);
		}

					$this->db->from('Employee');
		$response = $this->db->get();
		return $response;
	}

	public function save($data){
		date_default_timezone_set('asia/jakarta');
		$arr = array(
			'email'				=> $data->email,
			'jabatan'			=> $data->jabatan,
			'date_registered'	=> date('Y-m-d H:i:s')
		);

		$response = $this->db->insert('Employee', $arr);
		return $response;
	}

	public function delete($arr){
		return $this->db->delete('Employee', $arr);
	}
}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */
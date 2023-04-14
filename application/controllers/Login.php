<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

		public function __construct()
		{
			parent::__construct();
			$this->load->model('M_employee');
		}

		public function index()
		{
			$session = $this->session->userdata('status');

			if ($session == '') {
				$this->load->view('_frontend/login');
			} else {
				redirect('Redaktur/Home');
			}
		}

		public function sign()
		{
			$data = $this->input->post();
			$username = trim($data['email']);
			$password = trim($data['password']);

			$data = $this->M_employee->select(['EmployeeEmail' => $username, 'EmployeePassword' => sha1(md5($password))]);
			
			if ($data->num_rows() == false) {			
				$arr = array(
					'succ'	=> 0,
					'msg'	=> "Login gagal."
				);
			} else {
				date_default_timezone_set('Asia/Jakarta');
				$session = [
					'userdata' => $data->row(),
					'status' => "Loged in"
				];

				$this->session->set_userdata('file_manager',true);
				$this->session->set_userdata($session);
				if (@$this->input->get('redirect')){
					$redirect = $this->input->get('redirect');
					// if (strtolower($redirect) == "aspirations"){
					// 	redirect('Administrator/Aspirations');
					// }
				}else{
					$redirect = "redaktur/home";
				}
				
				$arr = array(
					'succ'		=> 1,
					'msg'		=> "Login berhasil",
					'data'		=> array(
						'redirect'	=> $redirect
					)
				);
			}
			echo json_encode($arr);
		}

		public function out()
		{
			$this->session->sess_destroy();
			redirect('Login');
		}
}

?>

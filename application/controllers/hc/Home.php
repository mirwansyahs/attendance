<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Home extends AUTH_Controller {



	public function __construct()

	{

		parent::__construct();


	}



	public function index()

	{

		$data['subjudul']	= "Dashboard";
		$data['judul']		= "Dashboard";

		$this->backend->views("_backend/core/home", $data);

	}

}
<?php

class Percobaan extends CI_Controller{
    function __construct()
    {   
        parent::__construct();
        $this->load->model('M_employee');
    }

    function index()
    {
        
    }
}
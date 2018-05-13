<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HandlingCode extends CI_Controller {
		
	public function __construct()
    {
		parent::__construct();
		$this->load->helper('CID/nav');
		$this->load->database();		
	}

	public function index(){

		$this->load->view('dashboard/handlingcode');

	}

}
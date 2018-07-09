<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {    
		
	public function __construct()
    {
		parent::__construct();
		$this->load->helper('CID/nav');

		if (!$this->ion_auth->logged_in()){
		    $this->session->set_flashdata('message', "Please login first!!");
		    redirect('login', 'refresh');
		}		
	}

	public function index()
    {
	   	$this->load->view('dashboard/home');
	}

}
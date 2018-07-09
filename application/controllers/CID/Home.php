<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {    
		
	public function __construct()
    {
		parent::__construct();

		$this->load->helper('CID/nav');
		$this->load->model('Home_model');

		if (!$this->ion_auth->logged_in()){
		    $this->session->set_flashdata('message', "Please login first!!");
		    redirect('login', 'refresh');
		}

		if(isset($_SESSION['record_id'])){
			unset($_SESSION['record_id']);
		}		
	}

	public function index()
    {
    	$user                   = $this->ion_auth->user()->row();
    	$data['top_navigation'] = 0;
    	$data['my_records']     = $this->Home_model->get_my_records();
    	$data['for_approval']   = $this->Home_model->get_records_for_approval();
    	$data['approved']       = $this->Home_model->get_approved_records();

	   	$this->output->set_output_data("user", $user);
	   	$this->output->set_template('default');
	   	$this->load->view('dashboard/home', $data);
	}

}
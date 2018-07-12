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

	public function view_record($urn = NULL){
		$user                   = $this->ion_auth->user()->row();
    	$data['top_navigation'] = 0;

    	$data['info'] = $this->Home_model->view_the_record($urn);

    	if($data['info'] == NULL){
    		$this->session->set_flashdata('warning', "No data found.");
    		redirect('dashboard', 'refresh');
    	}else{
    		foreach ($data['info'] as $value) {
    			$record_id = $value->rid;
    			$user_id   = $value->user_id;
    			break;
    		}

    		$record_accessible = false;

    		if($user_id == $this->ion_auth->user()->row()->id){
    			$record_accessible = true;
    		}else if($this->user_management->has_review_permission($record_id)){
    			$record_accessible = true;
    		}

    		if(!$record_accessible){
    			$this->session->set_flashdata('warning', "Record is not accessible.");
    			redirect('dashboard','refresh');
    		}
    	}

	   	$this->output->set_output_data("user", $user);
	   	$this->output->set_template('default');
	   	$this->load->view('dashboard/view_record', $data);
	}

	public function continue($urn = NULL){
		$record_id = $this->Home_model->get_record_id($urn);
		
		if(!is_null($record_id)){
			$_SESSION['record_id'] = $record_id;
			redirect('protectivemark/','refresh');
		}else{
			$this->session->set_flashdata('warning', "No data found.");
    		redirect('dashboard', 'refresh');
		}		
	}

}
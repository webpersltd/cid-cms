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

    	$this->Home_model->release_record_which_is_holded_by_me($user->id);

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

    		$record_hold['record_id']  = $record_id;
    		$record_hold['user_id']    = $user->id;
    		$record_hold['created_at'] = date("Y-m-d H:i:s");

    		if( $this->Home_model->record_on_hold($record_id, $record_hold) 
    			&& $user_id != $this->ion_auth->user()->row()->id 
    			&& $this->user_management->has_review_permission($record_id) ){

    			$this->session->set_flashdata('warning', "The record has been holded by another user.");
    			redirect('dashboard','refresh');
    		}

    		$record_accessible = false;

    		if($user_id == $this->ion_auth->user()->row()->id){
    			$record_accessible = true;
    		}else if( $this->user_management->has_review_permission($record_id) 
    						&& ( $this->Home_model->this_record_is_already_started_reviewing_by_this_user($record_id) == $this->ion_auth->user()->row()->id 
    							|| $this->Home_model->this_record_is_already_started_reviewing_by_this_user($record_id) == NULL ) ){

    			$record_accessible = true;

    		}

    		if(!$record_accessible){
    			$this->session->set_flashdata('warning', "Access Denied!!");
    			redirect('dashboard','refresh');
    		}
    	}

	   	$this->output->set_output_data("user", $user);
	   	$this->output->set_template('default');
	   	$this->load->view('dashboard/view_record', $data);
	}

	/*The record will get the continue opprotunity if and only if the record is inputted by me. This function will work for only my records inputted. The "has_review_permission" function will return 'Continue' when the record will not have protective marking selected.*/
	public function continue($urn = NULL){
		$record_info = $this->Home_model->get_a_record_initial_info($urn);

		if(!is_null($record_info)){
			$record_id         = $record_info->id;
			$user_id           = $record_info->user_id;
			
			$record_accessible = false;

			if($user_id == $this->ion_auth->user()->row()->id && $this->user_management->has_review_permission($record_id, "check_continue") === "continue"){
				$record_accessible = true;
			}

			if(!$record_accessible){
				$this->session->set_flashdata('warning', "Access Denied!!");
				redirect('dashboard','refresh');
			}

			$_SESSION['record_id'] = $record_id;
			redirect('protectivemark/','refresh');
		}else{
			$this->session->set_flashdata('warning', "No Record Found.");
    		redirect('dashboard', 'refresh');
		}

	}

	public function review_approve($urn = NULL){

		$record_info = $this->Home_model->get_a_record_initial_info($urn);

		if(!is_null($record_info)){

			$record_id = $record_info->id;

			$record_hold['record_id']  = $record_id;
    		$record_hold['user_id']    = $this->ion_auth->user()->row()->id;
    		$record_hold['created_at'] = date("Y-m-d H:i:s");

			if( $this->user_management->has_review_permission($record_id)
				&& $this->Home_model->record_on_hold($record_id, $record_hold) ){

				$this->session->set_flashdata('warning', "It's a long time the record has been holding by you. So, the record has been holded by another user now.");
				redirect( 'dashboard', 'refresh' );
			}

			$record_accessible = false;

			if( $this->user_management->has_review_permission($record_id) 
				&& ( $this->Home_model->this_record_is_already_started_reviewing_by_this_user($record_id) == $this->ion_auth->user()->row()->id || $this->Home_model->this_record_is_already_started_reviewing_by_this_user($record_id) == NULL ) ){

				$record_accessible = true;
			}

			if(!$record_accessible){
				$this->session->set_flashdata('warning', "The Record has been started reviewing by another authorized user.");
				redirect('dashboard','refresh');
			}

			$_SESSION['record_id'] = $record_id;
			redirect('review/','refresh');
			
		}else{
			$this->session->set_flashdata('warning', "No Record Found.");
    		redirect('dashboard', 'refresh');
		}

	}
}
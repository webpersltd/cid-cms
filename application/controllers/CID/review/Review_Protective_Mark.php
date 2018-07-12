<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review_Protective_Mark extends CI_Controller {
		
	public function __construct()
    {
    	parent::__construct();
		
		if (!$this->ion_auth->logged_in()){
    		$this->session->set_flashdata('message', "Please login first!!");
    		redirect('login', 'refresh');
    	}else if(isset($_SESSION['record_id']) 
    				&& $this->Protective_Marking_Model->get_protective_marking_for_the_record($_SESSION['record_id'])
    				&& !$this->user_management->has_review_permission()){

			$this->session->set_flashdata('warning', "You don't have access to complete the operation.");
    		redirect('dashboard', 'refresh');
    		
		}

    	$this->load->helper('CID/nav');
		$this->load->library('form_validation');
		$this->load->model('Protective_Marking_Model');

		$review_completed = 0;

		if(isset($_SESSION['record_id'])){
			$review_completed = $this->Protective_Marking_Model->check_review_is_completed($_SESSION['record_id']);
		}
		
    	if(!$review_completed){
    		$this->session->set_flashdata('warning', "Please follow the completion note.");
    		redirect('review/','refresh');
    	}    	
    }

    public function index()
	{
		$data['user']                  = $this->ion_auth->user()->row();
		$record_id                     = $_SESSION['record_id'];
		$data['info']                  = $this->Protective_Marking_Model->get_info($record_id);
		$data['protective_mark_lists'] = $this->Protective_Marking_Model->get_all_protective_marks();
		$data['p_mark']                = $this->Protective_Marking_Model->get_protective_marking_for_the_record($record_id);
		$this->load->view('dashboard/review_protective_marking', $data);
	}

	public function get_selected_pro_mark(){
		if(!$this->input->is_ajax_request()){
			show_404();
		}else{
			$pro_mark = $this->Protective_Marking_Model->get_protective_marking_for_the_record($_SESSION['record_id']);
			echo json_encode($pro_mark);
		}
	}

	public function update_pro_mark(){
		if(!$this->input->is_ajax_request()){
			show_404();
		}else{
			$pro_mark = $this->input->post('proMark');
			$this->Protective_Marking_Model->update_pro_mark($pro_mark);
			$new_pro_mark = $this->Protective_Marking_Model->get_protective_marking_for_the_record($_SESSION['record_id']);
			echo json_encode($new_pro_mark);
		}
	}

	public function confirm_protective_mark(){
		if(!$this->input->is_ajax_request()){
			show_404();
		}else{
			$this->Protective_Marking_Model->update_pro_mark(NULL, "confirm");			
			echo "done";
		}
	}
}
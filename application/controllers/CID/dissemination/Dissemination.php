<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dissemination extends CI_Controller {
		
	public function __construct()
    {
    	parent::__construct();
		
		if (!$this->ion_auth->logged_in()){
    		$this->session->set_flashdata('message', "Please login first!!");
    		redirect('login', 'refresh');
    	}else if(isset($_SESSION['record_id']) && !$this->user_management->has_dissemination_permission()){
			$this->session->set_flashdata('warning', "You don't have access to complete the operation.");
    		redirect('dashboard', 'refresh');
		}

    	$this->load->helper('CID/nav');
		$this->load->library('form_validation');
		$this->load->model('Dissemination_model');
		$this->load->model('Protective_Marking_Model');

		$protective_mark_review_done = 0;

		if(isset($_SESSION['record_id'])){
			$protective_mark_review_done = $this->Protective_Marking_Model->check_review_protective_mark_is_completed($_SESSION['record_id']);
		}
		
    	if($protective_mark_review_done == 0){
    		$this->session->set_flashdata('warning', "Please follow the completion note.");
    		redirect('review_protective_mark/','refresh');
    	}

		$remaining_review = $this->Dissemination_model->count_dissemination_data($_SESSION['record_id']);
		$total_text       = $this->Dissemination_model->total_text($_SESSION['record_id']);

		if($remaining_review == $total_text){
			redirect('disseminationFinal/','refresh');
		}
    }

    public function index()
	{
		$record_id                     = $_SESSION['record_id']; 
		$data['user']                  = $this->ion_auth->user()->row();
		$data['info']                  = $this->Dissemination_model->get_details($record_id);
		$data['total_text']            = $this->Dissemination_model->total_text($record_id);
		$data['protective_mark_lists'] = $this->Protective_Marking_Model->get_all_protective_marks();

		$get_remaining_text     = $this->Dissemination_model->count_dissemination_data($record_id);
		$data['remaining_text'] = $get_remaining_text+1;

		$this->load->view('dashboard/dissemination', $data);
	}

	public function dissemination_process(){
		if (!$this->input->is_ajax_request()){
		   exit('No direct script access allowed');
		}else{
			$data              = array();
			$data['record_id'] = $_SESSION['record_id'];			
			$data['text_id']   = $this->input->post('textid');
			$infoFor           = $this->input->post('updateData');

			$this->Dissemination_model->disseminationReview($data, $infoFor);

			$review        = $this->Dissemination_model->get_details($_SESSION['record_id']);
			$checkFinished = $this->Dissemination_model->check_finish($data['text_id']);

			$remaining_text       = $this->Dissemination_model->count_dissemination_data($_SESSION['record_id']);  
			$remaining_text_count = $remaining_text+1;

			if(is_null($review)){
				$finalOutput = array(
					'summaryInfo'    => "none"
				);
				echo json_encode($finalOutput);
			}else if($checkFinished == 0){
				$finalOutput = array(
					'summaryInfo'    => "notfinished"
				);
				echo json_encode($finalOutput);
			}else{
				$finalOutput = array(
					'summaryInfo'   => $review->summary,
					'src_eval'      => $review->src_eval,
					'inf_int_eval'  => $review->inf_int_eval,
					'codeInfo'      => $review->code,
					'instruction'   => $review->instruction,
					'txtID'         => $review->txtID,
					'remainingText' => $remaining_text_count
				);
				echo json_encode($finalOutput);
			}
		}
	}

	public function get_selected_handling_code(){
		if(!$this->input->is_ajax_request()){
			show_404();
		}else{
			$txtID        = $this->input->post('txtID');
			$handlingCode = $this->Dissemination_model->get_selected_handling_code_for_this_text($txtID);
			echo $handlingCode;
		}
	}

	public function update_handling_code(){
		if(!$this->input->is_ajax_request()){
			show_404();
		}else{
			$code  = $this->input->post('code');
			$txtID = $this->input->post('txtID');

			$this->Dissemination_model->update_handling_code_for_this_text($txtID, $code);

			$updated_code = $this->Dissemination_model->get_selected_handling_code_for_this_text($txtID);
			echo $updated_code;
		}
	}

	public function get_handling_instruction(){
		if(!$this->input->is_ajax_request()){
			show_404();
		}else{
			$tid = $this->input->post('txtID');
			$handling_instruction = $this->Dissemination_model->get_handling_instruction_for_this_text($tid);
			echo $handling_instruction;
		}
	}

	public function update_handling_instruction(){
		if(!$this->input->is_ajax_request()){
			show_404();
		}else{
			$tid = $this->input->post('txtID');
			$hi  = trim($this->input->post('instruction'));
			if($hi == ""){
				echo "empty";
			}else{
				$this->Dissemination_model->update_handling_instruction_for_this_text($tid, $hi);
				$handling_instruction = $this->Dissemination_model->get_handling_instruction_for_this_text($tid);
				echo $handling_instruction;
			}
		}
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
}
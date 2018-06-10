<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dissemination extends CI_Controller {
		
	public function __construct()
    {
    	parent::__construct();
		
		if (!$this->ion_auth->logged_in()){
    		$this->session->set_flashdata('message', "Please login first!!");
    		redirect('login', 'refresh');
    	}

    	$_SESSION['record_id'] = 2;//This line will have to customize after completing the project

    	$this->load->helper('CID/nav');
		$this->load->library('form_validation');
		$this->load->model('Dissemination_model');

		$remaining_review = $this->Dissemination_model->count_dissemination_data($_SESSION['record_id']);
		$total_text       = $this->Dissemination_model->total_text($_SESSION['record_id']);

		if($remaining_review == $total_text){
			redirect('dissemination/','refresh');
		}
    }

    public function index()
	{
		$record_id             = $_SESSION['record_id']; 
		$data['user']          = $this->ion_auth->user()->row();
		$data['info']          = $this->Dissemination_model->get_details($record_id);
		$data['total_text']    = $this->Dissemination_model->total_text($record_id);

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
					'pmname'        => $review->name,
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
}
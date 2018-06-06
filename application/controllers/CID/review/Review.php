<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Controller {
		
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
		$this->load->model('Review_model');
    }

    public function index()
	{
		$data['user']       = $this->ion_auth->user()->row();
		$record_id          = $_SESSION['record_id'];
		$data['info']       = $this->Review_model->get_details($record_id); 

		$this->load->view('dashboard/review-main', $data);
	}

	public function reviewProcess(){
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}else{
			$data            = array();			
			$data['text_id'] = $this->input->post('textid');
			$infoFor         = $this->input->post('updateData');

			$this->Review_model->finalReview($data, $infoFor);

			$review        = $this->Review_model->get_details($_SESSION['record_id']);
			$checkFinished = $this->Review_model->check_finish($data['text_id']);

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
					'pmname'       => $review->name,
					'summaryInfo'  => $review->summary,
					'src_eval'     => $review->src_eval,
					'inf_int_eval' => $review->inf_int_eval,
					'codeInfo'     => $review->code,
					'instruction'  => $review->instruction,
					'txtID'        => $review->txtID
				);
				echo json_encode($finalOutput);
			}
		}
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HandlingCode extends CI_Controller {
		
	public function __construct()
    {
		parent::__construct();
		
		if (!$this->ion_auth->logged_in()){
    		$this->session->set_flashdata('message', "Please login first!!");
    		redirect('login', 'refresh');
    	}
		
		$this->load->helper('CID/nav');
		$this->load->library('form_validation');
		$this->load->model('Handling_code_model');

		$text_exists = 0;

		if(isset($_SESSION['record_id'])){
			$text_exists = $this->Handling_code_model->remaining_text($_SESSION['record_id']);
		}
		
    	if($text_exists == 0){
    		$this->session->set_flashdata('warning', "Text is Required to Process Handling Code.");
    		redirect('text/','refresh');
    	}
	}

	public function index(){
		$record_id = $_SESSION['record_id'];
		$txt_id    = $this->Handling_code_model->next($record_id);

		if(!is_null($txt_id)){
			$data['text']  = $this->Handling_code_model->get_text_info($record_id, $txt_id);
			$remainingText = $this->Handling_code_model->remaining_text($record_id, $txt_id);
			if($remainingText == 0){
				redirect('handlingcodereview/','refresh');
			}
			$data['remainingTextVeiw'] = $remainingText - 1;
		}else{
			$data['text']              = $this->Handling_code_model->get_text_info($record_id);
			$data['remainingTextVeiw'] = $this->Handling_code_model->remaining_text($record_id) - 1;
		}
		$this->load->view('dashboard/handlingcode', $data);
	}

	public function create(){
		$config = array(
		        array(
		                'field'  => 'handlingcode',
		                'label'  => 'Handling Code',
		                'rules'  => 'required',
		                'errors' => array(
		                        'required' => 'Please select a handling code.',
		                ),
		        ),
		        array(
		                'field'  => 'textID',
		                'label'  => 'Text ID',
		                'rules'  => 'required',
		                'errors' => array(
		                        'required' => 'Sorry, you can\'t submit the form without text ID.',
		                ),
		        ),
		        array(
		                'field' => 'instruction',
		                'label' => 'Instruction',
		                'rules' => 'required|trim'
		        )
		);

		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		if($this->form_validation->run() == FALSE){

			$this->session->set_flashdata('handlingcode', form_error('handlingcode'));
			$this->session->set_flashdata('textID', form_error('textID'));
			$this->session->set_flashdata('instruction', form_error('instruction'));

			$this->session->set_flashdata('handlingcodeInput', $this->input->post('handlingcode'));
        	$this->session->set_flashdata('instructionInput', $this->input->post('instruction'));

            redirect('handlingcode/','refresh');

        }else{
        	$data['record_id']   = $_SESSION['record_id'];
        	$data['text_id']     = $this->input->post('textID');
        	$data['code']        = $this->input->post('handlingcode');
        	$data['instruction'] = $this->input->post('instruction');

        	$this->Handling_code_model->record_handling_code($data);

        	redirect('handlingcode/','refresh');
        }
	}

	public function review(){

		$check_all_handling_code_processed = $this->Handling_code_model->check_all_handling_code_processed($_SESSION['record_id']);

		if(!$check_all_handling_code_processed){
			$this->session->set_flashdata('warning', "Please follow the completion note.");
			redirect('handlingcode/','refresh');
		}

		$data['user']             = $this->ion_auth->user()->row();
		$data['review']           = $this->Handling_code_model->handling_code_review($_SESSION['record_id']);

		if(count($data['review']) == 0){
			redirect('protectivemark/','refresh');
		}

		$data['total_for_review'] = $this->Handling_code_model->total_unreviewed_handling_code($_SESSION['record_id']);
		$this->load->view('dashboard/handlingcodereview', $data);
		
	}

	public function review_done(){
		if (!$this->input->is_ajax_request()) {
		   show_404();
		}else{			
			$handlingcodeID = $this->input->post('handlingCodeID');

			$this->Handling_code_model->update_review_flag($handlingcodeID);

			$review = $this->Handling_code_model->handling_code_review($_SESSION['record_id'], $handlingcodeID);

			if(is_null($review)){
				$finalOutput = array(
					'summaryInfo' => "none"
				);
				echo json_encode($finalOutput);
			}else{
				$finalOutput = array(
					'summaryInfo'    => $review->summary,
					'src_eval'       => $review->src_eval,
					'inf_int_eval'   => $review->inf_int_eval,
					'codeInfo'       => $review->code,
					'instruction'    => $review->instruction,
					'handlingCodeid' => $review->id
				);
				echo json_encode($finalOutput);
			}
		}
	}

	public function recheck_handling_code(){
		if (!$this->input->is_ajax_request()) {
		   show_404();
		}else{
			$handlingCodeID = $this->input->post('handlingCodeID');
			$data           = $this->Handling_code_model->get_handling_code($handlingCodeID);
			echo json_encode($data);
		}
	}

	public function update_handling_code(){
		if (!$this->input->is_ajax_request()) {
		   show_404();
		}else{
			$handlingInstruction = $this->input->post('handlingInstruction');
			$handlingCode        = $this->input->post('handlingCode');
			$handlingCodeID      = $this->input->post('hid');

			$this->Handling_code_model->update_handling_code($handlingCode, $handlingInstruction, $handlingCodeID);
			$data = $this->Handling_code_model->get_handling_code($handlingCodeID);
			echo json_encode($data);
		}
	}

}
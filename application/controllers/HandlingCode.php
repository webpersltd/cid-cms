<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HandlingCode extends CI_Controller {
		
	public function __construct()
    {
		parent::__construct();
		if (!$this->ion_auth->logged_in())
    	{
    		$this->session->set_flashdata('message', "Please login first!!");
    		redirect('login', 'refresh');
    	}
    	$_SESSION['record_id'] = 2;//This line will have to customize after completing the project
		$this->load->helper('CID/nav');
		$this->load->library('form_validation');
		$this->load->model('Handling_code_model');		
	}

	public function index(){
		$record_id  = $_SESSION['record_id'];

		if($this->session->has_userdata('txt_id')){
			$txt_id = $_SESSION['txt_id'];
		}

		if(isset($txt_id)){
			$data['text'] = $this->Handling_code_model->get_text_info($record_id, $txt_id);
		}else{
			$data['text'] = $this->Handling_code_model->get_text_info($record_id);
		}
		$this->load->view('dashboard/handlingcode', $data);
	}

	public function create(){
		$config = array(
		        array(
		                'field' => 'handlingcode',
		                'label' => 'Handling Code',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => 'Please select a handling code.',
		                ),
		        ),
		        array(
		                'field' => 'textID',
		                'label' => 'Text ID',
		                'rules' => 'required',
		                'errors' => array(
		                        'required' => 'Sorry, you can\'t submit the form without text ID.',
		                ),
		        ),
		        array(
		                'field' => 'instruction',
		                'label' => 'Instruction',
		                'rules' => 'required'
		        )
		);

		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		if($this->form_validation->run() == FALSE){

			$this->session->set_flashdata('handlingcode', form_error('handlingcode'));
			$this->session->set_flashdata('textID', form_error('textID'));
			$this->session->set_flashdata('instruction', form_error('instruction'));

			$_SESSION['handlingcodeInput'] = $this->input->post('handlingcode');
        	$_SESSION['instructionInput']  = $this->input->post('instruction');

            redirect('handlingcode/','refresh');

        }else{

        	$handlingcode = $this->input->post('handlingcode');
        	$txt_id       = $this->input->post('textID');
        	$instruction  = $this->input->post('instruction');

        }
	}

}
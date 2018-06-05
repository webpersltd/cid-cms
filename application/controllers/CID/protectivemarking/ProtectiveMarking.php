<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProtectiveMarking extends CI_Controller {
		
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
		$this->load->model('Protective_Marking_Model');
    }

    public function index()
	{
		$data['user'] = $this->ion_auth->user()->row();
		$record_id    = $_SESSION['record_id'];
		$handling_id  = $this->Protective_Marking_Model->next($record_id);

		if(!is_null($handling_id)){
			$data['text']           = $this->Protective_Marking_Model->get_text_info($record_id, $handling_id);
			$remaining              = $this->Protective_Marking_Model->remaining($record_id, $handling_id);
			$data['protectivemark'] = $this->Protective_Marking_Model->get_protective_mark();
			if($remaining == 0){
				redirect('review/','refresh');
			}
			$data['remaining'] = $remaining - 1;
		}else{
			$data['text']           = $this->Protective_Marking_Model->get_text_info($record_id);
			$data['protectivemark'] = $this->Protective_Marking_Model->get_protective_mark();
			$data['remaining']      = $this->Protective_Marking_Model->remaining($record_id)-1;
		}

		$this->load->view('dashboard/protectivemark', $data);
	}

	public function create(){
		$config = array(
		        array(
		                'field'  => 'hid',
		                'label'  => 'Handling Code',
		                'rules'  => 'required',
		                'errors' => array(
		                        'required' => 'Sorry, you can\'t submit the form without Handling ID.',
		                ),
		        ),
		        array(
		                'field' => 'pi',
		                'label' => 'Protective Marking',
		                'rules' => 'required'
		        )
		);

		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		if($this->form_validation->run() == FALSE){

			$this->session->set_flashdata('handlingcode', form_error('hid'));
			$this->session->set_flashdata('ProtectiveMarking', form_error('pi'));

            redirect('protectivemark/','refresh');

        }else{
        	$data['record_id']     = $_SESSION['record_id'];
        	$data['handling_id']   = $this->input->post('hid');
        	$data['protective_id'] = $this->input->post('pi');

        	$this->Protective_Marking_Model->record_protective_marking($data);

        	redirect('protectivemark/','refresh');
        }
	}
}
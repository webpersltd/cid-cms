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
		
		$this->load->helper('CID/nav');
		$this->load->library('form_validation');
		$this->load->model('Protective_Marking_Model');

		$handling_code_exists = 0;

		if(isset($_SESSION['record_id'])){
			$handling_code_exists = count($this->Protective_Marking_Model->get_info($_SESSION['record_id']));
		}
		
    	if($handling_code_exists == 0){
    		$this->session->set_flashdata('warning', "Processing Handling Code is Required to Process Protective Marking.");
    		redirect('handlingcode/','refresh');
    	}

    	$handling_code_review_done = $this->Protective_Marking_Model->check_handling_code_review_done($_SESSION['record_id']);

    	if(!$handling_code_review_done){
    		$this->session->set_flashdata('warning', "Please follow the completion note.");
    		redirect('handlingcodereview/','refresh');
    	}
    }

    public function index()
	{
		$data['user'] = $this->ion_auth->user()->row();
		$record_id    = $_SESSION['record_id'];

		$data['text']           = $this->Protective_Marking_Model->get_info($record_id);
		$data['protectivemark'] = $this->Protective_Marking_Model->get_all_protective_marks();

		$this->load->view('dashboard/protectivemark', $data);
	}

	public function create(){
		$config = array(
			        array(
			                'field' => 'pi',
			                'label' => 'Protective Marking',
			                'rules' => 'required',
			                'errors' => array(
			                        'required' => 'Please Select a Protective Mark for this Record.',
			                ),
			        )
				);

		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		if($this->form_validation->run() == FALSE){

			$this->session->set_flashdata('ProtectiveMarking', form_error('pi'));
            redirect('protectivemark/','refresh');

        }else{
        	$data['record_id']     = $_SESSION['record_id'];
        	$data['protective_id'] = $this->input->post('pi');

        	$this->Protective_Marking_Model->record_protective_marking($data);

        	redirect('review/','refresh');
        }
	}
}
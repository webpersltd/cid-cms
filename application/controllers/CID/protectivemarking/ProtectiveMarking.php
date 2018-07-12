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

    	$group = array("Level-1","Level-2","Level-3","Level-4");

    	if(!$this->ion_auth->in_group($group)){
    		$this->session->set_flashdata('warning', "You don't have access to complete the operation.");
    		redirect('dashboard', 'refresh');
    	}
		
		$this->load->helper('CID/nav');
		$this->load->library('form_validation');
		$this->load->model('Protective_Marking_Model');

		$handling_code_exists = 0;

		if(isset($_SESSION['record_id'])){
			$handling_code_exists = count($this->Protective_Marking_Model->get_info($_SESSION['record_id']));
		}
		
    	if($handling_code_exists == 0){
    		$this->session->set_flashdata('warning', "Please follow the completion note.");
    		redirect('handlingcode/','refresh');
    	}

    	$handling_code_review_done = $this->Protective_Marking_Model->check_handling_code_review_done($_SESSION['record_id']);

    	if(!$handling_code_review_done){
    		$this->session->set_flashdata('warning', "Please follow the completion note.");
    		redirect('handlingcodereview/','refresh');
    	}

    	$protectivemark_exist = $this->Protective_Marking_Model->protective_markings_exist($_SESSION['record_id']);

    	if($protectivemark_exist == 1){
    		$this->session->set_flashdata('warning', "Protective Marking has already selected for this record.");
    		redirect('review/','refresh');
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
        	$urn = $this->Protective_Marking_Model->get_urn($_SESSION['record_id']);

        	$this->session->set_flashdata('success', "The record has been stored successfully with URN: ".$urn);
        	unset($_SESSION['record_id']);
        	
        	redirect('dashboard','refresh');
        }
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review_Protective_Mark extends CI_Controller {
		
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
    }

    public function index()
	{
		$data['user']                  = $this->ion_auth->user()->row();
		$record_id                     = $_SESSION['record_id'];
		$data['info']                  = $this->Protective_Marking_Model->get_info($record_id);
		$data['protective_mark_lists'] = $this->Protective_Marking_Model->get_protective_mark($record_id);
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
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DisseminationFinal extends CI_Controller {
		
	public function __construct()
    {
    	parent::__construct();
		
		if (!$this->ion_auth->logged_in()){
    		$this->session->set_flashdata('message', "Please login first!!");
    		redirect('login', 'refresh');
    	}

    	$this->load->helper('CID/nav');
		$this->load->library('form_validation');
		$this->load->model('Dissemination_model');

		$dissemination_done = false;

		if(isset($_SESSION['record_id'])){
			$dissemination_done = $this->Dissemination_model->check_dissemination_is_completed($_SESSION['record_id']);
		}
		
    	if(!$dissemination_done){
    		$this->session->set_flashdata('warning', "Please follow the WARNING instruction.");
    		redirect('dissemination/','refresh');
    	}
    }

    public function index()
	{
		$record_id    = $_SESSION['record_id']; 
		$data['user'] = $this->ion_auth->user()->row();
		$this->load->view('dashboard/dissemination_final', $data);
	}

	public function get_name(){
		if (!$this->input->is_ajax_request()){
		   exit('No direct script access allowed');
		}else{
			$searchTerm = $_GET['term'];
			$result     = $this->Dissemination_model->get_user_name($searchTerm);
			$name       = array();

			foreach ($result as $value) {
				$data['id']    = $value->id;
				$data['value'] = $value->first_name." ".$value->last_name;
				array_push($name, $data);
			}
			echo json_encode($name);
		}
	}

	public function submit_final_record(){
		$config = array(
		        array(
		                'field'  => 'user',
		                'label'  => 'Name',
		                'rules'  => 'required',
		                'errors' => array(
		                        'required' => 'Please select a name.',
		                ),
		        )
		);

		$this->form_validation->set_rules($config);
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('user', form_error('user'));
            redirect('disseminationFinal/','refresh');
        }else{
        	$data['record_id']       = $_SESSION['record_id'];
        	$data['disseminated_to'] = $this->input->post('user');
        	$data['created_at']      = date('Y-m-d H:i:s');
        	
        	$this->Dissemination_model->final_submission($data);

        	unset($_SESSION['record_id']);
        	
        	redirect('initials','refresh');
        }
	}
}
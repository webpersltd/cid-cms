<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {    
		
	public function __construct()
    {
		parent::__construct();
		if (!$this->ion_auth->logged_in()){
    		$this->session->set_flashdata('message', "Please login first!!");
    		redirect('login', 'refresh');
		}
		$this->load->model('Review_model');
		$this->load->helper('CID/nav');
		$this->load->database();		
	}

	public function index()
    {
	   $data['departments'] = $this->db->get('departments');
	   $data['inf_src']     = $this->db->order_by('name')->get('inf_sources');
	   $user                = $this->ion_auth->user()->row();

	   $this->load->js(base_url()."js/initials.js");
	   $this->output->set_output_data("user", $user);	   
	   $this->output->prepend_title("Initials");
	   $this->output->set_template('default');
	   $this->load->view('dashboard/initials',$data);
	}

	public function subjects()
	{
		$query = $this->db->get('nationalities');
		$data['nationalities']=$query;
		$this->load->view('dashboard/subjects',$data);
	}

	public function text()
	{
		$this->load->view('dashboard/text');
	}

	public function saveinforeview()
	{
		if(isset($_SESSION['record_id'])){
			$data['text']=$this->Review_model->getReviewText();
			$this->load->view('dashboard/saveinformationandreview',$data);
		}else{
			echo "Something went wrong.....";
		}
		
	}
	
	public function search()
	{
		$this->load->view('dashboard/search');
	}
	
	public function viewlog()
	{
		$this->load->view('dashboard/viewlog');
	}
}

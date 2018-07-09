<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {    
		
	public function __construct()
    {
		parent::__construct();
		$this->load->helper('CID/nav');
		$this->load->database();

		if (!$this->ion_auth->logged_in()){
		    $this->session->set_flashdata('message', "Please login first!!");
		    redirect('login', 'refresh');
		}		
	}

	public function index()
    {
    	$group = array("Level-1","Level-2","Level-3","Level-4");

    	if(!$this->ion_auth->in_group($group)){
    		$this->session->set_flashdata('warning', "You don't have access to complete the operation.");
    		redirect('dashboard', 'refresh');
    	}

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
		$group = array("Level-1","Level-2","Level-3","Level-4");

		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('warning', "You don't have access to complete the operation.");
			redirect('dashboard', 'refresh');
		}

		$query = $this->db->get('nationalities');
		$data['nationalities']=$query;
		$this->load->view('dashboard/subjects',$data);
	}

	public function text()
	{
		$group = array("Level-1","Level-2","Level-3","Level-4");

		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('warning', "You don't have access to complete the operation.");
			redirect('dashboard', 'refresh');
		}
		
		$this->load->view('dashboard/text');
	}

	public function saveinforeview()
	{
		$this->load->view('dashboard/saveinformationandreview');
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

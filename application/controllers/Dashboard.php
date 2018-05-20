<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

   

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    
		
	public function __construct()
    {
		parent::__construct();
		$this->load->helper('CID/nav');
		$this->load->database();
		
	}

	public function index()
    {
	   $query = $this->db->get('departments');
	   $data['departments']=$query;
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

	public function handlingcode()
	{
		$this->load->view('dashboard/handlingcode');
		
	}

	public function protectivemark()
	{
		$this->load->view('dashboard/protectivemark');
	}


	public function review()
	{
		$this->load->view('dashboard/review');
	}
	
	public function dissemination()
	{
		$this->load->view('dashboard/dissemination');
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

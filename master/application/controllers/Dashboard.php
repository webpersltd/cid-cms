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
	}

	public function index()
    {
	   $this->load->view('dashboard/initials');
	}

	public function subjects()
	{
		$this->load->view('dashboard/subjects');
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

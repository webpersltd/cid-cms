<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rest extends CI_Controller {

	//check merging by Shoukhin

	public function index(){
    	//$this->load->view('rest');
    	$account = $this->input->post('info');
		//$passwd  = $this->input->post('department');
		$data=array($account);
    	echo json_encode($data);
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rest extends CI_Controller {

	//check merging by Shoukhin

	public function index(){
    	//$this->load->view('rest');
    	$account = $this->input->post('account');
    	$passwd  = $this->input->post('passwd');
    	echo $account;
	}
}
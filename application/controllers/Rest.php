<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rest extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('./CID/Initial/Initial');

		if (!$this->ion_auth->logged_in()){
		    $this->session->set_flashdata('message', "Please login first!!");
		    redirect('login', 'refresh');
		}
	}

	public function index(){
    	$account = $this->input->post('info');
		$data    = json_decode($account, TRUE);
		$pointer = 0;

		for($i=0;$i<count($data);$i++){
			$object['record_id']    = $_SESSION['record_id'];
			$object['summary']      = $data[$i]['value'];
			$object['serial']       = $data[$i]['id'];
			$object['src_eval']     = $data[$i]['grading'][0];
			$object['inf_int_eval'] = $data[$i]['grading'][1];
			$object['file']         = "filename.txt";
			if($this->db->insert('texts', $object)){
				$pointer=1;
			}
		}
		
		if($pointer==1){
			echo "added";
		}else{
			echo "<script type='text/javascript'>alert('Fail to add')</script>";
		}		
	}
}
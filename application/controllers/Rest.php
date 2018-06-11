<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rest extends CI_Controller {

	//check merging by Shoukhin

	function __construct(){
		parent::__construct();
		$this->load->model('./CID/Initial/Initial');
	}

	public function index(){
    	//$this->load->view('rest');
    	$account = $this->input->post('info');
		//$passwd  = $this->input->post('department');

		$data=array($account);
		




		//print_r($data[0]);
	$pointer=0;
		for($i=0;$i<count($data[0]);$i++){
			$object['record_id']=$this->Initial->getRecordId($this->session->urn)[0]->id;
			$object['summery']=$data[0][$i]['value'];
			$object['serial']=$data[0][$i]['id'];
			$object['src_eval']=$data[0][$i]['grading'][0];
			$object['inf_int_eval']=$data[0][$i]['grading'][1];
			$object['file']="filename.txt";
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


	public function testRest(){
		//echo $this->session->urn;
		
		print_r($this->Initial->getRecordId($this->session->urn)[0]->id);

	}
}
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Text extends CI_Controller{


    function __construct(){
        parent::__construct();
        if (!$this->ion_auth->logged_in()){
    		$this->session->set_flashdata('message', "Please login first!!");
    		redirect('login', 'refresh');
    	}
    }

    public function index(){
       print_r($this->input->post('name'));
    }  
    
    
    public function saveText(){
        $object=array();
        $pointer = 0;

       for($i=0;$i<count($this->input->post('texts[]'));$i++){
            // echo ($this->input->post('gradingSrc[]')[$i]);
            // echo "</br>";
            // echo ($this->input->post('texts[]')[$i]);
            // echo "</br>";
            //$object=array();
            $object['record_id']    = $_SESSION['record_id'];
			$object['summary']      = $this->input->post('texts[]')[$i];
			$object['src_eval']     = $this->input->post('gradingSrc[]')[$i];
			$object['inf_int_eval'] = $this->input->post('gradingInf[]')[$i];
            $object['file']         = "filename.txt";
            $_SESSION['review_state']=1;
            if($this->db->insert('texts', $object)){
                $pointer = 1;
				
			}
       }

       if($pointer==1){
            redirect('./savereview/');
       }
        //print_r($info);
    }

    public function reviewText(){
        print_r(array($this->input->post('summary'),$this->input->post('text_id'),$this->input->post('source_evaluation'),$this->input->post('inf_i_eva')));
        $sql = "UPDATE texts SET summary= ? , src_eval= ? , inf_int_eval= ? , status=? WHERE id= ?";
        if($this->db->query($sql, array( $this->input->post('summary'),$this->input->post('source_evaluation'),(int)$this->input->post('inf_i_eva'),1,(int)$this->input->post('text_id')))){
            redirect('savereview/');
        }

    }


    
}
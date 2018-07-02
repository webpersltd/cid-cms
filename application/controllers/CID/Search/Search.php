<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

    function __conatruct(){
        parent::__conatruct();
        
    }



    public function index(){
        print_r($this->input->post("urnNo"));
        $data=array(
            'urn'=>$this->input->post("urnNo"),
            'isr'=>$this->input->post("isr"),
            'subject_surname'=>$this->input->post("surName"),
            'subject_first_name'=>$this->input->post("firstname"),
            'dob'=>$this->input->post("dob"),
            'nationality'=>$this->input->post("nationality"),
            'free_text'=>$this->input->post("freetext")
        );
        echo "<pre>";
        print_r(getRecordid($data));
        print_r($data);
    }

}

?>
		
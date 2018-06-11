<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Initial extends CI_Controller{
    function __construct(){
        Parent::__construct();
        $this->load->database();
        
    }

    public function handleInitialInfo(){
        
        $data['urn']=uniqid();//$this->input->post("urn");
        $data['department']=$this->input->post("department");
        $data['date_of_report']=$this->input->post("date_of_report");
        $data['information_source']=$this->input->post("information_source");
        $data['other_information_source']=$this->input->post("other_information_source");
        $data['submitting_person_name']=$this->input->post("submitting_person_name");
        $data['time_of_report']=$this->input->post("time_of_report");
        $data['ISR']=$this->input->post("ISR");
        $object=array();
        $object['urn']=$data['urn'];
        $object['user_id']=1;
        $object['department']=$data['department'];
        $object['report_submitted_by']=$data['submitting_person_name'];
        $object['date_of_report']=$data['date_of_report'];
        $object['time_of_report']=$data['time_of_report'];
        $object['inf_source']=2;//$data['information_source'];
        $object['other_source']=$data['other_information_source'];
        $object['isr']=$data['ISR'];
        if($this->db->insert('records', $object)){
            $this->session->set_userdata('urn',$this->db->insert_id());
            redirect(base_url()."subjects/", 'refresh');
      }
            
    }


}
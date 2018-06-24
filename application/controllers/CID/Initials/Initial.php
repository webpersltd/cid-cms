<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Initial extends CI_Controller{
    
    function __construct(){
        Parent::__construct();
        $this->load->database();
        $this->load->library('form_validation');        
    }

    public function handleInitialInfo(){

        $config = array(
                array(
                        'field'  => 'department',
                        'label'  => 'Department',
                        'rules'  => 'required',
                        'errors' => array(
                                'required' => 'Please select a department.',
                        ),
                ),
                array(
                        'field'  => 'date_of_report',
                        'label'  => 'Date of Report',
                        'rules'  => 'required',
                        'errors' => array(
                                'required' => 'Please pick a date of report.',
                        ),
                ),
                array(
                        'field' => 'submitting_person_name',
                        'label' => 'Person Name',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'time_of_report',
                        'label' => 'Time of Report',
                        'rules' => 'required'
                ),
                array(
                        'field' => 'ISR',
                        'label' => 'ISR',
                        'rules' => 'required'
                )
        );

        if($this->input->post("information_source") == 11){
            $configForOtherSource = array(
                    'field' => 'information_source_other',
                    'label' => 'Other Source of Information',
                    'rules' => 'required'
                );
        }else{
            $configForOtherSource = array(
                    'field' => 'information_source',
                    'label' => 'Information Source',
                    'rules' => 'required'
                );
        }

        array_push($config, $configForOtherSource);

        $this->form_validation->set_rules($config);
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('department', form_error('department'));
            $this->session->set_flashdata('date_of_report', form_error('date_of_report'));
            $this->session->set_flashdata('submitting_person_name', form_error('submitting_person_name'));
            $this->session->set_flashdata('time_of_report', form_error('time_of_report'));
            $this->session->set_flashdata('ISR', form_error('ISR'));
            $this->session->set_flashdata('information_source_other', form_error('information_source_other'));
            $this->session->set_flashdata('information_source', form_error('information_source'));

            $this->session->set_flashdata('old_value', $_POST);

            redirect('initials/','refresh');
        }
        
        $data['urn']                      = floor(microtime(true)).rand(10,99);
        $data['department']               = $this->input->post("department");
        $data['date_of_report']           = $this->input->post("date_of_report");
        $data['information_source']       = $this->input->post("information_source");
        $data['other_information_source'] = $this->input->post("other_information_source");
        $data['submitting_person_name']   = $this->input->post("submitting_person_name");
        $data['time_of_report']           = $this->input->post("time_of_report");
        $data['ISR']                      = $this->input->post("ISR");
        $object                           = array();
        $object['urn']                    = $data['urn'];
        $object['user_id']                = 1;
        $object['department']             = $data['department'];
        $object['report_submitted_by']    = $data['submitting_person_name'];
        $object['date_of_report']         = $data['date_of_report'];
        $object['time_of_report']         = $data['time_of_report'];
        $object['inf_source']             = 2;//$data['information_source'];
        $object['other_source']           = $data['other_information_source'];
        $object['isr']                    = $data['ISR'];

        if($this->db->insert('records', $object)){
            $this->session->set_userdata('urn',$data['urn']);
            redirect(base_url()."subjects/", 'refresh');
        }                    
    }
}
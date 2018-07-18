 <?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends CI_Controller{
    function __construct(){
        Parent::__construct();
        $this->load->database();
        $this->load->model('./CID/Initial/Initial');
        $this->load->library('form_validation'); 
        
    }



    public function handleSubject(){
        $config=array(
            array(
                    'field' => 'firstname',
                    'label' => 'Firstname',
                    'rules' => 'required'
            ),
            array(
                    'field' => 'fathersname',
                    'label' => 'Father name',
                    'rules' => 'required',
                    
            ),
            array(
                    'field' => 'dob',
                    'label' => 'Date of Birth',
                    'rules' => 'required'
            ),
            array(
                'field' => 'identificationtype',
                'label' => 'Identification ',
                'rules' => 'required'
            ),

            array(
                'field' => 'surname',
                'label' => 'Surname',
                'rules' => 'required'
            ),
            array(
                'field' => 'gender',
                'label' => 'Gender',
                'rules' => 'required'
            ),

            array(
                'field' => 'birthplace',
                'label' => 'Birthplace',
                'rules' => 'required'
            ),

            array(
                'field' => 'nationality',
                'label' => 'Nationality',
                'rules' => 'required'
            ),
            array(
                'field' => 'idnumber',
                'label' => 'ID Number',
                'rules' => 'required'
            ),
            array(
                    'field' => 'age',
                    'label' => 'Age',
                    'rules' => 'required'
            )
    );

    //array_push($config);
    $this->form_validation->set_rules($config);
    $this->form_validation->set_error_delimiters('<p class="error">', '<span style="float:right;padding:3px;background:black;border-radius:13px 13px 13px" r_error="remove" class="glyphicon glyphicon-remove"></span></p>');
    if($this->form_validation->run() == FALSE){
        $this->session->set_flashdata('firstname', form_error('firstname'));
        $this->session->set_flashdata('fathersname', form_error('fathersname'));
        $this->session->set_flashdata('dob', form_error('dob'));
        $this->session->set_flashdata('identificationtype', form_error('identificationtype'));
        $this->session->set_flashdata('surname', form_error('surname'));
        $this->session->set_flashdata('gender', form_error('gender'));
        $this->session->set_flashdata('birthplace', form_error('birthplace'));
        $this->session->set_flashdata('nationality', form_error('nationality'));
        $this->session->set_flashdata('age', form_error('age'));
        $this->session->set_flashdata('idnumber', form_error('idnumber'));
        $this->session->set_flashdata('old_value', $_POST);

        redirect('subjects/','refresh');
    }
        $data['firstname']=$this->input->post("firstname");
        $data['fathersname']=$this->input->post("fathersname");
        $data['dob']=$this->input->post("dob");
        $data['age']=$this->input->post("age");
        $data['identificationtype']=$this->input->post("identificationtype");
        $data['surname']=$this->input->post("surname");
        $data['gender']=$this->input->post("gender");
        $data['birthplace']=$this->input->post("birthplace");
        $data['nationality']=$this->input->post("nationality");
        $data['idnumber']=$this->input->post("idnumber");
        $data['homeaddress']=$this->input->post("homeaddress");
        $data['bussinessname']=$this->input->post("bussinessname");
        $data['bussinessaddress']=$this->input->post("bussinessaddress");
        $data['binortin']=$this->input->post("binortin");
        $data['telephonenumber']=$this->input->post("telephonenumber");
        $data['dos']=$this->input->post("dos");


        $object=array();
        $object['record_id']=$_SESSION['record_id'];
        $object['fname']=$data['firstname'];
        $object['surname']=$data['surname'];
        $object['father_name']=$data['fathersname'];
        $object['gender']=$data['gender'];
        $object['dob']=$data['dob'];
        $object['pob']=$data['birthplace'];
        $object['approx_age']=$data['age'];
        $object['nationality']=$data['nationality'];
        $object['id_type']=$data['identificationtype'];
        $object['id_number']=$data['idnumber'];
        $object['home_address']=$data['homeaddress'];
        $object['business_name']=$data['bussinessname'];
        $object['business_address']=$data['bussinessaddress'];
        $object['bin_tin']=$data['binortin'];
        $object['telephone']=$data['telephonenumber'];
        $object['description']=$data['dos'];
        $object['file']="filename.txt";

        if($this->db->insert('subjects', $object)){
            redirect(base_url()."text/", 'refresh');
        }
       
    }
}
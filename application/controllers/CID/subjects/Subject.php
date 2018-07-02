 <?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends CI_Controller{
    function __construct(){
        Parent::__construct();
        $this->load->database();
        $this->load->model('./CID/Initial/Initial');
        
    }



    public function handleSubject(){
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
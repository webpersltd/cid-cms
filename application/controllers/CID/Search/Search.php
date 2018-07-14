<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

    function __construct(){
        parent::__construct();
        if (!$this->ion_auth->logged_in()){
    		$this->session->set_flashdata('message', "Please login first!!");
    		redirect('login', 'refresh');
    	}
        $this->load->helper('CID/nav');
        $this->load->library('pagination');
    }



    public function index(){
        if (!$this->ion_auth->logged_in()){
    		$this->session->set_flashdata('message', "Please login first!!");
    		redirect('login', 'refresh');
        }
        
        $group = array(1, 2);
        if (!$this->ion_auth->in_group($group))
		{
			$this->session->set_flashdata('message', 'You must be a part of the Level 1 or Level 2 user group to search');
			redirect('./dashboard/search');
		}
	
        print_r($this->input->post("urnNo"));
        $results=array(
            'urn'=>$this->input->post("urnNo"),
            'isr'=>$this->input->post("isr"),
            'subject_surname'=>$this->input->post("surName"),
            'subject_first_name'=>$this->input->post("firstname"),
            'dob'=>$this->input->post("dob"),
            'nationality'=>$this->input->post("nationality"),
            'free_text'=>$this->input->post("freetext"),
            'start_date'=>$this->input->post('dateFrom'),
            'end_date'=>$this->input->post('dateTo'),
            'departments'=>$this->input->post('location'),
            'src'=>$this->input->post('sourceInfo'),
            'officerName'=>$this->input->post('officerName')
        );
        // echo "<pre>";
        // print_r(getRecordid($data));
        // print_r($data);
        $data['records']=getRecordid($results);
        $_SESSION['records']=$data['records'];
        $this->load->view('./dashboard/search',$data);
       
    }

    public function searchPagination($page){
        //$a=array("red","green","blue","yellow","brown");
        $data['pages']=count($_SESSION['records']);
        $data['paginatedData']=array_slice($_SESSION['records'],($page==0?$page:$page+1),3);
        $this->load->view('./dashboard/search',$data);
    }

}

?>
		
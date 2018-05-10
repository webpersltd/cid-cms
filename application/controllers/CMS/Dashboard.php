<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->helper('CID/nav');
    }

    public function index(){
       $this->load->view('CMS/index');
    }


    public function newCase(){
        $this->load->view('CMS/newcase');
     }


     public function updateCase(){
        $this->load->view('CMS/updatecase');
     }

     public function closeCase(){
        $this->load->view('CMS/closecase');
     }
}
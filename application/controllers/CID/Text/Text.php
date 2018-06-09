<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Text extends CI_Controller{


    function __construct(){}

    public function index(){
       print_r($this->input->post('name'));
    }  
    
    
    public function saveText(){
        echo "Hellow";
    }
}
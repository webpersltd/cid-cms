<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Ajax extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->database();
        //$this->load->model('./CID/Ajax/Ajax/');
    }


    public function getUrn($info){
       
            
            //Either you can print value or you can send value to database
            $query = $this->db->query("SELECT urn FROM records WHERE urn LIKE '%{$info}%'");
            $urnList=array();
            foreach($query->result_array() as $row){
                array_push($urnList,$row['urn']);
            }
           echo(json_encode($urnList));
    }




    public function getIsr($info){
        
            
            //Either you can print value or you can send value to database
            $query = $this->db->query("SELECT isr FROM records WHERE isr LIKE '{$info}%'");
            $isrList=array();
            foreach($query->result_array() as $row){
                array_push($isrList,$row['isr']);
            }
           echo(json_encode($isrList));
    }

    public function getSurname($info){
        
            
        //Either you can print value or you can send value to database
        $query = $this->db->query("SELECT surname FROM subjects WHERE surname LIKE '{$info}%'");
        $surnameList=array();
        foreach($query->result_array() as $row){
            array_push($surnameList,$row['surname']);
        }
       echo(json_encode($surnameList));
    }


    public function getFirstname($info){
        
            
        //Either you can print value or you can send value to database
        $query = $this->db->query("SELECT fname FROM subjects WHERE fname LIKE '{$info}%'");
        $fnameList=array();
        foreach($query->result_array() as $row){
            array_push($fnameList,$row['fname']);
        }
       echo(json_encode($fnameList));
    }


    public function getLocation($info){
        
            
        //Either you can print value or you can send value to database
        $query = $this->db->query("SELECT name FROM departments WHERE name LIKE '{$info}%'");
        $locationList=array();
        foreach($query->result_array() as $row){
            array_push($locationList,$row['name']);
        }
       echo(json_encode($locationList));
    }


    public function getSource($info){
        
            
        //Either you can print value or you can send value to database
        $query = $this->db->query("SELECT name FROM inf_sources WHERE name LIKE '{$info}%'");
        $sourceList=array();
        foreach($query->result_array() as $row){
            array_push($sourceList,$row['name']);
        }
       echo(json_encode($sourceList));
    }

    public function getOfficer($info){
        
            
        //Either you can print value or you can send value to database
        $query = $this->db->query("SELECT username FROM users WHERE username LIKE '{$info}%'");
        $officerList=array();
        foreach($query->result_array() as $row){
            array_push($officerList,$row['username']);
        }
       echo(json_encode($officerList));
    }



}
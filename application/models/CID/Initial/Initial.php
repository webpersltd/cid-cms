<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Initial extends CI_Model {

    public function __construct()
    {
            $this->load->database();
    }


    public function getRecordId($urn){
        $sql = "SELECT id FROM records WHERE urn = ?";
        return $this->db->query($sql, array($this->session->urn))->result();
    }


}
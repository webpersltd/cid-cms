<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_management
{

	public function __construct()
	{
		$this->load->model('Protective_Marking_Model');
	}

	public function check_final_review_exist($record_id){
	    $this->db->select('*');
	    $this->db->from('texts');
	    $this->db->join('final_review', 'final_review.text_id = texts.id');
	    $this->db->where('texts.record_id', $record_id);

	    $query = $this->db->get();
	    
	    if($query->num_rows() == 0){
	        return false;
	    }else{
	        return true;
	    }
	}

	public function record_on_hold($record_id){

	    $this->db->where('record_id',$record_id);
	    $query = $this->db->get('review_on_hold');

	    if($query->num_rows() != 0 && $this->time_of_record_hold_on($query->row()->created_at) <= 30){
	      	return true;
	    }
	}

	public function time_of_record_hold_on($created_at){
	  
	  	$start = date_create($created_at);
	  	$end   = date_create(date("Y-m-d H:i:s"));
	  	$diff  = date_diff($end,$start);
	  	return $diff->i;

	}

	public function has_review_permission($record_id = NULL, $check_continue = NULL){

		if(is_null($record_id)){
			$record_id = $_SESSION['record_id'];
		}

		$pro_mark = NULL;

		if($this->Protective_Marking_Model->get_protective_marking_for_the_record($record_id)){
			$pro_mark = $this->Protective_Marking_Model->get_protective_marking_for_the_record($record_id)->name;
		}

		if(!is_null($pro_mark)){
			if($pro_mark == "RESTRICTED" && $this->ion_auth->in_group( array("Level-2","Level-3","Level-4") ) ) {
				return true;
			}else if($pro_mark == "CONFIDENTIAL" && $this->ion_auth->in_group( array("Level-2","Level-3","Level-4") ) ){
				return true;
			}else if($pro_mark == "SECRET" && $this->ion_auth->in_group( array("Level-3","Level-4") ) ){
				return true;
			}else if($pro_mark == "TOP SECRET" && $this->ion_auth->in_group( array("Level-4") ) ){
				return true;
			}else if(is_null($pro_mark)){
				return true;
			}else{
				return false;
			}
		}else{
			if(!is_null($check_continue)){
				return "continue";
			}
			return false;
		}
	}

	public function this_record_is_already_started_reviewing_by_this_user($record_id){
	    
	    $this->db->select('*');
	    $this->db->from('texts');
	    $this->db->join('final_review', 'final_review.text_id = texts.id');
	    $this->db->where('texts.record_id', $record_id);
	    $this->db->limit(1);

	    $query = $this->db->get();

	    if($query->num_rows() == 0){
	      return NULL;
	    }else{
	      return $query->row()->review_started_by;
	    }
	}

	public function has_dissemination_permission(){

		$pro_mark = NULL;

		if($this->Protective_Marking_Model->get_protective_marking_for_the_record($_SESSION['record_id'])){
			$pro_mark = $this->Protective_Marking_Model->get_protective_marking_for_the_record($_SESSION['record_id'])->name;
		}
		
		if(!is_null($pro_mark)){
			if($pro_mark == "RESTRICTED" && $this->ion_auth->in_group( array("Level-2","Level-3","Level-4") ) ) {
				return true;
			}else if($pro_mark == "CONFIDENTIAL" && $this->ion_auth->in_group( array("Level-2","Level-3","Level-4") ) ){
				return true;
			}else if($pro_mark == "SECRET" && $this->ion_auth->in_group( array("Level-3","Level-4") ) ){
				return true;
			}else if($pro_mark == "TOP SECRET" && $this->ion_auth->in_group( array("Level-4") ) ){
				return true;
			}else if(is_null($pro_mark)){
				return true;
			}else{
				return false; //It will be false later
			}
		}else{
			return false;
		}
	}

	public function has_user_log_permission(){
		if($this->ion_auth->in_group( array("Level-3","Level-4") ) ){
			return true;
		}else{
			return false;
		}
	}

	public function __get($var)
	{
		return get_instance()->$var;
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_management
{

	public function __construct()
	{
		$this->load->model('Protective_Marking_Model');
	}

	public function has_review_permission(){
		$pro_mark = $this->Protective_Marking_Model->get_protective_marking_for_the_record($_SESSION['record_id']);
		
		if($pro_mark == "RESTRICTED" && $this->ion_auth->in_group( array("Level-2","Level-3","Level-4") ) ) {
			return true;
		}else if($pro_mark == "CONFIDENTIAL" && $this->ion_auth->in_group( array("Level-2","Level-3","Level-4") ) ){
			return true;
		}else if($pro_mark == "SECRET" && $this->ion_auth->in_group( array("Level-3","Level-4") ) ){
			return true;
		}else if($pro_mark == "TOP SECRET" && $this->ion_auth->in_group( array("Level-4") ) ){
			return true;
		}else{
			return true; //It will be false later
		}
	}

	public function has_dissemination_permission(){
		$pro_mark = $this->Protective_Marking_Model->get_protective_marking_for_the_record($_SESSION['record_id']);
		
		if($pro_mark == "RESTRICTED" && $this->ion_auth->in_group( array("Level-2","Level-3","Level-4") ) ) {
			return true;
		}else if($pro_mark == "CONFIDENTIAL" && $this->ion_auth->in_group( array("Level-2","Level-3","Level-4") ) ){
			return true;
		}else if($pro_mark == "SECRET" && $this->ion_auth->in_group( array("Level-3","Level-4") ) ){
			return true;
		}else if($pro_mark == "TOP SECRET" && $this->ion_auth->in_group( array("Level-4") ) ){
			return true;
		}else{
			return true; //It will be false later
		}
	}

	public function __get($var)
	{
		return get_instance()->$var;
	}
}
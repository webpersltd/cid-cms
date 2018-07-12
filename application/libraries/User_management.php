<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_management
{

	public function __construct()
	{
		$this->load->model('Protective_Marking_Model');
	}

	/*public function check_protective_marking_exist($record_id){
		$pro_mark = NULL;

		if($this->Protective_Marking_Model->get_protective_marking_for_the_record($record_id)){
			$pro_mark = $this->Protective_Marking_Model->get_protective_marking_for_the_record($record_id)->name;
		}

		if(!is_null($pro_mark)){
			return true;
		}else{
			return false;
		}
	}*/

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
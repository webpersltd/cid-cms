<?php
class Protective_Marking_Model extends CI_Model {

    public function get_info($record_id = NULL)
    {
  		if(!is_null($record_id)){
  			$this->db->select('*');
  			$this->db->from('texts');
   			$this->db->where('texts.record_id',$record_id);
   			$this->db->join('handling_codes', 'handling_codes.text_id = texts.id');
   		}
        $query = $this->db->get();
        return $query->result();
    }

    public function get_protective_mark(){
    	$query = $this->db->get('protective_marking_lists');
    	return $query->result();
    }

    public function record_protective_marking($data){
        $this->db->insert('protective_markings', $data);
    }    
}
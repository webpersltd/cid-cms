<?php
class Protective_Marking_Model extends CI_Model {

	public function get_text_info($record_id = NULL, $handling_id = NULL)
    {
  		if(!is_null($record_id)){
  			$this->db->select('*, handling_codes.id as hid');
  			$this->db->from('texts');
   			$this->db->where('texts.record_id',$record_id);
   			$this->db->join('handling_codes', 'handling_codes.text_id = texts.id');
   		}
   		if(!is_null($handling_id)){
   			$this->db->where('handling_codes.id >',$handling_id);
   		}
   		$this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_protective_mark(){
    	$query = $this->db->get('protective_marking_lists');
    	return $query->result();
    }

    public function next($record_id){
        $this->db->select_max('handling_id');
        $this->db->from('protective_markings');
        $this->db->where('record_id',$record_id);
        $query = $this->db->get();
        return $query->row()->handling_id;
    }

    public function remaining($record_id = NULL, $handling_id = NULL){
        if(!is_null($record_id)){
            $this->db->where('record_id',$record_id);
        }
        if(!is_null($handling_id)){
            $this->db->where('id >',$handling_id);
        }
        $query = $this->db->get('handling_codes');
        return $query->num_rows();
    }

    public function record_protective_marking($data){
        $this->db->insert('protective_markings', $data);
    }    
}
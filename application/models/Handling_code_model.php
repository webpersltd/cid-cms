<?php
class Handling_code_model extends CI_Model {

    public function get_text_info($record_id = NULL, $txt_id = NULL)
    {
  		if(!is_null($record_id)){
   			$this->db->where('record_id',$record_id);
   		}
   		if(!is_null($txt_id)){
   			$this->db->where('id >',$txt_id);
   		}
   		$this->db->limit(1);
        $query = $this->db->get('texts');
        return $query->row();
    }

    public function remaining_text($record_id = NULL, $txt_id = NULL){
        if(!is_null($record_id)){
            $this->db->where('record_id',$record_id);
        }
        if(!is_null($txt_id)){
            $this->db->where('id >',$txt_id);
        }
        $query = $this->db->get('texts');
        return $query->num_rows();
    }

    public function record_handling_code($data){
        $this->db->insert('handling_codes', $data);
    }

    public function next($record_id){
        $this->db->select_max('text_id');
        $this->db->from('handling_codes');
        $this->db->where('record_id',$record_id);
        $query = $this->db->get();
        return $query->row()->text_id;
    }
}
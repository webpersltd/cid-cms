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
}
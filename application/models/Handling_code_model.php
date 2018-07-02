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

    public function handling_code_review($record_id, $handling_code_id = NULL){
        $this->db->select('handling_codes.id as id, code, instruction, summary, src_eval, inf_int_eval');
        $this->db->from('handling_codes');
        $this->db->join('texts', 'handling_codes.text_id = texts.id');
        $this->db->where('handling_codes.record_id', $record_id);
        $this->db->where('handling_codes.reviewed', 0);
        if(!is_null($handling_code_id)){
            $this->db->where('handling_codes.id >', $handling_code_id);
        }
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
    }

    public function update_review_flag($id){
        $this->db->set('reviewed', 1);
        $this->db->where('id', $id);
        $this->db->update('handling_codes');
        return;
    }

    public function total_unreviewed_handling_code($record_id){
        $this->db->where('record_id', $record_id);
        $this->db->where('reviewed', 0);
        return $this->db->count_all_results('handling_codes');
    }

    public function get_handling_code($id){
        $this->db->where('id',$id);
        $query = $this->db->get('handling_codes');
        return $query->row();
    }

    public function update_handling_code($code, $instruction, $id){
        $this->db->set('code', $code);
        $this->db->set('instruction', $instruction);
        $this->db->where('id', $id);
        $this->db->update('handling_codes');
        return;
    }
}
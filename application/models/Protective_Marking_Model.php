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

    public function get_all_protective_marks(){
    	$query = $this->db->get('protective_marking_lists');
    	return $query->result();
    }

    public function record_protective_marking($data){
        $this->db->insert('protective_markings', $data);
    }

    public function get_protective_marking_for_the_record($record_id){
        $this->db->select('*, protective_marking_lists.id as pid');
        $this->db->from('protective_markings');
        $this->db->join('protective_marking_lists', 'protective_markings.protective_id = protective_marking_lists.id');
        $this->db->where('record_id', $record_id);
        $query = $this->db->get();
        return $query->row();
    }

    public function update_pro_mark($pro_mark, $confirm = NULL){
        if(is_null($confirm)){
            $this->db->set('protective_id', $pro_mark);
        }else{
            $this->db->set('reviewed', 1);
        }
        $this->db->where('record_id', $_SESSION['record_id']);
        $this->db->update('protective_markings');
        return;
    }

    public function check_handling_code_review_done($record_id){
        $this->db->where('reviewed', 0);
        $this->db->where('record_id', $record_id);
        $num_rows = $this->db->count_all_results('handling_codes');
        
        if($num_rows == 0){
            return true;
        }else{
            return false;
        }
    }    
}
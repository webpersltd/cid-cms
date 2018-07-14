<?php
class Review_model extends CI_Model {

    public function get_details($record_id)
    {
        $text_id  = $this->check_existing_data($record_id);
        
  		$this->db->select('*, texts.id as txtID');
        $this->db->from('texts');
        $this->db->join('handling_codes', 'handling_codes.text_id = texts.id');
        $this->db->where('texts.record_id', $record_id);
        
        if(!is_null($text_id)){
            $this->db->where('texts.id >', $text_id);
        }

        $this->db->limit(1);
        $query = $this->db->get();
        return $query->row();
    }

    public function finalReview($data){        
        $data['details_reviewed'] = 1;
        $this->db->insert('final_review', $data);
        return;
    }

    public function check_existing_data($record_id){
        $this->db->select_max('text_id');
        $this->db->join('texts', 'texts.id = final_review.text_id');
        $this->db->where('texts.record_id', $record_id);
        $this->db->where('details_reviewed', 1);

        $query = $this->db->get('final_review');
        return $query->row()->text_id;
    }

    public function count_final_review_data($record_id){
        $this->db->select('text_id');
        $this->db->join('texts', 'texts.id = final_review.text_id');
        $this->db->where('texts.record_id', $record_id);
        $this->db->where('details_reviewed', 1);

        $query = $this->db->get('final_review');
        return $query->num_rows();
    }

    public function total_text($record_id){
        $this->db->where('record_id', $record_id);
        $query = $this->db->get('texts');

        return $query->num_rows();
    }

    public function get_txt_eval($id){
        $this->db->select('src_eval, inf_int_eval');
        $this->db->from('texts');
        $this->db->where('id', $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function update_txt_eval($id, $src, $inf){
        $this->db->set('src_eval', $src);
        $this->db->set('inf_int_eval', $inf);
        $this->db->where('id', $id);
        $this->db->update('texts');
        return;
    }

    public function getReviewText(){
        $sql = "SELECT * FROM texts WHERE record_id = ?";
        $result=$this->db->query($sql, array($_SESSION['record_id']));

        return $result->result();
    }
}
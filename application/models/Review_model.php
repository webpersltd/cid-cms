<?php
class Review_model extends CI_Model {

    public function get_details($record_id)
    {
        $text_id  = $this->check_existing_data($record_id);
        $has_data = $this->has_data($record_id);
        
  		$this->db->select('*, texts.id as txtID');
        $this->db->from('texts');
        $this->db->join('handling_codes', 'handling_codes.text_id = texts.id');
        $this->db->join('protective_markings', 'protective_markings.handling_id = handling_codes.id');
        $this->db->join('protective_marking_lists', 'protective_marking_lists.id = protective_markings.protective_id');
        $this->db->where('texts.record_id', $record_id);
        
        if(!is_null($text_id)){
            $this->db->where('texts.id >', $text_id);
        }

        $this->db->limit(1);

        $query = $this->db->get();

        if(!is_null($has_data)){
            $query->row()->details_reviewed = $has_data->details_reviewed;
            $query->row()->pm_reviewed      = $has_data->pm_reviewed;
        }

        return $query->row();
    }

    public function finalReview($data, $infoFor){
        $this->db->where('text_id', $data['text_id']);
        $query = $this->db->get('final_review');

        if($query->num_rows() == 0){
            if($infoFor == "pm_confirm_ok"){
                $data['pm_reviewed'] = 1;
            }else{
                $data['details_reviewed'] = 1;
            }
            $this->db->insert('final_review', $data);
            return;
        }else{
            if($infoFor == "pm_confirm_ok"){
                $this->db->set('pm_reviewed', 1);
                $this->db->where('text_id', $data['text_id']);
                $this->db->update('final_review');
                return;
            }else{
                $this->db->set('details_reviewed', 1);
                $this->db->where('text_id', $data['text_id']);
                $this->db->update('final_review');
                return;
            }
        }
    }

    public function check_finish($text_id){
        
        $this->db->where('pm_reviewed', 1);
        $this->db->where('details_reviewed', 1);
        $this->db->where('text_id', $text_id);

        $query = $this->db->get('final_review');

        return $query->num_rows();
    }

    public function check_existing_data($record_id){
        $this->db->select_max('text_id');
        $this->db->join('texts', 'texts.id = final_review.text_id');
        $this->db->where('texts.record_id', $record_id);
        $this->db->where('details_reviewed', 1);
        $this->db->where('pm_reviewed', 1);

        $query = $this->db->get('final_review');
        return $query->row()->text_id;
    }

    public function count_final_review_data($record_id){
        $this->db->select('text_id');
        $this->db->join('texts', 'texts.id = final_review.text_id');
        $this->db->where('texts.record_id', $record_id);
        $this->db->where('details_reviewed', 1);
        $this->db->where('pm_reviewed', 1);

        $query = $this->db->get('final_review');
        return $query->num_rows();
    }

    public function has_data($record_id){
        $where = "details_reviewed!='1' OR pm_reviewed!='1'";

        $this->db->select('*');
        $this->db->join('texts', 'texts.id = final_review.text_id');
        $this->db->where('texts.record_id', $record_id);
        $this->db->where($where);

        $query = $this->db->get('final_review');
        return $query->row();
    }

    public function total_text($record_id){
        $this->db->where('record_id', $record_id);
        $query = $this->db->get('texts');

        return $query->num_rows();
    }

    public function get_pro_mark($id){
        $this->db->select('protective_id', 'name');
        $this->db->from('protective_markings');
        $this->db->where('text_id',$id);
        $this->db->join('protective_marking_lists', 'protective_marking_lists.id = protective_markings.protective_id');
        $query = $this->db->get();
        return $query->row();
    }

    public function update_pro_mark($protective_mark, $id){
        $this->db->set('protective_id', $protective_mark);
        $this->db->where('text_id', $id);
        $this->db->update('protective_markings');
        return;
    }
}
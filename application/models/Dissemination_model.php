<?php
class Dissemination_model extends CI_Model {

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
            $query->row()->check1 = $has_data->check1;
            $query->row()->check2 = $has_data->check2;
            $query->row()->check3 = $has_data->check3;
        }

        return $query->row();
    }

    public function disseminationReview($data, $infoFor){
        $this->db->where('text_id', $data['text_id']);
        $query = $this->db->get('disseminations');

        if($query->num_rows() == 0){
            if($infoFor == "handling_code_ok"){
                $data['check1'] = 1;
            }else if($infoFor == "handling_instruction_ok"){
                $data['check2'] = 1;
            }else{
                $data['check3'] = 1;
            }
            $this->db->insert('disseminations', $data);
            return;
        }else{
            if($infoFor == "handling_code_ok"){
                $this->db->set('check1', 1);
                $this->db->where('text_id', $data['text_id']);
                $this->db->update('disseminations');
                return;
            }else if($infoFor == "handling_instruction_ok"){
                $this->db->set('check2', 1);
                $this->db->where('text_id', $data['text_id']);
                $this->db->update('disseminations');
                return;
            }else{
                $this->db->set('check3', 1);
                $this->db->where('text_id', $data['text_id']);
                $this->db->update('disseminations');
                return;
            }
        }
    }

    public function check_finish($text_id){
        
        $this->db->where('check1', 1);
        $this->db->where('check2', 1);
        $this->db->where('check3', 1);
        $this->db->where('text_id', $text_id);

        $query = $this->db->get('disseminations');

        return $query->num_rows();
    }

    public function check_existing_data($record_id){
        $this->db->select_max('text_id');
        $this->db->join('texts', 'texts.id = disseminations.text_id');
        $this->db->where('texts.record_id', $record_id);
        $this->db->where('check1', 1);
        $this->db->where('check2', 1);
        $this->db->where('check3', 1);

        $query = $this->db->get('disseminations');
        return $query->row()->text_id;
    }

    public function count_dissemination_data($record_id){
        $this->db->select('text_id');
        $this->db->join('texts', 'texts.id = disseminations.text_id');
        $this->db->where('texts.record_id', $record_id);
        $this->db->where('check1', 1);
        $this->db->where('check2', 1);
        $this->db->where('check3', 1);

        $query = $this->db->get('disseminations');
        return $query->num_rows();
    }

    public function has_data($record_id){
        $where = "check1!='1' OR check2!='1' OR check3!='1'";

        $this->db->select('*');
        $this->db->join('texts', 'texts.id = disseminations.text_id');
        $this->db->where('texts.record_id', $record_id);
        $this->db->where($where);

        $query = $this->db->get('disseminations');
        return $query->row();
    }

    public function total_text($record_id){
        $this->db->where('record_id', $record_id);
        $query = $this->db->get('texts');
        return $query->num_rows();
    }

    public function get_user_name($term){
        $this->db->like('first_name', $term);
        $query = $this->db->get('users');
        return $query->result();
    }

    public function final_submission($data){
        $this->db->insert('dissemination_reviews', $data);

        $this->db->reset_query();

        $this->db->set('fully_submitted', 1);
        $this->db->where('id', $data['record_id']);
        $this->db->update('records');
        return;
    }
}
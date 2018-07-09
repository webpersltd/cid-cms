<?php
class Home_model extends CI_Model {

    public function get_all_records()
    {
        $this->db->select('*, records.id as rid');
        $this->db->from('records');
        $this->db->join('departments', 'departments.id = records.department');
        $this->db->join('users', 'users.id = records.user_id');
        $this->db->order_by('records.created_at', 'desc');
        $this->db->limit(5);

        $query = $this->db->get();

        return $query->result();
    }

    public function get_my_records()
    {
        $this->db->select('*, records.id as rid');
        $this->db->from('records');
        $this->db->join('departments', 'departments.id = records.department');
        $this->db->join('users', 'users.id = records.user_id');
        $this->db->where('user_id', $this->ion_auth->user()->row()->id);
        $this->db->order_by('records.created_at', 'desc');
        $this->db->limit(5);

        $query = $this->db->get();

        return $query->result();
    }

    public function get_records_for_approval(){
        
        $collect_records = $this->get_all_records();
        $result          = array();

        foreach ($collect_records as $value) {
            $data      = array();
            $record_id = $value->rid;

            if($this->user_management->has_review_permission($record_id) && $value->fully_submitted==0){
                $data['urn']             = $value->urn;
                $data['department']      = $value->name;
                $data['officer']         = $value->first_name." ".$value->last_name;
                $data['fully_submitted'] = $value->fully_submitted;
            }

            if(count($data) != 0){
                array_push($result, $data);
            }
        }
        return $result;
    }

    public function get_approved_records(){
        
        $collect_records = $this->get_all_records();
        $result          = array();

        foreach ($collect_records as $value) {
            $data      = array();
            $record_id = $value->rid;            
            if($this->user_management->has_review_permission($record_id) && $value->fully_submitted==1){
                $data['urn']             = $value->urn;
                $data['department']      = $value->name;
                $data['officer']         = $value->first_name." ".$value->last_name;
                $data['fully_submitted'] = $value->fully_submitted;
            }

            if(count($data) != 0){
                array_push($result, $data);
            }
        }
        return $result;
    }
}
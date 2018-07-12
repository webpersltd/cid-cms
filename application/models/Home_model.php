<?php
class Home_model extends CI_Model {

    public function get_all_records($collect_data = NULL)
    {
        $this->db->select('*, records.id as rid');
        $this->db->from('records');
        $this->db->join('departments', 'departments.id = records.department');
        $this->db->join('users', 'users.id = records.user_id');

        if($collect_data == "for_approval"){
            $this->db->where('fully_submitted',0);
        }else{
            $this->db->where('fully_submitted',1);
        }

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
        $this->db->join('protective_markings', 'protective_markings.record_id = records.id', 'left');
        $this->db->where('user_id', $this->ion_auth->user()->row()->id);
        $this->db->order_by('records.created_at', 'desc');
        $this->db->limit(5);

        $query = $this->db->get();
        return $query->result();
    }

    public function get_records_for_approval(){
        
        $collect_records = $this->get_all_records("for_approval");
        $result          = array();

        foreach ($collect_records as $value) {
            $data      = array();
            $record_id = $value->rid;

            if($this->user_management->has_review_permission($record_id)){
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
        
        $collect_records = $this->get_all_records("approved_record");
        $result          = array();

        foreach ($collect_records as $value) {
            $data      = array();
            $record_id = $value->rid;            
            if($this->user_management->has_review_permission($record_id)){
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

    public function get_current_view_for_the_record($urn){
        $this->db->where('urn',$urn);
        $query = $this->db->get('records');

        if($query->num_rows() != 0){
            return $query->row()->view;
        }else{
            return NULL;
        }
    }

    public function get_record_id($urn){
        $this->db->where('urn', $urn);
        $query = $this->db->get('records');
        
        if($query->num_rows() != 0){
          return $query->row()->id;
        }else{
          return NULL;
        }
    }

    public function view_the_record($urn){

        $current_view = $this->get_current_view_for_the_record($urn);

        if(!is_null($current_view)){
            $this->db->set('view', $current_view+1);
            $this->db->where('urn', $urn);
            $this->db->update('records');

            $this->db->reset_query();
        }

        $sql = "SELECT urn, summary, src_eval, inf_int_eval, z.t_file as t_file, code, instruction,
                    user_id, `z`.`department_name` as department_name, report_submitted_by, 
                   date_of_report, time_of_report, `z`.`inf_src_name` as inf_src_name, other_source, isr, 
                   status, view, fully_submitted, `z`.`r_ca` as r_ca, `z`.`rid` as `rid`,
                   fname, surname, father_name, gender, dob, pob, approx_age, `z`.`natlty` as natlty, id_type,
                   id_number, home_address, business_name, business_address, bin_tin, telephone,
                   description, z.subjects_file as subjects_file, `z`.`p_name` as p_name, z.officer_first_name as officer_first_name, z.officer_last_name as officer_last_name, 
                   `z`.`dis_ca` as dis_ca, z.diss_to_first_name as diss_to_first_name, z.diss_to_last_name as diss_to_last_name, 
                   u3.first_name as diss_by_first_name, u3.last_name as diss_by_last_name FROM users u3
                   
                   RIGHT JOIN

                    (SELECT urn, summary, src_eval, inf_int_eval, q.t_file as t_file, code, instruction,
                            user_id, `q`.`department_name` as department_name, report_submitted_by, 
                           date_of_report, time_of_report, `q`.`inf_src_name` as inf_src_name, other_source, isr, 
                           status, view, fully_submitted, `q`.`r_ca` as r_ca, `q`.`rid` as `rid`,
                           fname, surname, father_name, gender, dob, pob, approx_age, `q`.`natlty` as natlty, id_type,
                           id_number, home_address, business_name, business_address, bin_tin, telephone,
                           description, q.subjects_file as subjects_file, `q`.`p_name` as p_name, q.first_name as officer_first_name, q.last_name as officer_last_name, 
                           `q`.`dis_ca` as dis_ca, u2.first_name as diss_to_first_name, u2.last_name as diss_to_last_name, disseminated_by FROM users u2

                           RIGHT JOIN

                           (SELECT urn, summary, src_eval, inf_int_eval, texts.file as t_file, 
                           code, instruction, user_id, `a`.`department_name` as department_name, report_submitted_by, 
                           date_of_report, time_of_report, `a`.`inf_src_name` as inf_src_name, other_source, isr, 
                           status, view, fully_submitted, `a`.`r_ca` as r_ca, `a`.`rid` as `rid`,
                           fname, surname, father_name, gender, dob, pob, approx_age, `a`.`natlty` as natlty, id_type,
                           id_number, home_address, business_name, business_address, bin_tin, telephone,
                           description, a.file as subjects_file, `a`.`p_name` as p_name, first_name, last_name, 
                           `a`.`dis_ca` as dis_ca, disseminated_to, disseminated_by FROM texts 
                            LEFT JOIN handling_codes 
                                 ON `handling_codes`.`text_id` = `texts`.`id` 
                                     RIGHT JOIN
                                     (SELECT urn, user_id, `departments`.`name` as department_name, report_submitted_by, 
                                             date_of_report, time_of_report, `inf_sources`.`name` as inf_src_name, other_source, isr, 
                                             status, view, fully_submitted, `records`.`created_at` as r_ca, `records`.`id` as `rid`,
                                             fname, surname, father_name, gender, dob, pob, approx_age, `nationalities`.`nationality` as natlty, id_type,
                                             id_number, home_address, business_name, business_address, bin_tin, telephone,
                                             description, file, `protective_marking_lists`.`name` as p_name, first_name, last_name, 
                                             `dissemination_reviews`.`created_at` as dis_ca, disseminated_to, disseminated_by
                                              FROM `records` 
                                                   JOIN `subjects` ON `records`.`id` = `subjects`.`record_id` 
                                                   LEFT JOIN `protective_markings` ON `records`.`id` = `protective_markings`.`record_id` 
                                                   LEFT JOIN `protective_marking_lists` ON `protective_markings`.`protective_id` = `protective_marking_lists`.`id` 
                                                   JOIN users ON `records`.`user_id` = `users`.`id`
                                                   JOIN departments ON `records`.`department` = `departments`.`id`
                                                   JOIN inf_sources ON `records`.`inf_source` = `inf_sources`.`id`
                                                   JOIN nationalities ON `subjects`.`nationality` = `nationalities`.`id`
                                                   LEFT JOIN dissemination_reviews ON `dissemination_reviews`.`record_id`=`records`.`id` 
                                                   WHERE urn = $urn) 
                                                        a ON `texts`.`record_id` = `a`.`rid`) q ON u2.id = q.disseminated_to) z ON u3.id = z.disseminated_by";

        $query = $this->db->query($sql);
        return $query->result();
    }
}

/*SELECT urn, summary, src_eval, inf_int_eval, z.t_file as t_file, code, instruction,
                    user_id, `z`.`department_name` as department_name, report_submitted_by, 
                   date_of_report, time_of_report, `z`.`inf_src_name` as inf_src_name, other_source, isr, 
                   status, view, fully_submitted, `z`.`r_ca` as r_ca, `z`.`rid` as `rid`,
                   fname, surname, father_name, gender, dob, pob, approx_age, `z`.`natlty` as natlty, id_type,
                   id_number, home_address, business_name, business_address, bin_tin, telephone,
                   description, z.subjects_file as subjects_file, `z`.`p_name` as p_name, z.officer_first_name as officer_first_name, z.officer_last_name as officer_last_name, 
                   `z`.`dis_ca` as dis_ca, z.diss_to_first_name as diss_to_first_name, z.diss_to_last_name as diss_to_last_name, 
                   u3.first_name as diss_by_first_name, u3.last_name as diss_by_last_name FROM users u3
                   
                   RIGHT JOIN

                    (SELECT urn, summary, src_eval, inf_int_eval, q.t_file as t_file, code, instruction,
                            user_id, `q`.`department_name` as department_name, report_submitted_by, 
                           date_of_report, time_of_report, `q`.`inf_src_name` as inf_src_name, other_source, isr, 
                           status, view, fully_submitted, `q`.`r_ca` as r_ca, `q`.`rid` as `rid`,
                           fname, surname, father_name, gender, dob, pob, approx_age, `q`.`natlty` as natlty, id_type,
                           id_number, home_address, business_name, business_address, bin_tin, telephone,
                           description, q.subjects_file as subjects_file, `q`.`p_name` as p_name, q.first_name as officer_first_name, q.last_name as officer_last_name, 
                           `q`.`dis_ca` as dis_ca, u2.first_name as diss_to_first_name, u2.last_name as diss_to_last_name, disseminated_by FROM users u2

                           RIGHT JOIN

                           (SELECT urn, summary, src_eval, inf_int_eval, texts.file as t_file, 
                           code, instruction, user_id, `a`.`department_name` as department_name, report_submitted_by, 
                           date_of_report, time_of_report, `a`.`inf_src_name` as inf_src_name, other_source, isr, 
                           status, view, fully_submitted, `a`.`r_ca` as r_ca, `a`.`rid` as `rid`,
                           fname, surname, father_name, gender, dob, pob, approx_age, `a`.`natlty` as natlty, id_type,
                           id_number, home_address, business_name, business_address, bin_tin, telephone,
                           description, a.file as subjects_file, `a`.`p_name` as p_name, first_name, last_name, 
                           `a`.`dis_ca` as dis_ca, disseminated_to, disseminated_by FROM texts 
                            INNER JOIN handling_codes 
                                 ON `handling_codes`.`text_id` = `texts`.`id` 
                                     INNER JOIN
                                     (SELECT urn, user_id, `departments`.`name` as department_name, report_submitted_by, 
                                             date_of_report, time_of_report, `inf_sources`.`name` as inf_src_name, other_source, isr, 
                                             status, view, fully_submitted, `records`.`created_at` as r_ca, `records`.`id` as `rid`,
                                             fname, surname, father_name, gender, dob, pob, approx_age, `nationalities`.`nationality` as natlty, id_type,
                                             id_number, home_address, business_name, business_address, bin_tin, telephone,
                                             description, file, `protective_marking_lists`.`name` as p_name, first_name, last_name, 
                                             `dissemination_reviews`.`created_at` as dis_ca, disseminated_to, disseminated_by
                                              FROM `records` 
                                                   JOIN `subjects` ON `records`.`id` = `subjects`.`record_id` 
                                                   JOIN `protective_markings` ON `records`.`id` = `protective_markings`.`record_id` 
                                                   JOIN `protective_marking_lists` ON `protective_markings`.`protective_id` = `protective_marking_lists`.`id` 
                                                   JOIN users ON `records`.`user_id` = `users`.`id`
                                                   JOIN departments ON `records`.`department` = `departments`.`id`
                                                   JOIN inf_sources ON `records`.`inf_source` = `inf_sources`.`id`
                                                   JOIN nationalities ON `subjects`.`nationality` = `nationalities`.`id`
                                                   LEFT JOIN dissemination_reviews ON `dissemination_reviews`.`record_id`=`records`.`id` 
                                                   WHERE urn = $urn) 
                                                        a ON `texts`.`record_id` = `a`.`rid`) q ON u2.id = q.disseminated_to) z ON u3.id = z.disseminated_by"*/
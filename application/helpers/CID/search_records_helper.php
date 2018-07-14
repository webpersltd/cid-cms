<?php 


    
        
    $default_data=array(
        'urn'=>'',
        'isr'=>'',
        'subject_surname'=>'',
        'subject_first_name'=>'',
        'dob'=>'',
        'nationality'=>'',
        'free_text'=>'',
        'start_date'=>'',
        'end_date'=>'',
        'departments'=>'',
        'src'=>'',
        'officerName'=>''
    );

    function getRecordid($default_data){
        $ci=& get_instance();
        $ci->load->database(); 
        $sql = "SELECT records.id , records.urn,records.department,records.user_id,subjects.fname FROM records INNER JOIN subjects ON records.id=subjects.record_id 
                WHERE records.urn LIKE '%{$default_data['urn']}%'
                AND subjects.nationality={$default_data['nationality']}
                ";

        if($default_data['dob']!=""){
            $sql.="AND subjects.dob LIKE '%{$default_data['dob']}%'";
        }

        if($default_data['subject_surname']!=""){
            $sql.="AND subjects.surname LIKE '%{$default_data['subject_surname']}%'";
        }

        if($default_data['subject_first_name']!=""){
            $sql.="AND subjects.fname LIKE '%{$default_data['subject_first_name']}%'";
        }

        if($default_data['isr']!=""){
            $sql.="AND records.isr LIKE '%{$default_data['isr']}%'";
        }

        if($default_data['start_date']!="" and $default_data['end_date']!=""){
            $sql.="AND (records.created_at >= '{$default_data['start_date']}' AND records.created_at <='{$default_data['end_date']}')";
        }


        if($default_data['departments']!=""){
            $sql.="AND records.department=(SELECT id FROM departments WHERE name ='{$default_data['departments']}')";
        }


        if($default_data['src']!=""){
            $sql.="AND records.inf_source=(SELECT id FROM inf_sources WHERE name ='{$default_data['src']}')";
        }

        if($default_data['officerName']!=""){
            $sql.="AND records.user_id=(SELECT id FROM users WHERE username ='{$default_data['officerName']}')";
        }

        $query = $ci->db->query($sql);
        return $query->result();
    }


    function getOfficerName($id){
        $ci=& get_instance();
        $ci->load->database(); 
        $sql = "SELECT first_name FROM users WHERE id={$id}";
        $query = $ci->db->query($sql);
        return $query->result()[0]->first_name;        
    }

    function getDepartmentname($id){
        $ci=& get_instance();
        $ci->load->database(); 
        $sql = "SELECT name FROM departments WHERE id={$id}";
        $query = $ci->db->query($sql);
        return $query->result()[0]->name; 
    }

?>
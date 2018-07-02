<?php 



        
    $default_data=array(
        'urn'=>'',
        'isr'=>'',
        'subject_surname'=>'',
        'subject_first_name'=>'',
        'dob'=>'',
        'nationality'=>'',
        'free_text'=>''
    );

    function getRecordid($default_data){
        $ci=& get_instance();
        $ci->load->database(); 
            $sql = "SELECT records.id , subjects.fname 
                        FROM records INNER JOIN subjects ON records.id=subjects.record_id 
                        WHERE records.urn LIKE '%{$default_data['urn']}%' 
                        AND subjects.dob LIKE '%{$default_data['dob']}%'
                        AND subjects.nationality={$default_data['nationality']}
                        AND subjects.surname LIKE '%{$default_data['subject_surname']}%'
                        AND subjects.fname LIKE '%{$default_data['subject_first_name']}%'
                        AND records.isr LIKE '%{$default_data['isr']}%'
                    "; 
        $query = $ci->db->query($sql);
        return $query->result();
    }





?>
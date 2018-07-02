<?php 

    function isrList(){
        $query = $this->db->query('SELECT * FROM inf_sources');
        foreach ($query->result() as $row)
        {
                echo $row->name;
        }

    }



?>
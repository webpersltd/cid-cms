<?php 
  function getNationality(){
    //$query = $this->db->get('nationalities');
    $ci=& get_instance();
    $ci->load->database(); 

    $sql = "SELECT * 
    FROM nationalities"; 
    $query = $ci->db->query($sql);
    foreach ($query->result() as $row)
    {     if($row->id==15){
              echo "<option selected value='".$row->id."'>".$row->nationality."</option>";
          }else{
            echo "<option value='".$row->id."'>".$row->nationality."</option>";
          }
           
    }
  }

?>
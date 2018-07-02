<?php 

function cid_cms_tab(){
    $cms_url=base_url().'CMS/';
    $cid_url=base_url();
    echo '<li style="padding:0px;background-color:#51519a;margin-top:10px" ><a style="color: white;padding: 6px;" href="'.$cid_url.'">CID</a></li>
    <li style="padding:0px;background-color:#51519a;margin-top:10px" ><a style="color: white;padding: 6px;" href="'.$cms_url.'">CMS</a></li>';
}


?>
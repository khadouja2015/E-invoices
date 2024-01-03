<?php
class meriem extends CI_model{
function insertqrcode($data){
    $r=array(
'title'=>$data

    );
   $this->db->insert('items',$r); 
}

}
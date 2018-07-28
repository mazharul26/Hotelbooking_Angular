<?php

require 'database.php';
header('Content-Type:application/json');

     $sql=$db->query("select * from room order by id ");
     $arr = array();
      while($d=$sql->fetch_object()){
          
         $arr[]=$d;
      }   
    
      echo json_encode($arr);
    
?>

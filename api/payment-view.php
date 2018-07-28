<?php


require 'database.php';
header('Content-Type:application/json');


 
     $sql=$db->query("select * from payment order by id asc");
     $arr=array();
      while($d=$sql->fetch_object()){
         $arr[]=$d;
      }   
    
      echo json_encode($arr);






//$data = json_decode(file_get_contents("php://input"));
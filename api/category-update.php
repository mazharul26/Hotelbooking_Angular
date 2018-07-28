<?php

require 'database.php';

$data = json_decode(file_get_contents("php://input"));

foreach ($data as $value){
    $db->query("update category set name ='".$value->nm."' where id='".$value->id."'");
    
    if($db->affected_rows > 0){
        echo 1;
    }
    else{
        echo 0;
    }

}
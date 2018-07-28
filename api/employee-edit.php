<?php

require 'database.php';
$data = json_decode(file_get_contents("php://input"));


foreach ($data as $value){
    
    $sqli=$db->query("select * from employee where id ='".$value->id."'");
    
    while($d=$sqli->fetch_object()){
        
        header('Content-Type: application/json');
        echo json_encode($d);
    }
}

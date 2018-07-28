<?php

require 'database.php';

$data = json_decode(file_get_contents("php://input"));

foreach ($data as $value){
    $sql =$db->query("select * from category where id='".$value->id."'");
    
    while ($d=$sql->fetch_object()){
        header('Content-Tipe:application/json');
        echo json_encode($d);
    }
}

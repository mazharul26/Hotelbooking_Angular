<?php

session_start();
$data = json_decode(file_get_contents("php://input"));

foreach ($data as $value) {
    $id = $value->id;

 
}
if (isset($_SESSION['pdtid'])) {
    $index = array_search($id, $_SESSION['pdtid']);

    if ($index !== FALSE) {
        
       echo  $_SESSION['qtyid'][$index];
        
    } else {
        
        echo 1;
    }
} else {
    echo 1;
}


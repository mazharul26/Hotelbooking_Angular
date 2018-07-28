<?php

require './database.php';
$data = json_decode(file_get_contents("php://input"));

//echo 1;
//die();
foreach ($data as $value) {

    $db->query("insert into booking
            set
            name = '" . $value->name . "',
            contact = '" . $value->contact . "',
            payment = '" . $value->payment . "',
            total = '" . $value->total . "',
            start = '" . date("Y-m-d") . "',
            end = '" . date("Y-m-d") . "'

            ");
    $id = $db->insert_id;

    foreach ($_SESSION['pdtid'] as $key => $pdt) {
        $db->query("insert into booking_details
            set
            booking_id = '" . $id . "',
            quantity = '" . $_SESSION['qtyid'][$key] . "'
           
            ");
    }
    unset($_SESSION['pdtid']);
    //unset($_SESSION['qtyid']);
    echo 'order placed successful';
}


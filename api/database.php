<?php
session_start();

$db = new mysqli("localhost", "root", "", "myhotel");

function VD($db,$data){
    $txt = htmlentities(strip_tags(trim( mysqli_real_escape_string($db, $data))));
    
    return "'" .$txt."'";
};
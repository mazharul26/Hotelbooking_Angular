<?php


session_start();

if(isset($_SESSION['id'])){
    $arr['id'] = $_SESSION['id'];
     $arr['type'] = $_SESSION['type'];
}else{
     $arr['id'] =0;
    $arr['type'] =0;
}
echo json_encode($arr);
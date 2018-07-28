<?php

session_start();

session_destroy();

$arr['id']=0;
$arr['type']=0;

echo json_encode($arr);
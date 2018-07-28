<?php

require 'database.php';
header("Content-Type:application/json");

$sql=$db->query("select * from category");
$arr=array();

while($fe=$sql->fetch_object()){
   $arr[]=$fe; 
}
echo json_encode($arr);
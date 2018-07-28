<?php
//session_start();

require 'database.php';

//echo"<pre>";
//print_r($db);
//echo"</pre>";
//die();

header('Content-Type:application/json');


$arr = array();

if (isset($_SESSION['pdtid'])) {
    $ids = "";
    $pdtid = $_SESSION['pdtid'];
    $i= 0;
    foreach ($pdtid as $d){
        if($i >0){
            $ids .= " , ";
        }
        $ids .=$d;
        $i++;
    }
    
    $sql = $db->query("select id,code, price, picture from room where id in ($ids) ");
    
    while ($d = $sql->fetch_assoc()) {
        $index = array_search($d['id'], $_SESSION['pdtid']);
        
        $d['qty']=$_SESSION['qtyid'][$index];
        $arr[] = $d;
    }
}
echo json_encode($arr);






<?php
session_start();
$data = json_decode(file_get_contents("php://input"));

foreach ($data as $value){
    $id = $value->id;
}

if(count($_SESSION['pdtid']) > 1){
    $index = array_search($id, $_SESSION['pdtid']);
    unset($_SESSION['pdtid'][$index]);
    unset($_SESSION['qtyid'][$index]);
    echo $index;    
}
else{
    unset($_SESSION['pdtid']);
    unset($_SESSION['qtyid']);

}
$arr = array();

if(isset($_SESSION['pdtid'])){
    $ids = "";
    
    $pdtid = $_SESSION['pdtid'];
    
    $i =0;
    
    foreach ($pdtid as $d){
        
        if($i > 0){
            $ids .= " , ";
        }
        $ids .= $d;
        
        $i++;
    }
    
    $sql = $db->query(" select id, code, price ,picture from room where id in ($ids)");
    
    while ($d= $sql->fetch_assoc()){
        $index = array_search($d['id'],$_SESSION['pdtid']);
        
        $d['qty'] = $_SESSION['qtyid'][$index];
        
        $arr[] = $d;
    }
}
echo json_encode($arr);
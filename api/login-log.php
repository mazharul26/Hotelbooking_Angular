<?php

require 'database.php';

$data = json_decode(file_get_contents("php://input"));


foreach ($data as $value) {

    $sql = $db->query("select * from users where email='" . $value->nm . "' and password ='" .md5($value->ps) . "'");
   // print_r($sql);
    if ( $sql ->num_rows > 0) {
        while ($d =  $sql ->fetch_object()) {
            $arr['id'] = $d->id;
            $arr['type'] = $d->type;
            $_SESSION['id'] = $d->id;
            $_SESSION['type'] = $d->type;
        }
  } 
  else {


        $arr['id'] = 0;
        $arr['type'] = 0;
    }
  //  print_r($arr);
    echo json_encode($arr);
}

<?php

require 'database.php';
$data = json_decode(file_get_contents("php://input"));


foreach ($data as $value) {

    if ($db->query("insert into  users set name='" . $value->nm . "', email='" . $value->email . "', password='" . $value->password . "'")) {

        echo $db->insert_id;
    } else {
        echo 0;
    }
}
//$data = json_decode(file_get_contents("php://input"));
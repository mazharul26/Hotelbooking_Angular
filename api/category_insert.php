<?php

require 'database.php';
$data = json_decode(file_get_contents("php://input"));


foreach ($data as $value) {

    if ($db->query("insert into  category set name='" . $value->nm . "'")) {

        echo $db->insert_id;
    } else {
        echo 0;
    }
}

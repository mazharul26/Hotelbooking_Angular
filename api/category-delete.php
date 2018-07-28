

<?php

require 'database.php';

$de = json_decode(file_get_contents("php://input"));

foreach ($de as $value) {
    $db->query("delete from category where id ='" . $value->id . "'");

    if ($db->affected_rows > 0) {
        echo 1;
    } else {
        echo 0;
    }
}
?>
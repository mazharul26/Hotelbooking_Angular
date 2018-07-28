
<?php

session_start();
$data = json_decode(file_get_contents("php://input"));

foreach ($data as $value) {
    $id = $value->id;

    $qty = $value->qty;
}
if (isset($_SESSION['pdtid'])) {
    $index = array_search($id, $_SESSION['pdtid']);

    if ($index !== FALSE) {
        
        $_SESSION['qtyid'][$index] = $qty;
            echo("Update to cart");
        
    } else {
        
        $_SESSION['pdtid'][] = $id;

        $_SESSION['qtyid'][] = $qty;
          echo("add to cart");
    }
} else {
    $_SESSION['pdtid'][] = $id;

    $_SESSION['qtyid'][] = $qty;
     echo("add to cart");
     
}


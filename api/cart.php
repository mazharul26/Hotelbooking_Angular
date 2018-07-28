
<?php
session_start();
if(isset($_SESSION['pdtid'])){
    echo count($_SESSION['pdtid']);
}
else{
    echo 0;
}

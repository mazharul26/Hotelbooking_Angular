


<?php

require("database.php");

if (isset($_FILES['picture']['name'])) {

    $ext = pathinfo($_FILES['picture']['name']);

    $ext = $ext['extension'];
} else {

    $ext = "";
}

$sql = (" insert into users set
    
	name='" . $_POST['name'] . "',
            
	email='" . $_POST['email'] . "',
        password='" .md5( $_POST['password']) . "',
        address='" . $_POST['address'] . "',
        type='" . $_POST['type'] . "',
	gender='" . $_POST['gender'] . "',
	contact='" . $_POST['contact'] . "',
            
        dob='" . date("y-m-d") . "',   
            
        picture='" . $ext . "'    
	


");


if ($db->query($sql)) {
    if ($ext) {
        move_uploaded_file($_FILES['picture']['tmp_name'],"images/" . $db->insert_id . ".{$ext}");
    }
//      echo $db->insert_id; 

    $arr['id']= $db->insert_id;
    $arr['ext'] = $ext;
    echo json_encode($arr);
} else {
    echo 0;
}
//picture='".$ext."';
?>
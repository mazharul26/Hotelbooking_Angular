


<?php

require("database.php");
if(isset($_FILES['picture']['name'])){
$ext = pathinfo($_FILES['picture']['name']);
$ext = strtolower($ext['extension']);
}
else{
    $ext="";
}

$sql = (" insert into employee set
	name='" . $_POST['name'] . "',
	email='" . $_POST['email'] . "',
	salary='" . $_POST['salary'] . "',
	date='" . date("y-m-d") . "',
	gender='" . $_POST['gender'] . "',
	contact='" . $_POST['contact'] . "',
        picture='" . $ext . "'    
	


");


if ($db->query($sql)) {
    if($ext){
    move_uploaded_file($_FILES['picture']['tmp_name'], "images/" . $db->insert_id . ".{$ext}");

    }
    
//    echo $db->insert_id;
       $arr['id']=$db->insert_id;
       $arr['ext']=$ext;
        echo json_encode($arr);
   
} else {
    echo 0;
}
//picture='".$ext."';
?>



<?php

require("database.php");
if(isset($_FILES['picture']['name'])){
$ext = pathinfo($_FILES['picture']['name']);
$ext = $ext['extension'];
}
else{
    $ext="";
}

$sql = (" insert into room set
	code='" .$_POST['code'] . "',
	description ='" .$_POST['description'] . "',
	adult='" . $_POST['adult'] . "',
	child='" . $_POST['child'] . "',
	category_id='" . $_POST['catid'] . "',
	price='" . $_POST['price'] . "',
        discount='" . $_POST['discount'] . "',
        vat='" . $_POST['vat'] . "',    
        
        picture='" . $ext . "'    
	


");


if ($db->query($sql)) {
    if($ext){
    move_uploaded_file($_FILES['picture']['tmp_name'], "images1/" . $db->insert_id . ".{$ext}");

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
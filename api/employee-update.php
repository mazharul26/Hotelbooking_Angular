




<?php

require("database.php");

$sql = $db->query(" select * from employee where id ='" . $_POST['id'] . "'");

while ($d = $sql->fetch_object()) {
    $id = $d->id;
    $old_ext = $d->picture;

    //$old_ext=$d->picture1;  
    //$old_ext=$d->picture2; 
    //$old_ext=$d->picture3; 
}



if (isset($_FILES['picture']['name'])) {
    
    $ext = pathinfo($_FILES['picture']['name']);
    $ext = $ext['extension'];

    if ($ext != "jpg" && $ext != "jpeg" && $ext != "png" && $ext != "gif") {
        $ext = $old_ext;
    }
    else{
        if(file_exists("images/$id.$old_ext")){
            unlink("images/$id.$old_ext");
        }
        move_uploaded_file($_FILES['picture']['tmp_name'], "images/" .$id . ".{$ext}");
    }
} else {
    $ext = $old_ext;
}

$sql = $db->query(" update employee set
    
	name='" . $_POST['name'] . "',
	email='" . $_POST['email'] . "',
	salary='" . $_POST['salary'] . "',
	date='" . $_POST['date'] . "',
	gender='" . $_POST['gender'] . "',
	contact='" . $_POST['contact'] . "',
        picture='" . $ext . "'    
	where id='" . $_POST['id'] . "'


");

if ($db->affected_rows > 0) {
    echo 1;
} else {
    echo 0;
}



/*

  if ($db->query($sql)) {
  if($ext){
  move_uploaded_file($_FILES['picture']['tmp_name'], "images/" . $db->insert_id . ".{$ext}");

  }
  echo($db->insert_id);
  } else {
  echo 0;
  }

 */
?>

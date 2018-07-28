<?php

$title = "Media Center";

if(isset($_GET['f'])){
    if($_GET['f'] == "home"){
      $title = "Media Center";  
    }
    else if($_GET['f'] == "404"){
      $title = "Page Not Found";  
    }
    else if($_GET['f'] == "authentication"){
      $title = "Login/Register";  
    }
    else if($_GET['f'] == "about_us"){
      $title = "About Us";  
    }
    else if($_GET['f'] == "contact"){
      $title = "Contact With Us";  
    } 
    else if($_GET['f'] == "faq"){
      $title = "FAQ";  
    }
    else if($_GET['f'] == "terms"){
      $title = "Terms & Condition";  
    }
    else if($_GET['f'] == "blog"){
      $title = "Blog";  
    }
    else if($_GET['f'] == "blog-post"){
      $title = "Blog";  
    }
 
}


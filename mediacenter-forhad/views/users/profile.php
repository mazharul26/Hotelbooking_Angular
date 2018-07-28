<?php
if (!isset($title)) {
    header("Location: index.html");
}
?>
<div><a href=""><button class="btn btn-success pull-right">Update Profile</button></a></div>
<div><a href="index.php?u=change-password"><button class="btn btn-success pull-right">Change Password</button></a></div>
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <h1>Profile</h1>
            <img src="images.jpg">
        </div><!-- /.row -->
    </div><!-- /.container -->
</main>

<?php
$d = new Database();
if (isset($_GET['code']) && strlen($_GET['code']) == 20) {
    $data = $d->view("customer", "", array("status" => $d->VD($_GET['code'])));
    if ($data->num_rows > 0) {
        while ($value = $data->fetch_object()) {
            $d->update("customer", array("status" => ""), array("id" => $value->id));
           $_SESSION['id'] = $value->id;
            $_SESSION['type'] = $value->type;
           Redirect("index.php");
        }
    } else {
        echo"<h4>Invalid Code</h4>";
    }
} //else {
   // Redirect("register.php");
//}
?> 
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <section class="section sign-in inner-right-xs">
                    <h2 class="bordered">Varification</h2>
                    <p>Hello, Welcome to your account</p>

                    <div class="social-auth-buttons">
                        <div class="row">
                        </div>
                    </div>

                    <form role="form" class="login-form cf-style-1" method="get">
                        <div class="field-row">
                            <label>Varification Code</label>
                            <input type="text" class="le-input" name="code">
                        </div><!-- /.field-row -->
                        <div class="field-row clearfix">
                            <span class="pull-left">
                                <label class="content-color"><input type="checkbox" class="le-checbox auto-width inline"> <span class="bold">Remember me</span></label>
                            </span>
                        </div>

                        <div class="buttons-holder">
                            <input type="submit" name="send" value="Send">
                        </div><!-- /.buttons-holder -->
                    </form><!-- /.cf-style-1 -->

                </section><!-- /.sign-in -->

            </div><!-- /.col -->
            <p>You have no account? <a href="index.php?f=register">Register here.</a></p>
            <!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</main>
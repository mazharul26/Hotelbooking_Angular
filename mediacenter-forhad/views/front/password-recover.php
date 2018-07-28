<?php
if (!isset($title)) {
    header("Location: index.html");
}
?>

<?php
$d = new Database();
if (isset($_POST['recover']) && strlen($_POST['code']) == 5) {
    $where = array(
        "code" => $d->VD($_POST['code'])
    );

    $result = $d->view("customer","*", "", $where);

    if ($result->num_rows > 0) {
        while ($value = $result->fetch_object()) {
            if ((time() - $value->time) <= 600) {
                $temp = array(
                    "code" => "",
                    "time" => ""
                );
                $d->update("customer", $temp, array("id" => $value->id));
                $_SESSION['id'] = $value->id;
                $_SESSION['type'] = $value->type;
                $_SESSION['session-code'] = 1;
                Redirect("index.php?u=new-password");
            } else {
                echo "Time Out";
            }
        }
    } else {
        echo "Invalid Code";
    }
}
?>

<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <section class="section sign-in inner-right-xs">
                    <h2 class="bordered" style="text-align: center">Password Recovery</h2>
                    <p style="text-align: center">Hello, Welcome to your account</p>
                    <form role="form" class="login-form cf-style-1" method="post">
                        <div class="field-row">
                            <label><h5>Code</h5></label>
                            <input type="text" class="le-input" name="code" placeholder="Enter Recovery Code">
                        </div><!-- /.field-row -->
                        <div class="buttons-holder">
                            <input type="submit" class="le-button huge" name="recover" value="Send">
                        </div><!-- /.buttons-holder -->
                    </form><!-- /.cf-style-1 -->

                </section><!-- /.sign-in -->

            </div><!-- /.col -->
            <p>You have no account? <a href="index.php?f=register">Register here.</a></p>
            <!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</main>

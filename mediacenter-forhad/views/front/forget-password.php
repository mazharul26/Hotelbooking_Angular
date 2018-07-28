<?php
if (!isset($title)) {
    header("Location: index.html");
}
?>

<?php
$d = new Database();
if (isset($_POST['recover'])) {
    $where = array(
        "email" => $d->VD($_POST['email'])
    );

    $result = $d->view("customer","*", "", $where);

    if ($result->num_rows > 0) {
        $temp = array(
            "code" => rand(10000, 99999),
            "time" => time()
        );
        $d->update("customer", $temp, array("email" => $d->VD($_POST['email'])));
            $headers = "From: sales@rupantarbd.com\r\n";
            $headers .= "Reply-To: sales@rupantarbd.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $message = "<html><body>Password Recovery code is : {$temp['code']}</body></html>";
            mail($where['email'], "Password Recovery", $message, $headers);

            Redirect("index.php?f=password-recover");
            
    } else {
        echo "Invalid Email or Password";
    }
}
?>

<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <section class="section sign-in inner-right-xs">
                    <h2 class="bordered" style="text-align: center">Forget Password</h2>
                    <p style="text-align: center">Hello, Welcome to your account</p>
                    <form role="form" class="login-form cf-style-1" method="post">
                        <div class="field-row">
                            <label><h5>Email</h5></label>
                            <input type="text" class="le-input" name="email" placeholder="Available email address">
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

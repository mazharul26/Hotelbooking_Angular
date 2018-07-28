<?php
if (!isset($title)) {
    header("Location: index.html");
}
$d = new Database();
if (isset($_POST['login'])) {
    $where = array(
        "email" => $d->VD($_POST['email']),
        "password" => md5($_POST['password'])
    );

    $result = $d->view("customer", "*", "", $where);

    if ($result->num_rows > 0) {
        while ($value = $result->fetch_object()) {
            if ($value->status) {
                echo "Please verify your accouct.";
            } else {
                $_SESSION['id'] = $value->id;
                $_SESSION['type'] = $value->type;
                $_SESSION['username'] = $value->name;
                if ($value->type == 3) {
                    Redirect("index.php?a=report");
                } else if ($value->type == 2) {
                    Redirect("index.php?e=category");
                } else {
                    Redirect("index.php?u=profile");
                }
            }
        }
    } else {
        echo "Invalid email or password";
    }
}
?>

<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <section class="section sign-in inner-right-xs">
                    <h2 class="bordered">Sign In</h2>
                    <p>Hello, Welcome to your account</p>

                    <div class="social-auth-buttons">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn-block btn-lg btn btn-facebook"><i class="fa fa-facebook"></i> Sign In with Facebook</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn-block btn-lg btn btn-twitter"><i class="fa fa-twitter"></i> Sign In with Twitter</button>
                            </div>
                        </div>
                    </div>

                    <form role="form" class="login-form cf-style-1" method="post">
                        <div class="field-row">
                            <label>Email</label>
                            <input type="text" class="le-input" name="email">
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <label>Password</label>
                            <input type="text" class="le-input" name="password">
                        </div><!-- /.field-row -->

                        <div class="field-row clearfix">
                            <span class="pull-left">
                                <label class="content-color"><input type="checkbox" class="le-checbox auto-width inline"> <span class="bold">Remember me</span></label>
                            </span>
                            <span class="pull-right">
                                <a href="index.php?f=forget-password" class="content-color bold">Forgotten Password ?</a>
                            </span>
                        </div>

                        <div class="buttons-holder">
                            <input type="submit" class="le-button huge" name="login" value="Login">
                        </div><!-- /.buttons-holder -->
                    </form><!-- /.cf-style-1 -->

                </section><!-- /.sign-in -->

            </div><!-- /.col -->
            <p>You have no account? <a href="index.php?f=register">Register here.</a></p>
            <!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</main>

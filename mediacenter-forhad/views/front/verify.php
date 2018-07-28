<?php
if (!isset($title)) {
    header("Location: index.html");
}
?>


<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">



            <div class="col-md-12">
                <section class="section register inner-left-xs">
                    <h2 class="bordered">Account Varification </h2>
                    <?php
                    $d = new Database();
                    if (isset($_GET['send'])) {
                        $very = array(
                            "status" => $d->VD($_GET['code'])
                        );

                        if ($_GET['code'] && strlen($_GET['code']) == 20) {
                            $data = $d->view("customer", "*", "", $very);

                            if ($data->num_rows > 0) {

                                while ($value = $data->fetch_object()) {
                                    $d->update("customer", array("status" => ""), array("id" => $value->id));
                                    $_SESSION['id'] = $value->id;
                                    $_SESSION['type'] = $value->type;
                                    Redirect("index.php?u=profile");
                                }
                            } else {
                                echo"<h4>Invalid Code</h4>";
                            }
                        }
                    } 
                    ?> 

                    <form role="form" class="login-form cf-style-1" method="get">
                        <input type="hidden" name="f" value="verify">
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
                            <input type="submit" class="le-button huge" name="send" value="Submit">
                        </div>
                    </form>
                    <p>All ready have an account? <a href="index.php?f=login">Click here.</a></p>
                    <br><br><br><br>
                    <h2 class="semi-bold">Sign up today and you'll be able to :</h2>
                    <ul class="list-unstyled list-benefits">
                        <li><i class="fa fa-check primary-color"></i> Speed your way through the checkout</li>
                        <li><i class="fa fa-check primary-color"></i> Track your orders easily</li>
                        <li><i class="fa fa-check primary-color"></i> Keep a record of all your purchases</li>
                    </ul>

                </section><!-- /.register -->

            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->

</main><!-- /.authentication -->

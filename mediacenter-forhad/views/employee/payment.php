<?php
if (!isset($title)) {
    header("Location: index.html");
}
?>


<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">



            <div class="col-md-4">
                <h2 class="bordered">Payment Method Insert here</h2>
                <section class="section register inner-left-xs">
                    <a href="index.php?e=payment"><input type="button" name="new" value="New" class="btn btn-success"></a>
                    <a href="index.php?e=payment-view"><input type="button" name="view" value="View" class="btn btn-success"></a><br><br>          
                    <form role="form" class="login-form cf-style-1" method="post">
                        <div class="field-row">
                            <label>Color Name</label>
                            <input type="text" class="le-input" name="payment">
                        </div><!-- /.field-row -->
                        <?php
                        $d = new Database();
                        if (isset($_POST['send'])) {
                            $arr = array(
                                "name" => $d->VD($_POST['payment'])
                            );

                            if ($d->insert("payment", $arr)) {
                                echo "<p style='color: green'>Insert successfully</p>";
                            } else {
                                echo "<p style='color: red'>Anything wrong</p>";
                            }
                        }
                        ?> 
                        <div class="buttons-holder">
                            <input type="submit" class="le-button huge" name="send" value="Save">
                        </div>
                    </form>

                </section><!-- /.register -->

            </div><!-- /.col -->
                        <div class="col-xs-8">
                <section class="section register inner-left-xs">

                    <h1>Available Payment Methods</h1>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Payment Method</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $d = new Database();
                            $payMethods = $d->view("payment", "*");
                            while ($row = $payMethods->fetch_object()) {
                                ?>
                                <tr>
                                    <td><?php echo $row->name; ?></td>
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                    </table>


                </section>
            </div>

        </div><!-- /.row -->
    </div><!-- /.container -->

</main><!-- /.authentication -->

<?php
if (!isset($title)) {
    header("Location: index.html");
}
?>


<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <?php
            $d = new Database();

            if (isset($_POST['send'])) {
                $arr = array(
                    "charge" => $d->VD($_POST['charge']),
                    "cityid" => $d->VD($_POST['city'])
                );
                $where = array(
                    "id" => $_GET['id']
                );

                if ($d->update("delivery", $arr, $where)) {
                    echo "<p style='color: green'>Update successfully</p>";
                    Redirect("index.php?e=delivery");
                } else {
                    echo $d->Error;
                    echo "<p style='color: red'>Anything wrong</p>";
                }
            }
            ?>
            <div class="col-md-12">
                <h2 class="bordered">Delivery Update here</h2>
                <section class="section register inner-left-xs">
                    <a href="index.php?e=delivery"><input type="button" name="new" value="New" class="btn btn-success"></a>
                    <a href="index.php?e=delivery-view"><input type="button" name="view" value="View" class="btn btn-success"></a><br><br>  
                    <?php
                    $data = $d->view("delivery", "*", "", array("id" => $_GET['id']));
                    while ($value = $data->fetch_object()) {
                        ?>
                        <form role="form" class="login-form cf-style-1" method="post">
                            <div class="field-row">
                                <label>New Charge</label>     
                                <input type="text" class="le-input" name="charge" value="<?php echo $value->charge ?>">
                            </div><!-- /.field-row -->
                            <div class="field-row">
                            <label for="charge">Charge</label>
                            <select name="charge" value="<?php echo $value->name ?>">
                                <?php
                                $cetegories = $d->view("city", "*", array("name", "asc"));
                                while ($catagory = $cetegories->fetch_object()) {
                                    echo "<option value='$catagory->id'>$catagory->name</option>";
                                }
                                ?>
                            </select>
                        </div><!-- /.field-row -->
                            <div class="buttons-holder">
                                <input type="submit" class="le-button huge" name="send" value="Save">
                            </div>
                        </form>
                        <?php
                    }
                    ?>
                </section><!-- /.register -->

            </div><!-- /.col -->

        </div>
        <!-- /.row -->
    </div><!-- /.container -->

</main><!-- /.authentication -->

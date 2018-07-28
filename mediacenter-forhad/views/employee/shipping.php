<?php
if (!isset($title)) {
    header("Location: index.html");
}
?>


<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">



            <div class="col-md-4">
                <h2 class="bordered">Shipping Insert here</h2>
                <section class="section register inner-left-xs">
                    <a href="index.php?e=shipping"><input type="button" name="new" value="New" class="btn btn-success"></a>
                    <a href="index.php?e=shipping"><input type="button" name="view" value="View" class="btn btn-success"></a><br><br>          
                    <form role="form" class="login-form cf-style-1" method="post">
                        <div class="field-row">
                            <?php
                            $d = new Database();
                            if (isset($_POST['send'])) {

                                if ($_POST['delivery'] != "") {
                                    $arr = array(
                                        "address" => $d->VD($_POST['address']),
                                        "deliveryid" => $d->VD($_POST['deliveryid'])
                                    );

                                    if ($d->insert("subcategory", $arr)) {
                                        echo "<p style='color: green'>Insert successfully</p>";
                                    } else {
                                        echo "<p style='color: red'>Anything wrong</p>";
                                    }
                                } else {
                                    echo "<p style='color: red'>Subcategory requerd</p>";
                                }
                            }
                            ?> 
                            <label>Shipping Address</label>
                            <input type="text" class="le-input" name="shipping">
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <label for="deliveryid">Delivery charge</label>
                            <select name="deliveryid">
                                <?php
                                $deliveryies = $d->view("delivery", "*", array("charge", "asc"));
                                while ($deliver = $deliveryies->fetch_object()) {
                                    echo "<option value='$deliver->id'>$deliver->charge</option>";
                                }
                                ?>
                            </select>
                        </div><!-- /.field-row -->

                        <div class="buttons-holder">
                            <input type="submit" class="le-button huge" name="send" value="Save">
                        </div>
                    </form>

                </section><!-- /.register -->

            </div><!-- /.col -->


            <div class="col-md-8">
                <h2 class="bordered">Shipping view</h2>
                <section class="section register inner-left-xs">
                    <?php
                    $d = new Database();
                    if (isset($_GET['id'])) {
                        $where = $_GET['id'];
                        if ($d->delete("shipping", $where)) {
                            echo 'Delete successfully';
                        } else {
                            echo 'Anything wrong';
                        }
                    }
                    ?>
                    <form method="post">
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>ADDRESS</th>
                                <th>CITY</th>
                                <th>CHARGE</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
                            </tr>
                            <?php
                            $data = $d->view("sub_view", "*");
                            while ($value = $data->fetch_object()) {
                                echo "<tr>";
                                echo "<td>$value->cname</td>";
                                echo "<td>$value->sname</td>";
                                echo "<td>$value->sname</td>";
                                echo "<td><a href='index.php?e=subcategory-update&id={$value->id}'><input type='button' value='Edit' class='btn btn-info'></a></td>";
                                echo "<td><a href='index.php?e=subcategory&id={$value->id}'><input type='button' value='delete' class='btn btn-danger'></a></td>";
                                echo "</tr>";
                            }
                            ?>

                        </table>
                    </form>

                </section><!-- /.register -->

            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->

</main><!-- /.authentication -->

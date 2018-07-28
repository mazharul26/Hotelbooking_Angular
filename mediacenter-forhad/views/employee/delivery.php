<?php
if (!isset($title)) {
    header("Location: index.html");
}
?>


<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">



            <div class="col-md-4">
                <h2 class="bordered">Delivery Insert here</h2>
                <section class="section register inner-left-xs">
                    <a href="index.php?e=delivery"><input type="button" name="new" value="New" class="btn btn-success"></a>
                    <a href="index.php?e=delivery-view"><input type="button" name="view" value="View" class="btn btn-success"></a><br><br>          
                    <form role="form" class="login-form cf-style-1" method="post">
                        <div class="field-row">
                            <?php
                            $d = new Database();
                            if (isset($_POST['send'])) {

                                if ($_POST['charge'] != "") {
                                    $arr = array(
                                        "charge" => $d->VD($_POST['charge']),
                                        "cityid" => $d->VD($_POST['city'])
                                    );

                                    if ($d->insert("delivery", $arr)) {
                                        echo "<p style='color: green'>Insert successfully</p>";
                                    } else {
                                        echo "<p style='color: red'>Anything wrong</p>";
                                    }
                                } else {
                                    echo "<p style='color: red'>Delevery requerd</p>";
                                }
                            }
                            ?> 
                            <label>Charge</label>
                            <input type="text" class="le-input" name="charge">
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <label for="city">City</label>
                            <select name="city">
                                <?php
                                $deliveries = $d->view("city", "*", array("name", "asc"));
                                while ($delivery= $deliveries->fetch_object()) {
                                    echo "<option value='$delivery->id'>$delivery->name</option>";
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
                <h2 class="bordered">Delivery view</h2>
                <section class="section register inner-left-xs">
                    <?php
                    $d = new Database();
                    if (isset($_GET['id'])) {
                        $where = $_GET['id'];
                        if ($d->delete("delivery", $where)) {
                            echo 'Delete successfully';
                        } else {
                            echo 'Anything wrong';
                        }
                    }
                    ?>
                    <form method="post">
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>CITY</th>
                                <th>DELIVERY</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
                            </tr>
                            <?php
                            $data = $d->view("del_view", "*");
                            while ($value = $data->fetch_object()) {
                                echo "<tr>";
                                echo "<td>$value->name</td>";
                                echo "<td>$value->charge</td>";
                                echo "<td><a href='index.php?e=delivery-update&id={$value->id}'><input type='button' value='Edit' class='btn btn-info'></a></td>";
                                echo "<td><a href='index.php?e=delivery&id={$value->id}'><input type='button' value='delete' class='btn btn-danger'></a></td>";
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

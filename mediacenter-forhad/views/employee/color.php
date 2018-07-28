<?php
if (!isset($title)) {
    header("Location: index.html");
}
?>


<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">



            <div class="col-md-4">
                <h2 class="bordered">Category Upload here</h2>
                <section class="section register inner-left-xs">
                    <a href="index.php?e=color"><input type="button" name="new" value="New" class="btn btn-success"></a>
                    <a href="index.php?e=color-view"><input type="button" name="view" value="View" class="btn btn-success"></a><br><br>          
                    <form role="form" class="login-form cf-style-1" method="post">
                        <div class="field-row">
                            <label>Color Name</label>
                            <input type="text" class="le-input" name="color">
                        </div><!-- /.field-row -->
                        <?php
                        $d = new Database();
                        if (isset($_POST['send'])) {
                            $arr = array(
                                "name" => $d->VD($_POST['color'])
                            );

                            if ($d->insert("color", $arr)) {
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
            <div class="col-md-8">

                <section class="section register inner-left-xs">



                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Color Name</th> 
                        </tr>
                        <?php
                        $d = new Database();
                        $data = $d->view("color", "*");
                        while ($value = $data->fetch_object()) {
                            echo "<tr>";
                            echo "<td>$value->name</td>";
                            echo "</tr>";
                        }
                        ?>

                    </table>


                </section><!-- /.register -->

            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->

</main><!-- /.authentication -->

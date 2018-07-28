
<?php
if (!isset($title)) {
    header("Location: index.html");
}
?>
<?php
$d = new Database();
if (isset($_POST['reg'])) {

    $where = array(
        "name" => $d->VD($_POST['nm']),
    );
    if ($result = $d->insert("country", $where)) {
        echo 'Insert Successfully';
    } else {
        echo $result->Error;
    }
}
?>

<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <a href="index.php?e=country"><input type="button" name="new" value="New" class="btn btn-success"></a>
                <a href="index.php?e=country-view"><input type="button" name="view" value="View" class="btn btn-success"></a><br><br> 
            </div>

            <div class="col-md-4">

                <section class="section register inner-left-xs">




                    <form action="" role="form" class="register-form cf-style-1" method="post">
                        <div class="field-row">
                            <label><h2>Country Name</h2></label>
                            <input type="text" class="le-input" name="nm">
                        </div><!-- /.field-row -->
                        <div class="buttons-holder">
                            <button type="submit" class="le-button huge" name="reg">Upload</button>
                        </div><!-- /.buttons-holder -->


                    </form>

                </section><!-- /.register -->

            </div><!-- /.col -->
                        <div class="col-md-8">

                <section class="section register inner-left-xs">



                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Country Name</th> 
                        </tr>
                        <?php
                        $d = new Database();
                        $data = $d->view("country", "*");
                        while ($value = $data->fetch_object()) {
                            echo "<tr>";
                            echo "<td '$value->id'>$value->name</td>";
                            echo "</tr>";
                        }
                        ?>

                    </table>


                </section><!-- /.register -->

            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->
</main><!-- /.authentication -->

<?php
if (!isset($title)) {
    header("Location: index.html");
}
?>
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <a href="index.php?e=country"><input type="button" name="new" value="New" class="btn btn-success"></a>
                <a href="index.php?e=country-view"><input type="button" name="view" value="View" class="btn btn-success"></a><br><br>
            </div>

            <div class="col-md-12">

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
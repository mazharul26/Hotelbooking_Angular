<?php
if (!isset($title)) {
    header("Location: index.html");
}
?>
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <a href="index.php?e=category"><input type="button" name="new" value="New" class="btn btn-success"></a>
                <a href="index.php?e=category-view"><input type="button" name="view" value="View" class="btn btn-success"></a><br><br>
            </div>
            <h2>Category view</h2>
            <div class="col-md-12">

                <section class="section register inner-left-xs">
                    <?php
                    $d = new Database();
                    if (isset($_GET['id'])) {
                        $where = $_GET['id'];
                        if ($d->delete("category", $where)) {
                            echo 'Delete successfully';
                        } else {
                            echo 'Anything wrong';
                        }
                    }
                    ?>
                    <form method="post">
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>CATEGORY NAME</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
                            </tr>
                            <?php
                            $data = $d->view("category", "*");
                            while ($value = $data->fetch_object()) {
                                echo "<tr>";
                                echo "<td '$value->id'>$value->name</td>";
                                echo "<td><a href='index.php?e=category-update&id={$value->id}'><input type='button' value='Edit' class='btn btn-info'></a></td>";
                                echo "<td><a href='index.php?e=category-view&id={$value->id}'><input type='button' value='delete' class='btn btn-danger'></a></td>";
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
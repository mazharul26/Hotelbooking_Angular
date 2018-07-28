<?php
if (!isset($title)) {
    header("Location: index.html");
}
?>


<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="bordered">Subcategory view</h2>
                <a href="index.php?e=subcategory"><input type="button" name="new" value="New" class="btn btn-success"></a>
                <a href="index.php?e=subcategory-view"><input type="button" name="view" value="View" class="btn btn-success"></a><br><br>    
                <section class="section register inner-left-xs">
                    <?php
                    $d = new Database();
                    if (isset($_GET['id'])) {
                        $where = $_GET['id'];
                        if ($d->delete("subcategory", $where)) {
                            echo 'Delete successfully';
                        } else {
                            echo 'Anything wrong';
                        }
                    }
                    ?>
                    <form method="post">
                        <table class="table table-striped table-hover">
                            <tr>
                                <th>CATEGORY</th>
                                <th>SUBCATEGORY</th>
                                <th>EDIT</th>
                                <th>DELETE</th>
                            </tr>
                            <!--SELECT category.name, subcategory.name mname FROM subcategory, category WHERE category.id=subcategory.categoryid;-->
                            <?php
                            $data = $d->view("sub_view", "*");
                            while ($value = $data->fetch_object()) {
                                echo "<tr>";
                                echo "<td '$value->id'>$value->cname</td>";
                                echo "<td '$value->id'>$value->sname</td>";
                                echo "<td><a href='index.php?e=subcategory-update&id={$value->id}'><input type='button' value='Edit' class='btn btn-info'></a></td>";
                                echo "<td><a href='index.php?e=subcategory-view&id={$value->id}'><input type='button' value='delete' class='btn btn-danger'></a></td>";
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

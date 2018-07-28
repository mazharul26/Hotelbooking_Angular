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
                    "name" => $d->VD($_POST['category']),
                    "categoryid" => $d->VD($_POST['catagoryid'])
                );
                $where = array(
                    "id" => $_GET['id']
                );

                if ($d->update("subcategory", $arr, $where)) {
                    echo "<p style='color: green'>Update successfully</p>";
                    Redirect("index.php?e=subcategory");
                } else {
                    echo $d->Error;
                    echo "<p style='color: red'>Anything wrong</p>";
                }
            }
            ?>
            <div class="col-md-12">
                <h2 class="bordered">subategory Update here</h2>
                <section class="section register inner-left-xs">
                    <a href="index.php?e=category"><input type="button" name="new" value="New" class="btn btn-success"></a>
                    <a href="index.php?e=category-view"><input type="button" name="view" value="View" class="btn btn-success"></a><br><br>  
                    <?php
                    $data = $d->view("subcategory", "*", "", array("id" => $_GET['id']));
                    while ($value = $data->fetch_object()) {
                        ?>
                        <form role="form" class="login-form cf-style-1" method="post">
                            <div class="field-row">
                                <label>New Category Name</label>     
                                <input type="text" class="le-input" name="category" value="<?php echo $value->name ?>">
                            </div><!-- /.field-row -->
                            <div class="field-row">
                            <label for="catagoryid">Catagory</label>
                            <select name="catagoryid" value="<?php echo $value->name ?>">
                                <?php
                                $cetegories = $d->view("category", "*", array("name", "asc"));
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

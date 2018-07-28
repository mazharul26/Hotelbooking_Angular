<script src="assets/js/fSelect.js"></script>
<script>
    (function ($) {
        $(function () {
            $('#select-multiple').fSelect();
        });
    })(jQuery);
</script>
<?php
$d = new Database();
	$ext = "";
	if($_FILES['pic1']['name']){
		$ext = pathinfo($_FILES['pic1']['name']);
		$ext = strtolower($ext['extension']);
		if($ext!="jpg" && $ext!="jpeg" && $ext!="png" && $ext!="gif"){
			
			$ext = "";
		}
	}
if (isset($_POST['upload'])) {
    $data = array(
        "title" => $d->VD($_POST['title']),
        "price" => $d->VD($_POST['price']),
        "salesprice" => $d->VD($_POST['salesprice']),
        "description" => $d->VD($_POST['des']),
        "specification" => $d->VD($_POST['space']),
        "unitid" => $d->VD($_POST['unitid']),
        "catagoryid" => $d->VD($_POST['catagoryid']),
        "subcategoryid" => $d->VD($_POST['subcategoryid']),
        "vat" => $d->VD($_POST['des']),
        "sotck" => $d->VD($_POST['stock']),
        "picture1"=> '" . $ext1 . "'  
    );
    if ($d->insert("product", $data)) {
        $id = $d->Id;

        new_file("files/{$id}.txt", $_POST['des']);

        if ($_POST['tagsid']) {
            foreach ($_POST['tagid'] as $tid) {
                $arr = array(
                    "productid" => $id,
                    "tagsid" => $tid,
                );
                $d->insert("product_tags", $arr);
            }
        }
    }
    if ($d->num_rows > 0) {
        echo 'Upload Successfully';
    } else {
        echo 'May be have any problem';
    }
}
?>
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">



            <div class="col-md-11">
                <section class="section register inner-left-xs">
                    <h2 class="bordered">Product Upload here</h2>

                    <form role="form" class="register-form cf-style-1" method="post" enctype="multipart/form-data">
                        <div class="field-row">
                            <label for="title">Title</label>
                            <input type="text" id="title" class="le-input form-control" name="title"  placeholder="Title">
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <label for="catid">Catagory</label>
                            <select name="catagoryid" class="form-control" id="catid">
                                <option value='0'>Select Category</option>
                                <?php
                                $cetegories = $d->view("category", "*", array("name", "asc"));
                                while ($catagory = $cetegories->fetch_object()) {
                                    echo "<option value='$catagory->id'>$catagory->name</option>";
                                }
                                ?>
                            </select>
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <label for="subid">Subcategory</label>
                            <select name="subcategoryid" class="form-control" id="subid">
                                <option value='0'>Select subcategory</option>
                                <?php
                                $cetegories = $d->view("subcategory", "*", array("name", "asc"));
                                while ($catagory = $cetegories->fetch_object()) {
                                    echo "<option value='$catagory->id'>$catagory->name</option>";
                                }
                                ?>
                            </select>
                        </div><!-- /.field-row -->    
                        <!--                        <div class="field-row">
                                                    <label for="select-multiple">Tag</label>
                                                    <select name="tagid[]" multiple="" id="select-multiple">
                                                    </select>
                                                </div> /.field-row -->
                        <div class="field-row">
                            <label for="unitid">Unit</label>
                            <select name="unitid" class="form-control" id="unitid">
                                <option value='0'>Select Unit</option>
                                <?php
                                $unites = $d->view("unit", "*");
                                while ($unit = $unites->fetch_object()) {
                                    echo "<option value='$unit->id'>$unit->name</option>";
                                }
                                ?>
                            </select>
                        </div><!-- /.field-row -->
                        <div class="field-row">
                            <label for="des">Description</label>
                            <textarea id="des"  name="des" class="form-control"></textarea>

                        </div><!-- /.field-row -->
                        
                        <div class="field-row">
                            <label for="des">Specification</label>
                            <textarea id="space"  name="space" class="form-control"></textarea>

                        </div><!-- /.field-row -->                        

                        <div class="field-row">
                            <label for="stock">Stock</label>
                            <input type="text" id="stock"  name="stock" class="form-control">
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <label for="price">Price</label>
                            <input type="text" id="price" class="le-input form-control" name="price"  placeholder="Price">
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <label for="sale">Sales Price</label>
                            <input type="text" id="sale" class="le-input form-control" name="saleprice"  placeholder="Sales Price">
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <label for="dis">Discount</label>
                            <input type="text" id="dis" class="le-input form-control" name="discount"  placeholder="Discount">
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <label for="stock">Stock</label>
                            <input type="text" id="stock" class="le-input form-control" name="stock"  placeholder="Stock">
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <label for="vat">Vat</label>
                            <input type="text" id="vat" class="le-input form-control" name="vat"  placeholder="Vat">
                        </div><!-- /.field-row -->                                                                  
                        <div class="field-row">
                            <label for="pic1">Picture</label>
                            <input type="file" class="le-input" name="pic1" id="pic1">
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <label for="pic2">Picture</label>
                            <input type="file" class="le-input" name="pic2" id="pic2">
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <label for="pic3">Picture</label>
                            <input type="file" class="le-input" name="pic3" id="pic3">
                        </div><!-- /.field-row -->

                        <div class="buttons-holder">
                            <input type="submit" class="le-button huge" name="upload" value="Upload">
                        </div><!-- /.buttons-holder -->
                    </form>
                </section><!-- /.register -->

            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->

</main><!-- /.authentication -->

<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">

            <div class="col-xs-12">
                <a href="index.php?e=payment"><input type="button" name="new" value="New" class="btn btn-success"></a>
                <a href="index.php?e=payment-view"><input type="button" name="view" value="View" class="btn btn-success"></a><br><br> 
            </div>
            <div class="col-xs-12">
                <section class="section register inner-left-xs">

                    <h1>Available Payment Methods</h1>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Payment Method</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $d = new Database();
                            $payMethods = $d->view("payment", "*");
                            while ($row = $payMethods->fetch_object()) {
                                ?>
                                <tr>
                                    <td><?php echo $row->name; ?></td>
                                </tr>
                                <?php
                            }
                            ?>

                        </tbody>
                    </table>


                </section>
            </div>
        </div>
    </div>
</main>

<?php
if (!isset($title)) {
    header("Location: index.html");
}
?>

<?php
$d = new Database();
if (isset($_POST['register'])) {

    $ext1 = extension($_FILES['pic1']['name']);
    $ext2 = extension($_FILES['pic2']['name']);
    $ext3 = extension($_FILES['pic3']['name']);

    $msg = "";
    if ($_POST['nm'] == "") {
        $msg .= "Date of  dirth requerd <br />";
    }
    if ($_POST['em'] == "") {
        $msg .= "Email requerd <br />";
    } else if (!filter_var($_POST['em'], FILTER_VALIDATE_EMAIL)) {
        $msg .= "Invalid email address<br />";
    }

    if ($_POST['pass1'] == "") {
        $msg .= "Password Required<br />";
    } else if ($_POST['pass2'] == "") {
        $msg .= "Retype Password Required<br />";
    } else if ($_POST['pass1'] != $_POST['pass2']) {
        $msg .= "Password not match<br />";
    } else if (strlen($_POST['pass1']) < 5) {
        $msg .= "Password too small<br />";
    }
    if ($_POST['addr'] == "") {
        $msg .= "Address requerd <br />";
    }
    if ($_POST['gen'] == "") {
        $msg .= "Genger requerd <br />";
    }
    if ($_POST['con'] == "") {
        $msg .= "Contact requerd <br />";
    }
    if ($_POST['birth'] == "") {
        $msg .= "Date of  dirth requerd <br />";
    }
    if ($_POST['cntid'] == 0) {
        $msg .= "Country requerd <br />";
    }
    if ($_POST['cityid'] == 0) {
        $msg .= "City requerd <br />";
    }

    if ($msg === "") {
        $data = array(
            "name" => $d->VD($_POST['nm']),
            "email" => $d->VD($_POST['em']),
            "password" => md5($_POST['pass1']),
            "address" => $d->VD($_POST['addr']),
            "gender" => $_POST['gen'],
            "contact" => $_POST['con'],
            "dob" => $_POST['birth'],
            "cityid" => $d->VD($_POST['cityid']),
            "status" => RandStr(20),
            "picture1" => $ext1,
            "picture2" => $ext2,
            "picture3" => $ext3
        );
        if ($d->insert("customer", $data)) {
            //echo $d->Id;
            if ($ext1) {
                move_uploaded_file($_FILES['pic1']['tmp_name'], "views/users/pic1/" . md5("ab-1-" . $d->Id . "-idb-project") . ".$ext1");
            }
            if ($ext2) {
                move_uploaded_file($_FILES['pic2']['tmp_name'], "views/users/pic2/" . md5("ab-2-" . $d->Id . "-idb-project") . ".$ext2");
            }
            if ($ext3) {
                move_uploaded_file($_FILES['pic3']['tmp_name'], "views/users/pic3/" . md5("ab-3-" . $d->Id . "-idb-project") . ".$ext2");
            }
            $headers = "From: sales@rupantarbd.com\r\n";
            $headers .= "Reply-To: sales@rupantarbd.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $message = "<html><body>Password Recovery code is : {$data['status']} or </body></html>";
            $message .= "<html><body>For activate your account, <a href='http://www.kichunai.com/index.php?f=verify&code={$data['status']}'>Click Here</a></body></html>";
            echo $message;
            mail($data['email'], "Account Varification", $message, $headers);

            Redirect("index.php?f=verify");
        } else {
            echo $d->Error;
        }
    } else {
        echo $msg;
    }
}
?>
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">



            <div class="col-md-12">
                <section class="section register inner-left-xs">
                    <h2 class="bordered">Create New Account</h2>
                    <p>Create your own Media Center account</p>

                    <div class="social-auth-buttons">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn-block btn-lg btn btn-facebook"><i class="fa fa-facebook"></i> Sign In with Facebook</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn-block btn-lg btn btn-twitter"><i class="fa fa-twitter"></i> Sign In with Twitter</button>
                            </div>
                        </div>
                    </div>
                    
                    <form role="form" class="register-form cf-style-1" method="post" enctype="multipart/form-data">
                        <div class="field-row">
                            <label for="nam">name</label>
                            <input type="text" class="le-input" name="nm"  value="<?php if (isset($_POST['nm'])) echo $_POST['nm']; ?>">
                            <span id="nam"></span>
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <label for="em">Email</label>
                            <input type="email" class="le-input" name="em" value="<?php if (isset($_POST['em'])) echo $_POST['em']; ?>">
                            <span id="imag2" style="display: none">
                                <img src="assets/images/not-done.png">
                                <span style="color: red">Not Available</span>
                            </span>
                            <span id="imag" style="display: none">
                                <img src="assets/images/available.png">
                                <span style="color: green">Available</span>
                            </span>


                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <label for="pass1">Password</label>
                            <input type="text" class="le-input" name="pass1" id="pass1" autocomplete="off">

                            <div class="progress" style="display: none;">
                                <div class="progress-bar" role="progressbar"></div>
                                <span id="pas1"></span>
                            </div>
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <label for="pass2">Re-type Password</label>
                            <input type="text" class="le-input" name="pass2" id="pass2" autocomplete="off">
                            <span id="pas2"></span>
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <label for="cnt">Country</label>
                            <select id="cnt" name="cntid" class="form-control">
                                <option value="0">Choose Country</option>
                                <?php
                                $allCnt = $d->view("country", "*", array("name", "asc"));
                                while ($cnt = $allCnt->fetch_object()) {
                                    if (isset($_POST['cntid']) && $_POST['cntid'] == $cnt->id) {

                                        echo "<option selected value='$cnt->id'>$cnt->name</option>";
                                    } else {
                                        echo "<option value='$cnt->id'>$cnt->name</option>";
                                    }
                                }
                                ?>
                            </select>
                            <span id="cunt"></span>
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <label for="ct">city</label>
                            <select id="ct" name="cityid" class="form-control">
                                <option value="0">Choose a Country first</option>
                                <?php
                                if (isset($_POST['cityid']) && $_POST['cntid'] > 0) {
                                    $allCt = $d->view("city", "*", array("name", "asc"), array("countryid" => $_POST['cntid']));

                                    while ($ct = $allCt->fetch_object()) {
                                        if ($ct->id == $_POST['cityid']) {
                                            echo "<option selected value='$ct->id'>$ct->name</option>";
                                        } else {
                                            echo "<option value='$ct->id'>$ct->name</option>";
                                        }
                                    }
                                } else {
                                    echo "<option value='0'>$ct->Choose a country First</option>";
                                }
                                ?>
                            </select>
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <label for="add">Address</label>
                            <input type="text" class="le-input"  name="addr" value="<?php if (isset($_POST['addr'])) echo $_POST['addr']; ?>">
                            <span id="add"></span>
                        </div><!-- /.field-row -->

                        <div>
                            <label>Gender</label>
                            <input type="radio" name="gen" value="1"> Male
                            <input type="radio" name="gen" value="2"> Female
                        </div><br><!-- /.field-row -->

                        <div>
                            <label for="dob">Date of birth</label>
                            <input type="date" class="le-input" name="birth"  value="<?php if (isset($_POST['birth'])) echo $_POST['birth']; ?>">
                            <span id="dob"></span>
                        </div><br><!-- /.field-row -->

                        <div class="field-row">
                            <label for="con">Contact</label>
                            <input type="text" class="le-input" name="con" value="<?php if (isset($_POST['birth'])) echo $_POST['con']; ?>">
                            <span id="con"></span>
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <label for="pic">Picture</label>
                            <input type="file" class="le-input" name="pic1" id="pic">
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
                            <input type="submit" class="le-button huge" name="register" value="Sign Up">
                        </div><!-- /.buttons-holder -->
                    </form>
                    <p>All ready have an accoount? <a href="index.php?f=login">Click here.</a></p>
                    <h2 class="semi-bold">Sign up today and you'll be able to :</h2>

                    <ul class="list-unstyled list-benefits">
                        <li><i class="fa fa-check primary-color"></i> Speed your way through the checkout</li>
                        <li><i class="fa fa-check primary-color"></i> Track your orders easily</li>
                        <li><i class="fa fa-check primary-color"></i> Keep a record of all your purchases</li>
                    </ul>

                </section><!-- /.register -->

            </div><!-- /.col -->

        </div><!-- /.row -->
    </div><!-- /.container -->

</main><!-- /.authentication -->
<?php
$allCnt = $d->view("country", "*", array("name", "asc"));
?>
<script>

    function validateEmail(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email.toLowerCase());
    }

    $(document).ready(function() {
        $("#pass1").focus(function() {
            $(".progress").show();
        });
        $("#pass1").blur(function() {
            $(".progress").hide();
        });
        $("#pass1").keyup(function() {
            var score = 0;
            var p = $(this).val();
            if (p.length > 8) {
                score++;
            }
            if (p.match(/[a-z]/) && p.match(/[A-Z]/)) {
                score++;
            }
            if (p.match(/[!,@,#,$,&,%,^]/)) {
                score++;
            }
            if (p.match(/[0-9]/)) {
                score++;
            }

            $(".progress-bar").removeClass("progress-bar-danger progress-bar-warning progress-bar-info progress-bar-success");
            $(".progress-bar").css({"width": "0%"});
            $(".progress-bar").text("");
            if (score == 1) {
                $(".progress-bar").addClass("progress-bar-danger");
                $(".progress-bar").css({"width": "25%"});
                $(".progress-bar").text("Very Weak");
            } else if (score == 2) {
                $(".progress-bar").addClass("progress-bar-warning");
                $(".progress-bar").css({"width": "50%"});
                $(".progress-bar").text("Weak");
            } else if (score == 3) {
                $(".progress-bar").addClass("progress-bar-info");
                $(".progress-bar").css({"width": "75%"});
                $(".progress-bar").text("Average");
            } else if (score == 4) {
                $(".progress-bar").addClass("progress-bar-success");
                $(".progress-bar").css({"width": "100%"});
                $(".progress-bar").text("Strong");
            }
        });
       //email validation//     
        $("input[name='em']").blur(function() {
            if (validateEmail($(this).val())) {
                $.ajax({
                    type: "GET",
                    data: {
                        "email": $(this).val()
                    },
                    url: "ajax/avaiable.php",
                    success: function(result) {
                        if (result == 100) {
                            $("#imag").hide()
                            $("#imag2").show()
                            //$("#ava").text("Not available");
                            //$("#ava").css({"color": "red"});
                            //$("#imag").css({"display": "none"});
                            //$("#imag2").css({"display": ""});
                            $("input[name='em']").css({"border": "1px solid red"});
                        } else {
                            $("#imag2").hide()
                            $("#imag").show()
                            // $("#ava").text("Available");
                            // $("#ava").css({"color": "green"});
                            // $("#imag2").css({"display": "none"});
                            // $("#imag").css({"display": ""});
                            $("input[name='em']").css({"border": "1px solid green"});
                        }
                    }
                });
            } else {
                $("#imag2").hide()
                $("#imag").hide()
                $("#ava").text("");
            }
        });
  
        $("input[name='nm']").keyup(function() {
            var err = 0;
            if ($("input[name='nm']").val() == "") {
                err++;
                $("input[name='nm']").css({"border": "1px solid red"});
                $("#nam").text("Name Requerd").css({"color": "red"});

            } else {
                $("input[name='nm']").css({"border": "1px solid green"});
                $("#nam").text("");
            }
        });

        $("input[name='addr']").keyup(function() {
            var err = 0;
            if ($("input[name='addr']").val() == "") {
                err++;
                $("input[name='addr']").css({"border": "1px solid red"});
                $("#add").text("Address Requerd").css({"color": "red"});

            } else {
                $("input[name='addr']").css({"border": "1px solid green"});
                $("#add").text("");
            }
        });

        $("input[name='pass1']").keyup(function() {
            var err = 0;
            if ($("input[name='pass1']").val() == "") {
                err++;
                $("input[name='pass1']").css({"border": "1px solid red"});
                $("#pas1").text("Password Requerd").css({"color": "red"});

            } else {
                $("input[name='pass1']").css({"border": "1px solid green"});
                $("#pas1").text("");
            }
        });

        $("input[name='pass2']").keyup(function() {
            var err = 0;
            if ($("input[name='pass1']").val() != $("input[name='pass2']").val()) {
                err++;
                $("input[name='pass2']").css({"border": "1px solid red"});
                $("#pas2").text("Password  Not Match").css({"color": "red"});
                if ($("input[name='pass2']").val() == "") {
                    $("#pas1").text("");
                }

            } else {
                $("input[name='pass2']").css({"border": "1px solid green"});
                $("#pas2").text("Password Match").css({"color": "green"});
                if ($("input[name='pass2']").val() == "") {
                    $("#pas2").text("");
                }
            }

        });


        $("input[name='pass1']").keyup(function() {
            if ($("input[name='pass2']").val() != "") {
                var err = 0;
                if ($("input[name='pass1']").val() != $("input[name='pass2']").val()) {
                    err++;
                    $("input[name='pass2']").css({"border": "1px solid red"});
                    $("#pas2").text("Password  Not Match").css({"color": "red"});
                }
                else if ($("input[name='pass1']").val() == $("input[name='pass2']").val()) {
                    $("input[name='pass2']").css({"border": "1px solid green"});
                    $("#pas2").text("Password Match").css({"color": "green"});
                }
            }
        });


        $("input[name='con']").keyup(function() {
            var err = 0;
            if ($("input[name='con']").val() == "") {
                err++;
                $("input[name='con']").css({"border": "1px solid red"});
                $("#con").text("Contact Requerd").css({"color": "red"});

            } else {
                $("input[name='con']").css({"border": "1px solid green"});
                $("#con").text("");
            }
        });

        $("input[name='birth']").blur(function() {
            var err = 0;
            if ($("input[name='birth']").val() == "") {
                err++;
                $("input[name='birth']").css({"border": "1px solid red"});
                $("#dob").text("Date Requerd").css({"color": "red"});

            } else {
                $("input[name='birth']").css({"border": "1px solid green"});
                $("#dob").text("");
            }
        });




        $("body").on("click", "input[name='register']", function() {
            var err = 0;
            if ($("input[name='nm']").val() == "") {
                err++;
                $("input[name='nm']").css({"border": "1px solid red"});

            } else {
                $("input[name='nm']").css({"border": "1px solid green"});
            }



            if ($("input[name='em']").val() == "") {
                err++;
                $("input[name='em']").css({"border": "1px solid red"});

            } else if (!validateEmail($("input[name='em']").val())) {
                err++;
                $("input[name='em']").css({"border": "1px solid red"});
            } else {
                $("input[name='em']").css({"border": "1px solid green"});
            }

            if ($("input[name='pass1']").val() == "") {
                err++;
                $("input[name='pass1']").css({"border": "1px solid red"});

            } else {
                $("input[name='pass1']").css({"border": "1px solid green"});
            }

            if ($("input[name='pass2']").val() == "") {
                err++;
                $("input[name='pass2']").css({"border": "1px solid red"});

            } else {
                $("input[name='pass2']").css({"border": "1px solid green"});
            }


            if ($("input[name='cntid']").val() == "") {
                err++;
                $("input[name='cntid']").css({"border": "1px solid red"});

            } else {
                $("input[name='cntid']").css({"border": "1px solid green"});
            }

            if ($("input[name='addr']").val() == "") {
                err++;
                $("input[name='addr']").css({"border": "1px solid red"});

            } else {
                $("input[name='addr']").css({"border": "1px solid green"});
            }

            if ($("input[name='con']").val() == "") {
                err++;
                $("input[name='con']").css({"border": "1px solid red"});

            } else {
                $("input[name='con']").css({"border": "1px solid green"});
            }

            if ($("input[name='birth']").val() == "") {
                err++;
                $("input[name='birth']").css({"border": "1px solid red"});

            } else {
                $("input[name='birth']").css({"border": "1px solid green"});
            }

            if ($("input[name='gen']").val() == "") {
                err++;
                $("input[name='gen']").css({"border": "1px solid red"});

            } else {
                $("input[name='gen']").css({"border": "1px solid green"});
            }


            if (err > 0) {
                alert("Value Missing in requerd field");
                return false;
            }
        });


        $("select[name='cntid']").change(function() {
            $("select[name='cityid']").html("");
            var cnt = $(this).val();

            if (cnt == 0) {
                $("select[name='cityid']").append("<option value='0'>Choose Country First<option>");
            }
<?php
while ($cnt = $allCnt->fetch_object()) {
    echo "else if (cnt == $cnt->id) {";
    $allCt = $d->view("city", "*", array("name", "asc"), array("countryid" => $cnt->id));
    while ($ct = $allCt->fetch_object()) {
        echo "$(\"select[name='cityid']\").append(\"<option value='$ct->id'>$ct->name</option>\");";
    }
    echo "}";
}
?>
        });
    });

</script>

<?php
if (!isset($title)) {
    header("Location: index.html");
}
$d = new Database();
if (isset($_POST['change'])) {
    $msg = "";


    if ($_POST['pass1'] == "") {
        $msg .= "Old Required<br />";
    } else if ($_POST['pass2'] == "") {
        $msg .= "New Password Required<br />";
    } else if ($_POST['pass3'] == "") {
        $msg .= "Re-type Password Required<br />";
    } else if ($_POST['pass2'] != $_POST['pass3']) {
        $msg .= "Password not match<br />";
    } else if (strlen($_POST['pass2']) < 5) {
        $msg .= "Password too small<br />";
    }
    if ($msg == "") {
        $where = array(
            "password" => md5($_POST['pass1'])
        );

        $result = $d->view("customer", "*", "", $where);

        if ($result->num_rows > 0) {
            while ($value = $result->fetch_object()) {
                if ($value->password) {
                    $where = array(
                        "password" => md5($_POST['pass2'])
                    );

                    $p = $d->update("customer", $where, array("id" => $_SESSION['id']));
                    Redirect("index.php?u=profile");
                }
            }
        } else {
            echo "Invalid email or password";
        }
    } else {
        echo $msg;
    }
}
?>
<script>
    $("input[name='pass2']").keyup(function () {
        alert("OK")
    });
</script>
<main id="authentication" class="inner-bottom-md">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <section class="section sign-in inner-right-xs">
                    <h2 class="bordered">Change Password</h2>
                    <p>Hello, Welcome to your account</p>
                    <form role="form" class="login-form cf-style-1" method="post">
                        <div class="field-row">
                            <label for="pass1">Old Password</label>
                            <input type="text" class="le-input" name="pass1" id="pass1">
                            <span id="pas1"></span>
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <label for="pass2">New Password</label>
                            <input type="text" class="le-input" name="pass2" id="pass2">
                            <div class="progress" style="display: none;">
                                <div class="progress-bar" role="progressbar"></div>
                                <span id="pas2"></span>
                            </div>
                        </div><!-- /.field-row -->

                        <div class="field-row">
                            <label for="pass3">Re-type Password</label>
                            <input type="text" class="le-input" name="pass3" id="pass3">
                            <span id="pas3"></span>
                        </div><!-- /.field-row -->
                        <div class="buttons-holder">
                            <input type="submit" class="le-button huge" name="change" value="Change">
                        </div><!-- /.buttons-holder -->
                    </form><!-- /.cf-style-1 -->
                </section><!-- /.sign-in -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</main>
<script>

    $(document).ready(function () {

        $("#pass2").focus(function () {
            $(".progress").show();
        });
        $("#pass2").blur(function () {
            $(".progress").hide();
        });
        $("#pass2").keyup(function () {
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
        $("input[name='pass1']").keyup(function () {
            var err = 0;
            if ($("input[name='pass1']").val() == "") {
                err++;
                $("input[name='pass1']").css({"border": "1px solid red"});
                $("#pas1").text("Old Password Requerd").css({"color": "red"});

            } else {
                $("input[name='pass1']").css({"border": "1px solid green"});
                $("#pas2").text("");
            }
        });

        $("input[name='pass2']").keyup(function () {
            var err = 0;
            if ($("input[name='pass2']").val() == "") {
                err++;
                $("input[name='pass2']").css({"border": "1px solid red"});
                $("#pas2").text("Password Requerd").css({"color": "red"});

            } else {
                $("input[name='pass2']").css({"border": "1px solid green"});
                $("#pas2").text("");
            }
        });





        $("input[name='pass3']").keyup(function () {
            var err = 0;
            if ($("input[name='pass2']").val() != $("input[name='pass3']").val()) {
                err++;
                $("input[name='pass3']").css({"border": "1px solid red"});
                $("#pas3").text("Password  Not Match").css({"color": "red"});
                if ($("input[name='pass3']").val() == "") {
                    $("#pas2").text("");
                }

            } else {
                $("input[name='pass3']").css({"border": "1px solid green"});
                $("#pas3").text("Password Match").css({"color": "green"});
                if ($("input[name='pass3']").val() == "") {
                    $("#pas3").text("");
                }
            }

        });


        $("input[name='pass2']").keyup(function () {
            if ($("input[name='pass3']").val() != "") {
                var err = 0;
                if ($("input[name='pass2']").val() != $("input[name='pass3']").val()) {
                    err++;
                    $("input[name='pass3']").css({"border": "1px solid red"});
                    $("#pas3").text("Password  Not Match").css({"color": "red"});
                } else if ($("input[name='pass2']").val() == $("input[name='pass3']").val()) {
                    $("input[name='pass3']").css({"border": "1px solid green"});
                    $("#pas3").text("Password Match").css({"color": "green"});
                }
            }
        });

        $("body").on("click", "input[name='change']", function () {
            var err = 0;

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

            if ($("input[name='pass3']").val() == "") {
                err++;
                $("input[name='pass3']").css({"border": "1px solid red"});

            } else {
                $("input[name='pass3']").css({"border": "1px solid green"});
            }

            if (err > 0) {
                alert("Value Missing in requerd field");
                return false;
            }
        });

    });
</script> 
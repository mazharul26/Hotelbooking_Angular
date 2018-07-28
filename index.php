<?php
session_start();
?>

<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE php>
<html lang="en" ng-app="mainApp" >
    <head>
        <title> Hotel Category </title>
        <!-- custom-theme -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/php; charset=utf-8" />
        <meta name="keywords" content="Mug house Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
            function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- //custom-theme -->
        <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />   
        <!-- js -->





        <script type="text/javascript" src="assets/js/jquery-2.1.4.min.js"></script>

        <!---new----->
      
<!--        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />-->

        <!---new----->

        <script src="assets/js/angular.min.js"></script>
        <script src="assets/js/angular-route.js"></script>
        <script src="controllers/masterController.js"></script>
        <script src="controllers/lonincontroller.js"></script>
        <script src="controllers/countryController.js"></script>
        <script src="controllers/categoryController.js"></script>
        <script src="controllers/regController.js"></script>
        <script src="controllers/employeeController.js"></script>
        <script src="controllers/paymentController.js"></script>
        <script src="controllers/roomController.js"></script>
        <script src="controllers/homeController.js"></script>
        <script src="controllers/detailsController.js"></script>
        <script src="controllers/roomcheckout-controller.js"></script>
        <!-- //js -->
        <!-- font-awesome-icons -->
        <link href="assets/css/font-awesome.css" rel="stylesheet"> 
        <!-- tabs -->
        <link href="assets/css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
        <!-- //tabs -->
        <!-- //font-awesome-icons -->
        <link href="//assets.fonts.googleapis.com/css?family=Prompt:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext,thai,vietnamese" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
    </head>
    <body ng-controller="mainCtrl">
        <!-- banner -->
        <div class="banner">
            <div class="header-bottom">
                <div class="header">
                    <div class="container">
                        <div class="w3_agile_logo">
                            <h1><a href="index.php"><span>Mug</span>house</a></h1>
                        </div>
                        <div class="header-nav">
                            <nav class="navbar navbar-default">
                                <div class="navbar-header navbar-left">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                                    <nav class="link-effect-12">
                                        <ul class="nav navbar-nav w3_agile_nav">






                                            <li class="active"><a href="#!"><span>Home</span></a></li>
                                            <li><a href="#!profile" ng-show="manus"><span>Profile</span></a></li>


<!--<li><a href="#!message"><span>Message</span></a></li> --->

 <!---     <li><a href="#!country" ng-show="manus"><span>Country</span></a></li>
 
 
 
 ---->



                                            <li class="dropdown">
                                                <a href="" class="dropdown-toggle"ng-show="manus" data-toggle="dropdown"><span data-hover="Short Codes">Short Codes</span> <b class="caret"></b></a>
                                                <ul class="dropdown-menu agile_short_dropdown">
                                                    <li><a href="#!category" ng-show="manus">Category</a></li>
                                                    <li><a href="#!payment" ng-show="manus">Payment</a></li>
                                                    <li><a href="#!contact" ng-show="manus"><span>Contact</span></a></li>
                                                    <li><a href="#!icon" ng-show="manus">Web Icons</a></li>
                                                    <li><a href="#!typography" ng-show="manus">Typography</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#!login" ng-hide="manus" ><span>Login</span></a></li>

                                            <li><a href="#!room" ng-show="manus"><span>Room</span></a></li>
                                            <li><a href="#!registration" ng-hide="manus"><span>Registration</span></a></li>
                                            <li><a href="#!employee" ng-hide="manus"><span>Employee</span></a></li>


                                            <li><a href="#!logout" ng-show="manus" ng-click="logout()"><span>LogOut</span></a></li>
                                            <li class="nav-item" ng-hide="menus">
                                                <a href="#!roomcheckout" class="nav-link">Checkout({{Cart}})</a>
                                            </li>

                                        </ul>	
                                    </nav>  
                                </div>
                            </nav>
                        </div>





                        <div class="clearfix"> </div>
                    </div>
                </div>
                <!-- header -->
                <!-- w3-banner -->
                <div class="w3-banner">
                    <div id="typer"></div>
                    <div class="top-banner-right">
                        <ul>
                            <li><a class="facebook" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a class="facebook" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a class="facebook" href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                            <li><a class="facebook" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>	
                </div>
                <!-- //w3-banner -->
            </div>
        </div>
        <!-- //banner -->
        <div ng-view=""></div>
        <!-- welcome -->

        <!-- footer -->
        <div class="w3-agile-footer">
            <div class="container">
                <div class="footer-grids">
                    <div class="col-md-3 footer-grid">
                        <div class="footer-grid-heading">
                            <h4>Address</h4>
                        </div>
                        <div class="footer-grid-info">
                            <p>Eiusmod Tempor inc
                                <span>St Dolore Place,Kingsport 56777.</span>
                            </p>
                            <p class="phone">Phone : +1 123 456 789
                                <span>Email : <a href="mailto:example@email.com">mail@example.com</a></span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 footer-grid">
                        <div class="footer-grid-heading">
                            <h4>Navigation</h4>
                        </div>
                        <div class="footer-grid-info">
                            <ul>
                                <li><a href="about.php">About</a></li>
                                <li><a href="gallery.php">Gallery</a></li>
                                <li><a href="icons.php">Icons</a></li>
                                <li><a href="typography.php">Typography</a></li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 footer-grid">
                        <div class="footer-grid-heading">
                            <h4>Latest Posts</h4>
                        </div>
                        <div class="w3agile_footer_grid_list">
                            <ul>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> Vestibulum ante ipsum</li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> Phasellus at eros</li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> Mauris eleifend aliquet</li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> Aliquam vitae tristique</li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> Pellentesque lobortis</li>
                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> Class aptent taciti</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 footer-grid">
                        <div class="footer-grid-heading">
                            <h4>Twitter Posts</h4>
                        </div>
                        <div class="w3agile_footer_grid_list w3agile-post">
                            <ul>
                                <li>Ut aut reiciendis voluptatibus <a href="#">http://example.com</a> alias, ut aut.
                                    <span><i class="fa fa-twitter" aria-hidden="true"></i> 02 days ago</span></li>
                                <li>Itaque earum rerum hic tenetur a sapiente <a href="#">http://example.com</a> ut aut.
                                    <span><i class="fa fa-twitter" aria-hidden="true"></i> 03 days ago</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="agileits-w3layouts-copyright">
                    <p>© 2017 Mug house . All Rights Reserved | Design by <a href="http://w3layouts.com/"> W3layouts</a> </p>
                </div>
            </div>
        </div>
        <!-- //footer -->
        <!-- start-smooth-scrolling -->
        <script type="text/javascript" src="assets/js/move-top.js"></script>
        <script type="text/javascript" src="assets/js/easing.js"></script>
        <script type="text/javascript">
                                                            jQuery(document).ready(function ($) {
                                                                $(".scroll").click(function (event) {
                                                                    event.preventDefault();
                                                                    $('php,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
                                                                });
                                                            });
        </script>
        <!-- start-smooth-scrolling -->
        <!-- for bootstrap working -->
        <script src="assets/js/bootstrap.js"></script>
        <!-- //for bootstrap working -->
        <!-- here stars scrolling icon -->
        <script type="text/javascript">
                                                            $(document).ready(function () {
                                                                /*
                                                                 var defaults = {
                                                                 containerID: 'toTop', // fading element id
                                                                 containerHoverID: 'toTopHover', // fading element hover id
                                                                 scrollSpeed: 1200,
                                                                 easingType: 'linear' 
                                                                 };
                                                                 */

                                                                $().UItoTop({easingType: 'easeOutQuart'});

                                                            });
        </script>
        <!-- //here ends scrolling icon -->
        <script src='assets/js/jquery.typer.js'></script>
        <script>
                                                            var win = $(window),
                                                                    foo = $('#typer');

                                                            foo.typer(['Luxury Hotels', 'Hotels & Resorts', 'Luxury Resorts']);

                                                            // unneeded...
                                                            win.resize(function () {
                                                                var fontSize = Math.min(Math.min(win.width() / (1 * 10), parseFloat(Number.POSITIVE_INFINITY)), parseFloat(Number.NEGATIVE_INFINITY));

                                                                foo.css({
                                                                    fontSize: fontSize * .8 + 'px'
                                                                });
                                                            }).resize();
        </script>
        <!--tabs-->
        <script src="js/easy-responsive-tabs.js"></script>
        <script>
                                                            $(document).ready(function () {
                                                                $('#horizontalTab').easyResponsiveTabs({
                                                                    type: 'default', //Types: default, vertical, accordion           
                                                                    width: 'auto', //auto or any width like 600px
                                                                    fit: true, // 100% fit in a container
                                                                    closed: 'accordion', // Start closed if in accordion view
                                                                    activate: function (event) { // Callback function if tab is switched
                                                                        var $tab = $(this);
                                                                        var $info = $('#tabInfo');
                                                                        var $name = $('span', $info);
                                                                        $name.text($tab.text());
                                                                        $info.show();
                                                                    }
                                                                });
                                                                $('#verticalTab').easyResponsiveTabs({
                                                                    type: 'vertical',
                                                                    width: 'auto',
                                                                    fit: true
                                                                });
                                                            });
        </script>
        <!--//tabs-->
    </body>
</php>



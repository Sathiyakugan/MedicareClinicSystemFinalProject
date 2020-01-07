<<<<<<< HEAD

<?php
session_start();
require 'connect_db.php';
//if(isset($_SESSION['user_username'])){
//    header("location:home.php");
//}
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Pannel</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<body>

<div class="header">
    <h1><p class="text-center">Log in to FamilyCare Clinic System <i class="fa fa-user-md fa-1x"></i> </p></h1>
</div>
<div class="col-md-4 col-md-offset-4">
<?php
if ( isset($_SESSION['message'])){
    echo '<div class="alert alert-danger"><strong>Invalid Login!</strong>'.$_SESSION['message'].'</div>';
    unset($_SESSION['message']);
}
?>
</div>

<div class="container">
    <div class="col-md-4 col-md-offset-4">
        <form class="form-signin" method="post" action="components/login-process.php" name="login" >
            <h2 class="form-signin-heading">Please sign in</h2>
            <label for='usr'  class="sr-only">Username</label>
            <input type="text" id="inputEmail" name="username" class="form-control" placeholder="Username"   required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
            <p><label>Select User Type </label>
                <select class="form-control" name="postition">
                    <option>Admin</option>
                    <option>Patient</option>
                    <option>Doctor</option>
                    <option>Receptionist</option>
                    <option>Pharmasist</option>
                    <option>Nurse</option>
                </select></p>
            <button type="submit" class="btn btn btn-primary ladda-button" data-style="zoom-in" value="Sign In" name="login">
                Log In
            </button>
        </form>
    </div>
</div> <!-- /container -->




<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="vendor/raphael/raphael.min.js"></script>
<script src="vendor/morrisjs/morris.min.js"></script>
<script src="data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>

</body>

</html>
=======
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <title>Medical Care</title>


    <link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
    <!-- <link href='http://fonts.googleapis.com/css?family=Pontano+Sans' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Alegreya+Sans:300,400,500,700' rel='stylesheet' type='text/css'> -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400,500,600' rel='stylesheet' type='text/css'>


    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl.theme.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl.transitions.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300' rel='stylesheet' type='text/css'>


</head>

<body>
<div class= "navs">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand logo" href="#">
                    <span><i class="fa fa-stethoscope"></i></span>
                    HealthCare
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="contact.html">Contact Us</a></li>
                </ul>
            </div><!-- navbar-collapse -->
        </div><!-- container-fluid -->
    </nav>
</div>



<section id= "testimonial" class="text-center">
    <div class="testimonial-wrapper">
        <div class="container">
            <div class="row client-content text-center">
                <div class="col-md-8">
                    <div class="row">
                        <h1>Testimonial</h1>
                    </div>
                    <div class="row">
                        <div class="sub-headline">
                            <p> <h2>Health Quotes</h2></p>
                        </div>
                    </div>

                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">


                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <div id="client-speech">
                                    <div class="item">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <i class="fa fa-quote-left"></i>
                                            </div>
                                            <div class="col-md-8 col-md-offset-2">
                                                <p class="client-comment text-center">
                                                    " Top 15 Things Money Can’t Buy
                                                    Time. Happiness. Inner Peace. Integrity. Love. Character. Manners. Health. Respect. Morals. Trust. Patience. Class. Common sense. Dignity.”
                                                </p>
                                            </div>
                                            <div class="col-md-12">
                                                <i class="fa fa-quote-right"></i>
                                            </div>
                                            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3">
                                                <img class="img-circle img-responsive center-block" src="assets/img/client1.jpg" alt="Image">
                                            </div>
                                        </div>
                                        <div class= "row text-center">
                                            <p class="client-name text-center">Markus Herz</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div id="client-speech">
                                    <div class="item">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <i class="fa fa-quote-left"></i>
                                            </div>
                                            <div class="col-md-8 col-md-offset-2">
                                                <p class="client-comment text-center">
                                                    “Let food be thy medicine and medicine be thy food.”
                                                </p>
                                            </div>
                                            <div class="col-md-12">
                                                <i class="fa fa-quote-right"></i>
                                            </div>
                                            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3">
                                                <img class="img-circle img-responsive center-block" src="assets/img/client3.jpg" alt="Image">
                                            </div>
                                        </div>
                                        <div class= "row text-center">
                                            <p class="client-name text-center">Hippocrates </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div id="client-speech">
                                    <div class="item">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <i class="fa fa-quote-left"></i>
                                            </div>
                                            <div class="col-md-8 col-md-offset-2">
                                                <p class="client-comment text-center">
                                                    “The individual who says it is not possible should move out of the way of those doing it.”
                                                </p>
                                            </div>
                                            <div class="col-md-12">
                                                <i class="fa fa-quote-right"></i>
                                            </div>
                                            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3">
                                                <img class="img-circle img-responsive center-block" src="assets/img/client4.jpg" alt="Image">
                                            </div>
                                        </div>
                                        <div class= "row text-center">
                                            <p class="client-name text-center">Tricia Cunningham</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <i class="fa fa-angle-left fa-3x"></i>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <i class="fa fa-angle-right fa-3x"></i>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                    <h1> <style> animateColor </style> Hospital System</h1>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class= "appointment">

                        <div class="header text-center">
                            <h2>Log in to system</h2>
                        </div>

                        <!-- form of appointment -->
                        <div class="row">
                            <form class="form-signin" method="post" action="components/login-process.php" name="login" >

                                <div class="input-group margin-bottom-sm col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                                    <input class="form-control" type="text" name="username" placeholder="User Name *" required autofocus>
                                </div>
                                <div class="input-group margin-bottom-sm col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                                    <input class="form-control" type="password"name="password" placeholder="Password  *" required autofocus>
                                </div>

                                <div class="input-group margin-bottom-sm col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                                    <select class="form-control" name="postition"  required autofocus>
                                        <option selected > Admin</option>

                                        <option>Patient</option>
                                        <option>Doctor</option>
                                        <option>Receptionist</option>
                                        <option>Pharmasist</option>
                                        <option>Nurse</option>
                                    </select>
                                </div>
                                <div class="input-group margin-bottom-sm col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">

                                    <button type="submit" class="btn btn btn-primary ladda-button form-control" data-style="zoom-in" value="Sign In" name="login">
                                        Log In
                                    </button>

                                </div>
                            </form>
                        </div>
                        <!-- end of form -->
                    </div><!-- end of appointment-->
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <?php
                            if ( isset($_SESSION['message'])){
                                echo '<div class="alert alert-danger">'.$_SESSION['message'].'</div>';
                                unset($_SESSION['message']);
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div> <!--  client-content  -->
        </div>
    </div>
</section>	<!-- testimonial -->

</div>
</body>

<section id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <ul class="text-center contact">
                    <li class= "socials-icons">
                        <a href="#" data-toggle="tooltip" title="Share in Facebook" class="facebook"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li class= "socials-icons">
                        <a href="#" data-toggle="tooltip" title="Share in Twitter" class="twitter"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li class= "socials-icons">
                        <a href="#" data-toggle="tooltip" title="Share in Google +" class="google-plus"><i class="fa fa-google-plus"></i></a>
                    </li>
                    <li class= "socials-icons">
                        <a href="#" data-toggle="tooltip" title="Share in Instagram" class="instagram"><i class="fa fa-instagram"></i></a>
                    </li>

                    <li class= "socials-icons">
                        <a href="#" data-toggle="tooltip" title="Connect with Skype" class="skype"><i class="fa fa-skype"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="copy-right-text text-center">
                    Copyright 2017 © illusion. All Rights Reserved.
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="assets/js/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="assets/js/wow.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>


<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="vendor/raphael/raphael.min.js"></script>
<script src="vendor/morrisjs/morris.min.js"></script>
<script src="data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>


<script>
    new WOW().init();
</script>

<script>
    $(document).ready(function() {
        $("#starting-slider").owlCarousel({
            autoPlay: 3000,
            navigation : false, // Show next and prev buttons
            slideSpeed : 700,
            paginationSpeed : 1000,
            singleItem:true
        });
    });
</script>


<script>
    $( function() {
        // init Isotope
        var $container = $('.isotope').isotope
        ({
            itemSelector: '.element-item',
            layoutMode: 'fitRows'
        });


        // bind filter button click
        $('#filters').on( 'click', 'button', function()
        {
            var filterValue = $( this ).attr('data-filter');
            // use filterFn if matches value
            $container.isotope({ filter: filterValue });
        });

        // change is-checked class on buttons
        $('.button-group').each( function( i, buttonGroup )
        {
            var $buttonGroup = $( buttonGroup );
            $buttonGroup.on( 'click', 'button', function()
            {
                $buttonGroup.find('.is-checked').removeClass('is-checked');
                $( this ).addClass('is-checked');
            });
        });

    });
</script>

</body>
</html>
>>>>>>> 67d08a6c063055685503fcdd53b5b9b9317562ad

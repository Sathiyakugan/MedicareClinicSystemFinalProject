
<?php
session_start();
require 'connect_db.php';
if(isset($_SESSION['user_username'])){
    header("location:home.php");
}
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

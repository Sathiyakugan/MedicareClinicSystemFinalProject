<?php
session_start();

include "../Adaptor/mysql_crud.php";
include "../UserClasses/User.php";
include ("../UserClasses/Doctor.php");

if(isset($_SESSION['login'])){

    $current_user= (string)$_SESSION['current_user'];
    $_SESSION['username']=$current_user;
    $doctor=new Doctor($current_user);
}else{
    header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include '../controllers/base/meta-tags.php' ?>
    <title>Doctor Pannel</title>
    <?php include '../controllers/base/head.php' ?>
    <link href="../style/main.css" rel="stylesheet">

</head>

<body onload="set_noti();">


<div id="wrapper">
    <!-- Navigation -->
    <?php include 'Doctor_Theme.php' ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">

                <h1 class="page-header">Dashboard</h1>

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="profile">
                    <center>
                        <img src="../userfiles/avatars/<?php echo $doctor->getUserImage();?>" class="img-responsive profile-avatar">
                    </center>
                    <h1 class="text-center profile-text profile-name"><?php echo $doctor->getFirstName();?> <?php echo $doctor->getLastName();?></h1>
                    <hr>
                    <h2 class="text-center profile-text profile-profession"><?php echo $doctor->getField();?></h2>
                    <br>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3 col-lg-3 hidden-xs hidden-sm">
                        <div class="profile">
                            <center>
                                <img src="../userfiles/avatars/<?php echo $doctor->getUserImage();?>" class="img-responsive profile-avatar">
                            </center>
                            <h1 class="text-center profile-text profile-name"><?php echo $doctor->getFirstName();?> <?php echo $doctor->getLastName();?></h1>
                            <hr>
                            <h2 class="text-center profile-text profile-profession"><?php echo $doctor->getField();?></h2>
                            <br>
                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 hidden-md hidden-lg">
                        <img class="img-circle"
                             src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=50"
                             alt="User Pic">
                    </div>
                    <div class="col-xs-10 col-sm-10 hidden-md hidden-lg">
                        <strong>Cyruxx</strong><br>
                        <dl>
                            <dt>User level:</dt>
                            <dd>Administrator</dd>
                            <dt>Registered since:</dt>
                            <dd>11/12/2013</dd>
                            <dt>Topics</dt>
                            <dd>15</dd>
                            <dt>Warnings</dt>
                            <dd>0</dd>
                        </dl>
                    </div>
                    <div class=" col-md-9 col-lg-9 hidden-xs hidden-sm">
                        <strong>Cyruxx</strong><br>
                        <table class="table table-user-information">
                            <tbody>
                            <tr>
                                <td>User level:</td>
                                <td>Administrator</td>
                            </tr>
                            <tr>
                                <td>Registered since:</td>
                                <td>11/12/2013</td>
                            </tr>
                            <tr>
                                <td>Topics</td>
                                <td>15</td>
                            </tr>
                            <tr>
                                <td>Warnings</td>
                                <td>0</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Modal -->
<!-- MODAL EDITAR-->
<div id="editarUsuario" class="modal fade modal" role="dialog">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">


            </div>
        </div>
    </div>
</div>


<span id="test1"></span>
<!--<span id="time_stamp" class="pull-right text-muted small" >2017-07-03 05:20:00</span>-->
<?php include '../controllers/base/AfterBodyJS.php' ?>




<script>
    $('.modalEditarUsuario').click(function(){
        var ID=$(this).attr('data-a');
        $.ajax({url:""+ID,cache:false,success:function(result){
            $(".modal-content").html(result);
        }});
    });
</script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>



<?php include 'js.php' ?>

</body>

</html>

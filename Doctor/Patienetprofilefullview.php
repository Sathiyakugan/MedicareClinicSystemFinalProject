<?php
session_start();

include "../Adaptor/mysql_crud.php";
include "../UserClasses/User.php";
include ("../UserClasses/Doctor.php");
include ("../UserClasses/Patient.php");
if(isset($_SESSION['login'])){

    $current_user= (string)$_SESSION['current_user'];
    $_SESSION['username']=$current_user;
    $doctor=new Doctor($current_user);
    $patient=new Patient($_REQUEST['username']);
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
        <div class="panel panel-default">
            <div class="panel-heading">
                Full Profile
            </div>
            <div class="panel-body">
                <div class="col-sm-12">
            <div class="col-md-4">
                <div class="profile">
                    <center>
                        <img src="../userfiles/avatars/<?php echo $patient->getUserImage();?>" class="img-responsive profile-avatar">
                    </center>
                    <hr>
                </div>
                </div>
                <div class="col-md-8">

                    <div class=" col-md-9 col-lg-9 hidden-xs hidden-sm">
                        <strong><?php echo $patient->getFirstName();?></strong><br>
                        <table class="table table-user-information">
                            <tbody>
                            <tr>
                                <td>DOB:</td>
                                <td><?php echo $patient->getDOB();?></td>
                            </tr>
                            <tr>
                                <td>Gender:</td>
                                <td><?php echo $patient->getSex();?></td>
                            </tr>
                            <tr>
                                <td>B-G :</td>
                                <td>O+</td>
                            </tr>
                            <tr>
                                <td>Email :</td>
                                <td><?php echo $patient->getEmail();?></td>
                            </tr>
                            <tr>
                                <td>Address :</td>
                                <td><?php echo $patient->getAddress();?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
                <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Pill Tabs
                </div>
            <div class="panel-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#home-pills" data-toggle="tab"><i class="fa  fa-pencil fa-fw"></i> Prescriptions</a>
                    </li>
                    <li><a href="#profile-pills" data-toggle="tab"> <i class="fa fa-list-ol fa-fw"></i> Diagnosis</a>
                    </li>
                    <li><a href="#messages-pills" data-toggle="tab"> <i class="fa fa-file-o fa-fw"></i> Reports</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">


                    <div class="tab-pane fade in active" id="Prescriptions">
                        <div class="panel panel-default" id="Prescriptions_panel">
                            <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked col-md-2">
                            <li class="active"><a href="#tab_a" data-toggle="pill">Add New</a></li>
                            <li><a href="#tab_c" data-toggle="pill">Old</a></li>
                            <li><a href="#tab_d" data-toggle="pill">Others</a></li>
                        </ul>
                        <div class="tab-content col-md-10">
                            <div class="tab-pane active" id="AddPrescription">
                                <h4>Add Prescription</h4>
                                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                                    ac turpis egestas.</p>
                            </div>
                            <div class="tab-pane" id="OldPrescription">
                                <h4>Old Prescriptions</h4>
                                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                                    ac turpis egestas.</p>
                            </div>
                            <div class="tab-pane" id="OtherPrescription">
                                <h4>OtherDoctors</h4>
                                <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                                    ac turpis egestas.</p>
                            </div>
                        </div><!-- tab content -->
                            </div></div>

                    </div>
                    <div class="tab-pane fade" id="Diagnosis">



                    </div>
                    <div class="tab-pane fade" id="messages-pills">
                        <h4>Messages Tab</h4>
                        <p>Lorem ipsum dolor sit ame, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
            </div>
            <!-- /.panel-body -->

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
<script>
    $("ul.nav-tabs a").click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

</script>
</body>

</html>

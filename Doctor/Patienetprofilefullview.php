<?php
session_start();

include "../Adaptor/mysql_crud.php";
include "../UserClasses/User.php";
include ("../UserClasses/Doctor.php");
include ("../UserClasses/Patient.php");
include ("Loadfiles/Prescription.php");
if(isset($_SESSION['login'])){

    $current_user= (string)$_SESSION['current_user'];
    $_SESSION['username']=$current_user;
    $doctor=new Doctor($current_user);
    $patient=new Patient($_REQUEST['username']);
    $prescription=new Prescription();
    $id=$_REQUEST['id'];
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

<body onload="set_noti();getold_prescriptiondetails();getOther_prescriptiondetails()">





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
                                    <td> <?php echo $patient->getBloodGroup()?></td>
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
                            Details Pannel
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Prescription</a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body" >

                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#add-p" data-toggle="tab">Add Prescription</a>
                                                </li>
                                                <li><a href="#old-p" data-toggle="tab" >Old Prescription</a>
                                                </li>
                                                <li><a href="#other-p" data-toggle="tab">Others Prescription</a>
                                                </li>
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane fade in active" id="add-p">
                                                    <div class="col-md-12">
                                                        <br>
                                                        <div class="col-md-4 col-md-offset-4" id="alertaddp"></div>
                                                    </div>
                                                    <?php  include "Loadfiles/Add_prescription.php"?>

                                                </div>
                                                <div class="tab-pane fade" id="old-p">
                                                    <h4>Old Prescription of current Doctor</h4>
                                                    <div class="col-md-12">
                                                        <br>
                                                        <div class="col-md-4 col-md-offset-4" id="alertoldP"></div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <br>
                                                            <label>Select The Date</label>
                                                            <p><select name="selectoldprescription" id="selectoldprescription" class="form-control" onChange="getCase_Histroy(this.value);getMedication(this.value);getNote(this.value)" required="required">
                                                                    <option value="">Select Prescription</option>
                                                                </select></p>
                                                    </div>
                                                    <?php  include "Loadfiles/OldPrescription.php"?>


                                                </div>
                                                <div class="tab-pane fade" id="other-p">
                                                    <h4>Other doctor's Prescription</h4>
                                                    <div class="col-md-12">
                                                        <br>
                                                        <div class="col-md-4 col-md-offset-4" id="alertOtherP"></div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <br>
                                                        <label>Select The Date</label>
                                                        <p><select name="selectoldprescription" id="selectOtherprescription" class="form-control" onChange="getCase_Histroy_other(this.value);getMedication_Other(this.value);getNoteOther(this.value)" required="required">
                                                                <option value="">Select Prescription</option>
                                                            </select></p>
                                                    </div>
                                                    <?php  include "Loadfiles/OtherPrescription.php"?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">Reports</a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#ask-r" data-toggle="tab">Ask Report</a>
                                                </li>
                                                <li><a href="#pending-r" data-toggle="tab">Pending Report</a>
                                                </li>
                                                <li><a href="#old-r" data-toggle="tab">Old Prescription</a>
                                                </li>
                                                <li><a href="#other-r" data-toggle="tab">Others Prescription</a>
                                                </li>
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane fade in active" id="ask-r">
                                                    <h4>Ask Reports From Nurse</h4>
                                                </div>
                                                <div class="tab-pane fade" id="pending-r">
                                                    <h4>Pending request for Reports From Nurse</h4>
                                                </div>
                                                <div class="tab-pane fade" id="old-r">
                                                    <h4>Old reports from Nurse</h4>
                                                </div>
                                                <div class="tab-pane fade" id="other-r">
                                                    <h4>Other doctor asked reports</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .panel-body -->
                    </div>

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




<script>
    $("ul.nav-tabs a").click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

</script>


<?php include 'prescriptionJS.php ' ?>
<?php include 'js.php' ?>

</body>

</html>

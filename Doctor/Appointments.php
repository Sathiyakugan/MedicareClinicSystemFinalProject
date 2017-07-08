<?php
session_start();

include "../Adaptor/mysql_crud.php";
include "../UserClasses/User.php";
include ("../UserClasses/Doctor.php");
include ("../UserClasses/Patient.php");
include "../Appintments/Appointment_cl.php";

if(isset($_SESSION['login'])){

    $current_user= (string)$_SESSION['current_user'];
    $_SESSION['username']=$current_user;
    $doctor=new Doctor($current_user);
    $appointment_cl=new Appointment_cl();
}else{
    header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

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

                <h1 class="page-header">Appointments</h1>

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Appointments Details
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#home" data-toggle="tab">Pending</a>
                            </li>
                            <li><a href="#profile" data-toggle="tab">Approved</a>
                            </li>
                            <li><a href="#messages" data-toggle="tab">Canceled</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active"  id="home">
                                <br>
                                <div class="table-responsive" >
                                    <table  width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Patient Name</th>
                                            <th>Fees</th>
                                            <th>Appointment Date</th>
                                            <th>Appointment Time</th>
                                            <th>View Profile</th>
                                            <th>Approve</th>
                                            <th>Cancel</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        /*
                                        View
                                        Displays all data from 'Patient' table
                                        */
                                        // get results from database
                                        $res_pending=$appointment_cl->getresultsbyDocPending($doctor->getUsername());

                                        // display data in table
                                        $count=sizeof($res_pending);
                                        // loop through results of database query, displaying them in the table
                                        $patient=null;
                                        for($i=0;$i<$count;$i++) {
                                            // echo out the contents of each row into a table
                                            echo "<tr>";
                                            $patient=new Patient($res_pending[$i]['pusername']);
                                            echo '<td>' . $res_pending[$i]['id'] . '</td>';
                                            echo '<td>' . $patient->getFirstName(); '</td>';
                                            echo '<td>' . $res_pending[$i]['consultancyFees'] . '</td>';
                                            echo '<td>' . $res_pending[$i]['appointmentDate'] . '</td>';
                                            echo '<td>' . $res_pending[$i]['appointmentTime'] . '</td>';
                                            ?>
                                            <td><button  type='button' data-a="../Admin/profile.php?type=Patient&username=<?php echo $res_pending[$i]['pusername']?>" href='#editarUsuario' class='modalEditarUsuario btn btn-primary'  data-toggle='modal' data-backdrop='static' data-keyboard='false' title='Editar usuario'>Profile</button></td>
                                            <td><a href="../Appintments/ApproveAppointment.php?id=<?php echo $res_pending[$i]['id']?>"><button id="approve"  type="button" class="btn btn-success">Approve</button></a></td>
                                            <td><a href="../Appintments/CancelAppointment.php?id=<?php echo $res_pending[$i]['id']?>"><button id="cancel" type="button" class="btn btn-danger">Cancel</button></a></td>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->

                            </div>



                            <div class="tab-pane fade" id="profile">
                                <br>
                                <div class="table-responsive">
                                    <table id="table2" width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Patient Name</th>
                                            <th>Fees</th>
                                            <th>Payment</th>
                                            <th>Appointment Date</th>
                                            <th>Appointment Time</th>
                                            <th>View Profile</th>
                                            <th>Cancel</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        /*
                                        View
                                        Displays all data from 'Patient' table
                                        */
                                        // get results from database
                                        $res_pending=$appointment_cl->getresultsbyDocApproved($doctor->getUsername());


                                        // display data in table
                                        $count=sizeof($res_pending);
                                        // loop through results of database query, displaying them in the table
                                        $patient=null;
                                        for($i=0;$i<$count;$i++) {
                                            // echo out the contents of each row into a table
                                            $Paid=null;

                                            if ($res_pending[$i]['patientStatus']==0){
                                                $Paid="Paid";
                                            }
                                            else{
                                                $Paid="Not Paid";
                                            }


                                            echo "<tr>";
                                            $patient=new Patient($res_pending[$i]['pusername']);
                                            echo '<td>' . $res_pending[$i]['id'] . '</td>';
                                            echo '<td>' . $patient->getFirstName(); '</td>';
                                            echo '<td>' . $res_pending[$i]['consultancyFees'] . '</td>';
                                            echo '<td>' .$Paid.'</td>';
                                            echo '<td>' . $res_pending[$i]['appointmentDate'] . '</td>';
                                            echo '<td>' . $res_pending[$i]['appointmentTime'] . '</td>';
                                            ?>
                                            <td><button type='button' data-a="../Admin/profile.php?type=Patient&username=<?php echo $res_pending[$i]['pusername']?>" href='#editarUsuario' class='modalEditarUsuario btn btn-primary'  data-toggle='modal' data-backdrop='static' data-keyboard='false' title='Editar usuario'>Profile</button></td>
                                            <td><a href="../Appintments/CancelAppointment.php?id=<?php echo $res_pending[$i]['id']?>"><button id="cancel" type="button" class="btn btn-danger">Cancel</button></a></td>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->




                            </div>



                            <div class="tab-pane fade" id="messages">
                                <br>
                                <div class="table-responsive">
                                    <table  id="table3"  width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Patient Name</th>
                                            <th>Fees</th>
                                            <th>Appointment Date</th>
                                            <th>Appointment Time</th>
                                            <th>View Profile</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        /*
                                        View
                                        Displays all data from 'Patient' table
                                        */
                                        // get results from database
                                        $res_pending=$appointment_cl->getresultsbyDocCanceled($doctor->getUsername());


                                        // display data in table
                                        $count=sizeof($res_pending);
                                        // loop through results of database query, displaying them in the table
                                        $patient=null;
                                        for($i=0;$i<$count;$i++) {
                                            // echo out the contents of each row into a table
                                            echo "<tr>";
                                            $patient=new Patient($res_pending[$i]['pusername']);
                                            echo '<td>' . $res_pending[$i]['id'] . '</td>';
                                            echo '<td>' . $patient->getFirstName(); '</td>';
                                            echo '<td>' . $res_pending[$i]['consultancyFees'] . '</td>';
                                            echo '<td>' . $res_pending[$i]['appointmentDate'] . '</td>';
                                            echo '<td>' . $res_pending[$i]['appointmentTime'] . '</td>';
                                            ?>
                                            <td><button type='button' data-a="../Admin/profile.php?type=Patient&username=<?php echo $res_pending[$i]['pusername']?>" href='#editarUsuario' class='modalEditarUsuario btn btn-primary'  data-toggle='modal' data-backdrop='static' data-keyboard='false' title='Editar usuario'>Profile</button></td>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->

                            </div>
                            <div class="tab-pane fade" id="settings">


                            </div>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
        </div>
        <!-- /.row -->

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


    $('#table2').DataTable()
        .columns.adjust()
        .responsive.recalc();

    $('#table3').DataTable()
        .columns.adjust()
        .responsive.recalc();

</script>



<script type="text/javascript">

    $('#cancel').click(function() {

        location.reload();

    });

</script>


<?php include 'js.php' ?>

</body>

</html>

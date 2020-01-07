<<<<<<< HEAD
<?php

/**
 * Created by PhpStorm.
 * User: Anushan
 * Date: 6/27/2017
 * Time: 11:53 PM
 */

include '../Adaptor/mysql_crud.php';
include '../UserClasses/User.php';
include ("../UserClasses/Doctor.php");
include '../UserClasses/Patient.php';
include 'Paidpatiant.php';
include '../connect_db.php';


?>
<?php
session_start();
if(isset($_SESSION['login'])){

    $current_user= (string)$_SESSION['current_user'];
    $_SESSION['username']=$current_user;
    $doctor=new Doctor($current_user);
    $paidpatiant= new Paidpatiant($username);
}else{
    header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include '../controllers/base/meta-tags.php' ?>
    <title>Doctor Pannel</title>
    <?php include '../controllers/base/head.php' ?>




</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php include 'Doctor_Theme.php' ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Manage Patient </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="col-md-4 col-md-offset-4">
            <?php
            if ( isset($_SESSION['message'])){
                echo '<div class="alert alert-danger"><strong>Invalid Login!</strong>'.$_SESSION['message'].'</div>';
                unset($_SESSION['message']);
            }
            ?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Patiant Managing Panel
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#home" data-toggle="tab">Today's Patients</a>
                            </li>
                            <li><a href="#profile" data-toggle="tab">Upcoming Patients</a>
                            </li>
                            <li><a href="#messages" data-toggle="tab">Old Patients</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">

                            <div class="tab-pane fade in active" id="home">
                                <br>
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>Full Name</th>
                                            <th>Appoinment Date </th>
                                            <th>Appoinment Time </th>
                                            <th>Look Up</th>
                                            <th>Check</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        /*
                                        View
                                        Displays all data from 'Pharmacist' table
                                        */
                                        // get results from database
                                        $details=$paidpatiant->getresultstofday($doctor->getUsername());
                                        $patient=new Patient($details[$i]['pusername']);
                                        // display data in table
                                        $count=sizeof( $details);
                                        // loop through results of database query, displaying them in the table
                                        for($i=0;$i<$count;$i++) {
                                            // echo out the contents of each row into a table
                                            echo "<tr>";
                                            echo '<td>' . $details[$i]['id'] . '</td>';
                                            echo '<td>' . $details[$i]['pusername'] . '</td>';
                                            echo '<td>' . $details[$i]['appointmentDate'] . '</td>';
                                            echo '<td>' . $details[$i]['appointmentTime'] . '</td>';
                                            ?>

                                            <td><a href="Patienetprofilefullview.php?username=<?php echo $details[$i]['pusername']?>&id=<?php echo $details[$i]['id']?>"><button type='button'   class='btn btn-primary'  title='Lookup'>Lookup</button></a></td>
                                            <td><button type='button' class="btn btn-success" data-a="../Admin/profile.php?type=Patient&username=<?php echo $details[$i]['pusername']?>" href="#editarUsuario1" class='modalEditarUsuario1 btn btn-primary' >Checkviewed</button></td>
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
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="table2">
                                        <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>Full Name</th>
                                            <th>Appoinment Date </th>
                                            <th>Appoinment Time </th>
                                            <th>User Profile</th>



                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        /*
                                        View
                                        Displays all data from 'Pharmacist' table
                                        */
                                        // get results from database
                                        $details=$paidpatiant->getresultsnotviewed($doctor->getUsername());
                                        $patient=new Patient($details[$i]['pusername']);
                                        // display data in table
                                        $count=sizeof( $details);
                                        // loop through results of database query, displaying them in the table
                                        for($i=0;$i<$count;$i++) {
                                            // echo out the contents of each row into a table
                                            echo "<tr>";
                                            echo '<td>' . $details[$i]['id'] . '</td>';
                                            echo '<td>' . $details[$i]['pusername'] . '</td>';
                                            echo '<td>' . $details[$i]['appointmentDate'] . '</td>';
                                            echo '<td>' . $details[$i]['appointmentTime'] . '</td>';
                                            ?>

                                            <td><button type='button' data-a="../Admin/profile.php?type=Patient&username=<?php echo $details[$i]['pusername']?>" href="#editarUsuario1" class='modalEditarUsuario1 btn btn-primary'  data-toggle='' data-backdrop='static' data-keyboard='false' title='Editar usuario'>ViewProfile</button></td>
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
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="table3">
                                        <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>Full Name</th>
                                            <th>Appoinment Date </th>
                                            <th>Appoinment Time </th>
                                            <th>User Profile</th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        /*
                                        View
                                        Displays all data from 'Pharmacist' table
                                        */
                                        // get results from database
                                        $details=$paidpatiant->getresultsviewed($doctor->getUsername());
                                        $patient=new Patient($details[$i]['pusername']);
                                        // display data in table
                                        $count=sizeof( $details);
                                        // loop through results of database query, displaying them in the table
                                        for($i=0;$i<$count;$i++) {
                                            // echo out the contents of each row into a table
                                            echo "<tr>";
                                            echo '<td>' . $details[$i]['id'] . '</td>';
                                            echo '<td>' . $details[$i]['pusername'] . '</td>';
                                            echo '<td>' . $details[$i]['appointmentDate'] . '</td>';
                                            echo '<td>' . $details[$i]['appointmentTime'] . '</td>';
                                            ?>

                                            <td><button type='button' data-a="../Admin/profile.php?type=Patient&username=<?php echo $details[$i]['pusername']?>" href="#editarUsuario1" class='modalEditarUsuario1 btn btn-primary'  data-toggle='' data-backdrop='static' data-keyboard='false' title='Editar usuario'>ViewProfile</button></td>
                                            <?php
                                        }


                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>


                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<!-- Modal -->
<!-- MODAL EDITAR-->
<div id="editarUsuario1" class="modal fade modal" role="dialog">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">


            </div>
        </div>
    </div>
</div>
<div id="editarUsuario2" class="modal fade modal" role="dialog">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">


            </div>
        </div>
    </div>
</div>
<div id="editarUsuario3" class="modal fade modal" role="dialog">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">


            </div>
        </div>
    </div>
</div>




<?php include '../controllers/base/AfterBodyJS.php' ?>


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

</body>

</html>
=======
<?php

/**
 * Created by PhpStorm.
 * User: Anushan
 * Date: 6/27/2017
 * Time: 11:53 PM
 */

include '../Adaptor/mysql_crud.php';
include '../UserClasses/User.php';
include ("../UserClasses/Doctor.php");
include '../UserClasses/Patient.php';
include 'Paidpatiant.php';
include '../connect_db.php';


?>
<?php
session_start();
if(isset($_SESSION['login'])){

    $current_user= (string)$_SESSION['current_user'];
    $_SESSION['username']=$current_user;
    $doctor=new Doctor($current_user);
    $paidpatiant= new Paidpatiant($current_user);
}else{
    header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include '../controllers/base/meta-tags.php' ?>
    <title>Doctor Pannel</title>
    <?php include '../controllers/base/head.php' ?>




</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php include 'Doctor_Theme.php' ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Manage Patient </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="col-md-4 col-md-offset-4">
            <?php
            if ( isset($_SESSION['message'])){
                echo '<div class="alert alert-danger"><strong>Invalid Login!</strong>'.$_SESSION['message'].'</div>';
                unset($_SESSION['message']);
            }
            ?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Patiant Managing Panel
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#home" data-toggle="tab">Today's Patients</a>
                            </li>
                            <li><a href="#profile" data-toggle="tab">Upcoming Patients</a>
                            </li>
                            <li><a href="#messages" data-toggle="tab">Old Patients</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">

                            <div class="tab-pane fade in active" id="home">
                                <br>
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>Full Name</th>
                                            <th>Appoinment Date </th>
                                            <th>Appoinment Time </th>
                                            <th>Look Up</th>
                                            <th>Check</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        /*
                                        View
                                        Displays all data from 'Pharmacist' table
                                        */
                                        // get results from database
                                        $details=$paidpatiant->getresultstofday($doctor->getUsername());
                                        //  $patient=new Patient($details[$i]['pusername']);
                                        // display data in table
                                        $count=sizeof( $details);
                                        // loop through results of database query, displaying them in the table
                                        for($i=0;$i<$count;$i++) {
                                            // echo out the contents of each row into a table
                                            echo "<tr>";
                                            echo '<td>' . $details[$i]['id'] . '</td>';
                                            echo '<td>' . $details[$i]['pusername'] . '</td>';
                                            echo '<td>' . $details[$i]['appointmentDate'] . '</td>';
                                            echo '<td>' . $details[$i]['appointmentTime'] . '</td>';
                                            ?>

                                            <td><a href="Patienetprofilefullview.php?username=<?php echo $details[$i]['pusername']?>&id=<?php echo $details[$i]['id']?>"><button type='button'   class='btn btn-primary'  title='Lookup'>Lookup</button></a></td>
                                            <td><a href="checkViewed.php?id=<?php echo $details[$i]['id']?>"><button type='button' class="btn btn-success">Checkviewed</button></a></td>
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
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="table2">
                                        <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>Full Name</th>
                                            <th>Appoinment Date </th>
                                            <th>Appoinment Time </th>
                                            <th>User Profile</th>



                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        /*
                                        View
                                        Displays all data from 'Pharmacist' table
                                        */
                                        // get results from database
                                        $details=$paidpatiant->getresultsnotviewed($doctor->getUsername());
                                        $patient=new Patient($details[$i]['pusername']);
                                        // display data in table
                                        $count=sizeof( $details);
                                        // loop through results of database query, displaying them in the table
                                        for($i=0;$i<$count;$i++) {
                                            // echo out the contents of each row into a table
                                            echo "<tr>";
                                            echo '<td>' . $details[$i]['id'] . '</td>';
                                            echo '<td>' . $details[$i]['pusername'] . '</td>';
                                            echo '<td>' . $details[$i]['appointmentDate'] . '</td>';
                                            echo '<td>' . $details[$i]['appointmentTime'] . '</td>';
                                            ?>

                                            <td><button type='button' data-a="../Admin/profile.php?type=Patient&username=<?php echo $details[$i]['pusername']?>" href="#editarUsuario1" class='modalEditarUsuario1 btn btn-primary'  data-toggle='' data-backdrop='static' data-keyboard='false' title='Editar usuario'>ViewProfile</button></td>
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
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="table3">
                                        <thead>
                                        <tr>

                                            <th>ID</th>
                                            <th>Full Name</th>
                                            <th>Appoinment Date </th>
                                            <th>Appoinment Time </th>
                                            <th>User Profile</th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        /*
                                        View
                                        Displays all data from 'Pharmacist' table
                                        */
                                        // get results from database
                                        $details=$paidpatiant->getresultsviewed($doctor->getUsername());
                                        $patient=new Patient($details[$i]['pusername']);
                                        // display data in table
                                        $count=sizeof( $details);
                                        // loop through results of database query, displaying them in the table
                                        for($i=0;$i<$count;$i++) {
                                            // echo out the contents of each row into a table
                                            echo "<tr>";
                                            echo '<td>' . $details[$i]['id'] . '</td>';
                                            echo '<td>' . $details[$i]['pusername'] . '</td>';
                                            echo '<td>' . $details[$i]['appointmentDate'] . '</td>';
                                            echo '<td>' . $details[$i]['appointmentTime'] . '</td>';
                                            ?>

                                            <td><button type='button' data-a="../Admin/profile.php?type=Patient&username=<?php echo $details[$i]['pusername']?>" href="#editarUsuario1" class='modalEditarUsuario1 btn btn-primary'  data-toggle='' data-backdrop='static' data-keyboard='false' title='Editar usuario'>ViewProfile</button></td>
                                            <?php
                                        }


                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>


                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<!-- Modal -->
<!-- MODAL EDITAR-->
<div id="editarUsuario1" class="modal fade modal" role="dialog">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">


            </div>
        </div>
    </div>
</div>
<div id="editarUsuario2" class="modal fade modal" role="dialog">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">


            </div>
        </div>
    </div>
</div>
<div id="editarUsuario3" class="modal fade modal" role="dialog">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">


            </div>
        </div>
    </div>
</div>




<?php include '../controllers/base/AfterBodyJS.php' ?>


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

</body>

</html>
>>>>>>> 67d08a6c063055685503fcdd53b5b9b9317562ad

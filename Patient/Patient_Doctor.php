<<<<<<< HEAD
<?php
include "../Adaptor/mysql_crud.php";
include "../UserClasses/User.php";
include ("../UserClasses/Patient.php");

class Patient_Doctor
{
    //essential constructor
    protected $db;
    public function __construct(){
        $this->db=Database::getInstance();
    }

    public function getresults(){
        $this->db->connect();
        $this->db->select('doctor','*',NULL,NULL,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }
}

?>
<?php

session_start();
if(isset($_SESSION['current_user'])){
    $current_user=$_SESSION['current_user'];
    $patient=new Patient($current_user);
    $patient_Doctor= new Patient_Doctor();
}else{
    header("location:../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include '../controllers/base/meta-tags.php' ?>
    <title>Patient Pannel</title>
    <?php include '../controllers/base/head.php' ?>
</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php include 'PatientTheme.php'?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Manage Doctor</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="col-md-4 col-md-offset-4" id="alert">

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Doctor Details
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">

                                <br>
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Field</th>
                                            <th>View Profile</th>
                                            <th>Appointment</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        /*
                                        View
                                        Displays all data from 'Pharmacist' table
                                        */
                                        // get results from database
                                        $details=$patient_Doctor->getresults();
                                        // display data in table
                                        $count=sizeof($details);
                                        // loop through results of database query, displaying them in the table
                                        for($i=0;$i<$count;$i++) {
                                            // echo out the contents of each row into a table
                                            echo "<tr>";
                                            echo '<td>' . $details[$i]['doctor_id'] . '</td>';
                                            echo '<td>' . $details[$i]['first_name'] . '</td>';
                                            echo '<td>' . $details[$i]['field'] . '</td>';;
                                            ?>
                                            <td><button type='button' data-a="profile.php?type=Doctor&username=<?php echo $details[$i]['username']?>" href='#editarUsuario' class='modalEditarUsuario btn btn-primary'  data-toggle='modal' data-backdrop='static' data-keyboard='false' title='Editar usuario'>ViewProfile</button></td>
                                            <td><button type='button' data-b="BookAppointmentModal.php?username=<?php echo $details[$i]['username']?>" id="bookappointment" href='#editarUsuario1' class=" modalEditarUsuario1 btn btn-danger"  data-toggle='modal' data-backdrop='static' data-keyboard='false'>Get Appointment</button></td>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
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
<div id="editarUsuario" class="modal fade modal" role="dialog">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">


            </div>
        </div>
    </div>
</div>
<div id="editarUsuario1" class="modal fade modal" role="dialog">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">


            </div>
        </div>
    </div>
</div>

<?php
include '../controllers/base/AfterBodyJS.php';
?>
<?php
include '../NotificationManager/Notification.php';
?>



<script>
    $('.modalEditarUsuario').click(function(){
        var ID=$(this).attr('data-a');
        $.ajax({url:""+ID,cache:false,success:function(result){
            $(".modal-content").html(result);
        }});
    });
</script>

<script>
    $('.modalEditarUsuario1').click(function(){
        var ID=$(this).attr('data-b');
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
//    jQuery(function($) {
//        $('form[data-async]').on('submit', function(event) {
//            var $form = $(this);
//            var $target = $($form.attr('data-target'));
//
//            $.ajax({
//                type: $form.attr('method'),
//                url: $form.attr('action'),
//                data: $form.serialize(),
//
//                success: function(data, status) {
//                    $target.modal('hide');
//                }
//            });
//
//            event.preventDefault();
//        });
//    });


$(document).ready(function () {
    $("#form_app").on("submit", function(e) {
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        $.ajax({
            url: formURL,
            type: "POST",
            data: postData,
            success: function(data, textStatus, jqXHR) {
                $('#contact_dialog .modal-header .modal-title').html("Result");
                $("#form_app").remove();
            },
            error: function(jqXHR, status, error) {
                console.log(status + ": " + error);
            }
        });
        e.preventDefault();
    });

    $("#submitForm").on('click', function() {
        $("#contact_form").submit();
    });
});



</script>


















</body>
</html>
=======
<?php
include "../Adaptor/mysql_crud.php";
include "../UserClasses/User.php";
include ("../UserClasses/Patient.php");

class Patient_Doctor
{
    //essential constructor
    protected $db;
    public function __construct(){
        $this->db=Database::getInstance();
    }

    public function getresults(){
        $this->db->connect();
        $this->db->select('doctor','*',NULL,NULL,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }
}

?>
<?php

session_start();
if(isset($_SESSION['current_user'])){
    $current_user=$_SESSION['current_user'];
    $patient=new Patient($current_user);
    $patient_Doctor= new Patient_Doctor();
}else{
    header("location:../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include '../controllers/base/meta-tags.php' ?>
    <title>Patient Pannel</title>
    <?php include '../controllers/base/head.php' ?>
</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php include 'PatientTheme.php'?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Manage Doctor</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="col-md-4 col-md-offset-4" id="alert">

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Doctor Details
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">

                        <br>
                        <div class="table-responsive">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Field</th>
                                    <th>View Profile</th>
                                    <th>Appointment</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                /*
                                View
                                Displays all data from 'Pharmacist' table
                                */
                                // get results from database
                                $details=$patient_Doctor->getresults();
                                // display data in table
                                $count=sizeof($details);
                                // loop through results of database query, displaying them in the table
                                for($i=0;$i<$count;$i++) {
                                    // echo out the contents of each row into a table
                                    echo "<tr>";
                                    echo '<td>' . $details[$i]['doctor_id'] . '</td>';
                                    echo '<td>' . $details[$i]['first_name'] . '</td>';
                                    echo '<td>' . $details[$i]['field'] . '</td>';;
                                    ?>
                                    <td><button type='button' data-a="profile.php?type=Doctor&username=<?php echo $details[$i]['username']?>" href='#editarUsuario' class='modalEditarUsuario btn btn-primary'  data-toggle='modal' data-backdrop='static' data-keyboard='false' title='Editar usuario'>ViewProfile</button></td>
                                    <td><button type='button' data-b="BookAppointmentModal.php?username=<?php echo $details[$i]['username']?>" id="bookappointment" href='#editarUsuario1' class=" modalEditarUsuario1 btn btn-danger"  data-toggle='modal' data-backdrop='static' data-keyboard='false'>appoaiantment</button></td>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
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
<div id="editarUsuario" class="modal fade modal" role="dialog">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">


            </div>
        </div>
    </div>
</div>
<div id="editarUsuario1" class="modal fade modal" role="dialog">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">


            </div>
        </div>
    </div>
</div>

<?php
include '../controllers/base/AfterBodyJS.php';
?>
<?php
include '../NotificationManager/Notification.php';
?>



<script>
    $('.modalEditarUsuario').click(function(){
        var ID=$(this).attr('data-a');
        $.ajax({url:""+ID,cache:false,success:function(result){
            $(".modal-content").html(result);
        }});
    });
</script>

<script>
    $('.modalEditarUsuario1').click(function(){
        var ID=$(this).attr('data-b');
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
    //    jQuery(function($) {
    //        $('form[data-async]').on('submit', function(event) {
    //            var $form = $(this);
    //            var $target = $($form.attr('data-target'));
    //
    //            $.ajax({
    //                type: $form.attr('method'),
    //                url: $form.attr('action'),
    //                data: $form.serialize(),
    //
    //                success: function(data, status) {
    //                    $target.modal('hide');
    //                }
    //            });
    //
    //            event.preventDefault();
    //        });
    //    });


    $(document).ready(function () {
        $("#form_app").on("submit", function(e) {
            var postData = $(this).serializeArray();
            var formURL = $(this).attr("action");
            $.ajax({
                url: formURL,
                type: "POST",
                data: postData,
                success: function(data, textStatus, jqXHR) {
                    $('#contact_dialog .modal-header .modal-title').html("Result");
                    $("#form_app").remove();
                },
                error: function(jqXHR, status, error) {
                    console.log(status + ": " + error);
                }
            });
            e.preventDefault();
        });

        $("#submitForm").on('click', function() {
            $("#contact_form").submit();
        });
    });



</script>

</body>
</html>
>>>>>>> 67d08a6c063055685503fcdd53b5b9b9317562ad

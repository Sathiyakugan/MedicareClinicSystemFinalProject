<?php
session_start();

include "../Adaptor/mysql_crud.php";
include "../UserClasses/User.php";
include ("../UserClasses/Patient.php");
include ("../NotificationManager/Notification.php");

if(isset($_SESSION['login'])){
    $current_user= (string)$_SESSION['current_user'];
    $patient=new Patient($current_user);
}else{
    header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
    exit();
}

if(isset($_POST['submit']))
{
    $specilization=$_POST['Doctorspecialization'];
    $dusername=$_POST['doctor'];
    $pusername=$patient->getUsername();
    $fees=$_POST['fees'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    $db=Database::getInstance();
    $db->connect();
    $db->insert('appointment',array('doctorSpecialization'=>$specilization,'dusername'=>$dusername,'pusername'=>$pusername,'consultancyFees'=>$fees,'appointmentDate'=>$date,'appointmentTime'=>$time)); // Table name, column names and values
    $notification=new Notification();
    $notification->Insert($dusername,$pusername,'appointment','wants Appointment with');

}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include '../controllers/base/meta-tags.php' ?>
    <title>Patient Pannel</title>
    <?php include '../controllers/base/head.php' ?>
    <link href="../style/main.css" rel="stylesheet">

</head>

<body>

<div id="wrapper">
    <!-- Navigation -->
    <?php include 'PatientTheme.php' ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">

                <h1 class="page-header">Dashboard</h1>

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <form name="form1" class="form-signin" id="form1" onsubmit="return validateForm(this);" method="post" enctype="multipart/form-data">
                <div class="col-md-4 column">
                    <hr>
                    <div class="form-group">
                    <label>Doctor Specialization</label>
                    <p> <select name="Doctorspecialization" class="form-control" onChange="getdoctor(this.value);" required="required">
                            <option value="">Select Specialization</option>

                            <option>CARDIAC SURGEON</option>
                        <option  value='CARDIOTHORACIC SURGEON'>CARDIOTHORACIC SURGEON</option>
                        <option value="Dental Surgeon">Dental Surgeon</option>
                        <option value="Ent-Surgeon">Ent-Surgeon</option>
                        <option value="NEUROLOGIST">NEUROLOGIST</option>
                        <option value="PHYSICIAN">PHYSICIAN</option>
                        <option value="PLASTIC SURGEON">PLASTIC SURGEON</option>
                        <option value="CONSULTANT SURGEON">CONSULTANT SURGEON</option>
                        <option value="NEPHOLODIST">NEPHOLODIST</option>
                        <option value="CANCER SURGEON">CANCER SURGEON</option>
                        <option value="PSYCHIATRIST">PSYCHIATRIST</option>
                    </select></p>
                    </div>

                    <div class="form-group">
                    <label>Doctors</label>
                    <p><select name="doctor" class="form-control" id="doctor" onChange="getfee(this.value);gettime(this.value);" required="required">
                        <option>Select Doctor</option>
                    </select></p>
                    </div>
                    <div class="form-group">
                        <label>Consultancy Fees</label>
                        <select name="fees" class="form-control" id="fees"  readonly>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input class="form-control datepicker" name="date"  type="date" required="required">
                    </div>

                    <div class="form-group">
                        <label>Time</label>
                        <p><select name="time" class="form-control" id="time" required="required">
                                <option value="">Select Time</option>
                            </select></p>
                    </div>
                    <button type="submit" name="submit" class="btn btn-o btn-primary">
                        Submit
                    </button>

                </div>
            </form>
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

<!--//Functions to get the values of the form-->
<script>
    function getdoctor(val) {
        $.ajax({
            type: "POST",
            url: "get_doctor.php",
            data:'field='+val,
            success: function(data){
                alert("succeeeded"+data);
                $("#doctor").html(data);
            }
        });
    }
</script>
<script>
    function getdoctor(val) {
        $.ajax({
            type: "POST",
            url: "get_doctor.php",
            data:'field='+val,
            success: function(data){
                alert("succeeeded"+data);
                $("#doctor").html(data);
            }
        });
    }
</script>


<script>
    function getfee(val) {
        $.ajax({
            type: "POST",
            url: "get_doctor.php",
            data:'doctor='+val,
            success: function(data){
                alert("succeeeded"+data);
                $("#fees").html(data);
            }
        });
    }
</script>

<script>
    function gettime(val) {
        $.ajax({
            type: "POST",
            url: "gettime.php",
            data:'doctor='+val,
            success: function(data){
                alert("succeeeded"+data);
                $("#time").html(data);
            }
        });
    }
</script>

<?php include '../controllers/base/AfterBodyJS.php' ?>
</body>

</html>

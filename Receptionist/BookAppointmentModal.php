<?php
session_start();

include "../Adaptor/mysql_crud.php";
include "../UserClasses/User.php";
include "../UserClasses/Doctor.php";
include ("../UserClasses/Patient.php");
include ("../NotificationManager/Notification.php");

if(isset($_SESSION['login'])){
    $current_user= (string)$_SESSION['current_user'];
    if (!empty($_GET['username'])) {
        $pusername=$_REQUEST['username'];
    }


}else{
    header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
    exit();
}

?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h2 class="modal-title">Book Appointment</h2>
</div>
<div class="col-lg-12">
    <div class="col-md-6 column">
        <form name="form_app" class="form-signin" id="form_app"  method="post" action="BookAppointmentModal.php" enctype="multipart/form-data"  >
                <br>
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
                    <p><select name="doctor" class="form-control" id="doctor" onChange="getfee(this.value);gettime(this.value);getothers(this.value);" required="required">
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
        </form>
    </div>
    <div class="col-md-6 column">
        <div class="profile" id="others">

        </div>
    </div>
</div>
<div class="modal-footer">
    <button class="btn btn-success" id="submit" data-dismiss="modal">submit</button>
</div>




<script>
    $(function() {
//twitter bootstrap script
        $("#submit").click(function(){
            $.ajax({
                type: "POST",
                url: "Submit_Appointment.php?pusername=<?php echo $pusername ?>",
                data: $('#form_app').serialize(),
                success: function(msg){
                    alert(msg);
                    $("#alert").html(msg)},
                error: function(){
                    alert("failure");
                }
            });
        });
    });
</script>

<script>
    function getdoctor(val) {
        $.ajax({
            type: "POST",
            url: "get_doctor.php",
            data:'field='+val,
            success: function(data){
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
                $("#time").html(data);
            }
        });
    }
</script>
<script>
    function getothers(val) {
        $.ajax({
            type: "POST",
            url: "getothers.php",
            data:'doctor='+val,
            success: function(data){
                $("#others").html(data);
            }
        });
    }
</script>
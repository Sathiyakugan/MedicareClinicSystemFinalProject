<?php
session_start();

include "../Adaptor/mysql_crud.php";
include "../UserClasses/User.php";
include "../UserClasses/Doctor.php";
include ("../UserClasses/Patient.php");
include ("../NotificationManager/Notification.php");

if(isset($_SESSION['login'])){
    $current_user= (string)$_SESSION['current_user'];
    $patient=new Patient($current_user);
    if (!empty($_GET['username'])) {
        $username=$_REQUEST['username'];
        $doctor=new Doctor($username);
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
                <label>Doctor</label>
                <p><select  name="doctor" class="form-control" id="doctor" required="required">
                        <option value="<?php echo $doctor->getUsername(); ?>"><?php echo $doctor->getFirstName()?></option>
                    </select></p>
            </div>

            <div class="form-group">
                <label>Doctor Specialization</label>
                <p> <select name="Doctorspecialization" id="Specialization" class="form-control" required="required">
                        <option value="<?php echo $doctor->getField(); ?>"><?php echo $doctor->getField(); ?></option>
                    </select></p>
            </div>
            <div class="form-group">
                <label>Consultancy Fees</label>
                <select name="fees" class="form-control" id="fees"  readonly>
                    <option value="<?php echo $doctor->getFees(); ?>"><?php echo $doctor->getFees(); ?></option>
                </select>
            </div>
            <div class="form-group">
                <label>Date</label>
                <input class="form-control datepicker" name="date"  type="date" required="required">
            </div>

            <div class="form-group">
                <label>Time</label>
                <p><select name="time" class="form-control" id="time" required="required">
                        <?php
                        $quer='username="'.$doctor->getUsername().'"';
                        $db=Database::getInstance();
                        $db->connect();
                        $db->select('doctor_appointment_time','timeslot',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
                        $time=$db->getResult();
                        $count=sizeof($time);
                        for($i=0;$i<$count;$i++) {
                            ?>
                            <option value="<?php echo htmlentities($time[$i]['timeslot']); ?>"><?php echo htmlentities($time[$i]['timeslot']); ?></option>
                            <?php
                        }
                        ?>
                    </select></p>
            </div>
            <!--                <button  type="submit" name="submit" class="btn btn-o btn-primary"  id="formbtn">-->
            <!--                    Submit-->
            <!--                </button>-->
        </form>
    </div>
    <div class="col-md-6 column">
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
                url: "Submit_Appointment.php",
                data: $('#form_app').serialize(),
                success: function(msg){
                    $("#alert").html(msg)},
                error: function(){
                    alert("failure");
                }
            });
        });
    });
</script>
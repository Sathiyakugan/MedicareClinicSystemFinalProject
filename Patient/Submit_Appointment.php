<?php
include "../Adaptor/mysql_crud.php";
include "../UserClasses/User.php";
include "../UserClasses/Doctor.php";
include ("../UserClasses/Patient.php");
include ("../NotificationManager/Notification.php");

session_start();
if(isset($_SESSION['login'])){
    $current_user= (string)$_SESSION['current_user'];
    $patient=new Patient($current_user);


}else{
    header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
    exit();
}


/**
 * Created by PhpStorm.
 * User: -
 * Date: 7/6/2017
 * Time: 2:50 PM
 */
if ( !empty($_POST) ) {
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
?>

    <div class="alert alert-success" id="alert"><strong><?php echo "Submitted succesfully"; ?></strong></div>
<?php

}
?>

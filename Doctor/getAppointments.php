<?php
session_start();
include "../Adaptor/mysql_crud.php";
include "../UserClasses/User.php";
include ("../UserClasses/Doctor.php");
$db=Database::getInstance();
$db->connect();
if(!empty($_POST["doctor"]))
{
   $val=0;
    $quer='dusername="'.$_POST['doctor'].'" AND DoctorRead="'.$val.'"';
    $db->connect();
    $db->select('appointment','*',NULL,$quer,'id DESC'); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
    $appointments=$db->getResult();
    $count=sizeof($appointments);
    ?>
            <i class="fa fa-comment fa-fw"></i><?php echo htmlentities($count); ?>New Appointments
            <span class="pull-right text-muted small">4 minutes ago</span>

        <?php

}
?>
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
    $date=$appointments[0]['postingDate'];
    ?>



    <a class="dropdown-toggle" data-toggle="dropdown" href="">
        <i class="fa fa-bell fa-fw"></i><span class="badge"><?php echo htmlentities($count); ?></span> <i class="fa fa-caret-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-alerts">
        <li>
            <a href="Appointments.php" onclick="set_viewed();">
                <div>
                    <i class="fa fa-comment fa-fw"></i><?php echo htmlentities($count); ?>New Appointments
                    <span class="pull-right text-muted small"><span prettydate data-date-format="YYYY.M.D h:m:s"><?php echo htmlentities($date); ?></span></span>
                </div>
            </a>
        </li>
        <li class="divider"></li>
    </ul>








        <?php

}
?>
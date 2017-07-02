<?php
session_start();
include "../Adaptor/mysql_crud.php";
$db=Database::getInstance();
$db->connect();
echo ("dbsdbdbsdb");
if(!empty($_POST["doctor"]))
{
    echo ("dbsdbdbsdb");
    echo($_POST["doctor"]);
    $val=1;
    $db->update('appointment',array('DoctorRead'=>$val),'username="'.$_POST['doctor'].'"'); // Table name, column names and values, WHERE conditions
    $appointments=$db->getResult();
    $count=sizeof($appointments);
//    header("location: Appointment.php");
    echo ("kugan");
    ?>



    <?php

}
?>
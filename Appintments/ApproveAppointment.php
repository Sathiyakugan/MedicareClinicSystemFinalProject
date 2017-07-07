<?php
include "../Adaptor/mysql_crud.php";
include "Appointment_cl.php";
include ("../NotificationManager/Notification.php");
$app = new Appointment_cl();
$id = $_REQUEST['id'];
$app->approve($id);
$appres=$app->getresultsbyID($id);
$notification=new Notification();
$notification->Insert($appres[0]['pusername'],$appres[0]['dusername'],'approved_appointment','Appointment Approved ');
header("Refresh:0; url=../Doctor/Appointments.php");
?>

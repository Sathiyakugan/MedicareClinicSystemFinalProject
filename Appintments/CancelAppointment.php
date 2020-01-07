<?php

include "../Adaptor/mysql_crud.php";
include "Appointment_cl.php";
include ("../NotificationManager/Notification.php");
$app = new Appointment_cl();
$id = $_REQUEST['id'];
$app->cancel($id);
$appres=$app->getresultsbyID($id);
$notification=new Notification();
$notification->Insert($appres[0]['pusername'],$appres[0]['dusername'],'canceled_appointment','Appointment Canceled');
header("Refresh:0; url=../Doctor/Appointments.php");

?>

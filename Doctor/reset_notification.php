<?php
include "../Adaptor/mysql_crud.php";
include '../NotificationManager/Notification.php';
$reci_username=$_REQUEST['username'];
$notification=new Notification();
$notification->reset_notificationDoctor($reci_username,'appointment');

header("location:Appointments.php");

?>

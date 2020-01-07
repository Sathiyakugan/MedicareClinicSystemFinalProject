<?php
include "../Adaptor/mysql_crud.php";
include "../Appintments/Appointment_cl.php";
include "../NotificationManager/Notification.php";
$id=$_REQUEST['id'];
$db=Database::getInstance();
$db->connect();
$appointment=new Appointment_cl();
$notification=new Notification();
$app=$appointment->getresultsbyID($id);
$db->insert('paidpatients',array('dusername'=>$app[0]['dusername'],'pusername'=>$app[0]['pusername'],'consultancyFees'=>$app[0]['consultancyFees'],'appointmentDate'=>$app[0]['appointmentDate'],'appointmentTime'=>$app[0]['appointmentTime'])); // Table name, column names and values
$appointment->pay($id);
$notification->Insert($app[0]['dusername'],$app[0]['pusername'],'paid_appointment','paid money');

?>
    <div class="alert alert-success" id="alert"><strong><?php echo $app[0]['pusername']."Successfully paid to".$app[0]['dusername']; ?></strong></div>
<?php
?>
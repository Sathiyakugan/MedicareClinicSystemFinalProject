<?php
include '../NotificationManager/Notification.php';
$notification=new Notification();
$noti_res=$notification->getrfullAdmin("appointment","0");
$noti_count=sizeof($noti_res);
if(sizeof($noti_res)>0){
    $date=$noti_res[0]['created_at'];
}
else{
    $date=null;
}


?>

<script language="JavaScript" type="text/javascript" >
    $(document).ready(function() {
        setInterval(function() {
            $("#appointment").html('<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-bell fa-fw"></i><span class="badge"><?php echo htmlentities($noti_count); ?></span> <i class="fa fa-caret-down"></i></a>' +
                '<ul class="dropdown-menu dropdown-alerts"><li><a href="reset_notification.php?username=<?php echo htmlentities($admin->getUsername()); ?>" onclick="set_viewed();"><div>' +
                '<i class="fa fa-calendar fa-fw"></i><?php echo htmlentities($noti_count); ?> New Appointments <span id="time_stamp" class="pull-right text-muted small" ><?php echo htmlentities($date); ?></span> </div> </a> </li></ul>');
        }, 1000);

    });

</script>
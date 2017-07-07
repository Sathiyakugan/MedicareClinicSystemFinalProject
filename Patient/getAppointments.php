<!-- jQuery -->
<script  src="../vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../vendor/prettydate/prettydate.js"></script>

<?php
include "../Adaptor/mysql_crud.php";
include "../UserClasses/User.php";
include ("../UserClasses/Doctor.php");
include ("../UserClasses/Patient.php");
include '../NotificationManager/Notification.php';
include '../Appintments/Appointment_cl.php';
$notification=new Notification();
$patient=new Patient($_REQUEST['patient']);
$noti_res=$notification->getrpatient($patient->getUsername(),'approved_appointment',0);
$appointment=new Appointment_cl();
$noti_count=sizeof($noti_res);
?>
<a class="dropdown-toggle" data-toggle="dropdown" href="#">
    <i class="fa fa-calendar fa-fw"></i><span class="badge"><?php echo htmlentities($noti_count); ?></span> <i class="fa fa-caret-down"></i>
</a>
<ul  class="dropdown-menu dropdown-messages">
<?php
if(sizeof($noti_res)>0){
    if (sizeof($noti_res)>4){
        $noti_count=4;
    }
    for($i=0;$i<$noti_count;$i++) {
        ?>
        <li>
        <a href="reset_notification.php?username=<?php echo htmlentities($noti_res[$i]['reci_username']);?>">
            <div>
                <div>
                    Doctor<strong><?php echo htmlentities($noti_res[$i]['sender_username']); ?></strong>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <i class="fa fa-calendar-check-o "></i><?php echo htmlentities($noti_res[$i]['parameters']); ?>
                    </div>
                    <span class="pull-right text-muted">
                                        <em ><span prettydate data-date-format="YYYY.M.D h:m:s"><?php echo$noti_res[$i]['created_at'];?></span></em>
                                    </span>
                </div>
            </div>

        </a>
    </li>
        <?php
        if($noti_count!=4){
            ?>
            <li class="divider"></li>

            <?php
        }
        ?>
        <?php
        if($i==$noti_count-1){
            ?>
    <li>
            <a href="reset_notification.php">
                <div>
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <i class="fa fa-calendar-check-o "></i> See All Notifications!
                        </div>
                    </div>
                </div>

            </a>
    </li></ul>
            <?php
        }
        ?>
        <?php
}
?>

    <?php
}
else{
    ?>
    <li>
        <a href="reset_notification.php?username=<?php echo htmlentities($noti_res[$i]['reci_username']);?>">
            <div>

                <div class="panel panel-info">
                    <div class="panel-heading">
                        <i class="fa fa-calendar-check-o "></i> No new notifications view old..
                    </div>

                </div>
            </div>

        </a>
    </li>
</ul>
<?Php
}

?>


<!--<script>-->
<!--    $("#time_stamp").prettydate({-->
<!--        autoUpdate: true,-->
<!--        date: new Date(), //the initial date-->
<!--        duration: 1500-->
<!--    });-->
<!--</script>-->









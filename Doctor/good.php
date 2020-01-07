<script language="JavaScript" type="text/javascript" >



    $(document).ready(function() {
        setInterval(function() {
            $("#appointment").html('<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-bell fa-fw"></i><span class="badge"><?php echo htmlentities($noti_count); ?></span> <i class="fa fa-caret-down"></i></a>' +
                '<ul class="dropdown-menu dropdown-alerts"><li><a href="reset_notification.php?username=<?php echo htmlentities($doctor->getUsername()); ?>" onclick="set_viewed();"><div>' +
                '<i class="fa fa-calendar fa-fw"></i><?php echo htmlentities($noti_count); ?> New Appointments <span id="time_stamp" class="pull-right text-muted small" ><?php echo htmlentities($date); ?></span> </div> </a> </li></ul>');
        }, 1000);

    });



</script>






<!--<li>-->
<!--    <a href="#">-->
<!--        <div>-->
<!--            <div>-->
<!--                <strong></strong>-->
<!--                <span class="pull-right text-muted">-->
<!--                                        <em>--><?php //echo htmlentities($date); ?><!--</em>-->
<!--                                    </span>-->
<!--            </div>-->
<!--            <div class="panel panel-info">-->
<!--                <div class="panel-body">-->
<!--                    <p>Wants Appointment with you</p>-->
<!--                </div>-->
<!--                <div class="panel-footer">-->
<!--                    <i class="fa fa-calendar-check-o "></i> D: <i class="fa fa-clock-o "></i> T:-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--    </a>-->
<!--</li>-->
<!--<li class="divider"></li>-->
<!---->
<!--<a href="#">-->
<!--    <div>-->
<!--        <div>-->
<!--            Patient <strong>--><?php //echo htmlentities($noti_res[0]['sender_username']); ?><!--</strong>-->
<!--        </div>-->
<!--        <div class="panel panel-info">-->
<!--            <div class="panel-heading">-->
<!--                <i class="fa fa-calendar-check-o "></i> Wants Appointment-->
<!--            </div>-->
<!--            <span class="pull-right text-muted">-->
<!--                                        <em>$noti_res[0]['created_at'];</em>-->
<!--                                    </span>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--</a>--><script language="JavaScript" type="text/javascript" >



    $(document).ready(function() {
        setInterval(function() {
            $("#appointment").html('<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-bell fa-fw"></i><span class="badge"><?php echo htmlentities($noti_count); ?></span> <i class="fa fa-caret-down"></i></a>' +
                '<ul class="dropdown-menu dropdown-alerts"><li><a href="reset_notification.php?username=<?php echo htmlentities($doctor->getUsername()); ?>" onclick="set_viewed();"><div>' +
                '<i class="fa fa-calendar fa-fw"></i><?php echo htmlentities($noti_count); ?> New Appointments <span id="time_stamp" class="pull-right text-muted small" ><?php echo htmlentities($date); ?></span> </div> </a> </li></ul>');
        }, 1000);

    });



</script>






<!--<li>-->
<!--    <a href="#">-->
<!--        <div>-->
<!--            <div>-->
<!--                <strong></strong>-->
<!--                <span class="pull-right text-muted">-->
<!--                                        <em>--><?php //echo htmlentities($date); ?><!--</em>-->
<!--                                    </span>-->
<!--            </div>-->
<!--            <div class="panel panel-info">-->
<!--                <div class="panel-body">-->
<!--                    <p>Wants Appointment with you</p>-->
<!--                </div>-->
<!--                <div class="panel-footer">-->
<!--                    <i class="fa fa-calendar-check-o "></i> D: <i class="fa fa-clock-o "></i> T:-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--    </a>-->
<!--</li>-->
<!--<li class="divider"></li>-->
<!---->
<!--<a href="#">-->
<!--    <div>-->
<!--        <div>-->
<!--            Patient <strong>--><?php //echo htmlentities($noti_res[0]['sender_username']); ?><!--</strong>-->
<!--        </div>-->
<!--        <div class="panel panel-info">-->
<!--            <div class="panel-heading">-->
<!--                <i class="fa fa-calendar-check-o "></i> Wants Appointment-->
<!--            </div>-->
<!--            <span class="pull-right text-muted">-->
<!--                                        <em>$noti_res[0]['created_at'];</em>-->
<!--                                    </span>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--</a>-->
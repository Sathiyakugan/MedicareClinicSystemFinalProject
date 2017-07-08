<script type="text/javascript">
    function set_noti() {
        setInterval(set__noti,1500)

    }
    function set__noti() {
        $.ajax({
            type: "POST",
            url: "getAppointments.php?username=<?php echo $receptionist->getUsername();?>",

            success: function(data){
                $("#appoint").html(data);
            }
        });
    }
</script>




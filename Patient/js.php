<script type="text/javascript">
    function set_noti() {
        setInterval(set__noti,1500)

    }
    function set__noti() {
        $.ajax({
            type: "POST",
            url: "getAppointments.php?patient=<?php echo $patient->getUsername();?>",
            success: function(data){
                $("#appoint").html(data);
            }
        });
    }
</script>




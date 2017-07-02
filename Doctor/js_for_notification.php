<script type="text/javascript">
    function getappointment() {
        setInterval(get_appointment,500)
    }
    function get_appointment() {
        $.ajax({
            type: "POST",
            url: "getAppointments.php",
            data:'doctor=<?php echo $doctor->getUsername();?>',
            success: function(data){
                $("#appointment").html(data);
            }
        });
    }

</script>
<script type="text/javascript">
    function set_viewed() {
        setInterval(set__view,3000)

    }

    function set__view() {
        $.ajax({
            type: "POST",
            url: "onclick_change.php",
            data:'doctor=<?php echo $doctor->getUsername();?>',
            success: function(data){
                $("#appointment").html(data);
            }
        });
    }
</script>
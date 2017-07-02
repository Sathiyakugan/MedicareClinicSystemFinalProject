<script type="text/javascript">
    function getappointment() {
        setInterval(get_appointment,3000)
    }
    function get_appointment() {
        $.ajax({
            type: "POST",
            url: "getAppointments.php",
            data:'doctor=<?php echo $doctor->getUsername();?>',
            success: function(data){
                alert("succeeeded"+data);
                $("#appointment").html(data);
            },
            error: function (error) {
                alert('error; ' + eval(error));
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
                alert("succeeeded"+data);
                $("#appointment").html(data);
            },
            error: function (error) {
                alert('error; ' + eval(error));
            }
        });
    }
</script>
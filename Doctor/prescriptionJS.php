<<<<<<< HEAD
<script>

    $(function() {
//twitter bootstrap script
        $("#button_Add_p").click(function(e){
            e.preventDefault();
            var Case_Histroy=$('#Case_Histroy_ADD').val();
            var Medication=$('#Medication_ADD').val();
            var Note=$('#Note_ADD').val();
            var pname="<?php echo($patient->getUsername()); ?>";
            var dname="<?php echo($doctor->getUsername()); ?>";
            var id="<?php echo($id); ?>";
            frmData={Case_Histroy:Case_Histroy,Medication:Medication,Note:Note,pname:pname,dname:dname,id:id}
            console.log( frmData);
            $.ajax({
                type: "POST",
                dataType: 'html',
                url: "loadfiles/AddAppointmentSubmit.php",
                data: frmData,
                success: function (msg) {
                    $("#alertaddp").fadeIn().html(msg);
                    setTimeout(function () {$("#alertaddp").fadeOut('slow');
                        },2000

                    );
                }
                ,
                error : function () {
                    alert("failure");
                }
            });
        });
    });
</script>

<script>

    $(function() {
//twitter bootstrap script
        $("#button_old_p").click(function(e){
            e.preventDefault();
            var Case_Histroy=$('#Case_Histroy_OLD').val();
            var Medication=$('#Medication_OLD').val();
            var Note=$('#Note_OLD').val();
            var pname="<?php echo($patient->getUsername()); ?>";
            var dname="<?php echo($doctor->getUsername()); ?>";
            var id="<?php echo($id); ?>";
            frmData={Case_Histroy:Case_Histroy,Medication:Medication,Note:Note,pname:pname,dname:dname,id:id}
            console.log( frmData);
            $.ajax({
                type: "POST",
                dataType: 'html',
                url: "loadfiles/AddAppointmentSubmit.php",
                data: frmData,
                success: function (msg) {
                    alert(msg);
                    $("#alertoldP").fadeIn().html(msg);
                    setTimeout(function () {$("#alertoldP").fadeOut('slow');
                        },2000

                    );
                }
                ,
                error : function () {
                    alert("failure");
                }
            });
        });
    });
</script>
<script>
    function getold_prescriptiondetails() {
        var pname='<?php echo($patient->getUsername()); ?>';
        var dname='<?php echo($doctor->getUsername()); ?>';
        var id='<?php echo($id); ?>';
        frmData={pname:pname,dname:dname,id:id}
        console.log(frmData);
        $.ajax({
            type: "POST",
            url: "loadfiles/getoldprescriptiondetails.php",
            data:frmData,
            success: function(data){
                alert("succeeeded"+data);
                $("#selectoldprescription").html(data);
            }
        });
    }
</script>

<script>
    function getOther_prescriptiondetails() {
        var pname='<?php echo($patient->getUsername()); ?>';
        var dname='<?php echo($doctor->getUsername()); ?>';
        var id='<?php echo($id); ?>';
        frmData={pname:pname,dname:dname,id:id}
        console.log(frmData);
        $.ajax({
            type: "POST",
            url: "loadfiles/getOtherprescriptiondetails.php",
            data:frmData,
            success: function(data){
                alert("succeeeded"+data);
                $("#selectOtherprescription").html(data);
            }
        });
    }
</script>

<script>
    function getCase_Histroy(val) {
        $.ajax({
            type: "POST",
            url: "loadfiles/getpredetails.php",
            data:'Case_Histroy_id='+val,
            success: function(data){
                alert("succeeeded"+data);
                $("#Case_Histroy_OLD").html(data);
            }
        });
    }
</script>
<script>
    function getMedication(val) {
        $.ajax({
            type: "POST",
            url: "loadfiles/getpredetails.php",
            data:'Medication_id='+val,
            success: function(data){
                alert("succeeeded"+data);
                $("#Medication_OLD").html(data);
            }
        });
    }
</script>
<script>
    function getNote(val) {
        $.ajax({
            type: "POST",
            url: "loadfiles/getpredetails.php",
            data:'Note_id='+val,
            success: function(data){
                alert("succeeeded"+data);
                $("#Note_OLD").html(data);
            }
        });
    }
</script>
<script>
    function getCase_Histroy_other(val) {
        $.ajax({
            type: "POST",
            url: "loadfiles/getpredetails.php",
            data:'Case_Histroy_id='+val,
            success: function(data){
                alert("succeeeded"+data);
                $("#Case_Histroy_OTHER").html(data);
            }
        });
    }
</script>
<script>
    function getMedication_Other(val) {
        $.ajax({
            type: "POST",
            url: "loadfiles/getpredetails.php",
            data:'Medication_id='+val,
            success: function(data){
                alert("succeeeded"+data);
                $("#Medication_OTHER").html(data);
            }
        });
    }
</script>
<script>
    function getNoteOther(val) {
        $.ajax({
            type: "POST",
            url: "loadfiles/getpredetails.php",
            data:'Note_id='+val,
            success: function(data){
                alert("succeeeded"+data);
                $("#Note_OTHER").html(data);
            }
        });
    }
=======
<script>

    $(function() {
//twitter bootstrap script
        $("#button_Add_p").click(function(e){
            e.preventDefault();
            var Case_Histroy=$('#Case_Histroy_ADD').val();
            var Medication=$('#Medication_ADD').val();
            var Note=$('#Note_ADD').val();
            var pname="<?php echo($patient->getUsername()); ?>";
            var dname="<?php echo($doctor->getUsername()); ?>";
            var id="<?php echo($id); ?>";
            frmData={Case_Histroy:Case_Histroy,Medication:Medication,Note:Note,pname:pname,dname:dname,id:id}
            console.log( frmData);
            $.ajax({
                type: "POST",
                dataType: 'html',
                url: "loadfiles/AddAppointmentSubmit.php",
                data: frmData,
                success: function (msg) {
                    $("#alertaddp").fadeIn().html(msg);
                    setTimeout(function () {$("#alertaddp").fadeOut('slow');
                        },2000

                    );
                }
                ,
                error : function () {
                    alert("failure");
                }
            });
        });
    });
</script>

<script>

    $(function() {
//twitter bootstrap script
        $("#button_old_p").click(function(e){
            e.preventDefault();
            var Case_Histroy=$('#Case_Histroy_OLD').val();
            var Medication=$('#Medication_OLD').val();
            var Note=$('#Note_OLD').val();
            var pname="<?php echo($patient->getUsername()); ?>";
            var dname="<?php echo($doctor->getUsername()); ?>";
            var id="<?php echo($id); ?>";
            frmData={Case_Histroy:Case_Histroy,Medication:Medication,Note:Note,pname:pname,dname:dname,id:id}
            console.log( frmData);
            $.ajax({
                type: "POST",
                dataType: 'html',
                url: "loadfiles/AddAppointmentSubmit.php",
                data: frmData,
                success: function (msg) {
                    alert(msg);
                    $("#alertoldP").fadeIn().html(msg);
                    setTimeout(function () {$("#alertoldP").fadeOut('slow');
                        },2000

                    );
                }
                ,
                error : function () {
                    alert("failure");
                }
            });
        });
    });
</script>
<script>
    function getold_prescriptiondetails() {
        var pname='<?php echo($patient->getUsername()); ?>';
        var dname='<?php echo($doctor->getUsername()); ?>';
        var id='<?php echo($id); ?>';
        frmData={pname:pname,dname:dname,id:id}
        alert(pname);
        alert(dname);
        $.ajax({
            type: "POST",
            url: "loadfiles/getoldprescriptiondetails.php",
            data:frmData,
            success: function(data){

                $("#selectoldprescription").html(data);
            }
        });
    }
</script>

<script>
    function getOther_prescriptiondetails() {
        var pname='<?php echo($patient->getUsername()); ?>';
        var dname='<?php echo($doctor->getUsername()); ?>';
        var id='<?php echo($id); ?>';
        frmData={pname:pname,dname:dname,id:id}
        console.log(frmData);
        $.ajax({
            type: "POST",
            url: "loadfiles/getOtherprescriptiondetails.php",
            data:frmData,
            success: function(data){
                $("#selectOtherprescription").html(data);
            }
        });
    }
</script>

<script>
    function getCase_Histroy(val) {
        $.ajax({
            type: "POST",
            url: "loadfiles/getpredetails.php",
            data:'Case_Histroy_id='+val,
            success: function(data){
                alert("succeeeded"+data);
                $("#Case_Histroy_OLD").html(data);
            }
        });
    }
</script>
<script>
    function getMedication(val) {
        $.ajax({
            type: "POST",
            url: "loadfiles/getpredetails.php",
            data:'Medication_id='+val,
            success: function(data){
                alert("succeeeded"+data);
                $("#Medication_OLD").html(data);
            }
        });
    }
</script>
<script>
    function getNote(val) {
        $.ajax({
            type: "POST",
            url: "loadfiles/getpredetails.php",
            data:'Note_id='+val,
            success: function(data){
                alert("succeeeded"+data);
                $("#Note_OLD").html(data);
            }
        });
    }
</script>
<script>
    function getCase_Histroy_other(val) {
        $.ajax({
            type: "POST",
            url: "loadfiles/getpredetails.php",
            data:'Case_Histroy_id='+val,
            success: function(data){
                alert("succeeeded"+data);
                $("#Case_Histroy_OTHER").html(data);
            }
        });
    }
</script>
<script>
    function getMedication_Other(val) {
        $.ajax({
            type: "POST",
            url: "loadfiles/getpredetails.php",
            data:'Medication_id='+val,
            success: function(data){
                alert("succeeeded"+data);
                $("#Medication_OTHER").html(data);
            }
        });
    }
</script>
<script>
    function getNoteOther(val) {
        $.ajax({
            type: "POST",
            url: "loadfiles/getpredetails.php",
            data:'Note_id='+val,
            success: function(data){
                alert("succeeeded"+data);
                $("#Note_OTHER").html(data);
            }
        });
    }
>>>>>>> 67d08a6c063055685503fcdd53b5b9b9317562ad
</script>
<script type="text/javascript">
    $(function() {
//twitter bootstrap script
        $("#button_change").click(function(e){
            e.preventDefault();
        var hasError = false;
        if(document.chngpwd.cpass.value=="")
        {
            alert("Current Password Filed is Empty !!");
            document.chngpwd.cpass.focus();
            jQuery.fn.exists = function(){ return this.length > 0; }
            if ($('#alertpw').exists()) {
                $("#alertpw").remove();
            }
            $("#current_pass").fadeIn().after('<span id="alertpw" class="error text-danger"><em>Please  enter your current password.</em></span>');
            setTimeout(function () {$("#alertpw").fadeOut('slow');
            },3000);
            hasError = true;
        }
        else if(document.chngpwd.npass.value=="")
        {
            jQuery.fn.exists = function(){ return this.length > 0; }
            if ($('#alertnpw').exists()) {
                $("#alertnpw").remove();
            }
            alert("New Password Filed is Empty !!");
            document.chngpwd.npass.focus();
            $("#new_pass").fadeIn().after('<span  id="alertnpw" class="error text-danger"><em>Please enter a password.</em></span>');
            setTimeout(function () {$("#alertnpw").fadeOut('slow');
            },3000);
            hasError = true;
        }
        else if(document.chngpwd.cfpass.value=="")
        {
            jQuery.fn.exists = function(){ return this.length > 0; }
            if ($('#confirm_pass').exists()) {
                $("#confirm_pass").remove();
            }
            alert("Confirm Password Filed is Empty !!");
            $("#confirm_pass").fadeIn().after('<span id="alercpw" class="error text-danger"><em>Please enter a password.</em></span>');
            setTimeout(function () {$("#alercpw").fadeOut('slow');
            },3000);
            document.chngpwd.cfpass.focus();
            hasError = true;
        }
        else if(document.chngpwd.npass.value!= document.chngpwd.cfpass.value)
        {
            jQuery.fn.exists = function(){ return this.length > 0; }
            if ($('#alertcpw').exists()) {
                $("#alertcpw").remove();
            }
            alert("Password and Confirm Password Field do not match  !!");
            $("#confirm_pass").fadeIn().after('<span id="alercpw" class="error text-danger"><em>Passwords do not match.</em></span>');
            setTimeout(function () {$("#alercpw").fadeOut('slow');
                },3000);
            document.chngpwd.cfpass.focus();
            hasError = true;
        }


        if (hasError==false){



            var current_pass=$('#current_pass').val();
            var new_pass=$('#new_pass').val();
            var username="<?php echo($_REQUEST['username']); ?>";
            var type="<?php echo($_REQUEST['type']); ?>";
            frmData={current_pass:current_pass,new_pass:new_pass,username:username,type:type}
            console.log(frmData);
            $.ajax({
                type: "POST",
                dataType: 'html',
                url: "../ChangePassword/changePassword.php",
                data: frmData,
                success: function (msg) {
                    alert(msg);
                    $("#alertmsg").fadeIn().html(msg);
                    setTimeout(function () {$("#alertmsg").fadeOut('slow');
                        },2000
                    );
                }
                ,
                error : function () {
                    alert("failure");
                }
            });
        }
        else if (hasError==true) {
            return false;
        }

    });
    });
</script>
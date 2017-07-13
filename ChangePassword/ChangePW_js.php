<script type="text/javascript">
    function valid()
    {
        var hasError = false;
        if(document.chngpwd.cpass.value=="")
        {
            alert("Current Password Filed is Empty !!");
            document.chngpwd.cpass.focus();
            $("#current_pass").fadeIn().after('<span class="error text-danger"><em>Please  enter your current password.</em></span>');
            hasError = true;
        }
        else if(document.chngpwd.npass.value=="")
        {
            alert("New Password Filed is Empty !!");
            document.chngpwd.npass.focus();
            $("#new_pass").fadeIn().after('<span  id="alertnpw" class="error text-danger"><em>Please enter a password.</em></span>');
            setTimeout(function () {$("#alertnpw").fadeOut('slow');
            },3000);
            hasError = true;
        }
        else if(document.chngpwd.cfpass.value=="")
        {
            alert("Confirm Password Filed is Empty !!");
            document.chngpwd.cfpass.focus();
            hasError = true;
        }
        else if(document.chngpwd.npass.value!= document.chngpwd.cfpass.value)
        {
            alert("Password and Confirm Password Field do not match  !!");
            $("#confirm_pass").fadeIn().after('<span id="alercpw" class="error text-danger"><em>Passwords do not match.</em></span>');
            setTimeout(function () {$("#alercpw").fadeOut('slow');
                },3000);
            document.chngpwd.cfpass.focus();
            hasError = true;
        }


        if (hasError==false){

        }
        else if (hasError==true) {
            return false;
        }

    }
</script>
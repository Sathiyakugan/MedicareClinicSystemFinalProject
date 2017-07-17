<script>
    $(function() {
        // Initialize form validation on the registration form.
        // It has the name attribute "registration"
        $("form1").validate({
            rules: {
                first_name: {
                    required: true
                    maxlength: 10
                    minLength: 5
                    characters: string



                },
                last_name{
                    required: true
                    maxlength: 10
                    minLength: 5
                    characters: string

                },
                phone{
                    required: true
                    maxlength: 10
                    characters: number
                },


                email: {
                    required: true,
                    email: true

                },
                password: {
                    required: true,
                    minlength: 6

                }
            },

            messages: {
                firs_tname: "First Name field cannot be blank!",
                last_name: "Last Name field cannot be blank!",
                password: {
                    required: "Password field cannot be blank!",
                    minlength: "Your password must be at least 6 characters long"
                },
                email: "Please enter a valid email address",
                phone: "enter numbers"
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>
    <script>
    function checkFirstname(val) {
        var letters = /^[A-Za-z]+$/;
        if (val.match(letters)) {
            $('#first_name_status').html('<b> fine</b>').show(1000);
            return true;
        }
        else {
            $('#first_name_status').html('<b> Username must have alphabet characters only</b>').show(0);
            return false;
        }
    }
</script>
<script>
    function checkLastname(val) {
        var letters = /^[A-Za-z]+$/;
        if (val.match(letters)) {
            $('#last_name_status').html('<b> fine</b>');
            return true;
        }
        else {
            $('#last_name_status').html('<b> Username must have alphabet characters only</b>');
            return false;
        }
    }
</script>
<script>
    function checkPassword(passid, mx, my) {
        var passid_len = passid.length;
        if (passid_len == 0 || passid_len >= mx || passid_len < my) {
            $("#password1_name_status").html("Password should not be empty / length be between " + mx + " to " + my);
            return false;
        }
        else {
            $("#password1_name_status").html("STRONG");
            return true;
        }
    }

    function checkuser(uname) {
        var letters = /^[A-Za-z]+$/;
        if (uname.match(letters)) {

            return true;
        }
        else {
            alert("Invalide");
            return false;
        }
    }




    function checkAddress(uadd) {
        var letters = /^[0-9a-zA-Z]+$/;
        if (uadd.match(letters) || ",#-/ !@$%^*()' '{}|[]\\".indexOf(uadd)) {
            $("#address_name_status").html("valid address")
            return true;
        }
        else {
            alert('User address must have alphanumeric characters only');

            return false;
        }
    }

    function selectfee(fees) {
        if (fees == "Default") {
            fees.focus();
            return false;
        }
        else {
            return true;
        }
    }

    function fieldSelect(field) {
        if (field == "Default") {
            $("#").html("Please select the gender")
            return false;
        }
        else {
            return true;
        }
    }

    function genderSelect(sex) {
        if (sex == "Default") {
            $("#gender_name_status").html("Please select the gender")
            return false;
        }
        else {
            return true;
        }
    }

    function ValidateEmail(uemail) {
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (uemail.match(mailformat)) {
            return true;
        }
        else {
            alert("You have entered an invalid email address!");
            uemail.focus();
            return false;
        }
    }
    function Numbercheck(no,x) {
        if (isNaN(no) || no.length <x){
            $("#phone_name_status").html("Number not valid")
        }
    }
    function confirmpassword(pass1,pass2) {

        if (pass1 != pass2) {
            //alert("Passwords Do not match");
            document.getElementById("pass1").style.borderColor = "#E34234";
            document.getElementById("pass2").style.borderColor = "#E34234";
        }
        else {
            alert("Passwords Match!!!");
        }
    }

</script>
<script>
    function  FormSubmit() {


    }
</script>


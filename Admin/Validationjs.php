<script>
    function formValidation()
    {
        var passid = document.form1.password;
        var uname = document.form1.username;
        var fname = document.form1.first_name;
        var lname = document.form1.last_name;
        var uadd = document.form1.postal_address;
        var sex = document.form1.sex;
        var uemail = document.form1.email;
        var field = document.form1.field;
        var fees = document.form1.fees;
        var timeslots=document.form1.timeslots[];



        if(passid_validation(passid,7,12))
        {
            if(allLetter(uname))
            {
                if(alphanumeric(uadd))
                {
                    if(genderSelect(sex))
                    {
                        if(fieldSelect(field))
                        {
                            if(feesSelect(fees))
                            {

                                if(ValidateEmail(uemail))

                                {m

                                }
                            }
                        }
                    }
                }
            }

            return false;
        }


        function passid_validation(passid,mx,my)
        {
            var passid_len = passid.value.length;
            if (passid_len == 0 ||passid_len >= my || passid_len < mx)
            {
                alert("Password should not be empty / length be between "+mx+" to "+my);
                passid.focus();
                return false;
            }
            return true;
        }

        function allLetter(uname)
        {
            var letters = /^[A-Za-z]+$/;
            if(uname.value.match(letters))
            {
                return true;
            }
            else
            {
                alert('Username must have alphabet characters only');
                uname.focus();
                return false;
            }
        }

        function checkfirstName(fname)
        {
            var letters = /^[A-Za-z]+$/;
            if(fname.value.match(letters))
            {
                return true;
            }
            else
            {
                alert('First Name must have alphabet characters only');
                fname.focus();
                return false;
            }
        }


        function checkLastName(fname)
        {
            var letters = /^[A-Za-z]+$/;
            if(fname.value.match(letters))
            {
                return true;
            }
            else
            {
                alert('First Name must have alphabet characters only');
                fname.focus();
                return false;
            }
        }


        function allLetter(uname)
        {
            var letters = /^[A-Za-z]+$/;
            if(uname.value.match(letters))
            {
                return true;
            }
            else
            {
                alert('Username must have alphabet characters only');
                uname.focus();
                return false;
            }
        }

        function alphanumeric(uadd)
        {
            var letters = /^[0-9a-zA-Z]+$/;
            if(uadd.value.match(letters))
            {
                return true;
            }
            else
            {
                alert('User address must have alphanumeric characters only');
                uadd.focus();
                return false;
            }
        }

        function feesSelect(fees)
        {
            if(fees.value == "Default")
            {
                alert('Select the fees from the list');
                fees.focus();
                return false;
            }
            else
            {
                return true;
            }
        }

        function fieldSelect(field)
        {
            if(field.value == "Default")
            {
                alert('Select the field from the list');
                field.focus();
                return false;
            }
            else
            {
                return true;
            }
        }

        function genderSelect(sex)
        {
            if(sex.value == "Default")
            {
                alert('Select Gender from the list');
                sex.focus();
                return false;
            }
            else
            {
                return true;
            }
        }

        function ValidateEmail(uemail)
        {
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if(uemail.value.match(mailformat))
            {
                return true;
            }
            else
            {
                alert("You have entered an invalid email address!");
                uemail.focus();
                return false;
            }
        }


</script>
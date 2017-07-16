
function formValidate() {
    evt.preventDefault();
    var pass1 = document.getElementById("password").value;
    var pass2 = document.getElementById("confirm_password").value;
    var uname = document.getElementById("username").value;
    var fname = document.getElementById("first_name").value;
    var lname = document.getElementById("last_name").value;
    var uadd = document.getElementById("postal_address").value;
    var uemail = document.getElementById("email").value;






    if (passid_validation(passid, 7, 12)) {
        if (allLetter(uname)) {
            if (alphanumeric(uadd)) {
                if (ValidateEmail(uemail)) {
                    if (checkfirstName(fname)) {
                        if (checkLastName(lname)) {
                            if(confirmpassword(pass1,pass2)){
                                return true;
                            }
                        }


                    }
                }
            }
        }

    }
    event.preventDefault();
    return false;
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
function passid_validation(pass1, mx, my) {
    var passid_len = pass1.length;
    if (passid_len == 0 || passid_len >= my || passid_len < mx) {
        alert("Password should not be empty / length be between " + mx + " to " + my);
        pass1.focus();
        return false;
    }
    return true;
}

function allLetter(uname) {
    var letters = /^[A-Za-z]+$/;
    if (uname.match(letters)) {
        return true;
    }
    else {
        alert('Username must have alphabet characters only');
        uname.focus();
        return false;
    }
}

function checkfirstName(fname) {
    var letters = /^[A-Za-z]+$/;
    if (fname.match(letters)) {
        return true;
    }
    else {
        alert('First Name must have alphabet characters only');
        fname.focus();
        return false;
    }
}


function checkLastName(lname) {
    var letters = /^[A-Za-z]+$/;
    if (lname.match(letters)) {
        return true;
    }
    else {
        alert('First Name must have alphabet characters only');
        lname.focus();
        return false;
    }
}


function alphanumeric(uadd) {
    var letters = /^[0-9a-zA-Z]+$/;
    if (uadd.match(letters)) {
        return true;
    }
    else {
        alert('User address must have alphanumeric characters only');
        uadd.focus();
        return false;
    }
}


function ValidateEmail(uemail) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (uemail.match(mailformat)) {
        return true;
    }
    else {
        alert("You have entered an invalid email address!");

        return false;
    }
}


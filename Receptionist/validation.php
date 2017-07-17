<style>
	input:focus, select:focus{
		background-color:lightblue;
	}

</style>
<script>
function add_Doctor() {
    var pass2 = document.getElementById("password").value;
    var pass1 = document.getElementById("confirm_password").value;
    var uname = document.getElementById("username").value;
    var fname = document.getElementById("first_name").value;
    var lname = document.getElementById("last_name").value;
    var uadd = document.getElementById("postal_address").value;
    var uemail = document.getElementById("email").value;
	var field = document.getElementById("field").value;
	var sex = document.getElementById("sex").value;
	var fees = document.getElementById("fees").value;
	var timeslots = document.getElementById("timeslots").value;
	var DOB = document.getElementById("DOB").value;

	if((genderSelect(sex) && DOBSelect(DOB) && timeSelect(timeslots) && fieldSelect(field) && selectfee(fees) && confirmpassword() && checkPassword(pass2, 8, 15) && checkUsername(uname) && checkAddress(uadd) && ValidateEmail(uemail) && checkfirstName(fname) && checkLastName(lname)))
	{
		return true;
		// document.getElementById("submit").formAction = "/Admin_doctor.php";
	}
	else{
		event.preventDefault();
		return false;
	}
}
</script>

<script>
function add_Staff() {
    var pass2 = document.getElementById("password").value;
    var pass1 = document.getElementById("confirm_password").value;
    var uname = document.getElementById("username").value;
    var fname = document.getElementById("first_name").value;
    var lname = document.getElementById("last_name").value;
    var uadd = document.getElementById("postal_address").value;
    var uemail = document.getElementById("email").value;
	//var field = document.getElementById("field").value;
	var sex = document.getElementById("sex").value;
	//var fees = document.getElementById("fees").value;
	//var timeslots = document.getElementById("timeslots").value;
	var DOB = document.getElementById("DOB").value;

	if((genderSelect(sex) && DOBSelect(DOB) && confirmpassword() && checkPassword(pass2, 8, 15) && checkUsername(uname) && checkAddress(uadd) && ValidateEmail(uemail) && checkfirstName(fname) && checkLastName(lname)))
	{
		return true;
		// document.getElementById("submit").formAction = "/Admin_doctor.php";
	}
	else{
		event.preventDefault();
		return false;
	}
}
</script>

<script>
function checkUsername(val) {
    var letters = /^[A-Za-z]+$/;
    if (val.match(letters)) {
        $('#first_name_status0').html('<span class="alert-success fade in">Validate</span>');
		document.getElementById("username").style.borderColor="green";
        return true;
    }
    else {
        $('#first_name_status0').html('<span class="alert-danger fade in"> Unvalidate</span>');
		document.getElementById("username").style.borderColor="red";
		$('[autofocus]', this).focus();
        return false;
    }
}
</script><script>
function checkFirstname(val) {
    var letters = /^[A-Za-z]+$/;
    if (val.match(letters)) {
        $('#first_name_status').html('<span class="alert-success fade in">Validate</span>');
		document.getElementById("first_name").style.borderColor="green";
        return true;
    }
    else {
        $('#first_name_status').html('<span class="alert-danger fade in"> Unvalidate</span>');
		document.getElementById("first_name").style.borderColor="red";
        return false;
    }
}
</script>
<script>
    function checkLastname(val) {
        var letters = /^[A-Za-z]+$/;
        if (val.match(letters)) {
            $('#last_name_status').html('<span class="alert-success fade in">Validate</span>');
			document.getElementById("last_name").style.borderColor="green";
            return true;
        }
        else {
            $('#last_name_status').html('<span class="alert-danger fade in"> Unvalidate</span>');
			document.getElementById("last_name").style.borderColor="red";
            return false;
        }
    }
</script>
<script>
    function checkPassword(passid, mx, my) {
        var passid_len = passid.length;
		//var letters = /^[A-Za-z]\w{7,14}$/;
        var letters=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
		if (passid_len == 0 || passid_len > my || passid_len < mx ||! passid.match(letters)) {
            $("#password1_name_status").html('<span class="alert-danger fade in">Unvalidate<br/><small><small>length:8-15, atleast one(lower case & upper case & digit &special charcter)required</small></small></span>');
			document.getElementById("password").style.borderColor="red";
            return false;
        }
        else {
            $("#password1_name_status").html('<span class="alert-success fade in">Validate</span>');
			document.getElementById("password").style.borderColor="green";
            return true;
        }
    }

    function checkAddress(uadd) {
        var letters = /^[0-9a-zA-Z]+$/;
        if (uadd.match(letters) || ",#-/ !@$%^*()' '{}|[]\\".indexOf(uadd)) {
            $("#address_name_status").html('<span class="alert-success fade in">Validate</span>');
			document.getElementById("postal_address").style.borderColor="green";
            return true;
        }
        else {
            $("#address_name_status").html('<span class="alert-danger fade in"> Unvalidate</span>');
			document.getElementById("postal_address").style.borderColor="red";
            return false;
        }
    }

    function selectfee(fees) {
        if (fees == "Default") {
			$("#fee_status").html('<span class="alert-danger fade in"> Unvalidate</span>');
			document.getElementById("fees").style.borderColor="red";
            return false;
        }
        else {
			$("#fee_status").html('<span class="alert-success fade in"> Validate</span>');
			document.getElementById("fees").style.borderColor="green";
            return true;
        }
    }

    function fieldSelect(field) {
        if (field == "Default") {
            $("#Specilaization_status").html('<span class="alert-danger fade in"> Unvalidate</span>');
			document.getElementById("field").style.borderColor="red";
            return false;
        }
        else {
			$("#Specilaization_status").html('<span class="alert-success fade in"> Validate</span>');
			document.getElementById("field").style.borderColor="green";
            return true;
        }
    }    
	function timeSelect(time) {
        if (time == "Default") {
            $("#timeslots_status").html('<span class="alert-danger fade in"> Unvalidate</span>');
			document.getElementById("timeslots").style.borderColor="red";
            return false;
        }
        else {
			$("#timeslots_status").html('<span class="alert-success fade in"> Validate</span>');
			document.getElementById("timeslots").style.borderColor="green";
            return true;
        }
    }
	
	function DOBSelect(date) {
		var t=new Date();
		var da=date.split('-');
		var day=parseInt(da[2]);
		var month=parseInt(da[1]);
		var year=parseInt(da[0]);
		var tDays=(t.getDate())+(t.getMonth()+1)*30+(t.getFullYear())*365;
		var sDays=day+month*30+year*365;
        if ((tDays-sDays)<0 || isNaN(sDays)) {
            $("#DOB_status").html('<span class="alert-danger fade in"> Unvalidate</span>');
			document.getElementById("DOB").style.borderColor="red";
            return false;
        }
        else {
			$("#DOB_status").html('<span class="alert-success fade in"> Validate</span>');
			document.getElementById("DOB").style.borderColor="green";
            return true;
        }
    }

    function genderSelect(sex) {
        if (sex == "Default") {
            $("#gender_name_status").html('<span class="alert-danger fade in"> Unvalidate</span>');
			document.getElementById("sex").style.borderColor="red";
            return false;
        }
        else {
			$("#gender_name_status").html('<span class="alert-success fade in"> Validate</span>');
			document.getElementById("sex").style.borderColor="green";
            return true;
        }
    }

    function ValidateEmail(uemail) {
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (uemail.match(mailformat)) {
			$("#email1_name_status").html('<span class="alert-success fade in"> Validate</span>');
			document.getElementById("email").style.borderColor="green";
            return true;
        }
        else {
            $("#email1_name_status").html('<span class="alert-danger fade in"> Unvalidate</span>');
			document.getElementById("email").style.borderColor="red";
            return false;
        }
    }
	
    function Numbercheck(no,x) {
        if (isNaN(no) || no.length <x || no.length>x || no.match(/\./g)){
			$("#phone_name_status").html('<span class="alert-danger fade in"> Unvalidate</span>');
			document.getElementById("phone").style.borderColor="red";
			return false;
        }
		else{
			$("#phone_name_status").html('<span class="alert-success fade in"> Validate</span>');
			document.getElementById("phone").style.borderColor="green";
			return true;
		}
    }
    function confirmpassword() {
		var pass1 = document.getElementById("confirm_password").value;
		var pass2 = document.getElementById("password").value;
        if (pass1 != pass2) {
            $("#password2_name_status").html('<span class="alert-danger fade in"> Unvalidate</span>');
			document.getElementById("confirm_password").style.borderColor="red";
			return false;
        }
        else {
            $("#password2_name_status").html('<span class="alert-success fade in"> Validate</span>');
			document.getElementById("confirm_password").style.borderColor="green";
			return true;
        }
    }
	function f(){
		return false;
	}

</script>
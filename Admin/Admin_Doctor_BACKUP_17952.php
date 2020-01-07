<?php
include "../Adaptor/mysql_crud.php";
include "../UserClasses/User.php";
include ("../UserClasses/Admin.php");

class Admin_Doctor
{
    //essential constructor
    protected $db;
    public function __construct(){
        $this->db=Database::getInstance();
    }

    public function getresults(){
        $this->db->connect();
        $this->db->select('doctor','*',NULL,NULL,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }

    public function getresultsforaperson($username){
        $quer='username="'.$username.'"';
        $this->db->connect();
        $this->db->select('doctor','*',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }
    public function Update($username,$firstName,$lastName,$sex,$DOB,$address, $email,$user_image,$field,$description){

        $this->db->connect();
        $this->db->update('doctor',array('first_name'=>'"'.$firstName.'"','last_name'=>'"'.$lastName.'"','sex'=>'"'.$sex.'"','DOB'=>'"'.$DOB.'"','address'=>'"'.$address.'"','email'=>'"'.$email.'"','user_image'=>'"'.$user_image.'"','field'=>'"'.$field.'"','description="'.$description.'"'),'username="'.$username.'"'); // Table name, column names and values, WHERE conditions
    }

    public function Insert($username,$password,$firstName,$lastName,$DOB,$address,$email,$phone,$sex,$user_image,$field,$description,$fees,$timeslots){

        $this->db->connect();
        $results=$this->getresultsforaperson($username);
        if (sizeof($results)==0){
            $address = $this->db->escapeString($address); // Escape any input before insert
            $email=$this->db->escapeString($email); // Escape any input before insert
            $this->db->insert('doctor',array('username'=>$username,'password'=>$password,'first_name'=>$firstName,'last_name'=>$lastName,'sex'=>$sex,'phone'=>$phone,'DOB'=>$DOB,'address'=>$address,'email'=>$email,'user_image'=>$user_image,'phone'=>$phone,'field'=>$field,'description'=>$description,'fees'=>$fees));  // Table name, column names and respective values
            foreach ($timeslots as $value){
                $this->db->insert('doctor_appointment_time',array('username'=>$username,'timeslot'=>$value));  // Table name, column names and respective values
            }
            $_SESSION['message1']="<font color=blue>User Added Succesfully</font>";
            header('Location: ..\Admin\Admin_Doctor.php');
        }
        else{
            $_SESSION['message']="<font color=blue>sorry the username entered already exists</font>";
            header('Location: ..\Admin\Admin_Doctor.php');

        }


    }

    public function Delete($username){
        $this->db->connect();
        $res=getresults();
        $this->db->insert('deletedstaffs',$res);  // Table name, column names and respective values
        $this->db->delete('doctor',"'".$username."'");  // Table name, WHERE conditions
    }

}

?>
<?php

session_start();
if(isset($_SESSION['current_user'])){
    $current_user=$_SESSION['current_user'];
    $admin=new Admin($current_user);
    $admin_doctor= new Admin_Doctor();
}else{
    header("location:../index.php");
    exit();
}
if(isset($_POST['submit'])){
    $firstName=$_POST['first_name'];
    $lastName=$_POST['last_name'];
    $address=$_POST['postal_address'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sex=$_POST['sex'];
    $DOB=$_POST['DOB'];
    $fees=$_POST['fees'];
    $field=$_POST['field'];
    $timeslots=($_POST['timeslots']);
    print_r($timeslots);
    $description='';
    if (is_array ( $_POST ['description'] )) {
        foreach ($_POST ['description'] as $value) {
            $description = $value + $description;
        }
    }
    else{
        $description=$_POST ['description'];
    }
    $Destination = '../userfiles/avatars';
    if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])){
        $user_image= 'default.jpg';
        move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$user_image");
    }
    else{
        $RandomNum = rand(0, 999999999);
        $ImageName = str_replace(' ','-',strtolower($_FILES['ImageFile']['name']));
        $ImageType = $_FILES['ImageFile']['type'];
        $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
        $ImageExt = str_replace('.','',$ImageExt);
        $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
        $user_image = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
        move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$user_image");
    }

    $admin_doctor->Insert($username,$password,$firstName,$lastName,$DOB,$address,$email,$phone,$sex,$user_image,$field,$description,$fees,$timeslots);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../controllers/base/meta-tags.php' ?>
    <title>Admin Pannel</title>
    <?php include '../controllers/base/head.php' ?>
    <?php include  "validation.php"; ?>
    <script src="../Jquery/jquery-migrate-1.4.1.js"></script>
    <script src="../Jquery/jquery-migrate-3.0.0.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <!--<script src="Validations.js"> </script>-->
    <script>
        function confirmPass() {

            if ($("#password").val() != $("#confirm_password").val()) {
                $('#password2_name_status').html("Passwords do not match.");
                return false
            }
            else {
                return true;
            }

        }
    </script>
    <script >
        function checkname(val){

            var name=val;

            if(name)
            {
                $.ajax({
                    type: 'POST',
                    url: 'checkUserName.php?type=doctor',
                    data: {
                        user_name:name,
                    },
                    success: function (response) {
                        $( '#user-availability-status1' ).html(response);
                        if(response=="OK")
                        {
                            return true;
                        }
                        else
                        {
                            return false;
                        }
                    }
                });
            }
            else
            {
                $( '#user-availability-status1' ).html("");
                return false;
            }
        }</script>
    <script>function checkemail(va)
        {
            var email=va;

            if(email)
            {
                $.ajax({
                    type: 'post',
                    url: 'checkEmail.php?type=doctor',
                    data: {
                        user_email:email,
                    },
                    success: function (response) {
                        $( '#email-status' ).html(response).focus();
                        if(response=="OK")
                        {
                            return true;
                        }
                        else
                        {
                            return false;
                        }
                    }
                });
            }
            else
            {
                $( '#email-status' ).html("");
                return false;
            }
        }</script>

</head>

<body>
<div id="wrapper">

    <!-- Navigation -->
    <?php include 'AdminTheme.php'?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Manage Doctor</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="col-md-4 col-md-offset-4">
            <?php
            if ( isset($_SESSION['message'])){
                echo '<div class="alert alert-danger"><strong>Invalid Login!</strong>'.$_SESSION['message'].'</div>';
                unset($_SESSION['message']);
            }
            if ( isset($_SESSION['message1'])){
                echo '<div class="alert alert-success"><strong>Success!</strong> '.$_SESSION['message1'].'</div>';
                unset($_SESSION['message1']);
            }
            ?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        User Managing Panel
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#home" data-toggle="tab">View User</a>
                            </li>
                            <li><a href="#profile" data-toggle="tab">Add User</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">

                            <div class="tab-pane fade in active" id="home">
                                <br>
                                <div class="table-responsive">
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Field</th>
                                            <th>Phone No</th>
                                            <th>View Profile</th>
                                            <th>Update</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        /*
                                        View
                                        Displays all data from 'Pharmacist' table
                                        */
                                        // get results from database
                                        $details=$admin_doctor->getresults();
                                        // display data in table
                                        $count=sizeof($details);
                                        // loop through results of database query, displaying them in the table
                                        for($i=0;$i<$count;$i++) {
                                            // echo out the contents of each row into a table
                                            echo "<tr>";
                                            echo '<td>' . $details[$i]['doctor_id'] . '</td>';
                                            echo '<td>' . $details[$i]['first_name'] . '</td>';
                                            echo '<td>' . $details[$i]['field'] . '</td>';;
                                            echo '<td>' . $details[$i]['phone'] . '</td>';
                                            ?>


                                            <td><button type='button' data-a="../Admin/profile.php?type=Doctor&username=<?php echo $details[$i]['username']?>" href='#editarUsuario' class='modalEditarUsuario btn btn-primary'  data-toggle='modal' data-backdrop='static' data-keyboard='false' title='Editar usuario'>ViewProfile</button></td>
                                            <td><a href="../Admin/update.php?type=Doctor&username=<?php echo $details[$i]['username']?>"><button type="button" class="btn btn-primary">Update</button></a></td>
                                            <td><a href="../Admin/delete.php?type=Doctor&username=<?php echo $details[$i]['username']?>"><button type="button"  onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</button></a></td>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>

                            <div class="tab-pane fade" id="profile">
                                <div class="col-md-12">
                                    <div class="col-md-8">
                                        <div class="row">
<<<<<<< HEAD
                                            <form name="form1" class="form-signin" id="form1" onsubmit="validateForm();"  method="post" action="Admin_Doctor.php" enctype="multipart/form-data">
=======
                                            <form role="form" name="form1" class="form-signin"  onsubmit="return add_Doctor();" id="form1" data-toggle="validate"  method="post" action="Admin_Doctor.php" enctype="multipart/form-data">
>>>>>>> 67d08a6c063055685503fcdd53b5b9b9317562ad
                                                <div class="col-md-6 column">
                                                    <br>
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input type="text" id="username" onkeyup="return checkUsername(this.value);" onblur="return checkname(this.value);" name="username" class="form-control" placeholder="Username"   required autofocus>
                                                        <span id="first_name_status0" class="text-danger"></span>
                                                        </br>
                                                        <span id="user-availability-status1"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Image</label>
                                                        <input type="file" id="ImageFile" name="ImageFile" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <input type="text" id="first_name" name="first_name"  onkeyup="return checkFirstname(this.value);" class="form-control" placeholder="First Name"   required autofocus>

                                                        <span id="first_name_status" class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input type="text" id="last_name" name="last_name" onkeyup="return checkLastname(this.value);" class="form-control" placeholder="Last Name"   required autofocus>
                                                        <span id="last_name_status"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <p><label>Specilaization</label>
                                                            <select class="form-control" name="field" id="field" onkeyup="return fieldSelect(this.value);" >
																<option selected="" value="Default"></option>
                                                                <option>CARDIAC SURGEON</option>
                                                                <option>CARDIOTHORACIC SURGEON</option>
                                                                <option>Dental Surgeon</option>
                                                                <option>Ent-Surgeon</option>
                                                                <option>NEUROLOGIST</option>
                                                                <option>PHYSICIAN</option>
                                                                <option>PLASTIC SURGEON</option>
                                                                <option>CONSULTANT SURGEON</option>
                                                                <option>NEPHOLODIST</option>
                                                                <option>CANCER SURGEON</option>
                                                                <option>PSYCHIATRIST</option>
                                                            </select>
														</p>
														<span id="Specilaization_status"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Sex</label>
                                                        <select class="form-control" onkeyup="return genderSelect(this.value);" name="sex" id="sex">
                                                            <option selected="" value="Default"> </option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female" >Female</option>
                                                            <option value="Neutral">Neutral</option>
                                                        </select>
                                                        <span id="gender_name_status"> </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Phone</label>
                                                        <input type="text" id="phone" onkeyup=" return Numbercheck(this.value,10);" name="phone" class="form-control" placeholder="Phone"   required autofocus>
                                                        <span id="phone_name_status"> </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email address</label>
                                                        <input type="email" id="email" onblur="return checkemail(this.value);" onkeyup= "return ValidateEmail(this.value);" name="email" class="form-control" placeholder="Email address" required autofocus>
                                                        <span id="email1_name_status"> </span><br/>
                                                        <span id="email-status"> </span>
														

                                                    </div>
                                                </div>
                                                <div class="col-md-6 column">
                                                    <br>

                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                                        <P><label>Fees</label>
                                                            <select class="form-control" onkeyup="return selectfee(this.value);" name="fees" id="fees">
]																<option selected="" value="Default"></option>
                                                                <option>800Rs</option>
                                                                <option>1000Rs</option>
                                                                <option>1500Rs</option>
                                                                <option>2000Rs</option>
                                                                <option>2500Rs</option>
                                                            </select>
														</p>
														<span id="fee_status"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Time Slots</label>
                                                        <select class="form-control" name="timeslots[]" id="timeslots" onkeyup="return timeSelect(this.value);">
                                                            <option selected="" value="Default"></option>
                                                            <option>06:00:00</option><option>07:00:00</option><option>08:00:00</option><option>09:00:00</option>
                                                            <option>10:00:00</option><option>11:00:00</option><option>12:00:00</option><option>13:00:00</option>
                                                            <option>14:00:00</option><option>15:00:00</option><option>16:00:00</option><option>17:00:00</option>
                                                            <option>18:00:00</option><option>19:00:00</option><option>20:00:00</option><option>21:00:00</option>
                                                            <option>22:00:00</option><option>23:00:00</option><option>00:00:00</option>
                                                        </select>
														<span id="timeslots_status"> </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>DOB</label>
                                                        <input type="date" id="DOB" name="DOB" onkeyup="return DOBSelect(this.value);" class="form-control"  required autofocus>
														<span id="DOB_status" </span>
													</div>
                                                    <div class="form-group">
                                                        <label>Postal Address</label>
                                                        <input type="text" id="postal_address" onkeyup="checkAddress(this.value);" name="postal_address" class="form-control" placeholder="Postal Address"   required autofocus>
                                                        <span id="address_name_status" </span>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" id="password" name="password" onkeyup="return checkPassword(this.value,8,15);" class="form-control" placeholder="Password" required autofocus>
                                                        <span id="password1_name_status" </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Confirm Password</label>
                                                        <input type="password" id="confirm_password" onkeyup="return confirmpassword();"  name="confirm_password" class="form-control" placeholder="Password" required autofocus>
                                                        <span id="password2_name_status"> </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <P></P>
                                                        <button class="btn btn-lg btn-primary btn-block"  class="form-controls" name="submit" type="submit" id="sumit">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="profile"  >
                                            <center>

                                                <img id="blah" src="#" alt="your image"
                                                     class="img-responsive profile-avatar"/>
                                            </center>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include 'end.php' ?>
<<<<<<< HEAD
<?php //include  "Validationjs.php"?>
<script>
    function validateForm() {
        alert("kkkxsx");
        console.log("im in");
        var passid = document.forms["form1"]["password"].value;
        var uname = document.forms["form1"]["username"].value;
        var fname = document.forms["form1"]["first_name"].value;
        var lname = document.forms["form1"]["last_name"].value;
        var uadd = document.forms["form1"]["postal_address"].value;
        var sex = document.forms["form1"]["sex"].value;
        var uemail = document.forms["form1"]["email"].value;
        var fees = document.forms["form1"]["field"].value;
        var field = document.forms["form1"]["field"].value;
        var timeslots = document.forms["form1"]["timeslots[]"].value;
        alert(passid);

        if (passid_validation(passid, 7, 12)) {
            if (allLetter(uname)) {
                if (alphanumeric(uadd)) {
                    if (genderSelect(sex)) {
                        if (fieldSelect(field)) {
                            if (feesSelect(fees)) {
                                if (ValidateEmail(uemail)) {
                                    if (checkfirstName(fname)) {
                                        if (checkLastName(lname)) {

                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            return false;
        }


        function passid_validation(passid, mx, my) {
            var passid_len = passid.value.length;
            if (passid_len == 0 || passid_len >= my || passid_len < mx) {
                alert("Password should not be empty / length be between " + mx + " to " + my);
                passid.focus();
                return false;
            }
            return true;
        }

        function allLetter(uname) {
            var letters = /^[A-Za-z]+$/;
            if (uname.value.match(letters)) {
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
            if (fname.value.match(letters)) {
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
            if (lname.value.match(letters)) {
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
            if (uadd.value.match(letters)) {
                return true;
            }
            else {
                alert('User address must have alphanumeric characters only');
                uadd.focus();
                return false;
            }
        }

        function feesSelect(fees) {
            if (fees.value == "Default") {
                alert('Select the fees from the list');
                fees.focus();
                return false;
            }
            else {
                return true;
            }
        }

        function fieldSelect(field) {
            if (field.value == "Default") {
                alert('Select the field from the list');
                field.focus();
                return false;
            }
            else {
                return true;
            }
        }

        function genderSelect(sex) {
            if (sex.value == "Default") {
                alert('Select Gender from the list');
                sex.focus();
                return false;
            }
            else {
                return true;
            }
        }

        function ValidateEmail(uemail) {
            var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (uemail.value.match(mailformat)) {
                return true;
            }
            else {
                alert("You have entered an invalid email address!");
                uemail.focus();
                return false;
            }
        }
    }
</script>
<script>
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();
=======
>>>>>>> 67d08a6c063055685503fcdd53b5b9b9317562ad

// <script>
    // function readURL(input) {

        // if (input.files && input.files[0]) {
            // var reader = new FileReader();

            // reader.onload = function (e) {
                // $('#blah').attr('src', e.target.result);
            // }

            // reader.readAsDataURL(input.files[0]);
        // }
    // }

    // $("#ImageFile").change(function () {
        // readURL(this);
    // });
// </script>

// <script>
    // function userAvailability() {
        // var Case_Histroy=$('#Case_Histroy_ADD').val();
        // var Medication=$('#Medication_ADD').val();
        // var Note=$('#Note_ADD').val();

        // jQuery.ajax({
            // url: "check_availability.php",
            // data: {username:$("#username").val(),type:"Doctor"},
            // type: "POST",
            // success:function(data){
                // $("#user-availability-status1").html(data);
            // },
            // error:function (){}
        // });
    // }
</script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<script src="http://cdn.oesmith.co.uk/morris-0.4.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</body>

</html>

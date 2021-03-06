<<<<<<< HEAD
<?php
include "../Adaptor/mysql_crud.php";
include "../UserClasses/User.php";
include("../UserClasses/Receptionist.php");

class Receptionist_Patient
{
    //essential constructor
    protected $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getresults()
    {
        $this->db->connect();
        $this->db->select('patient', 'first_name,last_name,username,sex,DOB,address,email,phone,user_image,patient_id', NULL, NULL, NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res = $this->db->getResult();
        return $res;
    }

    public function getresultsforaperson($username)
    {
        $quer = 'username="' . $username . '"';
        $this->db->connect();
        $this->db->select('patient', 'first_name,last_name,username,sex,DOB,address,email,phone,user_image,patient_id', NULL, $quer, NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res = $this->db->getResult();
        return $res;
    }

    public function Update($username, $firstName, $lastName, $sex, $DOB, $address, $email, $user_image)
    {

        $this->db->connect();
        $this->db->update('patient', array('first_name' => '"' . $firstName . '"', 'last_name' => '"' . $lastName . '"', 'sex' => '"' . $sex . '"', 'DOB' => '"' . $DOB . '"', 'address' => '"' . $address . '"', 'email' => '"' . $email . '"', 'user_image' => '"' . $user_image . '"'), 'username="' . $username . '"'); // Table name, column names and values, WHERE conditions
    }

    public function Insert($username, $password, $firstName, $lastName, $DOB, $address, $email, $phone, $sex, $user_image)
    {

        $this->db->connect();
        $results = $this->getresultsforaperson($username);
        if (sizeof($results) == 0) {
            $address = $this->db->escapeString($address); // Escape any input before insert
            $email = $this->db->escapeString($email); // Escape any input before insert
            $this->db->insert('patient', array('username' => $username, 'password' => $password, 'first_name' => $firstName, 'last_name' => $lastName, 'sex' => $sex, 'phone' => $phone, 'DOB' => $DOB, 'address' => $address, 'email' => $email, 'user_image' => $user_image, 'phone' => $phone));  // Table name, column names and respective values
            $_SESSION['message1'] = "<font color=blue>User Added Succesfully</font>";
            header('Location: ..\Receptionist\Receptionist_Patient.php');
        } else {
            $_SESSION['message'] = "<font color=blue>sorry the username entered already exists</font>";
            header('Location: ..\Receptionist\Admin_Patient.php');

        }
    }
}

?>

<?php
session_start();
if (isset($_SESSION['current_user'])) {
    $current_user = $_SESSION['current_user'];
    $receptionist = new Receptionist($current_user);
    $receptionist_patient = new Receptionist_Patient();
} else {
    header("location:http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/index.php");
    exit();
}
if (isset($_POST['submit'])) {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $address = $_POST['postal_address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sex = $_POST['sex'];
    $DOB = $_POST['DOB'];
    $Destination = '../userfiles/avatars';
    if (!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])) {
        $user_image = 'default.jpg';
        move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$user_image");
    } else {
        $RandomNum = rand(0, 999999999);
        $ImageName = str_replace(' ', '-', strtolower($_FILES['ImageFile']['name']));
        $ImageType = $_FILES['ImageFile']['type'];
        $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
        $ImageExt = str_replace('.', '', $ImageExt);
        $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
        $user_image = $ImageName . '-' . $RandomNum . '.' . $ImageExt;
        move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$user_image");
    }
    $receptionist_patient->Insert($username, $password, $firstName, $lastName, $DOB, $address, $email, $phone, $sex, $user_image);


}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php include '../controllers/base/meta-tags.php' ?>
    <title>Receptionist Pannel</title>
    <?php include '../controllers/base/head.php' ?>


    <!--Script for Validating the data-->
    <script>
        function validateForm() {

//for alphabet characters only
            var str = document.form1.first_name.value;
            var valid = "abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            //comparing user input with the characters one by one
            for (i = 0; i < str.length; i++) {
                //charAt(i) returns the position of character at specific index(i)
                //indexOf returns the position of the first occurence of a specified value in a string. this method returns -1 if the value to search for never ocurs
                if (valid.indexOf(str.charAt(i)) == -1) {
                    alert("First Name Cannot Contain Numerical Values");
                    document.form1.first_name.value = "";
                    document.form1.first_name.focus();
                    return false;
                }
            }

            if (document.form1.first_name.value == "") {
                alert("Name Field is Empty");
                return false;
            }

//for alphabet characters only
            var str = document.form1.last_name.value;
            var valid = "abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            //comparing user input with the characters one by one
            for (i = 0; i < str.length; i++) {
                //charAt(i) returns the position of character at specific index(i)
                //indexOf returns the position of the first occurence of a specified value in a string. this method returns -1 if the value to search for never ocurs
                if (valid.indexOf(str.charAt(i)) == -1) {
                    alert("Last Name Cannot Contain Numerical Values");
                    document.form1.last_name.value = "";
                    document.form1.last_name.focus();
                    return false;
                }
            }


            if (document.form1.last_name.value == "") {
                alert("Name Field is Empty");
                return false;
            }

        }

    </script>
</head>

<body onload="set__noti();">

<div id="wrapper">

    <!-- Navigation -->
    <?php include 'Receptionist_Theme.php' ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Manage Patient</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="col-md-4 col-md-offset-4" id="alert">

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
                                    <table width="100%" class="table table-striped table-bordered table-hover"
                                           id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Phone No</th>
                                            <th>View Profile</th>
                                            <th>Update</th>
                                            <th>Appointment</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        /*
                                        View
                                        Displays all data from 'Patient' table
                                        */
                                        // get results from database
                                        $details = $receptionist_patient->getresults();

                                        // display data in table
                                        $count = sizeof($details);
                                        // loop through results of database query, displaying them in the table
                                        for ($i = 0; $i < $count; $i++) {
                                            // echo out the contents of each row into a table
                                            echo "<tr>";
                                            echo '<td>' . $details[$i]['patient_id'] . '</td>';
                                            echo '<td>' . $details[$i]['first_name'] . '</td>';
                                            echo '<td>' . $details[$i]['phone'] . '</td>';
                                            ?>
                                            <td>
                                                <button type='button'
                                                        onclick="get_profile('../Admin/profile.php?type=Patient&username=<?php echo $details[$i]['username'] ?>');"
                                                        class='modalEditarUsuario btn btn-primary' data-toggle='modal'
                                                        data-backdrop='static' data-keyboard='false' title='Profile'>
                                                    ViewProfile
                                                </button>
                                            </td>
                                            <td>
                                                <a href="update.php?type=Patient&username=<?php echo $details[$i]['username'] ?>">
                                                    <button type="button" class="btn btn-primary">Update</button>
                                                </a></td>
                                            <td>
                                                <button type='button'
                                                        onclick="get_app_modal('BookAppointmentModal.php?username=<?php echo $details[$i]['username'] ?>');"
                                                        id="bookappointment" class="btn btn-danger" data-toggle='modal'
                                                        data-backdrop='static' data-keyboard='false'
                                                        title='Appointment'>Get Appointment
                                                </button>
                                            </td>
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
                                        <form name="form1" class="form-signin" onsubmit="return validateForm(this);"
                                              method="post" action="Receptionist_Patient.php"
                                              enctype="multipart/form-data">
                                            <div class="col-md-6 column">
                                                <br>
                                                <label>Username</label>
                                                <input type="text" id="username" name="username" class="form-control"
                                                       placeholder="Username" required autofocus>
                                                <label>Image</label>
                                                <input type="file" id="ImageFile" name="ImageFile" class="form-control">
                                                <label>First Name</label>
                                                <input type="text" id="first_name" name="first_name"
                                                       class="form-control" placeholder="First Name" required autofocus>
                                                <label>Last Name</label>
                                                <input type="text" id="last_namer" name="last_name" class="form-control"
                                                       placeholder="Last Name" required autofocus>
                                                <p><label>Sex</label>
                                                    <select class="form-control" name="sex" id="sex">
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                        <option>Neutral</option>
                                                    </select></p>
                                            </div>
                                            <div class="col-md-6 column">
                                                <br>
                                                <label>DOB</label>
                                                <input type="date" id="DOB" name="DOB" class="form-control"
                                                       placeholder="Date Of Birth" required autofocus>
                                                <label>Postal Address</label>
                                                <input type="text" id="postal_address" name="postal_address"
                                                       class="form-control" placeholder="Postal Address" required
                                                       autofocus>
                                                <label>Phone</label>
                                                <input type="text" id="phone" name="phone" class="form-control"
                                                       placeholder="Phone" required autofocus>
                                                <label>Email address</label>
                                                <input type="email" id="email" name="email" class="form-control"
                                                       placeholder="Email address" required autofocus>
                                                <label>Password</label>
                                                <input type="password" id="password" name="password"
                                                       class="form-control" placeholder="Password" required>
                                                <P></P>
                                                <button class="btn btn-lg btn-primary btn-block" name="submit"
                                                        type="submit">Submit
                                                </button>
                                            </div>
                                        </form>
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
<!-- Modal -->
<!-- MODAL EDITAR-->
<div id="editarUsuario" class="modal fade modal" role="dialog">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">


            </div>
        </div>
    </div>
</div>

<div id="get__appointment" class="modal fade modal" role="dialog">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content" id="content_appointment">


            </div>
        </div>
    </div>
</div>
<?php include '../controllers/base/AfterBodyJS.php' ?>
<?php include 'js.php' ?>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>

<script>
    function get_profile(val) {
        console.log(val);
        $.ajax({
            url: "" + val, cache: false, success: function (result) {
                $(".modal-content").html(result);
            }
        });

        $('#editarUsuario').modal('show');
    }

</script>

<script>
    function get_app_modal(val) {
        console.log(val);
        $.ajax({
            url: "" + val, cache: false, success: function (result) {
                $(".modal-content").html(result);
            }
        });

        $('#editarUsuario').modal('show');
    }

</script>

<script>
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#ImageFile").change(function () {
        readURL(this);
    });
</script>

<?php include 'js.php' ?>
</body>

</html>
=======
<?php
include "../Adaptor/mysql_crud.php";
include "../UserClasses/User.php";
include("../UserClasses/Receptionist.php");

class Receptionist_Patient
{
    //essential constructor
    protected $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getresults()
    {
        $this->db->connect();
        $this->db->select('patient', 'first_name,last_name,username,sex,DOB,address,email,phone,user_image,patient_id', NULL, NULL, NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res = $this->db->getResult();
        return $res;
    }

    public function getresultsforaperson($username)
    {
        $quer = 'username="' . $username . '"';
        $this->db->connect();
        $this->db->select('patient', 'first_name,last_name,username,sex,DOB,address,email,phone,user_image,patient_id', NULL, $quer, NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res = $this->db->getResult();
        return $res;
    }

    public function Update($username, $firstName, $lastName, $sex, $DOB, $address, $email, $user_image)
    {

        $this->db->connect();
        $this->db->update('patient', array('first_name' => '"' . $firstName . '"', 'last_name' => '"' . $lastName . '"', 'sex' => '"' . $sex . '"', 'DOB' => '"' . $DOB . '"', 'address' => '"' . $address . '"', 'email' => '"' . $email . '"', 'user_image' => '"' . $user_image . '"'), 'username="' . $username . '"'); // Table name, column names and values, WHERE conditions
    }

    public function Insert($username, $password, $firstName, $lastName, $DOB, $address, $email, $phone, $sex, $user_image)
    {

        $this->db->connect();
        $results = $this->getresultsforaperson($username);
        if (sizeof($results) == 0) {
            $address = $this->db->escapeString($address); // Escape any input before insert
            $email = $this->db->escapeString($email); // Escape any input before insert
            $this->db->insert('patient', array('username' => $username, 'password' => $password, 'first_name' => $firstName, 'last_name' => $lastName, 'sex' => $sex, 'phone' => $phone, 'DOB' => $DOB, 'address' => $address, 'email' => $email, 'user_image' => $user_image, 'phone' => $phone));  // Table name, column names and respective values
            $_SESSION['message1'] = "<font color=blue>User Added Succesfully</font>";
            header('Location: ..\Receptionist\Receptionist_Patient.php');
        } else {
            $_SESSION['message'] = "<font color=blue>sorry the username entered already exists</font>";
            header('Location: ..\Receptionist\Admin_Patient.php');

        }
    }
}

?>

<?php
session_start();
if (isset($_SESSION['current_user'])) {
    $current_user = $_SESSION['current_user'];
    $receptionist = new Receptionist($current_user);
    $receptionist_patient = new Receptionist_Patient();
} else {
    header("location:http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/index.php");
    exit();
}
if (isset($_POST['submit'])) {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $address = $_POST['postal_address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sex = $_POST['sex'];
    $DOB = $_POST['DOB'];
    $Destination = '../userfiles/avatars';
    if (!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])) {
        $user_image = 'default.jpg';
        move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$user_image");
    } else {
        $RandomNum = rand(0, 999999999);
        $ImageName = str_replace(' ', '-', strtolower($_FILES['ImageFile']['name']));
        $ImageType = $_FILES['ImageFile']['type'];
        $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
        $ImageExt = str_replace('.', '', $ImageExt);
        $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
        $user_image = $ImageName . '-' . $RandomNum . '.' . $ImageExt;
        move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$user_image");
    }
    $receptionist_patient->Insert($username, $password, $firstName, $lastName, $DOB, $address, $email, $phone, $sex, $user_image);


}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php include '../controllers/base/meta-tags.php' ?>
    <title>Receptionist Pannel</title>
    <?php include '../controllers/base/head.php' ?>
	<?php include  "validation.php"; ?>

</head>

<body onload="set__noti();">

<div id="wrapper">

    <!-- Navigation -->
    <?php include 'Receptionist_Theme.php' ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Manage Patient</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="col-md-4 col-md-offset-4" id="alert">

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
                                    <table width="100%" class="table table-striped table-bordered table-hover"
                                           id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>First Name</th>
                                            <th>Phone No</th>
                                            <th>View Profile</th>
                                            <th>Update</th>
                                            <th>Appointment</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        /*
                                        View
                                        Displays all data from 'Patient' table
                                        */
                                        // get results from database
                                        $details = $receptionist_patient->getresults();

                                        // display data in table
                                        $count = sizeof($details);
                                        // loop through results of database query, displaying them in the table
                                        for ($i = 0; $i < $count; $i++) {
                                            // echo out the contents of each row into a table
                                            echo "<tr>";
                                            echo '<td>' . $details[$i]['patient_id'] . '</td>';
                                            echo '<td>' . $details[$i]['first_name'] . '</td>';
                                            echo '<td>' . $details[$i]['phone'] . '</td>';
                                            ?>
                                            <td>
                                                <button type='button'
                                                        onclick="get_profile('../Admin/profile.php?type=Patient&username=<?php echo $details[$i]['username'] ?>');"
                                                        class='modalEditarUsuario btn btn-primary' data-toggle='modal'
                                                        data-backdrop='static' data-keyboard='false' title='Profile'>
                                                    ViewProfile
                                                </button>
                                            </td>
                                            <td>
                                                <a href="update.php?type=Patient&username=<?php echo $details[$i]['username'] ?>">
                                                    <button type="button" class="btn btn-primary">Update</button>
                                                </a></td>
                                            <td>
                                                <button type='button'
                                                        onclick="get_app_modal('BookAppointmentModal.php?username=<?php echo $details[$i]['username'] ?>');"
                                                        id="bookappointment" class="btn btn-danger" data-toggle='modal'
                                                        data-backdrop='static' data-keyboard='false'
                                                        title='Appointment'>Get Appointment
                                                </button>
                                            </td>
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
                                            <form role="form" name="form1" class="form-signin"  onsubmit="return add_Staff();" id="form1" data-toggle="validate"  method="post" action="Receptionist_Patient.php" enctype="multipart/form-data">
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
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<!-- Modal -->
<!-- MODAL EDITAR-->
<div id="editarUsuario" class="modal fade modal" role="dialog">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">


            </div>
        </div>
    </div>
</div>

<div id="get__appointment" class="modal fade modal" role="dialog">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content" id="content_appointment">


            </div>
        </div>
    </div>
</div>
<?php include '../controllers/base/AfterBodyJS.php' ?>
<?php include 'js.php' ?>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>

<script>
    function get_profile(val) {
        console.log(val);
        $.ajax({
            url: "" + val, cache: false, success: function (result) {
                $(".modal-content").html(result);
            }
        });

        $('#editarUsuario').modal('show');
    }

</script>

<script>
    function get_app_modal(val) {
        console.log(val);
        $.ajax({
            url: "" + val, cache: false, success: function (result) {
                $(".modal-content").html(result);
            }
        });

        $('#editarUsuario').modal('show');
    }

</script>

<script>
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#ImageFile").change(function () {
        readURL(this);
    });
</script>

<?php include 'js.php' ?>
</body>

</html>
>>>>>>> 67d08a6c063055685503fcdd53b5b9b9317562ad

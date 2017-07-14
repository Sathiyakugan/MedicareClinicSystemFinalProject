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

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../controllers/base/meta-tags.php' ?>
    <title>Admin Pannel</title>
    <?php include '../controllers/base/head.php' ?>
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
                                            <td><a href="../Admin/delete.php?type=Doctor&username=<?php echo $details[$i]['username']?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
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
                                            <form name="form1" class="form-signin" id="form1" onSubmit="return formValidation();" method="post" action="Admin_Doctor.php" enctype="multipart/form-data">
                                                <div class="col-md-6 column">
                                                    <br>
                                                    <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" id="username" onBlur="userAvailability();" name="username" class="form-control" placeholder="Username"   required autofocus>
                                                    <span id="user-availability-status1" style="font-size:14px;"></span>
                                                    </div>
                                                    <div class="form-group">
                                                    <label>Image</label>
                                                    <input type="file" id="ImageFile" name="ImageFile" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                    <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name"   required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                    <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last Name"   required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <p><label>Specilaization</label>
                                                        <select class="form-control" name="field" id="field">
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
                                                        </select></p>
                                                    </div>
                                                    <div class="form-group">
                                                    <p><label>Sex</label>
                                                        <select class="form-control" name="sex" id="sex">
                                                            <option selected="" value="Default">(Select Gender)</option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female" >Female</option>
                                                            <option value="Neutral">Neutral</option>
                                                        </select></p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Phone</label>
                                                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone"   required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email address</label>
                                                        <input type="email" id="email"  name="email" class="form-control" placeholder="Email address" autofocus>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 column">
                                                    <br>

                                                    <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                                    <P><label>Fees</label>
                                                        <select class="form-control" name="fees" id="fees">
                                                            <option selected="" value="Default">(Select Fees)</option>
                                                            <option>800Rs</option
                                                            <option>1000Rs</option>
                                                            <option>1500Rs</option>
                                                            <option>2000Rs</option>
                                                            <option>2500Rs</option>
                                                        </select></p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Time Slots</label>
                                                        <select multiple  class="form-control" name="timeslots[]" id="timeslots">
                                                            <option selected="" value="Default">(Select Time slots)</option>
                                                            <option>06:00:00</option><option>07:00:00</option><option>08:00:00</option><option>09:00:00</option>
                                                            <option>10:00:00</option><option>11:00:00</option><option>12:00:00</option><option>13:00:00</option>
                                                            <option>14:00:00</option><option>15:00:00</option><option>16:00:00</option><option>17:00:00</option>
                                                            <option>18:00:00</option><option>19:00:00</option><option>20:00:00</option><option>21:00:00</option>
                                                            <option>22:00:00</option><option>23:00:00</option><option>00:00:00</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                    <label>DOB</label>
                                                    <input type="date" id="DOB" name="DOB" class="form-control" placeholder="Date Of Birth"   required autofocus>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Postal Address</label>
                                                    <input type="text" id="postal_address" name="postal_address" class="form-control" placeholder="Postal Address"   required autofocus>
                                                    </div>

                                                        <div class="form-group">
                                                        <label>Password</label>
                                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                                                        </div>
                                                    <div class="form-group">
                                                        <label>Confirm Password</label>
                                                        <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Password" required>
                                                    </div>
                                                    <div class="form-group">
                                                            <P></P>
                                                    <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit" id="formbutton">Submit</button>
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
<?php include  "Validationjs.php"?>
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

<script>
    function userAvailability() {
        var Case_Histroy=$('#Case_Histroy_ADD').val();
        var Medication=$('#Medication_ADD').val();
        var Note=$('#Note_ADD').val();

        jQuery.ajax({
            url: "check_availability.php",
            data: {username:$("#username").val(),type:"Doctor"},
            type: "POST",
            success:function(data){
                $("#user-availability-status1").html(data);
            },
            error:function (){}
        });
    }
</script>
</body>

</html>

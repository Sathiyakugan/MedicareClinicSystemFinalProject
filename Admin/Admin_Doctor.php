<?php
include "../Adaptor/mysql_crud.php";

class Admin_Doctor
{
    //essential constructor
    protected $db;
    public function __construct(){
        $this->db=Database::getInstance();
    }

    public function getresults(){
        $this->db->connect();
        $this->db->select('doctor','first_name,last_name,username,sex,DOB,address,email,phone,user_image,staff_id,doctor_id,field,description',NULL,NULL,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }

    public function getresultsforaperson($username){
        $quer='username="'.$username.'"';
        $this->db->connect();
        $this->db->select('doctor','first_name,last_name,username,sex,DOB,address,email,phone,user_image,staff_id,doctor_id,field,description',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }
    public function Update($username,$firstName,$lastName,$sex,$DOB,$address, $email,$user_image,$field,$description){

        $this->db->connect();
        $this->db->update('doctor',array('first_name'=>'"'.$firstName.'"','last_name'=>'"'.$lastName.'"','sex'=>'"'.$sex.'"','DOB'=>'"'.$DOB.'"','address'=>'"'.$address.'"','email'=>'"'.$email.'"','user_image'=>'"'.$user_image.'"','field'=>'"'.$field.'"','description="'.$description.'"'),'username="'.$username.'"'); // Table name, column names and values, WHERE conditions
    }

    public function Insert($username,$password,$firstName,$lastName,$DOB,$address,$email,$phone,$sex,$user_image,$staff_id,$field,$description){

        $this->db->connect();
        $results=$this->getresultsforaperson($username);
        if (sizeof($results)==0){
            $address = $this->db->escapeString($address); // Escape any input before insert
            $email=$this->db->escapeString($email); // Escape any input before insert
            $this->db->insert('doctor',array('username'=>$username,'password'=>$password,'first_name'=>$firstName,'last_name'=>$lastName,'sex'=>$sex,'phone'=>$phone,'DOB'=>$DOB,'address'=>$address,'email'=>$email,'user_image'=>$user_image,'staff_id'=>$staff_id,'phone'=>$phone,'field'=>$field,'description'=>$description));  // Table name, column names and respective values
            $_SESSION['message1']="<font color=blue>User Added Succesfully</font>";
            header("Refresh:0");
        }
        else{
            $_SESSION['message']="<font color=blue>sorry the username entered already exists</font>";
            header("Refresh:0");

        }


    }

    public function Delete($username){
        $this->db->connect();
        $res=getresults();
//        $firstName=$res[0]['first_name'];
//        $lastName=$res[0]['last_name'];
//        $sex=$res[0]['sex'];
//        $DOB=$res[0]['DOB'];
//        $address=$res[0]['address'];
//        $email=$res[0]['email'];
//        $phone=$res[0]['phone'];
//        $user_image=$res[0]['user_image'];
//        $staff_id=$res[0]['staff_id'];
//        $doctor_id=$res[0]['doctor_id'];

        //Before Deleting Users Adding to deleted Stafffs Table
        //$this->db->insert('deletedstaffs',array('username'=>$username,'password'=>$password,'first_name'=>$firstName,'last_name'=>$lastName,'sex'=>$sex,'phone'=>$phone,'DOB'=>$DOB,'address'=>$address,'email'=>$email,'user_image'=>$user_image,'staff_id'=>$staff_id,'phone'=>$phone));  // Table name, column names and respective values
        $this->db->insert('deletedstaffs',$res);  // Table name, column names and respective values
        $this->db->delete('doctor',"'".$username."'");  // Table name, WHERE conditions
    }

}

?>








<?php
session_start();
if(isset($_SESSION['username'])){
    //$id=$_SESSION['admin_id'];
    $username=$_SESSION['username'];
    $admin_doctor= new Admin_Doctor();
}else{
    header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
    exit();
}
if(isset($_POST['submit'])){
    $firstName=$_POST['first_name'];
    $lastName=$_POST['last_name'];
    $staff_id=$_POST['staff_id'];
    $address=$_POST['postal_address'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sex=$_POST['sex'];
    $DOB=$_POST['DOB'];
    $field=$_POST['field'];
    $description='';
if (is_array ( $_POST ['description'] )) {
    foreach ($_POST ['description'] as $value) {
        $description = $value + $description;
    }
}

    $admin_doctor->Insert($username,$password,$firstName,$lastName,$DOB,$address,$email,$phone,$sex,0,$staff_id,$field,$description);

//    $sql1=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM pharmacist WHERE username='$user'")or die(mysqli_error($GLOBALS["___mysqli_ston"]));
//    $result=mysqli_fetch_array($sql1);



//    if($result>0){
//        $message="<font color=blue>sorry the username entered already exists</font>";
//    }else{
//        $sql=mysqli_query($GLOBALS["___mysqli_ston"], "INSERT INTO pharmacist(first_name,last_name,staff_id,postal_address,phone,email,username,password,date)
//VALUES('$fname','$lname','$sid','$postal','$phone','$email','$user','$pas',NOW())");
//        if($sql>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin_pharmacist.php");
//        }else{
//            $message1="<font color=red>Registration Failed, Try again</font>";
//        }
//    }
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



    <!--Script for Validating the data-->
    <script>
        function validateForm()
        {

//for alphabet characters only
            var str=document.form1.first_name.value;
            var valid="abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            //comparing user input with the characters one by one
            for(i=0;i<str.length;i++)
            {
                //charAt(i) returns the position of character at specific index(i)
                //indexOf returns the position of the first occurence of a specified value in a string. this method returns -1 if the value to search for never ocurs
                if(valid.indexOf(str.charAt(i))==-1)
                {
                    alert("First Name Cannot Contain Numerical Values");
                    document.form1.first_name.value="";
                    document.form1.first_name.focus();
                    return false;
                }}

            if(document.form1.first_name.value=="")
            {
                alert("Name Field is Empty");
                return false;
            }

//for alphabet characters only
            var str=document.form1.last_name.value;
            var valid="abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            //comparing user input with the characters one by one
            for(i=0;i<str.length;i++)
            {
                //charAt(i) returns the position of character at specific index(i)
                //indexOf returns the position of the first occurence of a specified value in a string. this method returns -1 if the value to search for never ocurs
                if(valid.indexOf(str.charAt(i))==-1)
                {
                    alert("Last Name Cannot Contain Numerical Values");
                    document.form1.last_name.value="";
                    document.form1.last_name.focus();
                    return false;
                }}


            if(document.form1.last_name.value=="")
            {
                alert("Name Field is Empty");
                return false;
            }

        }

    </script>
</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php include 'AdminTheme.php'?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Manage Pharmasist</h1>
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
                                            <th>Last Name</th>
                                            <th>Username</th>
                                            <th>Field</th>
                                            <th>Description</th>
                                            <th>Email</th>
                                            <th>Phone No</th>
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
                                            echo '<td>' . $details[$i]['last_name'] . '</td>';
                                            echo '<td>' . $details[$i]['username'] . '</td>';
                                            echo '<td>' . $details[$i]['field'] . '</td>';
                                            echo '<td>' . $details[$i]['description'] . '</td>';
                                            echo '<td>' . $details[$i]['email'] . '</td>';
                                            echo '<td>' . $details[$i]['phone'] . '</td>';
                                            ?>
                                            <td><a href="../update_doctor.php?username=<?php echo $details[$i]['username']?>"><button type="button" class="btn btn-primary">Update</button></a></td>
                                            <td><a href="../delete_doctor.php?doctor_id=<?php echo $details[$i]['username']?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <div class="tab-pane fade" id="profile">

                                <div class="row">
                                    <div class="col-sm-5 col-md-6">
                                        <form name="form1" class="form-signin" onsubmit="return validateForm(this);" method="post" action="Admin_Doctor.php">
                                            <h2 class="form-signin-heading">Input Valid Entries</h2>
                                            <label>Username</label>
                                            <input type="text" id="username" name="username" class="form-control" placeholder="Username"   required autofocus>
                                            <label>Image</label>
                                            <input type="file" id="user_image" name="user_image" class="form-control">
                                            <label>First Name</label>
                                            <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name"   required autofocus>
                                            <label>Last Name</label>
                                            <input type="text" id="last_namer" name="last_name" class="form-control" placeholder="Last Name"   required autofocus>
                                            <label>Staff ID</label>
                                            <input type="text" id="staff_id" name="staff_id" class="form-control" placeholder="Staff_id"   required autofocus>
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
                                            <p><label>Sex</label>
                                                <select class="form-control" name="sex" id="sex">
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                    <option>Neutral</option>
                                                </select></p>
                                            <label>Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                            <label>DOB</label>
                                            <input type="date" id="DOB" name="DOB" class="form-control" placeholder="Date Of Birth"   required autofocus>
                                            <label>Postal Address</label>
                                            <input type="text" id="postal_address" name="postal_address" class="form-control" placeholder="Postal Address"   required autofocus>
                                            <label>Phone</label>
                                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone"   required autofocus>
                                            <label>Email address</label>
                                            <input type="email" id="email"  name="email" class="form-control" placeholder="Email address" required autofocus>
                                            <label>Password</label>
                                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                                            <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Submit</button>
                                        </form>
                                    </div>
                                    </form>
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

<?php include '../controllers/base/AfterBodyJS.php' ?>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
</body>

</html>

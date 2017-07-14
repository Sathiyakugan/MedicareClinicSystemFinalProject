<?php
include "../Adaptor/mysql_crud.php";
include "../UserClasses/User.php";
include ("../UserClasses/Admin.php");

class Admin_Patient
{
    //essential constructor
    protected $db;
    public function __construct(){
        $this->db=Database::getInstance();
    }

    public function getresults(){
        $this->db->connect();
        $this->db->select('patient','first_name,last_name,username,sex,DOB,address,email,phone,user_image,patient_id',NULL,NULL,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }

    public function getresultsforaperson($username){
        $quer='username="'.$username.'"';
        $this->db->connect();
        $this->db->select('patient','first_name,last_name,username,sex,DOB,address,email,phone,user_image,patient_id',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }
    public function Update($username,$firstName,$lastName,$sex,$DOB,$address, $email,$user_image){

        $this->db->connect();
        $this->db->update('patient',array('first_name'=>'"'.$firstName.'"','last_name'=>'"'.$lastName.'"','sex'=>'"'.$sex.'"','DOB'=>'"'.$DOB.'"','address'=>'"'.$address.'"','email'=>'"'.$email.'"','user_image'=>'"'.$user_image.'"'),'username="'.$username.'"'); // Table name, column names and values, WHERE conditions
    }

    public function Insert($username,$password,$firstName,$lastName,$DOB,$address,$email,$phone,$sex,$user_image){

        $this->db->connect();
        $results=$this->getresultsforaperson($username);
        if (sizeof($results)==0){
            $address = $this->db->escapeString($address); // Escape any input before insert
            $email=$this->db->escapeString($email); // Escape any input before insert
            $this->db->insert('patient',array('username'=>$username,'password'=>$password,'first_name'=>$firstName,'last_name'=>$lastName,'sex'=>$sex,'phone'=>$phone,'DOB'=>$DOB,'address'=>$address,'email'=>$email,'user_image'=>$user_image,'phone'=>$phone));  // Table name, column names and respective values
            $_SESSION['message1']="<font color=blue>User Added Succesfully</font>";
            header('Location: ..\Admin\Admin_Patient.php');
        }
        else{
            $_SESSION['message']="<font color=blue>sorry the username entered already exists</font>";
            header('Location: ..\Admin\Admin_Patient.php');

        }
    }
    public function Delete($username){
        $this->db->connect();
        $res=getresults();
        $this->db->insert('deletedstaffs',$res);
        $this->db->delete('patient',"'".$username."'");  // Table name, WHERE conditions
    }
}
?>

<?php
session_start();
if(isset($_SESSION['current_user'])){
    $current_user=$_SESSION['current_user'];
    $admin=new Admin($current_user);
    $admin_patient= new Admin_Patient();
}else{
    header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
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
    $admin_patient->Insert($username,$password,$firstName,$lastName,$DOB,$address,$email,$phone,$sex,$user_image);


}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <?php include '../controllers/base/meta-tags.php' ?>
    <title>Admin Pannel</title>
    <?php include '../controllers/base/head.php' ?>



    <!--Script for Validating the data-->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <!-- jquery validation plugin //-->

    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.js"></script>
    <script type="text/javascript" src="validation_reg.js"></script>
    <script>


    $(document).ready(function(
            {
                $("#form1").validate(

                {

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
                            email: true //email is required AND must be in the form of a valid email address

                        },
                        password: {
                            required: true,
                            minlength: 6

                        }
                    },

//specify validation error messages
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
                    // Make sure the form is submitted to the destination defined
                    // in the "action" attribute of the form when valid
                    submitHandler: function(form) {
                        form.submit();
                    }
                });
            });

    </script>
   <script >
       function checkname(val){

           var name=val;

           if(name)
           {
               $.ajax({
                   type: 'POST',
                   url: 'checkUserName.php?type=patient',
                   data: {
                       user_name:name,
                   },
                   success: function (response) {
                       $( '#name_status' ).html(response);
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
               $( '#name_status' ).html("");
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
                    url: 'checkEmail.php',
                    data: {
                        user_email:email,
                    },
                    success: function (response) {
                        $( '#email-status' ).html(response);
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
                <h1 class="page-header">Manage Patient</h1>
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
                                        Displays all data from 'Patient' table
                                        */
                                        // get results from database
                                        $details=$admin_patient->getresults();

                                        // display data in table
                                        $count=sizeof($details);
                                        // loop through results of database query, displaying them in the table
                                        for($i=0;$i<$count;$i++) {
                                            // echo out the contents of each row into a table
                                            echo "<tr>";
                                            echo '<td>' . $details[$i]['patient_id'] . '</td>';
                                            echo '<td>' . $details[$i]['first_name'] . '</td>';
                                            echo '<td>' . $details[$i]['phone'] . '</td>';
                                            ?>
                                            <td><button type='button' data-a="../Admin/profile.php?type=Patient&username=<?php echo $details[$i]['username']?>" href='#editarUsuario' class='modalEditarUsuario btn btn-primary'  data-toggle='modal' data-backdrop='static' data-keyboard='false' title='Editar usuario'>ViewProfile</button></td>
                                            <td><a href="../Admin/update.php?type=Patient&username=<?php echo $details[$i]['username']?>"><button type="button" class="btn btn-primary">Update</button></a></td>
                                            <td><a href="../Admin/delete.php?type=Patient&username=<?php echo $details[$i]['username']?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <div class="tab-pane fade" id="profile">
                                <form name="form1" id="form1" class="form-signin form-control"  method="post" action="Admin_Patient.php" enctype="multipart/form-data">
                                    <div class="col-md-4 column">
                                        <hr>
                                        <label>Username</label>
                                        <input type="text" name="username" id="UserName" onkeyup="checkname(this.value);" class="form-control" required autofocus>
                                        <span id="name_status"></span>
                                        <br>
                                        <label>Image</label>
                                        <input type="file" id="ImageFile" name="ImageFile" class="form-control">
                                        <label>First Name</label>
                                        <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name"   required autofocus>
                                        <label>Last Name</label>
                                        <input type="text" id="last_namer" name="last_name" class="form-control" placeholder="Last Name"   required autofocus>
                                        <p><label>Sex</label>
                                            <select class="form-control" name="sex" id="sex">
                                                <option>Male</option>
                                                <option>Female</option>
                                                <option>Neutral</option>
                                            </select></p>
                                    </div>
                                    <div class="col-md-4 column">
                                        <hr>
                                        <label>DOB</label>
                                        <input type="date" id="DOB" name="DOB" class="form-control" placeholder="Date Of Birth"   required autofocus>
                                        <label>Postal Address</label>
                                        <input type="text" id="postal_address" name="postal_address" class="form-control" placeholder="Postal Address"   required autofocus>
                                        <label>Phone</label>
                                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone"   required autofocus>
                                        <label>Email address</label>
                                        <input type="email" id="email" onkeyup="checkemail(this.value);" name="email" class="form-control" placeholder="Email address" required autofocus>
                                        <span id="email-status"></span>
                                        <br>
                                        <label>Password</label>
                                        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                                        <P></P>
                                        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                            </form>
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

<?php include '../controllers/base/AfterBodyJS.php' ?>
<?php include 'GetNotifications.php' ?>

<script>
    $('.modalEditarUsuario').click(function(){
        var ID=$(this).attr('data-a');
        $.ajax({url:""+ID,cache:false,success:function(result){
            $(".modal-content").html(result);
        }});
    });
</script>

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

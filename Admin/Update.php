<?php
session_start();

include "../Adaptor/mysql_crud.php";
include ("../UserClasses/user.php");
include ("../UserClasses/Admin.php");
include ("../UserClasses/Nurse.php");
include ("../UserClasses/Doctor.php");
include ("../UserClasses/Patient.php");
include ("../UserClasses/Pharmasist.php");
include ("../UserClasses/Receptionist.php");
if(isset($_SESSION['login'])){
    $current_user= (string)$_SESSION['current_user'];
    $username=$_REQUEST['username'];
    $admin=new Admin($current_user);
    $userobject=null;
    $type=$_REQUEST['type'];
    switch ($type){
        case 'Nurse':
            $userobject=new Nurse($username);
            break;
        case 'Patient':
            $userobject=new Patient($username);
            break;
        case 'Receptionist':
            $userobject=new Receptionist($username);
            break;
        case 'Pharmacist':
            $userobject=new Pharmasist($username);
            break;
        case 'Doctor':
            $userobject=new Doctor($username);
            break;
        case 'Admin':
            $userobject= new Admin($current_user);
    }
}else{
    header("../index.php");
    exit();
}
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $firstName=$_POST['first_name'];
    $lastName=$_POST['last_name'];
    $address=$_POST['postal_address'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $sex=$_POST['sex'];
    $DOB=$_POST['DOB'];
    $Destination = '../userfiles/avatars';
    if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])){
        $user_image= $userobject->getUserImage();
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
    if($type=='Doctor'){
    $field=$_POST['field'];
    $description='';


    if (is_array ( $_POST ['description'] )) {
        foreach ($_POST ['description'] as $value) {
            $description = $value + $description;
        }
    }
    else{
        $description=$_POST ['description'];
    }
    }

     switch ($type){
        case 'Nurse':
            $userobject->SetBulk($firstName,$lastName,$sex,$DOB,$address, $email,$user_image,$phone);
            $_SESSION['message1']="<font color=blue>Updated Successfully</font>";
            echo $_SESSION['message1'];
            header("Location: ../Admin/update.php?type=$type&username=$username");
            break;
        case 'Patient':
            $userobject->SetBulk($firstName,$lastName,$sex,$DOB,$address, $email,$user_image,$phone);
            $_SESSION['message1']="<font color=blue>Updated Successful</font>";
            header("Location: ../Admin/update.php?type=$type&username=$username");;
            break;
        case 'Receptionist':
            $userobject->SetBulk($firstName,$lastName,$sex,$DOB,$address,$email,$user_image,$phone);
            $_SESSION['message1']="<font color=blue><?php echo $firstName; ?> Updated Successfully</font>";
            header("Location: ../Admin/update.php?type=$type&username=$username");
            break;
        case 'Pharmacist':
            $userobject->SetBulk($firstName,$lastName,$sex,$DOB,$address, $email,$user_image,$phone);
            $_SESSION['message1']="<font color=blue>Updated Successful</font>";
            header("Location: ../Admin/update.php?type=$type&username=$username");
            break;
        case 'Doctor':
            $userobject->SetBulk($firstName,$lastName,$sex,$DOB,$address, $email,$user_image,$field,$description,$phone);
            $_SESSION['message1']="<font color=blue>Updated Successful</font>";
          header("Location: ../Admin/update.php?type=$type&username=$username");
            break;
         case 'Admin':
             $userobject->SetBulk($firstName,$lastName,$sex,$DOB,$address, $email,$user_image,$phone);
             $_SESSION['message1']="<font color=blue>Updated Successfully</font>";
             echo $_SESSION['message1'];
             header("Location: ../Admin/update.php?type=$type&username=$username");
             break;
    }



}







?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <?php include '../controllers/base/meta-tags.php' ?>
        <title>Admin Pannel</title>
        <?php include '../controllers/base/head.php' ?>
        <link href="../style/main.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript">


        </script>
    </head>
<body>


<div id="wrapper">

    <!-- Navigation -->
    <?php include 'AdminTheme.php';?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Manage <?php echo $type?> </h1>
            </div>
            <div class="col-md-4 col-md-offset-4">
                <?php
                if ((!isset($_POST['submit']))){
                if ( isset($_SESSION['message'])){
                    echo '<div class="alert alert-danger"><strong>Invalid Login!</strong>'.$_SESSION['message'].'</div>';
                    unset($_SESSION['message']);
                }
                if ( isset($_SESSION['message1'])){
                    echo '<div class="alert alert-success"><strong>Success!</strong> '.$_SESSION['message1'].'</div>';
                    unset($_SESSION['message1']);
                }
                }
                ?>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Update Profile
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <center>
                            <img src="../userfiles/avatars/<?php echo $userobject->getUserImage();?>" class="img-responsive profile-avatar">
                        </center>
                        <form name="form1" class="form-signin" onsubmit="return validateForm(this);" method="post" action="update.php?type=<?php echo $type; ?>&username=<?php echo $username; ?>" enctype="multipart/form-data">
                            <div class="col-md-4 column">
                                <label> User name</label>
                                <input class="form-control" name="username" type="text" id="username"  placeholder="<?php echo $userobject->getUsername();?>" value="<?php echo  $userobject->getUsername();?>" required onfocus></br>
                                <div id="disp"></div>
                                <label>Image</label>
                                <input type="file" id="ImageFile" name="ImageFile" class="form-control">
                                <label>First Name</label>
                                <input type="text" id="first_name" name="first_name" class="form-control" placeholder="<?php echo $userobject->getFirstName();?>" value="<?php echo  $userobject->getFirstName();?>"   required autofocus>
                                <label>Last Name</label>
                                <input type="text" id="last_namer" name="last_name" class="form-control"  placeholder="<?php echo $userobject->getLastName();?>" value="<?php echo $userobject->getLastName();?>"   required autofocus>
                                <?php
                                if ($type=='Doctor'){
                                    ?>
                                    <p><label>Specilaization</label>
                                        <select class="form-control" name="field" id="field">
                                            <option selected="selected">
                                                <?php echo $userobject->getField();?>
                                            </option>
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
                                <?php } ?>
                                <p><label>Sex</label>
                                    <select class="form-control" name="sex" id="sex">
                                        <option selected="selected">
                                            <?php echo $userobject->getSex();?>
                                        </option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Neutral</option>
                                    </select></p>
                            </div>
                            <div class="col-md-4 column">
                                <?php
                                if ($type=='Doctor'){
                                    ?>
                                    <label>Description</label>
                                    <textarea class="form-control" id="description" name="description" rows="3"  placeholder="<?php echo $userobject->getDescription();?>" rows="3" placeholder="<?php echo $userobject->getAddress();?>  value="<?php echo $userobject->getDescription();?>"></textarea>
                                <?php } ?>
                                <label>DOB</label>
                                <input type="date" id="DOB" name="DOB" class="form-control"  placeholder="<?php echo $userobject->getDOB();?>" value="<?php echo $userobject->getDOB();?>"  required autofocus>
                                <label>Postal Address</label>
                                <input type="text" id="postal_address" name="postal_address" class="form-control"  placeholder="<?php echo $userobject->getAddress();?>"  value="<?php echo $userobject->getAddress();?>"<?php echo $userobject->getAddress();?>   required autofocus>
                                <label>Phone</label>
                                <input type="text" id="phone" name="phone" class="form-control"  placeholder="<?php echo $userobject->getPhone();?>" value="<?php echo $userobject->getPhone();?>"   required autofocus>
                                <label>Email address</label>
                                <input type="email" id="email"  name="email" class="form-control"  placeholder="<?php echo $userobject->getEmail();?>" value="<?php echo $userobject->getEmail();?>" required autofocus>
                                <P></P>
                                <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                    </form>
                    <!-- /.col-lg-12 -->
                </div>
            </div>
            <!-- /.panel-body -->
            <!-- </div> -->
        </div>
    </div>
</div>
</body>
</html>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
<?php include '../controllers/base/AfterBodyJS.php' ?>
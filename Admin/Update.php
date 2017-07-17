<?php
session_start();

include "../Adaptor/mysql_crud.php";
include ("../UserClasses/user.php");
include ("../UserClasses/Admin.php");
include ("../UserClasses/Nurse.php");
include ("../UserClasses/Doctor.php");
include ("../UserClasses/Patient.php");
include ("../UserClasses/Pharmacist.php");
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
            $userobject=new Pharmacist($username);
            break;
        case 'Doctor':
            $userobject=new Doctor($username);
            break;
    }
}else{
    header("../index.php");
    exit();
}
if(isset($_POST['submit'])){

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
			header("Location: ../Admin/Admin_Nurse.php");
            break;
        case 'Patient':
            $userobject->SetBulk($firstName,$lastName,$sex,$DOB,$address, $email,$user_image,$phone);
            $_SESSION['message1']="<font color=blue>Updated Successful</font>";
            header("Location: ../Admin/update.php?type=$type&username=$username");
			header("Location: ../Admin/Admin_Patient.php");
            break;
        case 'Receptionist':
            $userobject->SetBulk($firstName,$lastName,$sex,$DOB,$address,$email,$user_image,$phone);
            $_SESSION['message1']="<font color=blue><?php echo $firstName; ?> Updated Successfully</font>";
            header("Location: ../Admin/update.php?type=$type&username=$username");
			header("Location: ../Admin/Admin_Receptionist.php");
            break;
        case 'Pharmacist':
            $userobject->SetBulk($firstName,$lastName,$sex,$DOB,$address, $email,$user_image,$phone);
            $_SESSION['message1']="<font color=blue>Updated Successful</font>";
            header("Location: ../Admin/update.php?type=$type&username=$username");
			header("Location: ../Admin/Admin_Pharmacist.php");
            break;
        case 'Doctor':
            $userobject->SetBulk($firstName,$lastName,$sex,$DOB,$address, $email,$user_image,$field,$description,$phone);
            $_SESSION['message1']="<font color=blue>Updated Successful</font>";
            header("Location: ../Admin/update.php?type=$type&username=$username");
            header("Location: ../Admin/Admin_Doctor.php");
			
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
		<?php include  "validation.php"; ?>
        <link href="../style/main.css" rel="stylesheet">
    </head>
<div id="wrapper">

    <!-- Navigation -->
    <?php include 'AdminTheme.php'?>

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

                        <div class="col-md-8">
                        <center>
                            <img src="../userfiles/avatars/<?php echo $userobject->getUserImage();?>" class="img-responsive profile-avatar">
                        </center>
                                            <form role="form" name="form1" class="form-signin"  onsubmit="return add_Staff();" id="form1" data-toggle="validate"  method="post" action="update.php?type=<?php echo $type; ?>&username=<?php echo $username; ?>" enctype="multipart/form-data">
                                                <div class="col-md-6 column">
                                                    <br>

                                                    <div class="form-group">
                                                        <label>Image</label>
                                                        <input type="file" id="ImageFile" name="ImageFile" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <input type="text" id="first_name" name="first_name"  onkeyup="return checkFirstname(this.value);" class="form-control" placeholder="First Name" value="<?php echo  $userobject->getFirstName();?>"  required autofocus>

                                                        <span id="first_name_status" class="text-danger"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input type="text" id="last_name" name="last_name" onkeyup="return checkLastname(this.value);" class="form-control" placeholder="Last Name" value="<?php echo  $userobject->getLastName();?>"   required autofocus>
                                                        <span id="last_name_status"></span>
                                                    </div>
                                                    <div class="form-group">
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
														<span id="Specilaization_status"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Sex</label>
                                                        <select class="form-control" onkeyup="return genderSelect(this.value);" name="sex" id="sex">
                                                            <option selected="selected" value="Default"> <?php echo  $userobject->getSex();?></option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female" >Female</option>
                                                            <option value="Neutral">Neutral</option>
                                                        </select>
                                                        <span id="gender_name_status"> </span>
                                                    </div>

                                                </div>
                                                <div class="col-md-6 column">
                                                  
                                                    <div class="form-group">
														<?php
														if ($type=='Doctor'){
														?>
															<label>Description</label>
															<textarea class="form-control" id="description" name="description" rows="3" value="<?php echo  $userobject->getDiscription();?>" placeholder="<?php echo $userobject->getDescription();?>" rows="3" placeholder="<?php echo $userobject->getAddress();?>  value="<?php echo $userobject->getDescription();?>"></textarea>
														<?php } ?>
														
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Phone</label>
                                                        <input type="text" id="phone" onkeyup=" return Numbercheck(this.value,10);" value="<?php echo  $userobject->getPhone();?>" name="phone" class="form-control" placeholder="Phone"   required autofocus>
                                                        <span id="phone_name_status"> </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email address</label>
                                                        <input type="email" id="email" onblur="return checkemail(this.value);" onkeyup= "return ValidateEmail(this.value);" value="<?php echo  $userobject->getEmail();?>" name="email" class="form-control" placeholder="Email address" required autofocus>
                                                        <span id="email1_name_status"> </span><br/>
                                                        <span id="email-status"> </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>DOB</label>
                                                        <input type="date" id="DOB" name="DOB" onkeyup="return DOBSelect(this.value);" value="<?php echo  $userobject->getDOB();?>" class="form-control"  required autofocus>
														<span id="DOB_status" </span>
													</div>
                                                    <div class="form-group">
                                                        <label>Postal Address</label>
                                                        <input type="text" id="postal_address" onkeyup="checkAddress(this.value);" value="<?php echo  $userobject->getAddress();?>" name="postal_address" class="form-control" placeholder="Postal Address"   required autofocus>
                                                        <span id="address_name_status" </span>
                                                    </div>
                                                    <div class="form-group">
                                                        <P></P>
                                                        <button class="btn btn-lg btn-primary btn-block"  class="form-controls" name="submit" type="submit" id="sumit">Submit</button>
                                                    </div>
                                                </div>
                                            </form>

						</div>
                        <div class="col-md-4">
                            <h3> New Image Preview</h3>
                            <div class="profile"  >
                                <center>

                                    <img id="blah" src="#" alt="your image"
                                         class="img-responsive profile-avatar"/>
                                </center>
                            </div>
                        </div>


                    </div>
                    <!-- /.col-lg-12 -->
                </div>



            </div>


        </div>
            <!-- /.panel-body -->
            <!-- </div> -->
    </div>
</div>



<?php include '../controllers/base/AfterBodyJS.php' ?>
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

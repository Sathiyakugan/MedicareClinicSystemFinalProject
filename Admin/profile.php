<?php
session_start();

include "../Adaptor/mysql_crud.php";
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
        case 'Admin':
            $userobject=new Admin($username);
            break;
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
    }
}else{
    header("../index.php");
    exit();
}
?>


    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">Profile view</h2>
    </div>

            <div class="col-lg-12">
                <div class="profile">
                    <div class="row clearfix">
                        <!-- <div class="col-md-12 column"> -->
                        <div>
                            <center>
                                <img src="../userfiles/avatars/<?php echo $userobject->getUserImage();?>" class="img-responsive profile-avatar">
                            </center>
                            <h1 class="text-center profile-text profile-name"><?php echo $userobject->getFirstName();?> <?php echo $userobject->getLastName();?></h1>
                            <hr>
                            <h2 class="text-center profile-text profile-profession"><?php echo $type;?></h2>
                            <br>

                            <div class="panel-group white" id="panel-profile">
                                <div class="panel panel-default">
                                    <div id="panel-element-info" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <div class="col-md-6 column">
                                                <p class="text-center profile-title"><i class="fa fa-info"></i> Basic</p>
                                                <hr>
                                                <?php
                                                if ($type=='Doctor'){
                                                    ?>
                                                    <div class="col-md-6">
                                                        <p class="profile-details"><i class="fa fa-info"></i> Specialization</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?php echo $userobject->getField();?></p>
                                                    </div>
                                                <?php } ?>

                                                <div class="col-md-6">
                                                    <p class="profile-details"><i class="fa fa-info"></i> Location</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $userobject->getAddress();?></p>
                                                </div>


                                                <div class="col-md-6">
                                                    <p class="profile-details"><i class="fa fa-envelope"></i> Email</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $userobject->getEmail();?></p>
                                                </div>


                                                <div class="col-md-6">
                                                    <p class="profile-details"><i class="fa fa-info"></i> Country</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo "Srilanka";?></p>
                                                </div>

                                            </div>
                                            <div class="col-md-6 column">
                                                <p class="text-center profile-title"><i class="fa fa-info"></i> Personal</p>
                                                <hr>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="profile-details"><i class="fa fa-user"></i> Gender</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?php echo $userobject->getSex();?></p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p class="profile-details"><i class="fa fa-calendar"></i> Date of Birth</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><?php echo $userobject->getDOB();?></p>
                                                    </div>
                                                </div>


                                                <?php
                                                if ($type=='Doctor'){
                                                    ?>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="profile-details"><i class="fa fa-user"></i> Description</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p><?php echo $userobject->getDescription();?></p>
                                                        </div>
                                                    </div>
                                                <?php } ?>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>

<div class="modal-footer">
</div>
<?php
session_start();
include '../connect_db.php';
include '../Adaptor/mysql_crud.php';
include '../UserClasses/User.php';
include '../UserClasses/Patient.php';
include '../UserClasses/Diagnoist.php;';


if(isset($_SESSION['login'])){
    $username=$_REQUEST['username'];
    $userobject=new Patient($username);
    $diagnoist= new Diagnoist($username);


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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="profile-details"><i class="fa fa-info"></i> Date </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $diagnoist->getDate();?></p>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="profile-details"><i class="fa fa-envelope"></i> Doctor</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $diagnoist->getDoctor();?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="profile-details"><i class="fa fa-info"></i> Country</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo "Srilanka";?></p>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6 column">
                                    <p class="text-center profile-title"><i class="fa fa-info"></i> Prescription</p>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="profile-details"><i class="fa fa-user"></i> Report Type</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $diagnoist->getReport();?></p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="profile-details"><i class="fa fa-calendar"></i> Discription</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $diagnoist->getDiscription();?></p>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="profile-details"><i class="fa fa-user"></i> Note</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $diagnoist->getNote();?></p>
                                        </div>
                                    </div>




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
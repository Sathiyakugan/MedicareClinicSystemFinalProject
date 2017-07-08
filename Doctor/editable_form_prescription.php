
<?php
/**
 * Created by PhpStorm.
 * User: Anushan
 * Date: 7/3/2017
 * Time: 10:16 PM
 */
session_start();
include '../connect_db.php';
include '../Adaptor/mysql_crud.php';
include '../UserClasses/User.php';
include  '../UserClasses/Patient.php';
include 'Prescription.php';


if(isset($_SESSION['login'])){
    $username=$_REQUEST['username'];
    $userobject=new Patient($username);
    $prescription= new Prescription($username);

}else{
    header("../index.php");
    exit();
}

if(isset($_GET['submit'])) {
    echo $username;
    $Doctor = $_POST['doctor_name'];
    $Date = $_POST['date'];
    $Case_Histroy = $_POST['case_histroy'];
    $medication = $_POST['medication'];
    $note = $_POST['note'];


    $prescription->setbulk($Doctor, $Date, $Case_Histroy, $medication, $note);
    $_SESSION['message1']="<font color=blue>Updated Successfully</font>";
    echo $_SESSION['message1'];
    header("Location: editable_form_prescription.php?type=$type&username=$username");
}
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div id="editarUsuario2" class="modal fade modal" role="dialog">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h2 class="modal-title"> Edit Prescription</h2>
                </div>


                <div class="row">
                    <div class="col-lg-12">
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
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Prescription Details
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form method="get" role="form" enctype="multipart/form-data">

                                            <label>User Name</label>
                                            <input type="text"  name="user_name" class="form-control" placeholder="<?php echo $userobject->getUsername();?>" value="<?php echo  $prescription->getUsername();?>"   required autofocus>

                                            <p class="help-block">type pataint user name.</p>


                                            <label>Doctor Name</label>
                                            <input type="text"  name="doctor_name" class="form-control" placeholder="<?php echo $prescription->getDoctor();?>" value="<?php echo  $prescription->getDoctor();?>"   required autofocus>




                                            <label>Date </label>
                                            <input type="date"  name="date" class="form-control" placeholder="<?php echo $prescription->getDate();?>" value="<?php echo  $prescription->getDate();?>"   required autofocus>






                                            <label>Case Histroy</label>
                                            <textarea name="case_histroy"  class="form-control" rows="3" placeholder="<?php $prescription->getCase(); ?>"> <?php echo $prescription->getCase();?> </textarea>

                                            <label>Medication</label>
                                            <textarea name="mdication"  class="form-control" rows="3" placeholder="<?php echo  $prescription->getmedication();?>"> <?php echo  $prescription->getmedication();?> </textarea>


                                            <label>Note </label>
                                            <textarea name="note"  class="form-control" rows="3" placeholder="<?php echo  $prescription->getNote();?>"> <?php  echo  $prescription->getCase();?> </textarea>
                                            <div class="modal-footer">
                                                <button class="btn btn-success" name="submit">Submit</button>
                                                <a href="#" class="btn" data-dismiss="modal">Close</a>
                                            </div>

                                        </form>
                                    </div>


                                    <!-- /.col-lg-6 (nested) -->
                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
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

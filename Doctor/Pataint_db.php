<?php

/**
 * Created by PhpStorm.
 * User: Anushan
 * Date: 6/27/2017
 * Time: 11:53 PM
 */

include '../Adaptor/mysql_crud.php';
include "../UserClasses/User.php";
include ("../UserClasses/Doctor.php");


class Pataint_db
{
    //essential constructor
    protected $db;
    public function __construct(){
        $this->db=Database::getInstance();
    }

    public function getresults(){
        $this->db->connect();
        $this->db->select('patient','*',NULL,NULL,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }

    public function getresultsforaperson($username){
        $quer='username="'.$username.'"';
        $this->db->connect();
        $this->db->select('patient','Patient_ID,FirstName,LastName,Sex,DOB,Adress,Image,email,username',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
        $res =$this->db->getResult();
        return $res;
    }

}


?>
<?php
session_start();
if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
    $doctor= new Doctor($username);
    $pataint_db= new Pataint_db();
}else{
    header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include '../controllers/base/meta-tags.php' ?>
    <title>Doctor Pannel</title>
    <?php include '../controllers/base/head.php' ?>




</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <?php include 'Doctor_Theme.php' ?>
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Manage Patient </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="col-md-4 col-md-offset-4">
            <?php
            if ( isset($_SESSION['message'])){
                echo '<div class="alert alert-danger"><strong>Invalid Login!</strong>'.$_SESSION['message'].'</div>';
                unset($_SESSION['message']);
            }
            ?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Patiant Managing Panel
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#home" data-toggle="tab">View Patient</a>
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



                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        /*
                                        View
                                        Displays all data from 'Pharmacist' table
                                        */
                                        // get results from database
                                        $details=$pataint_db->getresults();
                                        // display data in table
                                        $count=sizeof( $details);
                                        // loop through results of database query, displaying them in the table
                                        for($i=0;$i<$count;$i++) {
                                            // echo out the contents of each row into a table
                                            echo "<tr>";
                                            echo '<td>' . $details[$i]['patient_id'] . '</td>';
                                            echo '<td>' . $details[$i]['first_name'] . '</td>';
                                            echo '<td>' . $details[$i]['phone'] . '</td>';
                                            ?>
                                            <td><button type='button' data-a="../Admin/profile.php?type=Patient&username=<?php echo $details[$i]['username']?>" href='#editarUsuario' class='modalEditarUsuario btn btn-primary'  data-toggle='modal' data-backdrop='static' data-keyboard='false' title='Editar usuario'>ViewProfile</button></td>
                                            <td> <div class="btn-group">
                                                    <button type="button" class="btn btn-primary">Action</button>
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" role="menu">
                                                        <li><a href="#">Tablet</a></li>
                                                        <li><a href="#">Smartphone</a></li>
                                                    </ul>
                                                </div></td>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
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
<?php include 'js_for_ajax.php' ?>
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

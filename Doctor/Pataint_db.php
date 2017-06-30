<?php

/**
 * Created by PhpStorm.
 * User: Anushan
 * Date: 6/27/2017
 * Time: 11:53 PM
 */

include '../Adaptar.php';
class Pataint_db
{
    //essential constructor
    protected $db;
    public function __construct(){
        $this->db=Database::getInstance();
    }

    public function getresults(){
        $this->db->connect();
        $this->db->select('patient','Patient_ID,FirstName,LastName,Sex,DOB,Adress,Image,email,username',NULL,NULL,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
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
    <?php include 'Doctor_thems.php' ?>
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

                                            <th>Patient ID</th>
                                            <th>UserName</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Sex</th>
                                            <th>DOB</th>
                                            <th>Address</th>
                                            <th>Image</th>
                                            <th>Email</th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        /*
                                        View
                                        Displays all data from 'Pharmacist' table
                                        */
                                        // get results from database
                                        $row=$pataint_db->getresults();
                                        // display data in table
                                        $count=sizeof( $row);
                                        // loop through results of database query, displaying them in the table
                                        for($i=0;$i<$count;$i++) {
                                            // echo out the contents of each row into a table
                                            echo "<tr>";
                                            echo '<td>' . $row[$i]['Patient_ID'] . '</td>';
                                            echo '<td>' . $row[$i]['username'] . '</td>';
                                            echo '<td>' . $row[$i]['FirstName'] . '</td>';
                                            echo '<td>' . $row[$i]['LastName'] . '</td>';
                                            echo '<td>' . $row[$i]['Sex'] . '</td>';
                                            echo '<td>' . $row[$i]['DOB'] . '</td>';
                                            echo '<td>' . $row[$i]['Adress'] . '</td>';
                                            echo '<td>' . $row[$i]['Image'] . '</td>';
                                            echo '<td>' . $row[$i]['email'] . '</td>';

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

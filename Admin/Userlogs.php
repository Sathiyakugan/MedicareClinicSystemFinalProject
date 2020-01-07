<?php
session_start();

include "../Adaptor/mysql_crud.php";
include "../UserClasses/User.php";
include ("../UserClasses/Admin.php");

if(isset($_SESSION['login'])){
    $current_user= (string)$_SESSION['current_user'];
    $admin=new Admin($current_user);
}else{
    header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <?php include '../controllers/base/meta-tags.php' ?>
    <title>Admin Pannel</title>
    <?php include '../controllers/base/head.php' ?>
    <link href="../style/main.css" rel="stylesheet">

</head>

<body>

<div id="wrapper">
    <!-- Navigation -->
    <?php include 'AdminTheme.php'?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">

                <h1 class="page-header">Login Reports</h1>

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="tab-content">

                <div class="tab-pane fade in active" id="home">
                    <br>
                    <div class="table-responsive">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>UserName</th>
                                <th>Field</th>
                                <th>LogIn</th>
                                <th>Status</th>
                                <th>LogOut</th>
                                <th>View Profile</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            /*
                            View
                            Displays all data from 'nurse' table
                            */
                            // get results from database
                            $details=$admin->getstafflogs();
                            // display data in table
                            $count=sizeof($details);
                            // loop through results of database query, displaying them in the table
                            for($i=0;$i<$count;$i++) {
                                // echo out the contents of each row into a table
                                echo "<tr>";
                                echo '<td>' . $details[$i]['id'] . '</td>';
                                echo '<td>' . $details[$i]['username'] . '</td>';
                                echo '<td>' . $details[$i]['type'] . '</td>';
                                echo '<td>' . $details[$i]['login'] . '</td>';
                                if( $details[$i]['status']==1){
                                    echo '<td>Login Succeed </td>';
                                }
                                else{
                                    echo '<td>Login Failed</td>';
                                }
                                echo '<td>' . $details[$i]['logout'] . '</td>';
                                ?>
                                <td><button type='button' data-a="../Admin/profile.php?type=<?php echo $details[$i]['type']?>&username=<?php echo $details[$i]['username']?>" href='#editarUsuario' class='modalEditarUsuario btn btn-primary'  data-toggle='modal' data-backdrop='static' data-keyboard='false' title='Editar usuario'>ViewProfile</button></td>
                                <?php
                            }

                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade in active" id="home">



                </div>

            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <?php include 'end.php' ?>
</body>

</html>

<?php
session_start();
include 'Paidpatiant.php';
include '../Adaptor/mysql_crud.php';
if(isset($_SESSION['login'])) {

    $current_user = $_SESSION['current_user'];
    $id=$_REQUEST['id'];
    $paid= new Paidpatiant($current_user);
    $paid->setResultbyViewed($id);
    echo "fdfdfdf";
    header("Refresh:0; url=Pataint_db.php");
}
    ?>
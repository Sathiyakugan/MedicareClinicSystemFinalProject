<?php
session_start();
include "Adaptor/mysql_crud.php";
$db = Database::getInstance();
$db->connect();
date_default_timezone_set('Asia/Colombo');
$ldate=date( 'd-m-Y h:i:s A', time () );
echo $ldate;
echo $_SESSION['session_id'];
$db->update('userlog',array('logout'=>$ldate),'id="'.$_SESSION['session_id'].'"'); // Table name, column names and values, WHERE conditions
unset($_SESSION['admin_id']);
unset($_SESSION['pharmacist_id']);
unset($_SESSION['cashier_id']);
unset($_SESSION['manager_id']);
unset($_SESSION['first_name']);
unset($_SESSION['last_name']);
unset($_SESSION['staff_id']);
unset($_SESSION['username']);
unset($_SESSION['login']);
unset($_SESSION['session_id']);
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
?>

<?php
session_start();
include '../_database\database.php';
if (isset($_REQUEST['registr_btn'])){
    $username=$_REQUEST['username'];
    $email=$_REQUEST['email'];
    $password=$_REQUEST['password'];
    $role=$_REQUEST['role'];
    include_once '../UserClasses/Admin.php';
    $admin = new admin();
    $register = $admin->reg_user($username,$email,$password,$role);

    $_SESSION['admin'] = serialize($admin);
    $_SESSION['message']='You are now logged in';
    $_SESSION['username']=$username;
    header('location: ../home.php?username='.$username);
    //header('location: ../update-profile-after-registration.php?username='.$username);
}
?>

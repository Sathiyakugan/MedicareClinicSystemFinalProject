<?php
session_start();

include "../Adaptor/mysql_crud.php";
include "../UserClasses/User.php";
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
        case 'Nurse':
            $userobject=new Nurse($username);
            $db=Database::getInstance();
            $db->connect();
            print_r($userobject->loadBulk($username)[0]);
            $db->insert('deletednurse',$userobject->loadBulk($username)[0]);  // Table name, column names and respective values
            $db->delete('nurse','username="'.$username.'"');  // Table name, WHERE conditions
            $_SESSION['message1']="<font color=blue>Deleted Successful</font>";
            header('Location: ..\Admin\Admin_Nurse.php');
            break;
            header();
        case 'Patient':
            $userobject=new Patient($username);
            $db=Database::getInstance();
            $db->connect();
            $db->insert('deletedpatient',$userobject->loadBulk($username)[0]);  // Table name, column names and respective values
            $db->delete('patient','username="'.$username.'"');  // Table name, WHERE conditions
            $_SESSION['message1']="<font color=blue>Deleted Successful</font>";
            header('Location: ..\Admin\Admin_Patient.php');
            break;
        case 'Receptionist':
            $userobject=new Receptionist($username);
            $db=Database::getInstance();
            $db->connect();
            $db->insert('deletedreceptionist',$userobject->loadBulk($username)[0]);  // Table name, column names and respective values
            $db->delete('receptionist','username="'.$username.'"');  // Table name, WHERE conditions
            $_SESSION['message1']="<font color=blue>Deleted Successful</font>";
            header('Location: ..\Admin\Admin_Receptionist.php');
            break;
        case 'Pharmacist':
            $userobject=new Pharmasist($username);
            $db=Database::getInstance();
            $db->connect();
            $db->insert('deletepharmacist',$userobject->loadBulk($username)[0]);  // Table name, column names and respective values
            $db->delete('pharmacist','username="'.$username.'"');  // Table name, WHERE conditions
            $_SESSION['message1']="<font color=blue>Deleted Successful</font>";
            header('Location: ..\Admin\Admin_Pharamacist.php');
            break;
        case 'Doctor':
            $userobject=new Doctor($username);
            $db=Database::getInstance();
            $db->connect();
            $db->insert('deleteddoctor',$userobject->loadBulk($username)[0]);  // Table name, column names and respective values
            $db->delete('doctor','username="'.$username.'"');  // Table name, WHERE conditions
            $_SESSION['message1']="<font color=blue>Deleted Successful</font>";
            header('Location: ..\Admin\Admin_Doctor.php');
            break;
    }
}else{
    header("../index.php");
    exit();
}
?>
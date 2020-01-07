<?php
/**
 * Created by PhpStorm.
 * User: Anushan
 * Date: 7/13/2017
 * Time: 3:04 PM
 */
include '../connect_db.php';
if(isset($_POST['user_email']))
{
    $type=$_REQUEST['type'];

    $emailId=$_POST['user_email'];

    $query=mysqli_query($con, "SELECT * FROM $type WHERE email='$emailId'");

    if(mysqli_num_rows($query)>0)
    {
        echo " <b>  <span style='font-size:13px; color: red'> Email Already Exist</span></b>";
    }
    else
    {
        echo " <b>  <span style='font-size:13px; color: green'>OK fine </span></b>";
    }
    exit();

}
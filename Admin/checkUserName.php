<?php
include '../connect_db.php';
if(isset($_POST['user_name']))
{
    $type=$_REQUEST['type'];
    $name=$_POST['user_name'];

    $query=mysqli_query($con, "SELECT * FROM $type WHERE username='$name'");

    if(mysqli_num_rows($query)>0)
    {
        echo " <b>  <span style='font-size:13px; color: red'> User Name Already Exist</span></b>";
    }
    else
    {
        echo " <b>  <span style='font-size:13px; color: green'>OK fine </span></b>";
    }
    exit();
}

?>
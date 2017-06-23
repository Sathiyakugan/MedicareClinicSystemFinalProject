<?php
    if(!isset($_SESSION))
    {
        session_start();

    }
    //require '_database/database.php';
if(!$_SESSION['username']){
    header("location:login.php?session=notset");
}
?>

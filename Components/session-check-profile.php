<?php
    session_start();
    require '_database/database.php';
    $username = mysqli_real_escape_string($database,$_REQUEST['username']);
    if((!$_SESSION['username'])){
        header("location:$username");
    }
?>

<?php
    session_start();
    require '_database/database.php';
    if(isset($_SESSION['username'])){
        header("location:home.php");
    }
    if ( isset($_SESSION['message'])){
      echo '<div class="error_msg">'.$_SESSION['message']."</div>";
      unset($_SESSION['message']);
    }
?>

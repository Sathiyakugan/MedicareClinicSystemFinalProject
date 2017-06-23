<?php
    session_start();
    $temp= $_SESSION['username'];
    ini_set("display_errors",1);
    if(isset($_POST)){
        require '../_database/database.php';
        session_start();
        $user_shortbio=$_REQUEST['user_shortbio'];
        $user_dob=$_REQUEST['user_dob'];
        $sql3="UPDATE kugan SET user_shortbio='$user_shortbio',user_dob='$user_dob' WHERE username = '$temp'";
        $username=$_SESSION['username'];
        $sql4="INSERT INTO kugan (user_shortbio,user_dob) VALUES ('$user_shortbio','$user_dob') WHERE username = $temp";
        $result = mysqli_query($database,"SELECT * FROM kugan WHERE username = '$username'");
        if( mysqli_num_rows($result) > 0) {
            mysqli_query($database,$sql3)or die(mysqli_error($database));
            header("location:../edit-profile.php?username=$username");
        }
        else{
            mysqli_query($database,$sql3)or die(mysqli_error($database));
            header("location:../edit-profile.php?username=$username");
        }
    }
?>

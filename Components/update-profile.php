<?php
    ini_set("display_errors",1);
    session_start();
    $temp=$_SESSION['username'];
    if(isset($_POST)){
        require '../_database/database.php';
        $Destination = '../userfiles/background-images';
        if(!isset($_FILES['BackgroundImageFile']) || !is_uploaded_file($_FILES['BackgroundImageFile']['tmp_name'])){
            $BackgroundNewImageName= 'default-background.jpg';
            move_uploaded_file($_FILES['BackgroundImageFile']['tmp_name'], "$Destination/$BackgroundNewImageName");
        }
        else{
            $RandomNum = rand(0, 9999999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['BackgroundImageFile']['name']));
            $ImageType = $_FILES['BackgroundImageFile']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $BackgroundNewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['BackgroundImageFile']['tmp_name'], "$Destination/$BackgroundNewImageName");
        }
        $sql1="UPDATE kugan SET user_backgroundpicture='$BackgroundNewImageName' WHERE username = '$temp'";
        $sql2="INSERT INTO kugan (user_backgroundpicture) VALUES ('$BackgroundNewImageName') WHERE username = '$temp'";
        $result = mysqli_query($database,"SELECT * FROM kugan WHERE username = '$temp'");
        if( mysqli_num_rows($result) > 0) {
            if(!empty($_FILES['BackgroundImageFile']['name'])){
                mysqli_query($database,$sql1)or die(mysqli_error($database));
                header("location:../edit-profile.php?username=$temp");
            }
        }
        else {
            mysqli_query($database,$sql2)or die(mysqli_error($database));
            header("location:../edit-profile.php?username=$temp");
        }
        $Destination = '../userfiles/avatars';
        if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])){
            $NewImageName= 'default.png';
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }
        else{
            $RandomNum   = rand(0, 9999999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['ImageFile']['name']));
            $ImageType = $_FILES['ImageFile']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }
        $sql5="UPDATE kugan SET user_avatar='$NewImageName' WHERE username = '$temp'";
        $sql6="INSERT INTO kugan (user_avatar) VALUES ('$NewImageName') WHERE username = '$temp'";
        $result = mysqli_query($database,"SELECT * FROM kugan WHERE username = '$temp'");
        if( mysqli_num_rows($result) > 0) {
            if(!empty($_FILES['ImageFile']['name'])){
                mysqli_query($database,$sql5)or die(mysqli_error($database));
                header("location:../edit-profile.php?username=$temp");
            }
        }
        else {
            mysqli_query($database,$sql6)or die(mysqli_error($database));
            header("location:../edit-profile.php?username=$temp");
        }
        $FirstName=$_REQUEST['FirstName'];
        $LastName=$_REQUEST['LastName'];
        $email=$_REQUEST['email'];
        $password=$_REQUEST['password'];
        $user_address=$_REQUEST['user_address'];
        $user_shortbio=$_REQUEST['user_shortbio'];

        $sql3="UPDATE kugan SET FirstName='$FirstName',LastName='$LastName',user_address='$user_address',email='$email',password='$password',user_shortbio='$user_shortbio',user_dob='$user_dob' WHERE username = '$temp'";
            mysqli_query($database,$sql3)or die(mysqli_error($database));
            header("location:../edit-profile.php?username=$temp&request=profile-update&status=success");
    }
?>

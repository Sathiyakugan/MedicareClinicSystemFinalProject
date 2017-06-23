<?php
    session_start();
    $temp= $_SESSION['username'];
    ini_set("display_errors",1);
    if(isset($_POST)){
        require '../_database/database.php';

        $Destination = '../userfiles/avatars';
        if(!isset($_FILES['ImageFile']) || !is_uploaded_file($_FILES['ImageFile']['tmp_name'])){
            $NewImageName= 'default.jpg';
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }
        else{
            $RandomNum = rand(0, 9999999999);
            $ImageName = str_replace(' ','-',strtolower($_FILES['ImageFile']['name']));
            $ImageType = $_FILES['ImageFile']['type'];
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt = str_replace('.','',$ImageExt);
            $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            move_uploaded_file($_FILES['ImageFile']['tmp_name'], "$Destination/$NewImageName");
        }

        $FirstName=$_REQUEST['FirstName'];
        $LastName=$_REQUEST['LastName'];
        $email=$_REQUEST['email'];
        $password=$_REQUEST['password'];



        include('class/mysql_crud.php');
        $db = new Database();
        $db->connect();
        $db->update('CRUDClass',array('name'=>"Name 4",'email'=>"name4@email.com"),'id="1" AND name="Name 1"'); // Table name, column names and values, WHERE conditions
        $res = $db->getResult();
        print_r($res);

        $username=$_SESSION['username'];
        $sql4="INSERT INTO user (FirstName,LastName,email,password,user_avatar) VALUES ('$FirstName','$LastName','$email','$password','$NewImageName') WHERE username = $temp";
        $result = mysqli_query($database,"SELECT * FROM user WHERE username = '$username'");
        if( mysqli_num_rows($result) > 0) {
            mysqli_query($database,$sql3)or die(mysqli_error($database));
            header('location: ../home.php?username='.$username);
            header("location:../update-bio-after-registration.php?username=$username&current_user=$username");
        }
        else{
            mysqli_query($database,$sql3)or die(mysqli_error($database));
            header("location:../update-bio-after-registration.php?username=$username&current_user=$username");
        }
    }
?>

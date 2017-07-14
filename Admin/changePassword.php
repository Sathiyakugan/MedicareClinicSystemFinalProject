<?php
/**
 * Created by PhpStorm.
 * User: Anushan
 * Date: 7/10/2017
 * Time: 3:00 PM
 */
include '../connect_db.php';
session_start();

if(isset($_SESSION['login'])){
    $current_user= (string)$_SESSION['current_user'];
echo $current_user;
        $password = md5($_POST['password']);
        $newpassword = md5($_POST['newpassword']);
        $confirmnewpassword = md5($_POST['confirmnewpassword']);

        $result = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT password FROM admin WHERE $current_user");

        if(!$result)
        {
            echo "The email entered does not exist!";
        }
        else
            if($password != mysqli_result($result,  0))
                  {
                echo "Entered an incorrect password";
            }

        if($newpassword == $confirmnewpassword)
        {
            $sql = mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE admin SET password = '$newpassword' WHERE $current_user");
        }

        if(!$sql)
        {
            echo "Congratulations, password successfully changed!";
        }
        else
        {
            echo "New password and confirm password must be the same!";
        }
    }
    ?>


<form name="newprwd" action="" method="post">

    Password :<input type="password" name="password" value=""><br>
    New Password :<input type="password" name="newpassword" value=""><br>
    Confirm Password :<input type="password" name="confirmnewpassword" value=""><br>
    <input type="submit" name="submit" value="submit"><br>
</form>
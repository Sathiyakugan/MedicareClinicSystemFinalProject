<?php

if(!empty($_POST["username"]) && !empty($_POST["type"]) ) {
include "../Adaptor/mysql_crud.php";
    $username=$_POST['username'];
    $db=Database::getInstance();
    $quer='username="'.$username.'"';
    $type=$_POST['type'];
    $res=null;
    switch ($type){
        case 'Nurse':
            $db->connect();
            $db->select('nurse','username',NULL,$quer,NULL);
            $res =$db->getResult();
            break;
        case 'Patient':
            $db->connect();
            $db->select('patient','username',NULL,$quer,NULL);
            $res =$db->getResult();
            break;
        case 'Receptionist':
            $db->connect();
            $db->select('receptionist','username',NULL,$quer,NULL);
            $res =$db->getResult();
            break;
        case 'Pharmacist':
            $db->connect();
            $db->select('doctor','username',NULL,$quer,NULL);
            $res =$db->getResult();
            break;
        case 'Doctor':
            $db->connect();
            $db->select('doctor','username',NULL,$quer,NULL);
            $res=$db->getResult();
            break;
    }

    if(sizeof($res)>0)
    {
        echo "<span style='color:red'> Email already exists .</span>";
        echo "<script>$('#submit').prop('disabled',true);</script>";
    } else{

        echo "<span style='color:green'> Email available for Registration .</span>";
        echo "<script>$('#submit').prop('disabled',false);</script>";
    }
}


?>

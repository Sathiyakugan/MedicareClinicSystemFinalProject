<?php
include "../Adaptor/mysql_crud.php";
include "../UserClasses/User.php";
include ("../UserClasses/Doctor.php");
$db=Database::getInstance();
$db->connect();
if(!empty($_POST["doctor"]))
{
    $quer='username="'.$_POST["doctor"].'"';
    $db->connect();
    $db->select('doctor','*',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
    $doctor=$db->getResult();
    $count=sizeof($doctor);
    for($i=0;$i<$count;$i++) {
        ?>
        <center>
            <img src="../userfiles/avatars/<?php echo $doctor[0]['user_image'];?>" class="img-responsive profile-avatar">
        </center>
        <h1 class="text-center profile-text profile-name"><?php echo $doctor[0]['first_name'];?> <?php echo $doctor[0]['last_name'];?></h1>
        <hr>
        <h2 class="text-center profile-text profile-profession"><?php echo $doctor[0]['field'];?></h2>
        <br>

        <?php
    }
}

?>
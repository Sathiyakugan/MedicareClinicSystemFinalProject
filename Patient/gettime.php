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
    $db->select('doctor_appointment_time','timeslot',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
    $time=$db->getResult();
    $count=sizeof($time);
    for($i=0;$i<$count;$i++) {
        ?>
        <option value="<?php echo htmlentities($time[$i]['timeslot']); ?>"><?php echo htmlentities($time[$i]['timeslot']); ?></option>
        <?php
    }
}
?>
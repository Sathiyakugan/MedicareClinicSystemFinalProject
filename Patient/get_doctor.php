<?php
include "../Adaptor/mysql_crud.php";
include "../UserClasses/User.php";
include ("../UserClasses/Doctor.php");
$db=Database::getInstance();
$db->connect();

if(!empty($_POST["field"]))
{
    $quer='field="'.$_POST["field"].'"';
    $db->connect();
    $db->select('doctor','*',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
    $doctors=$db->getResult();
    $count=sizeof($doctors);
?>
 <option selected="selected">Select Doctor </option>
 <?php
 for($i=0;$i<$count;$i++) {
 ?>
  <option value="<?php echo htmlentities($doctors[$i]['username']); ?>"><?php echo htmlentities($doctors[$i]['first_name']); ?></option>
  <?php
}
}

if(!empty($_POST["doctor"])) 
{
    $quer='username="'.$_POST["doctor"].'"';
    $db->connect();
    $db->select('doctor','fees',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
    $fees=$db->getResult();
    $count=sizeof($fees);
for($i=0;$i<$count;$i++) {
    ?>
    <option value="<?php echo htmlentities($fees[$i]['fees']); ?>"><?php echo htmlentities($fees[$i]['fees']); ?></option>
    <?php
}
}

?>


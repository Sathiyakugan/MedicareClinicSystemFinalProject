<?php
include "../Adaptor/mysql_crud.php";
include "../UserClasses/User.php";
include ("../UserClasses/Doctor.php");
$db=Database::getInstance();
$db->connect();

if(!empty($_POST["username"]))
{
    $quer='username="'.$_POST["username"].'"';
    $db->connect();
    $db->select('doctor','*',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
    $filed=$db->getResult();
    $count=sizeof($field);
    ?>
    <option selected="selected">Select Doctor </option>
    <?php
    for($i=0;$i<$count;$i++) {
        ?>
        <option value="<?php echo htmlentities($filed[$i]['field']); ?>"><?php echo htmlentities($doctors[$i]['field']); ?></option>
        <?php
    }
}
?>


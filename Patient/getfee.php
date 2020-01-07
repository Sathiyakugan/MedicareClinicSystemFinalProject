
<?php
$bd = ($GLOBALS["___mysqli_ston"] = mysqli_connect($mysql_hostname,  $mysql_user,  $mysql_password)) or die("Could not connect database");
mysqli_select_db( $bd, $mysql_database) or die("Could not select database");
if($_GET['action']=='doctorid'){
	$docinfo=$_POST['docinfo'];
	$query= mysqli_query($GLOBALS["___mysqli_ston"], "select * from doctors where doctorName=$docinfo");
	$array=mysqli_fetch_array($query);
	echo $array['docFees'];
	
	}
	?>

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
    $quer='username="'.$_POST["username"].'"';
    $db->connect();
    $db->select('doctor','fees',NULL,$quer,NULL); // Table name, Column Names, JOIN, WHERE conditions, ORDER BY conditions
    $fees=$db->getResult();
    $count=sizeof($doctors);
    $sql=mysqli_query($GLOBALS["___mysqli_ston"], "select docFees from doctors where id='".$_POST['doctor']."'");
    for($i=0;$i<$count;$i++) {
        ?>
        <option value="<?php echo htmlentities($doctors[$i]['fees']); ?>"><?php echo htmlentities($doctors[$i]['fees']); ?></option>
        <?php
    }
}

?>



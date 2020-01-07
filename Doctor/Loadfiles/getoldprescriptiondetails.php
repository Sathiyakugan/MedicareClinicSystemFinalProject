<<<<<<< HEAD
<?php
include "../../Adaptor/mysql_crud.php";
include ("Prescription.php");
if(!empty($_POST["id"]))
{
    $prescription_old=new Prescription();
    $prescription_old_res=$prescription_old->getresultsbydoctor($_POST["pname"],$_POST["dname"],$_POST["id"]);
    $count=sizeof($prescription_old_res);
    ?>
    <option value="">Select Prescription</option>
    <?php
    for($i=0;$i<$count;$i++) {
        ?>
        <option value="<?php echo htmlentities($prescription_old_res[$i]['ref_number']); ?>"><?php echo htmlentities($prescription_old_res[$i]['Date']); ?></option>
        <?php
    }
}
=======

<?php
session_start();
include "../../Adaptor/mysql_crud.php";
include ("Prescription.php");
if(isset($_SESSION['login']))
{

    $prescription_old=new Prescription();
    $prescription_old_res=$prescription_old->getresultsbydoctor($_POST["pname"],$_POST["dname"],$_POST["id"]);
    print_r($prescription_old_res);
    $count=sizeof($prescription_old_res);
    ?>
    <option value="">Select Prescription</option>
    <?php
    for($i=0;$i<$count;$i++) {
        ?>
        <option value="<?php echo htmlentities($prescription_old_res[$i]['ref_number']); ?>"><?php echo htmlentities($prescription_old_res[$i]['Date']); ?></option>
        <?php
    }
}
>>>>>>> 67d08a6c063055685503fcdd53b5b9b9317562ad
?>
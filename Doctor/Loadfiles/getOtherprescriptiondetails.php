<?php
include "../../Adaptor/mysql_crud.php";
include ("Prescription.php");
if(!empty($_POST["id"]))
{
    $prescription_old=new Prescription();
    $prescription_old_res=$prescription_old->getresultsbyothers($_POST["pname"],$_POST["dname"]);
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
?>
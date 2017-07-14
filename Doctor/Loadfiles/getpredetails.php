<?php
include "../../Adaptor/mysql_crud.php";
include ("Prescription.php");
$prescription_details_old=new Prescription();

if(!empty($_POST["Case_Histroy_id"]))
{
    $prescription_details=$prescription_details_old->getresultsbyID($_POST["Case_Histroy_id"]);
    $count=sizeof($prescription_details);
    for($i=0;$i<$count;$i++) {
        echo htmlentities($prescription_details[$i]['Case_Histroy']);
    }
}
if(!empty($_POST["Medication_id"]))
{
    $prescription_details=$prescription_details_old->getresultsbyID($_POST["Medication_id"]);
    $count=sizeof($prescription_details);
    for($i=0;$i<$count;$i++) {
        echo htmlentities($prescription_details[$i]['medication']);
    }
}
if(!empty($_POST["Note_id"]))
{
    $prescription_details=$prescription_details_old->getresultsbyID($_POST["Note_id"]);
    $count=sizeof($prescription_details);
    for($i=0;$i<$count;$i++) {
        echo htmlentities($prescription_details[$i]['Note']);
    }
}
?>


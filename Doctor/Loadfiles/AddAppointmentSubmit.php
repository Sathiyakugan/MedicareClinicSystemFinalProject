<?php
include "../../Adaptor/mysql_crud.php";
include ("Prescription.php");
$prescription=new Prescription();
if(isset($_POST)){

    $Note=htmlspecialchars($_POST['Note']);
    $Case_Histroy=htmlspecialchars($_POST['Case_Histroy']);
    $medication = htmlspecialchars($_POST['Medication']);
    $pname=$_POST['pname'];
    $danme=$_POST['dname'];
    $id=$_POST['id'];

    if($prescription->checkentry($id)){
        $prescription->update($pname,$danme,$Case_Histroy,$medication,$Note,$id);
    }
    else{
        $prescription->insert($pname,$danme,$Case_Histroy,$medication,$Note,$id);
    }
    ?>

    <div class="alert alert-success" id="alert"><strong><?php echo "Saved succesfully"; ?></strong></div>

<?php
}
?>


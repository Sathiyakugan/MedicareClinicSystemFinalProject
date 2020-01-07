<?php
if($prescription->checkentry($id)){
    $resultsaddprs=$prescription->getresultsbyID($id);
}


?>



<!-- Form -->

<div class="panel panel-default">
    <div class="panel-body">
<div class="col-md-12">
    <!-- /.panel-heading -->
    <form name="form1" class="form-signin" method="post" id="form_add_p" action="" enctype="multipart/form-data"">
        <div class="col-md-6">
            <div class="form-group">
                <label>Case_Histroy</label>
                <textarea class="form-control" id="Case_Histroy_ADD"  name="Case_Histroy" rows="4" placeholder="<?php echo($resultsaddprs[0]['Case_Histroy']); ?>"><?php echo($resultsaddprs[0]['Case_Histroy']); ?></textarea>
            </div>
            <div class="form-group">
                <label>Medication</label>
                <textarea class="form-control" id="Medication_ADD"  name="medication" rows="4" placeholder="<?php echo($resultsaddprs[0]['medication']); ?>"><?php echo($resultsaddprs[0]['medication']); ?></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Note</label>
                <textarea class="form-control" id="Note_ADD" name="Note" rows="7" placeholder="<?php echo($resultsaddprs[0]['Note']); ?>"><?php echo($resultsaddprs[0]['Note']); ?></textarea>
            </div>
            <button class="btn btn-lg btn-primary btn-block" name="submit" id="button_Add_p">Save</button>
        </div>

    </form>
    </form>
    <!-- /.col-lg-12 -->
</div>
    </div>
</div>

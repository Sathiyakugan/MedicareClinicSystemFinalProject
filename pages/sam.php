<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<div class="panel-body">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#add-p" data-toggle="tab">Add Prescription</a>
        </li>
        <li><a href="#old-p" data-toggle="tab">Old Prescription</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane fade in active" id="add-p">
            <h4>Add Prescription</h4>
            <div class="col-md-12">
                <!-- /.panel-heading -->
                <form name="form1" class="form-signin" method="post" action="" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <label>Case_Histroy</label>
                        <textarea class="form-control" id="Case_Histroy" name="Case_Histroy" rows="4" placeholder="Case_Histroy"></textarea>
                        <label>Medication</label>
                        <textarea class="form-control" id="Medication" name="Medication" rows="4" placeholder="Medication"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label>Note</label>
                        <textarea class="form-control" id="Note" name="Note" rows="4" placeholder="Note"</textarea>
                        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Submit</button>
                    </div>
                </form>
                </form>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <div class="tab-pane fade" id="old-p">
            <h4>Old Prescription of current Doctor</h4>
        </div>
    </div>\
</div>
<script  src="../vendor/jquery/jquery.min.js"></script>
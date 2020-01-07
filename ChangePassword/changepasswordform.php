<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h2 class="modal-title">Change Password</h2>
</div>
<div class="col-md-12">
    <br>
    <div class="col-md-8 col-md-offset-2" id="alertmsg"></div>
</div>

            <div class="col-lg-8 col-md-12">
            <div>
                <br>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form role="form" name="chngpwd" method="post" action="">
                            <div class="form-group">
                                <label for="exampleInputEmail1">
                                    Current Password
                                </label>
                                <input id="current_pass" type="password" name="cpass" class="form-control"  placeholder="Enter Current Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">
                                    New Password
                                </label>
                                <input type="password" name="npass" class="form-control" id="new_pass"  placeholder="New Password">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">
                                    Confirm Password
                                </label>
                                <input type="password" name="cfpass" class="form-control"  id="confirm_pass" placeholder="Confirm Password">
                            </div>
                            <button id="button_change" name="submit" class="btn btn-o btn-primary">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            </div>

<div class="modal-footer">
</div>
<?php include 'ChangePW_js.php'?>
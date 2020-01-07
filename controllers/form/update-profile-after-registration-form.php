<form action="components/update-profile-after-registration.php" method="post" enctype="multipart/form-data" id="UploadForm" autocomplete="off">
<?php
    $username = mysqli_real_escape_string($database,$_REQUEST['username']);
    $sql = "SELECT * FROM kugan WHERE username='$username'";
    $result = mysqli_query($database,$sql);
    $rws = mysqli_fetch_array($result);
?>

<div class="container">

    <h1>Edit Profile</h1>
    <hr>
  <div class="no-gutter row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <label for="">Avatar</label>
          <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
          <h6>Upload a different photo...</h6>

          <center><input name="ImageFile"  class="form-control" data-style="zoom-in"  type="file"/></center>
        </div>
      </div>

      <!-- edit form column -->
      <div class="col-md-9 personal-info">

        <h3>Personal info</h3>

        <form class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" placeholder="<?php echo $rws['FirstName'];?>" name="FirstName" value="<?php echo $rws['FirstName'];?>" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last Name:</label>
            <div class="col-lg-8">
              <input type="text" class="form-control"  placeholder="<?php echo $rws['LastName'];?>" name="LastName" value="<?php echo $rws['LastName'];?>" required>
            </div>
          </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input type="text" class="form-control" placeholder="<?php echo $rws['email'];?>" name="email" value="<?php echo $rws['email'];?>" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Username:</label>
            <div class="col-md-8">
                <input type="text" class="form-control" placeholder="<?php echo $rws['username'];?>" name="username" value="<?php echo $rws['username'];?>" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input type="password" class="form-control" placeholder="<?php echo $rws['password'];?>" name="password" value="<?php echo $rws['password'];?>" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <div class="submit">
        <center>
            <button class="btn btn-primary ladda-button" data-style="zoom-in" type="submit"  id="SubmitButton" value="Upload" />Save Your Profile</button>
        </center>
    </div>
              <span></span>
              <input type="reset"  class="btn btn-default" value="Cancel">

            </div>
            </div>
          </div>
        </form>
      </div>
  </div>
  </div>
</div>
<hr>
</form>

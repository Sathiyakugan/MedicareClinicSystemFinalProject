<form class="form-signin" onsubmit="return validate()" method="post" action="Components\registration.php">
  <h2 class="form-signin-heading">Please sign in</h2>
  <label for='usr'  class="sr-only">Username</label>
  <input type="text" id="inputuser" name="username" class="form-control" placeholder="Username"   required autofocus>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" id="inputEmail"  name="email" class="form-control" placeholder="Email address" required autofocus>
    <label for="inputRole" class="sr-only">Role</label>
    <input type="text" id="inputRole"  name="role" class="form-control" placeholder="Role" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
  <label for="inputPassword" class="sr-only">Retype Password</label>
  <input type="password" id="inputPassword2" name="password2" class="form-control" placeholder="Confirm Password" required>
  <div class="checkbox">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="registr_btn">Register</button>
</form>

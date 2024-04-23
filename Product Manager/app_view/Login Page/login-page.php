<?php
include("C:/xampp-8.1/htdocs/Product Manager/app_view/Login Page/login-page.html");
include("C:/xampp-8.1/htdocs/Product Manager/app_controller/login-controller.php");
?>
<script>
  function showPassword() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
} 
</script>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Form</title>
</head>
<body>

<div class="login-container">
  <div class="login-header">
    <h2>Login</h2>
  </div>
  <div class="login-form">
    <form action="login-page.php" method="post">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php if (!empty($invalid_username[1])) {  echo $invalid_username[1]; } ?>">
      </div>
      <?php if (!empty($invalid_username[0])) {  echo "<div class='error-box'><p>".$invalid_username[0]."</p></div>"; } ?>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php if (!empty($invalid_password[1])) {  echo $invalid_password[1]; } ?>">
      </div>
      <div class="checkbox">
          <label for="remember">Show Password</label>
          <input type="checkbox" id="password" onclick="showPassword()">
      </div>
      <?php if (!empty($invalid_password[0])) {  echo "<div class='error-box'><p>".$invalid_password[0]."</p></div>"; } ?>
      <br>
      <br>
      <div class="checkbox">
        <label for="remember">Remember me?</label>
        <input type="checkbox" id="remember" name="remember">
      </div>
      <div class="register-link">
        <label for="link">Doesn't have account?</label>
        <a id="link" href="http://localhost/Product%20Manager/app_view/Register%20Page/register-page.php">Click Here!</a>
      </div>
      <div class="form-group">
        <input type="submit" name="submit" value="Login"></input>
      </div>
      <?php if (isset($error)) {  echo "<div class='error-box'><p>$error</p></div>"; } ?>
    </form>
  </div>
</div>

</body>
</html>

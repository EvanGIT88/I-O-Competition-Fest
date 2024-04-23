<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register Form</title>
</head>
<body>
<script src="register-seller.js"></script>
<div class="register-container">
  <div class="register-header">
    <h2>Register</h2>
  </div>
  <div class="register-form">
    <form method="post" action="register-page.php">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php if (!empty($invalid_username[1])) {  echo $invalid_username[1]; } ?>">
      </div>
      <!--
      <?php if (!empty($invalid_username[0])) {  echo "<div class='error-box'><p>".$invalid_username[0]."</p></div>"; } ?>
      -->
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php if (!empty($invalid_email[1])) {  echo $invalid_email[1]; } ?>">
      </div>
      <!--
      <?php if (!empty($invalid_email[0])) {  echo "<div class='error-box'><p>".$invalid_email[0]."</p></div>"; } ?>
      -->
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php if (!empty($invalid_password[1])) {  echo $invalid_password[1]; } ?>">
      </div>
      <div class="checkbox">
          <label for="password">Show Password</label>
          <input type="checkbox" id="password" name="check_password" onclick="showPassword()">
      </div>
      <!--
      <?php if (!empty($invalid_password[0])) {  echo "<div class='error-box'><p>".$invalid_password[0]."</p></div>"; } ?>
      -->
      <br>
      <br>
      <div class="checkbox">
        <label for="remember">Remember me?</label>
        <input type="checkbox" id="remember" name="remember">
      </div>
      <div class="login-link">
        <label for="link">Already have an account?</label>
        <a id="link" href="http://localhost/Product%20Manager/app_view/Login%20Page/login-page.php">Click Here!</a>
      </div>
      <div class="form-group">
        <input value="Register" type="submit" name="submit"></input>
      </div>
      <!--
        <?php if (isset($error)) {  echo "<div class='error-box'><p>$error</p></div>"; } ?>
        <?php if (isset($success)) {  echo "<div class='success-message'><p>$success</p></div>"; } ?>
      -->
    </form>
  </div>
</div>
</body>
</html>
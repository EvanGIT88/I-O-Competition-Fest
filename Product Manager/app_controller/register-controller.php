<?php
include("C:/xampp-8.1/htdocs/Product Manager/autoload.php");

try {
  $validation = new \app_model\app_utility\validation;
  $sanitation = new \app_model\app_utility\sanitation;
  $account_cookies = new \app_model\app_account\cookies;
  $account_session = new \app_model\app_account\session;
  $account_session->session_start();

  if ($account_cookies->isset_cookie() OR $account_session->isset_session()) {
    header("Location: http://localhost/Product%20Manager/app_view/Home%20Page/home-page.php");
  }

  if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
   $register = new app_model\registration_model\register($sanitation->sanitizeString($_POST['username']),$sanitation->sanitizeEmail($_POST['email']),$sanitation->sanitizeString($_POST['password']));

   if (!empty($validation->validateUsername($register->username)) OR !empty($validation->validateEmail($register->email)) OR !empty($validation->validatePassword($register->password))) {
    $invalid_username = array($validation->validateUsername($register->username), $register->username);
    $invalid_email = array($validation->validateEmail($register->email), $register->email);
    $invalid_password = array($validation->validatePassword($register->password), $register->password);
    throw new Exception ("Data Invalid!");
   }

  
   if ($register->checkUsernameExists($register->username) OR $register->checkEmailExists($register->email) OR $register->checkPasswordExists($register->hashed_password)) {
    $invalid_username = array($register->checkUsernameExists($register->username), $register->username);
    $invalid_email = array($register->checkEmailExists($register->email), $register->email);
    $invalid_password = array($register->checkPasswordExists($register->hashed_password), $register->password);
    throw new Exception ("Data already exists!"); 
   }

    $account_cookies->makeToken();

   if (isset($_POST['remember'])) {
     $register->insertUserData($register->username, $register->hashed_password, $register->email, $account_cookies->token);
     $account_cookies->setcookie($account_cookies->token);
     header("Location: http://localhost/Product%20Manager/app_view/Register%20Page/register-page.php");
   } else {
     $register->insertUserData($register->username, $register->hashed_password, $register->email, $account_cookies->token);
     $account_session->setsession($register->username, $register->email);
     header("Location: http://localhost/Product%20Manager/app_view/Home%20Page/home-page.php");
   }

   $register->mysqli_close();
  }

} catch (Exception $e) {
   $error = $e->getMessage();
}
?>
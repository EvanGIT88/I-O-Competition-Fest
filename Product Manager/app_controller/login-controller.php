<?php
include("C:/xampp-8.1/htdocs/Product Manager/autoload.php");

try {
   $account_cookies = new app_model\app_account\cookies;
   $account_session = new app_model\app_account\session;
   $account_auth = new app_model\app_account\account_auth;
   $sanitation = new \app_model\app_utility\sanitation;
   $account_session->session_start();

   if ($account_cookies->isset_cookie() OR $account_session->isset_session()) {
    header("Location: http://localhost/Product%20Manager/app_view/Home%20Page/home-page.php");
   }

   if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
     $login = new app_model\login_model\login($sanitation->sanitizeString($_POST["username"]),$sanitation->sanitizeString($_POST["password"]));

     if ($login->checkUsernameExists($login->username) OR $login->checkPasswordExists($login->username,$login->password)) {
        $invalid_username = array($login->checkUsernameExists($login->username), $login->username);
        $invalid_password = array($login->checkPasswordExists($login->username,$login->password), $login->password);
        throw new Exception ("Data doesn't exists!");
     }

     $username = $login->getUsername($login->username);
     $email = $login->getEmail($login->username);
     $token = $login->getToken($login->username);
   
     if (isset($_POST['remember'])) {
       $account_cookies->setcookie($token);
       header("Location: http://localhost/Product%20Manager/app_view/Login%20Page/login-page.php");
     } else {
       $account_session->setsession($username, $email);
       header("Location: http://localhost/Product%20Manager/app_view/Home%20Page/home-page.php");
     }
   } 
} catch (Exception $e) {
  $error = $e->getMessage();
}
?>
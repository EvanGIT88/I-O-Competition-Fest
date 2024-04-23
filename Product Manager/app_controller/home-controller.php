<?php
include("C:/xampp-8.1/htdocs/Product Manager/autoload.php");
try {
$home = new app_model\home_model\home;
$account_session = new app_model\app_account\session;
$account_cookies = new app_model\app_account\cookies;
$account_session->session_start();

if (!$home->session_check() && !$home->cookie_check()) {
    header("Location: http://localhost/Product%20Manager/app_view/Register%20Page/register-page.php");
} elseif ($home->session_check()) {
    $profile_data = $home->get_user_profile_session();
    $Greeting = $home->Greeting().", ".$profile_data["user_name"];
} elseif ($home->cookie_check()) {
    $profile_data = $home->get_user_profile_cookie();
    $Greeting = $home->Greeting().", ".$profile_data["user_name"];
}

if (isset($_POST['log_out'])) {
  if ($account_session->isset_session()) {
    $account_session->unset_session();
    header("Location: http://localhost/Product%20Manager/app_view/Register%20Page/register-page.php");
  }

  if ($account_cookies->isset_cookie()) {
    $account_cookies->unset_cookie();
    header("Location: http://localhost/Product%20Manager/app_view/Home%20Page/home-page.php");
  }
}

} catch (Exception $e) {
    $error = $e->getMessage();
}
?>
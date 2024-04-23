<?php
namespace app_model\app_account;

class cookies {
  public $token;

  public function makeToken() {
    $this->token = bin2hex(random_bytes(32));
  }

  public function setcookie($token) {
   print_r($token);
    setcookie("user_token", $token, time() + (5 * 365 * 24 * 60 * 60), "/");
  }

  public function unset_cookie() {
    setcookie("user_token", null, time()-60, "/");
    unset($_COOKIE['user_token']);
  }

  public function isset_cookie(){
    if (isset($_COOKIE["user_token"])) {
      return true;
    }
    return false;
  }
}
?>
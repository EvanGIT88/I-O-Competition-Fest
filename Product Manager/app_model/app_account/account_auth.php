<?php
namespace app_model\app_account;

class account_auth {
    public function cookie_check() {
        if (!isset($_COOKIE["user_token"])) {
          return false;
        }
        return true;
    }

    public function session_check() {
        if (!isset($_SESSION["user_name"]) && !isset($_SESSION["user_email"])) {
          return false;
        }
        return true;
    }

    public function get_user_profile_cookie() {
      if (isset($_COOKIE['user_token'])) {
        $conn = new \mysqli("localhost","root","","product_manager");
        $query = "SELECT * FROM user_account WHERE user_token='".$_COOKIE['user_token']."'";
          if (!$conn->query($query)) {
            throw new \Exception("Query error: ".$conn->errno);
          }

        $profile = $conn->query($query);
        $data = $profile->fetch_assoc();
        return array(
          "user_name" => $data["user_name"],
          "user_email" => $data["user_email"]
        );

      } else {
        return "";
      }
    }

    public function get_user_profile_session() {
       if (isset($_SESSION["user_name"]) && isset($_SESSION["user_email"])) {
         return array("user_name" => $_SESSION["user_name"], "user_email" => $_SESSION["user_email"]);
       } else {
        return "";
       }
    }
    
}
?>
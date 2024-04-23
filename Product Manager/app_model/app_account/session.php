<?php
namespace app_model\app_account;

class session {
    public function setsession($username, $email) {
       $_SESSION['user_name'] = $username;
       $_SESSION['user_email'] = $email;
    }

    public function unset_session() {
        unset($_SESSION['user_name']);
        unset($_SESSION['user_email']);
    }

    public function session_destroy() {
        \session_destroy();
    }

    public function session_start() {
        \session_start();
    }

    public function isset_session() {
        if (isset($_SESSION['user_name']) && isset($_SESSION['user_email'])) {
         return true;
        }
        return false;
    }
}
?>
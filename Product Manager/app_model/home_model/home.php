<?php
namespace app_model\home_model;
include("C:/xampp-8.1/htdocs/Product Manager/autoload.php");
class home extends \app_model\app_account\account_auth {
    public function Greeting() {
        $time = date("G");
        
        if ($time >= 0 && $time < 12) {
            return "Good Morning";
        } elseif ($time >= 12 && $time < 15) {
            return "Good Afternoon";
        } elseif ($time >= 15 && $time < 18) {
            return "Good Evening";
        } else {
            return "Good Night";
        }
    }
};
?>
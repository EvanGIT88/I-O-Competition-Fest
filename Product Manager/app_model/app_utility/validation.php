<?php
namespace app_model\app_utility;
class validation
{
    public function validateEmail($email)
    {
        // Validate email address
        if (empty($email)) {
            return "Email null!";
        } elseif(strlen($email) > 35 OR strlen($email) < 15) {
            return "Email length is 15-35 characters";
        } elseif (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "";
        } else {
            return "Email not valid!";
        }
    }

    public function validateUsername($username)
    {
        // Username should only contain alphanumeric characters and underscores
        if (empty($username)) {
            return "Username null!";
        } elseif(strlen($username) > 25 OR strlen($username) < 5) {
            return "Username length is 5-25 characters";
        } elseif (preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
            return "";
        } else {
            return "Username should only contain alphanumeric characters and underscores!";
        }
    }

    public function validatePassword($password)
    {
        // Password should be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character
        if (empty($password)) {
            return "Password null!";
        } elseif (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/', $password)) {
            return "";
        } else {
            return "Password should be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character!";
        }
    }
}
?>
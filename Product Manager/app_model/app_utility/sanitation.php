<?php
namespace app_model\app_utility;
class sanitation
{
    public function sanitizeString($string)
    {
        // Remove leading and trailing whitespace
        $string = trim($string);
        // Remove HTML tags
        $string = strip_tags($string);
        // Convert special characters to HTML entities
        $string = htmlspecialchars($string);
        
        return $string;
    }

    public function sanitizeEmail($email)
    {
        // Sanitize email address
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        return $email;

    }

    public function sanitizeInt($int)
    {
        // Sanitize integer
        $int = filter_var($int, FILTER_SANITIZE_NUMBER_INT);
        return (int) $int;
    }
}

?>
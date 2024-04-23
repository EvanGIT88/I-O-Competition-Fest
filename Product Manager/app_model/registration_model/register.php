<?php
namespace app_model\registration_model;
class register 
{
    public $username;
    public $email;
    public $password;
    public $hashed_password;
    public $mysqli;

    public function __construct($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $this->mysqli = new \mysqli("localhost","root","","product_manager");
    }

    // Simulated function to check if username already exists in the database
    public function checkUsernameExists($username)
    {
            $query = "SELECT user_name FROM user_account WHERE user_name = '".$username."';";
            $result = $this->mysqli->query($query);   
            if (!$result) {
                throw new \Exception ("Query error: ".$this->mysqli->errno);
            }
            
            if ($result->num_rows > 0) {
                return "Username already exists!";
            } else {
                return "";
            }
    }

    public function checkPasswordExists($password)
    {
        /*
            $query = "SELECT user_password FROM user_account WHERE user_password = '".$hashed_password."';";
            $result = $this->mysqli->query($query);   
            if (!$result) {
                throw new \Exception ("Query error: ".$this->mysqli->errno);
            }
            
            if ($result->num_rows > 0) {
                return "Password already exists!";
            } else {
                return "";
            }
            */
        do {
            $query = "SELECT user_password FROM user_account WHERE user_password = '".$hashed_password."';";
            $result = $this->mysqli->query($query);   
            if (!$result) {
                throw new \Exception ("Query error: ".$this->mysqli->errno);
            }
                
            if ($result->num_rows > 0) {
                return "Password already exists!";
            } else {
                return "";
            }
        } while ();
    }

    // Simulated function to check if email already exists in the database
    public function checkEmailExists($email)
    {
            $query = "SELECT user_email FROM user_account WHERE user_email = '".$email."';";
            $result = $this->mysqli->query($query);   
            if (!$result) {
                throw new \Exception ("Query error: ".$this->mysqli->errno);
            }

            if ($result->num_rows > 0) {
                return "Email already exists!";
            } else {
                return "";
            }
    }

    // Simulated function to insert user data into the database
    public function insertUserData($user_name, $hashed_password, $user_email, $user_token)
    {
            $query = "INSERT INTO user_account (user_name, user_password, user_email, user_token) VALUES ('$user_name', '$hashed_password', '$user_email', '$user_token')";
            $result = $this->mysqli->query($query);
            if (!$result) {
                throw new \Exception ("Query error: ".$this->mysqli->errno);
            }
    }

    public function mysqli_close() {
        $this->mysqli->mysqli_close();
    }

    public function get(string $property_name) 
    {
        return $this->$property_name;
    }
   
    public function set(string $property_name, $new_value) 
    {
        $this->$property_name = &$new_value;
    }
}

?>
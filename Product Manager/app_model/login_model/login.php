<?php
namespace app_model\login_model;
class login
{
    public $username;
    public $password;
    public $mysqli;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
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
            return "";
        } else {
            return "Username doesn't exist!";
        }
    }

    public function checkPasswordExists($username,$password)
    {
        $query = "SELECT user_password FROM user_account WHERE user_name = '".$username."';";
        $result = $this->mysqli->query($query); 
        $hashed_password = $result->fetch_assoc()['user_password'] ; 
        echo "$hashed_password";
        if (!$result) {
            throw new \Exception ("Query error: ".$this->mysqli->errno);
        }
            
        if (!$result->num_rows > 0) {
          return "Password doesn't exist!";
        }

        if (password_verify($password,$hashed_password)) {
          return "";
        } else {
          return "Password doesn't valid";
        }
    }

    public function checkEmailExists($username)
    {
        $query = "SELECT user_email FROM user_account WHERE user_name = '".$username."';";
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

    public function getEmail($username) {
        $query = "SELECT user_email FROM user_account WHERE user_name = '".$username."';";
        $result = $this->mysqli->query($query);   
        if (!$result) {
            throw new \Exception ("Query error: ".$this->mysqli->errno);
        }
            
            return $result->fetch_assoc()['user_email'];
    }

    public function getUsername($username) {
        $query = "SELECT user_name FROM user_account WHERE user_name = '".$username."';";
        $result = $this->mysqli->query($query);   
        if (!$result) {
            throw new \Exception ("Query error: ".$this->mysqli->errno);
        }
            
            return $result->fetch_assoc()['user_name'];
    }

    public function getToken($username) {
        $query = "SELECT user_token FROM user_account WHERE user_name = '".$username."';";
        $result = $this->mysqli->query($query);   
        if (!$result) {
            throw new \Exception ("Query error: ".$this->mysqli->errno);
        }

            return $result->fetch_assoc()['user_token'];
    }

    private function password_verify($input,$database) {
      if(password_verify($input,$database)) {
        echo "bronigga";
        return "yessir";
      }
      return "";
    }

    public function mysqli_close() {
        $this->mysqli->mysqli_close();
    }
}
?>

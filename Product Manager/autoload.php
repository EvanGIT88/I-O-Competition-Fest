<?php
spl_autoload_register (function ($class) {
    $path = "C:/xampp-8.1/htdocs/Product Manager/".strtolower(str_replace("\\", "/", $class)).".php";
    
    if (file_exists($path)) {
      require "$path";
    } else {
      throw new \Exception("File in $path not found!");
    }
    
});
?>
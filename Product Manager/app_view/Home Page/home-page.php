<?php
include("C:/xampp-8.1/htdocs/Product Manager/app_view/Home Page/home-page.html");
include("C:/xampp-8.1/htdocs/Product Manager/app_controller/home-controller.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-commerce Homepage</title>
</head>
<body>
  <header>
    <h1>Welcome to INDO-OKTOBER</h1>
    <h5>The darkweb version of INDOMARET</h5>
    <h3><?php if (isset($Greeting)) { echo $Greeting; } ?></h3>
    <form class="logout-form" action="home-page.php" method="POST">
      <input class="logout-button" name="log_out" type="submit" value="Log Out">
    </form>
  </header>
      <p><?php if (isset($error)) { echo "<div class='error-box'><p>".$error."</p></div>"; } ?></p>
  <nav>
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">Products</a></li>
      <li><a href="#">About Us</a></li>
      <li><a href="#">Contact</a></li>
    </ul>
  </nav>

  <section class="featured-products">
    <div class="product">
      <img src="https://via.placeholder.com/200" alt="Product 1">
      <h3>Product 1</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <p>$19.99</p>
    </div>
    <div class="product">
      <img src="https://via.placeholder.com/200" alt="Product 2">
      <h3>Product 2</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <p>$24.99</p>
    </div>
    <div class="product">
      <img src="https://via.placeholder.com/200" alt="Product 3">
      <h3>Product 3</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <p>$29.99</p>
    </div>
  </section>

  <footer>
    <p>&copy; 2024 E-commerce Store. All rights reserved.</p>
  </footer>

</body>
</html>

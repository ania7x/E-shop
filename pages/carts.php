<?php
  session_start();
  if(!isset($_SESSION['id'])){
    header('Location:../index.html');
  }

if(strcmp($_SESSION['role'],"USER")){
  header('Location:./notallowed.html');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-shopper</title>

  <!-- CSS -->
  <link rel="stylesheet" href="../css/carstyle.css">

  <!-- JS -->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/cart.js"></script>
</head>

<body>
  <div class='head'>
    <h1 class='company'>E-shopper</h1>
  </div>
  <ul>
    <li>
      <a href="#">Menu</a>
      <ul class="dropdown">
        <li><a href="./welcome.php">Welcome</a></li>
        <li><a href="../index.html">Login</a></li>
        <li><a href="./signup.html">Sign up</a></li>
        <li><a href="./products.php">Products</a></li>
        <li><a href="./carts.php">Cart</a></li>
        <li><a href="#">Seller</a></li>
        <li><a href="./administration.php">Administration</a></li>
      </ul>
    </li>
  </ul>
  <div class="page">
    <div class="cart">
        <div class="cart-list">
        </div><div class="cart-sum"></div>
    </div>
  </div>
</body>

</html>
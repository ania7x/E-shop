<?php
session_start();
if (empty($_SESSION['id'])):
  header('Location:../index.html');
endif;

if(!$_SESSION['role']=="USER"){
  header('Location:./notallowed.html');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/welcomestyle.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

  <!-- JS -->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="../js/products.js"></script>
  <title>E-shopper</title>
</head>

<body>
  <div class='head'>
    <h1>E-shopper</h1>
    <ul>
      <li>
        <a href="#">Menu</a>
        <ul class="dropdown">
          <li><a href="./welcome.php">Welcome</a></li>
          <li><a href="../index.html">Login</a></li>
          <li><a href="./signup.html">Sign up</a></li>
          <li><a href="#">Products</a></li>
          <li><a href="#">Cart</a></li>
          <li><a href="#">Seller</a></li>
          <li><a href="./administration.php">Administration</a></li>
        </ul>
      </li>
    </ul>
    <a href="../php/logout.php">
      <div style="float:right"><button>Logout</button>
      </div>
    </a>
  </div>
  <div class='maincontent'>
    <h4 class='company'>Welcome
      <?php echo $_SESSION['username'] . " " . $_SESSION['surname'] . " (" . $_SESSION['role'] . " )"; ?>
    </h4>
  </div>
  <div id="main">
    <table id="products">
      <thead>
        <td>Product</td>
        <td>Price</td>
        <td>Category</td>
        <td>Product Seller</td>
        <td>Withdrawal Date</td>
        <td></td>
      </thead>
      <tbody>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tbody>
    </table>
  </div>
</body>

</html>
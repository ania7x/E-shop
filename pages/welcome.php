<?php
session_start();
if (empty($_SESSION['id'])):
  header('Location:../index.html');
endif;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/welcomestyle.css">
  <title>E-shopper</title>
</head>

<body>
  <div class='head'>
  <h1>E-shopper</h1>
    <ul>
      <li>
        <a href="#">Menu</a>
        <ul class="dropdown">
          <li><a href="./welcome.html">Welcome</a></li>
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
      <?php echo $_SESSION['username'] ." ".$_SESSION['surname']." (".$_SESSION['role']." )" ;?>
  </h4>
</div>
</body>

</html>

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
  <link rel="stylesheet" href="../css/navbarstyle.css">
  <link rel="stylesheet" href="../css/cartstyle.css">

  <!-- JS -->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/cart.js"></script>
</head>

<body>
  <div class='head'>
    <?php include("navbar.php"); ?>
  </div>
  <div class="page">
    <div class="cart">
        <div class="cart-list">
        <div class="title">
          Shopping Bag
         </div>
        </div><div class="cart-sum"></div>
    </div>
  </div>
</body>

</html>
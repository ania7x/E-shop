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
  <link rel="stylesheet" href="../css/navbarstyle.css">
  <link rel="stylesheet" href="../css/welcomestyle.css">
  <title>E-shopper</title>
</head>

<body>
  <?php include("navbar.php"); ?>
  <div class='maincontent'>
    <h4 class='company'>Welcome
      <?php echo $_SESSION['username'] . " " . $_SESSION['surname'] . " (" . $_SESSION['role'] . " )"; ?>
    </h4>
  </div>
</body>

</html>
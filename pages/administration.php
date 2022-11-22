<?php
  session_start();
  $_SESSION['id'] = 'sfsf';
  if(!isset($_SESSION['id'])){
    header('Location:../index.html');
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
  <link rel="stylesheet" href="../css/adminstyle.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

  <!-- JS -->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="../js/administration.js"></script>
</head>

<body>
  <div class='head'>
    <h1 class='company'>E-shopper</h1>
  </div>
  <ul>
    <li>
      <a href="#">Menu</a>
      <ul class="dropdown">
        <li><a href="./welcome.html">Welcome</a></li>
        <li><a href="../index.html">Login</a></li>
        <li><a href="../pages/signup.html">Sign up</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">Cart</a></li>
        <li><a href="#">Seller</a></li>
        <li><a href="#">Administration</a></li>
      </ul>
    </li>
  </ul>
  <section class='logout' id='logout'>
  </section>
  <div class='form'>
    <form>
      <a href="../index.html" class="btn-logout" id="do-logout"> Logout</a>
    </form>
  </div>
  <div class="users">
    <table id="usersTable">
      <thead>
        <tr>
          <td>Id</td>
          <td>Name</td>
          <td>Surname</td>
          <td>Email</td>
          <td>Role</td>
          <td>Confirmed</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
</body>

</html>
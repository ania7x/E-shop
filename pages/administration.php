<?php
  session_start();
  if(!isset($_SESSION['id'])){
    header('Location:../index.html');
  }

if(strcmp($_SESSION['role'],"ADMIN")){
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
   <?php include("navbar.php"); ?>
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
          <td></td>
          <td></td>
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
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
</body>

</html>

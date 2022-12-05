<?php
session_start();
if (empty($_SESSION['id'])):
  header('Location:../index.html');
endif;

if (strcmp($_SESSION['role'], "PRODUCTSELLER")) {
  header('Location:./notallowed.html');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/navbarstyle.css">
  <link rel="stylesheet" href="../css/sellerstyle.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

  <!-- JS -->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="../js/sellers.js"></script>
  <title>E-shopper</title>
</head>

<body>
  <div class='head'>
    <?php include("navbar.php"); ?>
  </div>
  <div id="main">
    <div class="add-new-product">
      <button id="add-product-button">+</button>
      <form id="add-product-form">
        <div class="form-element"><label for="product-name">Product Name</label><input type="text" id="product-name"
            name="product-name" placeholder="Banana"></div>
        <div class="form-element"><label for="product-code">Product Code</label><input type="text" id="product-code"
            name="product-code" placeholder="1234"></div>
        <div class="form-element"><label for="product-price">Price</label><input type="text" id="product-price"
            name="product-price" placeholder="0.4"></div>
        <div class="form-element"><label for="product-category">Category</label><input type="text" id="product-category"
            name="product-category" placeholder="Fruit"></div>
        <div class="form-element"><label for="product-withdrawal">Withdrawal Date</label><input type="text"
            id="product-withdrawal" name="product-withdrawal" placeholder="YYYY-MM-DD"></div>
        <div class="form-element"><input type="button" value="Add Product" id="product-form-btn"></div>
      </form>
    </div>
    <table id="products">
      <thead>
        <td>Product</td>
        <td>Product Code</td>
        <td>Price</td>
        <td>Category</td>
        <td>Withdrawal Date</td>
        <td></td>
        <td></td>
      </thead>
      <tbody>
        <td></td>
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
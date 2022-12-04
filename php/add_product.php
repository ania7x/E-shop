<?php
session_start();
include("dbconnect.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $query = "INSERT INTO products(NAME,PRODUCTCODE,PRICE,DATEOFWITHDRAWAL,SELLERID,CATEGORY) VALUES (\"" . $_POST['name'] . "\"," . $_POST['code'] . "," . $_POST['price'] . ",\"" . $_POST['withdrawaldate'] . "\"," . $_SESSION['id'] . ",\"" . $_POST['category'] . "\");";
    $res = mysqli_query($mysqli, $query);

    if ($res) {
        echo "{\"message\":\"Success\"}";
    } else {
        echo "{\"message\":\"Problem\"}";
    }
}


?>
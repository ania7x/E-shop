<?php
session_start();
include("dbconnect.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $query = "INSERT INTO products(NAME,PRODUCTCODE,PRICE,DATEOFWITHDRAWAL,SELLERID,CATEGORY) VALUES (\"" . $_POST['pName'] . "\"," . $_POST['PRODUCTCODE'] . "," . $_POST['PRICE'] . ",\"" . $_POST['DATEOFWITHDRAWAL'] . "\"," . $_SESSION['id'] . ",\"" . $_POST['CATEGORY'] . "\");";
    $res = mysqli_query($mysqli, $query);

    if ($res) {
        echo "{\"message\":\"Success\"}";
    } else {
        echo "{\"message\":\"Problem\"}";
    }
}


?>
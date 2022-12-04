<?php
session_start();
$mysqli = mysqli_connect("localhost", "admin", "admin", "cloud");

if (mysqli_connect_errno()) {
    die(mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $query = "INSERT INTO products(NAME,PRODUCTCODE,PRICE,DATEOFWITHDRAWAL,SELLERID,CATEGORY) VALUES (\"" . $_POST['name'] . "\"," . $_POST['code'] . "," . $_POST['price'] . ",\"" . $_POST['withdrawaldate'] . "\"," . $_SESSION['id'] . ",\"" . $_POST['category'] . "\");";
    // echo "{\"query\":".$query."}";
    $res = mysqli_query($mysqli, $query);

    if ($res) {
        echo "{\"message\":\"Success\"}";
    } else {
        echo "{\"message\":\"Problem\"}";
    }
}


?>
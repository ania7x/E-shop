<?php
session_start();

$mysqli = mysqli_connect("localhost", "admin", "admin", "cloud");

if (mysqli_connect_errno()) {
    die(mysqli_connect_error());
}

$query = "SELECT p.ID as pId, p.NAME AS pName, PRODUCTCODE, PRICE, CATEGORY, DATEOFWITHDRAWAL
            FROM cloud.products p 
            WHERE p.SELLERID = ".$_SESSION['id'].";";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $res = mysqli_query($mysqli, $query);

    while ($row = mysqli_fetch_array($res)) {
        $products[] = $row;
    }
    echo json_encode($products);
} else {
    echo "{\"message\":\"Problem\"}";
}
?>
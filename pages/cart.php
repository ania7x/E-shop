<?php
session_start();
$mysqli = mysqli_connect("localhost", "admin", "admin", "cloud");

if (mysqli_connect_errno()) {
    die(mysqli_connect_error());
}

$query = "select name,price,productid,dateofinsertion from products,(
    select productid,dateofinsertion from carts where USERID =".$_SESSION['id'].") as cart
    where products.id=cart.productid;";

$res = mysqli_query($mysqli, $query);

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    while ($row = mysqli_fetch_array($res)) {
        $products[] = $row;
    }
    echo json_encode($products);
} else {
    echo "{\"message\":\"Problem\"}";
}
?>
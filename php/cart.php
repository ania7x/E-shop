<?php
session_start();
include("dbconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $query = "select name,price,productid,dateofinsertion from products,(
        select productid,dateofinsertion from carts where USERID =" . $_SESSION['id'] . ") as cart
        where products.id=cart.productid;";

    $res = mysqli_query($mysqli, $query);
    $products = [];
    while ($row = mysqli_fetch_array($res)) {
        $products[] = $row;
    }
    echo json_encode($products);
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $query = "delete from carts where  PRODUCTID=" . $_POST['productid'] . ";";
    $res = mysqli_query($mysqli, $query);
    if ($res) {
        echo "{\"message\":\"Success\"}";
    } else {
        echo "deletion not completed";
    }
} else {
    echo "{\"message\":\"Problem\"}";
}
?>
<?php

include("dbconnect.php");

$query = "SELECT p.ID as pId, p.NAME AS pName, PRICE, CATEGORY, DATEOFWITHDRAWAL, u.NAME as sellerName
            FROM cloud.products p 
            INNER JOIN 
            cloud.users u 
            WHERE p.SELLERID = u.ID;";

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
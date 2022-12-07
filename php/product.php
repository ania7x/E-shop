<?php
session_start();

include("dbconnect.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $query = "SELECT p.ID as pId, p.NAME AS pName, PRICE, CATEGORY, DATEOFWITHDRAWAL, u.NAME as sellerName
            FROM cloud.products p 
            INNER JOIN 
            cloud.users u 
            WHERE p.SELLERID = u.ID;";

    $res = mysqli_query($mysqli, $query);
    while ($row = mysqli_fetch_array($res)) {
        $products[] = $row;
    }
    echo json_encode($products);
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userID = $_SESSION['id'];

    $query = "INSERT INTO carts (USERID, PRODUCTID, DATEOFINSERTION) VALUES (".$userID.",".$_POST['pId'].", NOW());";
    $res = mysqli_query($mysqli, $query);
    if($res){
        echo "{\"message\":\"Success\"}";
    }else{
        echo "{\"message\":\"Success\"}";
    }
    
}else {
    echo "Problem in product";
}
?>
<?php
session_start();
include("dbconnect.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $query = "UPDATE products SET NAME = \"" . $_POST['pName'] . "\",PRODUCTCODE = " . $_POST['PRODUCTCODE'] . ",PRICE = " . $_POST['PRICE'] . ", DATEOFWITHDRAWAL = \"" . $_POST['DATEOFWITHDRAWAL'] . "\",CATEGORY = \"" . $_POST['CATEGORY'] . "\" WHERE ID = " . $_POST['pId'] . ";";
    $res = mysqli_query($mysqli, $query);
    if ($res) {
        echo "{\"message\":\"Success\"}";
    }else {
        echo "{\"message\":\"Problem\"}";
    }
}


?>
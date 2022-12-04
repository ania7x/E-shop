<?php
session_start();
include("dbconnect.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $query = "DELETE FROM products WHERE ID = ".$_POST['pId'].";";

    $res = mysqli_query($mysqli, $query);

    if ($res) {
        echo "{\"message\":\"Success\"}";
    } else {
        echo "{\"message\":\"Problem\"}";
    }
}


?>
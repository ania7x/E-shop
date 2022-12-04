<?php
session_start();
$mysqli = mysqli_connect("localhost", "admin", "admin", "cloud");

if (mysqli_connect_errno()) {
    die(mysqli_connect_error());
}

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
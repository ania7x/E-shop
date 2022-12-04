<?php
include("dbconnect.php");
$query = "INSERT INTO cloud.users ";
$query .= "(NAME,SURNAME,USERPASSWORD,USERNAME,EMAIL,ROLE,CONFIRMED) ";
$query .= "VALUES (\"" . $_POST['name'] . "\",\"" . $_POST['surname'] . "\",\"" . $_POST['password'] . "\",\"" . $_POST['username'] . "\",\"" . $_POST['email'] . "\",\"" . $_POST['role'] . "\",false) ;";
$result = mysqli_query($mysqli,$query);
$data = [];
$data["success"]=$result;
//$row = $result->fetch_assoc();
echo json_encode($data);
?>
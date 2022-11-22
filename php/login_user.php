<?php
session_start();
$data = [];

$mysqli = mysqli_connect("localhost:3306", "root", "2822023097", "cloud");
if (mysqli_connect_errno()) {
  die("Failed to connect with MySQL: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM users WHERE username = ? and userpassword= ?;";
  $sqlu = "SELECT * FROM users WHERE username = ?;";
  $sqlp = "SELECT * FROM users WHERE userpassword =?;";
  if ($stmt = $mysqli->prepare($sql)) {
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
    $param_username = $username;
    $param_password = $password;

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
      /* store result */  // Note: change to $result->...!
          $stmt->store_result();
          $stmt->bind_result($id,$surname,$name,$upassword,$uname,$email,$role,$confirmed); // number of arguments must match columns in SELECT
      
        }

  if ($stmt1 = $mysqli->prepare($sqlu)) {
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt1, "s", $param_username1);
    $param_username1 = $username;


    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt1)) {
      /* store result */
      mysqli_stmt_store_result($stmt1);
    }
  }
  if ($stmt2 = $mysqli->prepare($sqlp)) {
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt2, "s", $param_password2);
    $param_password2 = $password;

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt2)) {
      /* store result */
      mysqli_stmt_store_result($stmt2);
    }
  }

  if (mysqli_stmt_num_rows($stmt1) > 0 && mysqli_stmt_num_rows($stmt2) == 0) {
    var_dump(http_response_code(403));
    echo "Wrong password";
  } elseif (mysqli_stmt_num_rows($stmt) > 0) {
    $stmt->fetch();
    $_SESSION['id']=$id;
    $_SESSION['username']=$uname;
    $_SESSION['surname']=$surname;
    $_SESSION['role']=$role;
    $_SESSION['email']=$email;
    $_SESSION['confirmed']=$confirmed;
    //print_r($_SESSION);
    //echo "<script type='text/javascript'>document.location='home.php'</script>";
    echo "{\"message\":\"User exists\"}";
  } else {
    echo "<script type='text/javascript'>alert('Invalid Username or Password!');
    document.location='login_user.php'</script>";
  }

  // Close statement
  mysqli_stmt_close($stmt);
  mysqli_stmt_close($stmt1);
  mysqli_stmt_close($stmt2);
} else {
  var_dump(http_response_code(401));
  $data['message'] = "METHOD NOT UNDERSTOOD";
  echo json_encode($data);
}
// mysqli_close($mysqli);
}

?>
<?php
header("Content-Type: application/xhtml+xml; charset=utf-8");
include ("../db/module8_db.php");
session_start();

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);

// Check connection
if (mysqli_connect_errno()) {
  die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $query = "SELECT * FROM users WHERE user_name = '$username' AND password = '$password'";
  $result = $conn->query($query)->fetch_assoc();

  if ($result != null) {
    $_SESSION["access_level"] = $result['access_level'];
    $_SESSION["userId"] = $result['id'];
    $_SESSION["loggedIn"] = true;

    $query = "UPDATE users SET last_logged_in = '" . date("Y-m-d H:i:s") . "' WHERE id = '" . $result['id'] . "'";
    $conn->query($query);

    header("Location: ../module8.php");
    exit();
  }
  else {
    header("Location: failedLogin.php");
    exit();
  }
}
$conn->close();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
  <meta name="description" content="Module 5 Assignment" />
  <meta name="keywords" content="esports, professional, competitive" />
  <meta name="author" content="Ryan Lee" />
  <title>Module 5 Assignment</title>
  <link rel="stylesheet" type="text/css" href="../module8.css" />
</head>

<body>
  <?php include_once('../8_menu.php') ?>

  <div id="content">
    <div id="login">
      <h2>Login</h2>
      <form action="" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required="true"/><br/>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required="true"/><br/>
        <input type="submit" value="Login"/>
      </form>
    </div>
  </div>

  <?php include_once('../8_footer.php') ?>
</body>

</html>
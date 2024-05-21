<?php
header("Content-Type: application/xhtml+xml; charset=utf-8");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];
  if (($username === "admin" && $password === "admin")
  ||  ($username === "publisher" && $password === "publisher")
  ||  ($username === "customer" && $password === "customer")
  ) {
    $_SESSION["access_level"] = $username;
    $_SESSION["loggedIn"] = true;
    header("Location: ../module5.php");
    exit();
  } else {
    header("Location: failedLogin.php");
    exit();
  }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
  <meta name="description" content="Module 5 Assignment" />
  <meta name="keywords" content="esports, professional, competitive" />
  <meta name="author" content="Ryan Lee" />
  <title>Module 5 Assignment</title>
  <link rel="stylesheet" type="text/css" href="../module5.css" />
</head>

<body>
  <?php include_once('/menu.php') ?>

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

  <?php include_once('/footer.php') ?>
</body>

</html>
<?php
header("Content-Type: application/xhtml+xml; charset=utf-8");
if (!isset($_SESSION)) {
  session_start();
}

if (isset($_SESSION["access_level"]) && $_SESSION["access_level"] != "admin") {
  header("Location: 8_unauthorized.php");
  exit();
}

include ("../db/module8_db.php");
$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);

// Check connection
if (mysqli_connect_errno()) {
  die("Connection failed: " . mysqli_connect_error());
}

$showError = false;

if (
  $_SERVER["REQUEST_METHOD"] == "POST"
  && isset($_POST["add"])
  && isset($_POST["first_name"])
  && isset($_POST["last_name"])
  && isset($_POST["email"])
  && isset($_POST["access_level"])
  && isset($_POST["username"])
  && isset($_POST["password"])
) {

  $first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
  $last_name = mysqli_real_escape_string($conn, $_POST["last_name"]);
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $password = mysqli_real_escape_string($conn, $_POST["password"]);
  $access_level = mysqli_real_escape_string($conn, $_POST["access_level"]);
  $user_name = mysqli_real_escape_string($conn, $_POST["username"]);

  $checkUserName = "SELECT * FROM users WHERE user_name = '" . $user_name . "'";
  $result = $conn->query($checkUserName)->fetch_assoc();

  if ($result != null) {
    $showError = true;
  }
  else {
    $insertQuery = "INSERT INTO users (first_name, last_name, email, password, access_level, user_name) VALUES ('" . $first_name . "', '" . $last_name . "', '" . $email . "', '" . $password . "', '" . $access_level . "', '" . $user_name . "')";

    if (!$conn->query($insertQuery)) {
      header('Location: failedToAddUser.php');
      exit();
    }
    header('Location: /8_accounts.php');
  }

}

$conn->close();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
  <meta name="description" content="Module 8 Assignment" />
  <meta name="keywords" content="esports, professional, competitive" />
  <meta name="author" content="Ryan Lee" />
  <title>Module 8 Assignment</title>
  <link rel="stylesheet" type="text/css" href="/module8.css" />
</head>

<body>
  <?php include_once ('../8_menu.php') ?>
  <div id="content">
    <div class="users">
      <div class="adduserheader">
        <h2>Add New User</h2>
      </div>

      <?php if ($showError) { ?>
        <div class="error">
          <h3>Error: Username already exists!</h3>
        </div>
      <?php } ?>

      <div class="selecteduser">
        <form action="" method="POST">
          <div class="userformvalues">
            <label for="first_name">First Name*: </label>
            <input required="true" type="text" id="first_name" name="first_name" />

            <label for="last_name">Last Name*: </label>
            <input required="true" type="text" id="last_name" name="last_name"></input>
            <label for="email">Email*: </label>
            <input required="true" type="text" id="email" name="email"></input>

            <label for="access_level">Access Level*: </label>
            <select class="access_level" name="access_level" id="access_level">
              <option value="admin">Admin</option>
              <option selected="selected" value="customer">Customer</option>
              <option value="publisher">Publisher</option>
            </select>

            <label for="username">User Name*: </label>
            <input required="true" type="text" id="username" name="username"></input>

            <label for="password">Password*: </label>
            <input required="true" type="password" id="password" name="password"></input>
          </div>

          <div class="submit">
            <input type="submit" name="add" value="Add" />
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php include_once ('../8_footer.php') ?>
</body>

</html>
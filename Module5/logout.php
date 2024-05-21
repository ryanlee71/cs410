<?php
header("Content-Type: application/xhtml+xml; charset=utf-8");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirm"])) {
  $_SESSION = array();
  session_destroy();
  header("Location: login.php");
  exit();
}
else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cancel"])) {
  header("Location: ../module5.php");
  exit();
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
    <div id="logout-form">
      <h2>Logout Confirmation</h2>
      <p>Are you sure you want to logout?</p>
      <form action="" method="POST">
        <input type="submit" name="confirm" value="Confirm" />
        <input type="submit" name="cancel" value="Cancel" />
      </form>
    </div>
  </div>

  <?php include_once('/footer.php') ?>
</body>

</html>
<?php
header("Content-Type: application/xhtml+xml; charset=utf-8");
include ("db/db.php");
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);

// Check connection
if (mysqli_connect_errno()) {
  die("Connection failed: " . mysqli_connect_error());
}

$conn->close();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php include_once('Module6/header.php') ?>

<body>
  <?php include_once('Module6/menu.php') ?>

  <div id="content">
    <?php include_once('Module6/organizationalchart.php') ?>
    <?php include_once('Module6/comments.php') ?>
  </div>

  <?php include_once('Module6/footer.php') ?>
</body>

</html>
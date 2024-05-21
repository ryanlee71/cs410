<?php
header("Content-Type: application/xhtml+xml; charset=utf-8");

session_start();
if (!isset($_SESSION["loggedIn"])) {
  header("location: Module8/login.php");
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php include_once('8_header.php') ?>

<body>
  <?php include_once('8_menu.php') ?>

  <div id="content">
    <?php include_once('8_shop.php') ?>
  </div>

  <?php include_once('8_footer.php') ?>
</body>

</html>
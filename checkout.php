<?php
header("Content-Type: application/xhtml+xml; charset=utf-8");
session_start();
include ("Module5/products.php");

if (
  $_SERVER["REQUEST_METHOD"] == "POST"
  && isset($_POST["checkout"])
) {
  unset($_SESSION["cart"]);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php include_once ('header.php') ?>

<body>
  <?php include_once ('menu.php') ?>
  <div id="content">
    <div class="cart">
      <h2>
        Your order is on its way!
      </h2>
      <p>
        Thank you for shopping with us!
      </p>
    </div>
  </div>

  <?php include_once ('footer.php') ?>
</body>

</html>
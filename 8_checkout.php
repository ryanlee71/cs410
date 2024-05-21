<?php
header("Content-Type: application/xhtml+xml; charset=utf-8");
if(!isset($_SESSION)) { session_start(); } 

include ("db/module8_db.php");
$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);

// Check connection
if (mysqli_connect_errno()) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_SESSION["cartId"])) {
  $cartId = $_SESSION['cartId'];
}
else {
  $cartQuery = "SELECT * FROM cart WHERE checked_out = false AND user_id = '" . $_SESSION["userId"] . "'";
  $cartResult = $conn->query($cartQuery)->fetch_assoc();
  if ($cartResult == null) {
    $insertCartQuery = "INSERT INTO cart (user_id) VALUES ('" . $_SESSION["userId"] . "')";
    $conn->query($insertCartQuery);
    $cart = $conn->query($cartQuery)->fetch_assoc();
    $_SESSION['cartId'] = $cart['id'];
    $cartId = $cart['id'];
    header('Location: /module8.php');
    exit();
  }
  else {
    $cartId = $cartResult['id'];
  }
}

if (
  $_SERVER["REQUEST_METHOD"] == "POST"
  && isset($_POST["checkout"])
) {
  $updateQuery = "UPDATE cart set checked_out = true WHERE id = '" . $cartId . "'";
  $conn->query($updateQuery);
  unset($_SESSION["cartId"]);
}
else {
  header('Location: /module8.php');
  exit();
}
$conn->close();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php include_once ('8_header.php') ?>

<body>
  <?php include_once ('8_menu.php') ?>
  <div id="content">
    <div class="cart">
      <div class="cartheader">
        <h1>
          Your order is on its way!
        </h1>
        <p>
          Thank you for shopping with us!
        </p>
      </div>
    </div>
  </div>

  <?php include_once ('8_footer.php') ?>
</body>

</html>
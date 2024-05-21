<?php
header("Content-Type: application/xhtml+xml; charset=utf-8");
session_start();
include ("Module5/products.php");

if (
  $_SERVER["REQUEST_METHOD"] == "POST"
  && isset($_POST["update"])
  && isset($_POST["productId"])
  && isset($_POST["quantity"])
  && is_numeric($_POST["quantity"])
) {
  $productId = $_POST["productId"];
  $quantity = $_POST["quantity"];
  if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array();
  }

  $_SESSION["cart"][$productId] = $quantity;
}

if (
  $_SERVER["REQUEST_METHOD"] == "POST"
  && isset($_POST["remove"])
) {
  $productId = $_POST["productId"];
  unset($_SESSION["cart"][$productId]);
}

$cart = array();
$total = 0;
$tax = 0;
$subtotal = 0;
$taxRate = 0.053;
if (isset($_SESSION["cart"])) {
  foreach ($_SESSION["cart"] as $key => $value) {
    $cart[] = array(
      "productId" => $key,
      "name" => $products[$key]["name"],
      "price" => $products[$key]["price"],
      "image" => $products[$key]["image"],
      "quantity" => $value
    );
    $subtotal += $products[$key]["price"] * $value;
  }
  $subtotal = round($subtotal, 2);
  $tax = round($subtotal * $taxRate, 2);
  $total = round($tax + $subtotal, 2);
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
        Cart
      </h2>
      <?php foreach ($cart as $item) { ?>
        <div class="product">
          <form action="" method="POST" class="addtocart">
            <div class="remove">
              <input type="submit" name="remove" value="Remove">X</input>
            </div>
            <div class="image">
              <img src="Module5/<?= $item['image'] ?>" alt="<?= $item['name'] ?>" />
            </div>
            <div>
              <h3><?= $item['name'] ?></h3>
              <p class="price">$<?= $item['price'] ?></p>
              <input type="hidden" id="productId" name="productId" value="<?= $item['productId'] ?>"></input>

              <label for="quantity">Quantity: </label>
              <input type="number" id="quantity" name="quantity" value="<?= $item['quantity'] ?>"></input>

              <input type="submit" name="update" value="Update">Update</input>
            </div>
          </form>
        </div>
        <hr />
      <?php } ?>

      <p>Subtotal: $<?= $subtotal ?></p>
      <p>Tax: $<?= $tax ?></p>
      <h3>Total: $<?= $total ?></h3>
      <?php if ($total > 0): ?>
        <form action="checkout.php" method="POST">
          <input type="submit" name="checkout" value="Proceed to Checkout" />
        </form>
      <?php endif; ?>
    </div>
  </div>

  <?php include_once ('footer.php') ?>
</body>

</html>
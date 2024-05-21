<?php
header("Content-Type: application/xhtml+xml; charset=utf-8");
if (!isset($_SESSION)) {
  session_start();
}

if (isset($_SESSION["access_level"]) && $_SESSION["access_level"] != "customer") {
  header("Location: 8_unauthorized.php");
}

include ("db/module8_db.php");
$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);

// Check connection
if (mysqli_connect_errno()) {
  die("Connection failed: " . mysqli_connect_error());
}

if (
  $_SERVER["REQUEST_METHOD"] == "POST"
  && isset($_POST["update"])
  && isset($_POST["productId"])
  && isset($_POST["quantity"])
  && is_numeric($_POST["quantity"])
) {
  $cartProductsId = $_POST["productId"];
  $quantity = $_POST["quantity"];
  $updateQuery = "UPDATE cart_products set quantity = '" . $quantity . "' WHERE id = '" . $cartProductsId . "'";
  $conn->query($updateQuery);
  header('Location: /8_cart.php');
} else if (
  $_SERVER["REQUEST_METHOD"] == "POST"
  && isset($_POST["remove"])
) {
  $cartProductsId = $_POST["productId"];
  $removeQuery = "DELETE FROM cart_products WHERE id = '" . $cartProductsId . "'";
  $conn->query($removeQuery);
  header('Location: /8_cart.php');
} else if (
  $_SERVER["REQUEST_METHOD"] == "POST"
  && isset($_POST["view"])
  && isset($_POST["productId"])
) {
  header('Location: /8_product.php?id=' . $_POST["productId"]);
  exit();
}

$cart = array();
$total = 0;
$tax = 0;
$subtotal = 0;
$taxRate = 0.053;

if (isset($_SESSION["cartId"])) {
  $cartId = $_SESSION['cartId'];
} else {
  $cartQuery = "SELECT * FROM cart WHERE checked_out = false AND user_id = '" . $_SESSION["userId"] . "'";
  $cartResult = $conn->query($cartQuery)->fetch_assoc();
  if ($cartResult == null) {
    $insertCartQuery = "INSERT INTO cart (user_id) VALUES ('" . $_SESSION["userId"] . "')";
    $conn->query($insertCartQuery);
    $cart = $conn->query($cartQuery)->fetch_assoc();
    $_SESSION['cartId'] = $cart['id'];
    $cartId = $cart['id'];
  } else {
    $cartId = $cartResult['id'];
  }
}
$query = "SELECT t1.id, t1.quantity, t2.name, t2.price, t2.image FROM cart_products t1 INNER JOIN products t2 ON t1.products_id = t2.id WHERE t1.cart_id = '" . $cartId . "'";
$products = $conn->query($query);

if ($products != null && $products->num_rows > 0) {
  foreach ($products as $index => $product) {
    $cart[] = array(
      "cart_products_id" => $product['id'],
      "name" => $product["name"],
      "price" => $product["price"],
      "image" => $product["image"],
      "quantity" => $product['quantity']
    );
    $subtotal += $product["price"] * $product['quantity'];
  }
  $subtotal = round($subtotal, 2);
  $tax = round($subtotal * $taxRate, 2);
  $total = round($tax + $subtotal, 2);
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
        <h2>
          Cart
        </h2>
        <?php if ($products->num_rows == 0) { ?>
          <h3>Cart is empty</h3>
        <?php } ?>
      </div>
      <?php foreach ($cart as $item) { ?>
        <div class="product">
          <form action="/8_product.php" method="GET" class="viewproductfromcart">
            <input type="hidden" id="productId" name="productId" value="<?= $item['cart_products_id'] ?>"></input>
            <input type="submit" name="view" value="View" />
          </form>
          <form action="" method="POST" class="addtocart">
            <div class="remove">
              <input type="submit" name="remove" value="Remove">X</input>
            </div>
            <div class="image">
              <img src="Module8/<?= $item['image'] ?>" alt="<?= $item['name'] ?>" />
            </div>
            <div>
              <div class="cartitemheader">
                <h3><?= $item['name'] ?></h3>
              </div>
              <p class="price">$<?= $item['price'] ?></p>
              <input type="hidden" id="productId" name="productId" value="<?= $item['cart_products_id'] ?>"></input>

              <label for="quantity">Quantity: </label>
              <input type="number" id="quantity" name="quantity" value="<?= $item['quantity'] ?>"></input>

              <input type="submit" name="update" value="Update">Update</input>
            </div>
          </form>
        </div>
        <hr />
      <?php } ?>

      <div class="checkoutgroup">
        <p>Subtotal: $<?= $subtotal ?></p>
        <p>Tax: $<?= $tax ?></p>
        <h3>Total: $<?= $total ?></h3>
        <?php if ($total > 0): ?>
          <form action="8_checkout.php" method="POST">
            <input type="submit" name="checkout" value="Proceed to Checkout" />
          </form>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <?php include_once ('8_footer.php') ?>
</body>

</html>
<?php
include ("db/module8_db.php");
if (!isset($_SESSION)) {
  session_start();
}
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);

// Check connection
if (mysqli_connect_errno()) {
  die("Connection failed: " . mysqli_connect_error());
}

$hasShoppingPermissions = false;
if (
  isset($_SESSION["access_level"])
  && $_SESSION["access_level"] == "customer"
) {
  $hasShoppingPermissions = true;
}

$query = "SELECT * FROM products";
$products = $conn->query($query);

if (
  $_SERVER["REQUEST_METHOD"] == "POST"
  && isset($_POST["productId"])
  && isset($_POST["quantity"])
  && is_numeric($_POST["quantity"])
) {
  $productId = $_POST["productId"];
  $quantity = $_POST["quantity"];

  $cartQuery = "SELECT * FROM cart WHERE checked_out = false AND user_id = '" . $_SESSION["userId"] . "'";
  $cart = $conn->query($cartQuery)->fetch_assoc();
  if ($cart == null) {
    $insertCartQuery = "INSERT INTO cart (user_id) VALUES ('" . $_SESSION["userId"] . "')";
    $conn->query($insertCartQuery);
    $cart = $conn->query($cartQuery)->fetch_assoc();
  }
  $_SESSION['cartId'] = $cart['id'];

  $cartQuery = "SELECT * FROM cart_products where cart_id = '" . $cart['id'] . "' and products_id = '" . $productId . "'";
  $cart_product = $conn->query($cartQuery)->fetch_assoc();
  if ($cart_product == null) {
    $insertCartQuery = "INSERT INTO cart_products (products_id, cart_id, quantity) VALUES ('" . $productId . "', '" . $cart['id'] . "', '" . $quantity . "')";
    $conn->query($insertCartQuery);
  } else {
    $updateCartQuery = "UPDATE cart_products set quantity = quantity + " . $quantity . " where products_id = '" . $productId . "'";
    $conn->query($updateCartQuery);
  }

  header("Location: 8_cart.php");
}
$conn->close();
?>

<div class="productlist">
  <?php foreach ($products as $product) { ?>
    <div class="product">
      <div class="image">
        <img src="Module8/<?= $product['image'] ?>" alt="<?= $product['name'] ?>" />
      </div>
      <div>
        <h3><?= $product['name'] ?></h3>
        <p class="description"><?= $product['description'] ?></p>
        <p class="price">$<?= $product['price'] ?></p>

        <?php if ($hasShoppingPermissions) { ?>
          <form action="" method="POST" class="addtocart">
            <input type="hidden" id="productId" name="productId" value="<?= $product['id'] ?>"></input>

            <div class="addtocartsection">
              <div>
                <label for="quantity">Quantity: </label>
                <input class="quantityfield" type="number" id="quantity" name="quantity" value="1"></input>
              </div>

              <input type="submit" value="Add to Cart" />
            </div>
          </form>
        <?php } ?>

        <form action="/8_product.php" method="GET" class="reviewbutton">
          <input type="hidden" id="productId" name="productId" value="<?= $product['id'] ?>"></input>

          <div class="addtocartsection">
            <input type="submit" value="Reviews" />
          </div>
        </form>
      </div>
    </div>
  <?php } ?>
</div>
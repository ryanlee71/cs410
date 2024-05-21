<?php
include ("Module5/products.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"
&& isset($_POST["productId"])
&& isset($_POST["quantity"])
&& is_numeric($_POST["quantity"])) {
  $productId = $_POST["productId"];
  $quantity = $_POST["quantity"];
  if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = array();
  }

  if (isset($_SESSION["cart"][$productId])) {
    $_SESSION["cart"][$productId] += $quantity;
  } else {
    $_SESSION["cart"][$productId] = $quantity;
  }

  header("Location: cart.php");
}
?>

<div class="productlist">
  <?php foreach ($products as $product) { ?>
    <div class="product">
      <div class="image">
        <img src="Module5/<?= $product['image'] ?>" alt="<?= $product['name'] ?>" />
      </div>
      <div>
        <h3><?= $product['name'] ?></h3>
        <p class="description"><?= $product['description'] ?></p>
        <p class="price">$<?= $product['price'] ?></p>

        <form action="" method="POST" class="addtocart">
          <input type="hidden" id="productId" name="productId" value="<?= $product['id'] ?>"></input>

          <label for="quantity">Quantity: </label>
          <input type="number" id="quantity" name="quantity" value="1"></input>

          <input type="submit" value="Submit">Add to Cart</input>
        </form>
      </div>
    </div>
  <?php } ?>
</div>
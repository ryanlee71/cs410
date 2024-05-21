<?php
if (!isset($_SESSION)) {
  session_start();
}

include ("db/module8_db.php");

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);

// Check connection
if (mysqli_connect_errno()) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_SESSION['userId'])) {
  $userId = $_SESSION["userId"];
}
$hasShoppingPermissions = $hasDeletePermissions = $hasAddPermissions = $hasEditingPermissions = $currentlyAdding = $currentlyEditing = false;
$currentlyEditingReviewId = "";
if (isset($_SESSION["access_level"])) {
  if ($_SESSION["access_level"] == "admin") {
    $hasDeletePermissions = true;
    $hasEditingPermissions = true;
    $hasAddPermissions = true;
  } else if ($_SESSION["access_level"] == "publisher") {
    $hasDeletePermissions = false;
    $hasEditingPermissions = true;
    $hasAddPermissions = true;
  } else if ($_SESSION["access_level"] == "customer") {
    $hasShoppingPermissions = true;
  }
}

if (!isset($_GET["productId"])) {
  header("Location: /8_shop.php");
  exit();
}

$productId = htmlspecialchars($_GET["productId"]);

if (
  $_SERVER["REQUEST_METHOD"] == "POST"
  && isset($_POST["remove"])
) {
  $removeReview = "DELETE FROM reviews WHERE id = " . $_POST["reviewId"];
  $conn->query($removeReview);
  header('Location: /8_product.php?productId=' . $productId);
} else if (
  $_SERVER["REQUEST_METHOD"] == "POST"
  && isset($_POST["addreview"])
  && $hasAddPermissions
) {
  $currentlyAdding = true;
} else if (
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

if (
  $_SERVER["REQUEST_METHOD"] == "POST"
  && isset($_POST["edit"])
  && isset($_POST["reviewId"])
) {
  $currentlyEditing = true;
  $currentlyEditingReviewId = $_POST["reviewId"];
} else if (
  $_SERVER["REQUEST_METHOD"] == "POST"
  && isset($_POST["save"])
  && isset($_POST["reviewId"])
) {
  $currentlyEditing = false;
  $currentlyEditingReviewId = "";
  $currentlyAdding = false;

  $updateReview = "UPDATE reviews set title = '" . htmlspecialchars($_POST["title"]) . "', review_text = '" . htmlspecialchars($_POST["review_text"]) . "', rating = '" . $_POST["rating"] . "' WHERE id = " . $_POST["reviewId"];
  $conn->query($updateReview);
  header('Location: /8_product.php?productId=' . $productId);
} else if (
  $_SERVER["REQUEST_METHOD"] == "POST"
  && isset($_POST["save"])
  && !isset($_POST["reviewId"])
) {
  $currentlyEditing = false;
  $currentlyEditingReviewId = "";
  $currentlyAdding = false;
  $insertReview = "INSERT INTO reviews (title, review_text, rating, user_id, product_id) VALUES ('" . htmlspecialchars($_POST["title"]) . "', '" . htmlspecialchars($_POST["review_text"]) . "', '" . $_POST["rating"] . "', '" . $_SESSION["userId"] . "', '" . $productId . "')";
  $conn->query($insertReview);
  header('Location: /8_product.php?productId=' . $productId);
} else if (
  $_SERVER["REQUEST_METHOD"] == "POST"
  && isset($_POST["cancel"])
) {
  $currentlyEditing = false;
  $currentlyEditingReviewId = "";
  $currentlyAdding = false;
}

$reviewQuery = "SELECT t1.id, t1.title, t1.review_text, t1.rating, t1.created_at, t1.user_id, t2.first_name, t2.last_name FROM reviews AS t1 INNER JOIN users AS t2 ON t1.user_id = t2.id WHERE product_id = '" . $productId . "'";
$reviews = $conn->query($reviewQuery);
$sum = 0;
foreach ($reviews as $review) {
  $sum += $review['rating'];
}
if ($reviews->num_rows > 0) {
  $rating = round($sum / $reviews->num_rows, 2);
} else {
  $rating = 0;
}

$query = "SELECT * FROM products WHERE id = '" . $productId . "'";
$product = $conn->query($query)->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php include_once ('8_header.php') ?>

<body>
  <?php include_once ('8_menu.php') ?>
  <div id="content">
    <?php if ($product != null) { ?>
      <div class="productpage">
        <div class="productcontainer">
          <div class="productdetails">
            <div class="image">
              <img src="Module8/<?= $product['image'] ?>" alt="<?= $product['name'] ?>" />
            </div>
            <div>
              <div class="productheader">
                <h1><?= $product['name'] ?></h1>
                <h2>
                  <p class="price">$<?= $product['price'] ?></p>
                </h2>
              </div>
              <div class="rating">
                <p><b>Rating: <?= $rating ?> / 5</b></p>
              </div>
              <p class="description"><?= $product['description'] ?></p>

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
            </div>
          </div>
          <div class="reviews">
            <div class="reviewstoolbar">
              <h2>Reviews</h2>
              <form action="" method="POST" class="addreview">
                <input type="submit" name="addreview" value="+ Add Review" />
              </form>
            </div>
            <?php if ($currentlyAdding): ?>
              <div class="addreview">
                <form action="" method="POST" class="addreviewform">
                  <div class="addreviewtitle">
                    <label for="title">Title: </label>
                    <input class="addreviewtitle" type="text" id="title" name="title" />

                    <div class="ratingform">
                      <label for="selectrating">Rating: </label>
                      <select class="selectrating" name="rating" id="selectrating">
                        <option value="0">None</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>
                    </div>
                  </div>
                  <div class="reviewcontent">
                    <textarea id="review_text" name="review_text"></textarea>
                  </div>
                  <div class="addbuttongroup">
                    <input class="savebutton" type="submit" name="save" value="Save" />
                    <input class="remove" type="submit" name="save" value="Cancel" />
                  </div>
                </form>
              </div>
            <?php endif ?>
            <?php if ($reviews->num_rows > 0): ?>
              <?php foreach ($reviews as $review) { ?>
                <div class="review">
                  <?php if ($currentlyEditing && $currentlyEditingReviewId == $review['id']): ?>
                    <form action="" method="POST" class="editviewform">
                      <input type="hidden" name="reviewId" value="<?= $review['id'] ?>" />

                      <div class="editreviewtitle">
                        <label for="title">Title: </label>
                        <input class="editreviewtitle" type="text" id="title" name="title" value="<?= $review['title'] ?>" />

                        <div class="editratingform">
                          <label for="selectrating">Rating: </label>
                          <select class="selectrating" name="rating" id="selectrating">
                            <option <?= $review['rating'] == 0 ? 'selected="selected"' : '' ?> value="0">None</option>
                            <option <?= $review['rating'] == 1 ? 'selected="selected"' : '' ?> value="1">1</option>
                            <option <?= $review['rating'] == 2 ? 'selected="selected"' : '' ?> value="2">2</option>
                            <option <?= $review['rating'] == 3 ? 'selected="selected"' : '' ?> value="3">3</option>
                            <option <?= $review['rating'] == 4 ? 'selected="selected"' : '' ?> value="4">4</option>
                            <option <?= $review['rating'] == 5 ? 'selected="selected"' : '' ?> value="5">5</option>
                          </select>
                        </div>
                      </div>
                      <div class="editreviewcontent">
                        <textarea id="review_text" name="review_text"><?= $review['review_text'] ?></textarea>
                      </div>
                      <div class="editbuttongroup">
                        <input class="savebutton" type="submit" name="save" value="Save" />
                        <input class="remove" type="submit" name="save" value="Cancel" />
                      </div>
                    </form>
                  <?php else: ?>
                    <form action="" method="POST">
                      <input type="hidden" name="reviewId" value="<?= $review['id'] ?>" />

                      <div class="reviewheader">
                        <p class="reviewer">
                          <?= $review['first_name'] ?>         <?= $review['last_name'] ?> on
                          <?= date("F d, Y", strtotime($review['created_at'])) ?>
                          <?php if ($hasEditingPermissions || $userId == $review['user_id']) { ?>
                            <input class="editbutton" type="submit" name="edit" value="Edit" />
                          <?php } ?>
                          <?php if ($hasDeletePermissions || $userId == $review['user_id']) { ?>
                            <input class="remove" type="submit" name="remove" value="X Remove" />
                          <?php } ?>
                        </p>
                        <div class="ratingandtitle">
                          <span>Rating: <?= $review['rating'] ?> / 5</span>
                          <b><?= $review['title'] ?></b>
                        </div>
                      </div>
                      <div class="reviewtext">
                        <p><?= $review['review_text'] ?></p>
                      </div>
                    </form>
                  <?php endif ?>
                </div>
              <?php } ?>
            <?php else: ?>
              <h3>No reviews yet</h3>
            </div>
          <?php endif ?>
        </div>
      </div>
    <?php } ?>
  </div>
  </div>
  <?php include_once ('8_footer.php') ?>
</body>

</html>
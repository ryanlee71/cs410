<?php
$hasShoppingPermissions = false;
$showAccounts = false;
if (isset($_SESSION["access_level"])) {
  if ($_SESSION["access_level"] == "admin") {
    $showAccounts = true;
  } else if ($_SESSION["access_level"] == "customer") {
    $hasShoppingPermissions = true;
  }
}
?>

<div id="header">
  <h1>Kc's Gaming Team</h1>
  <ul id="menu">
    <li><a href="/module8.php">Module 8: Week 8 Database</a></li>
    <li><a href="/module8.php">Shop</a></li>
    <li><a href="/8_aboutus.php">About Us</a></li>
    <li><a href="/phpinfo.php">PHP Configuration</a></li>
    <li><a href="/contactus.php">Contact Us</a></li>
    <li><a href="/8_blogs.php">Blog</a></li>
    <?php if ($showAccounts) { ?>
      <li><a href="/8_accounts.php">Accounts</a></li>
    <?php } ?>
    <?php if ($hasShoppingPermissions) { ?>
      <li><a href="/8_cart.php">Cart</a></li>
    <?php } ?>
  </ul>
</div>
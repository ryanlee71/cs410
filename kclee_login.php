<?php
header("Content-Type: application/xhtml+xml; charset=utf-8");
session_start();
if (!isset($_SESSION["loggedIn"])) {
  header("location: notLoggedIn.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
  <meta name="description" content="Module 1 Variables Assignment" />
  <meta name="keywords" content="esports, professional, competitive" />
  <meta name="author" content="Ryan Lee" />
  <title>Module 1 Variables Assignment</title>
  <link rel="stylesheet" type="text/css" href="styles2.css" />
</head>

<body>
  <div id="header">
    <h1>Kc's Gaming Team</h1>
    <ul id="menu">
      <li><a href="module4.php">Module 4: Week 4 Sessions</a></li>
    </ul>
  </div>

  <div id="content">
    <?php include 'variables.php'; ?>
    <h2>Kc Lee</h2>
    <p><strong>Job Title:</strong> <?php echo $gamer2title; ?></p>
    <p><strong>Favorite Food:</strong> <?php echo $gamer2favoritefood; ?></p>
    <p><strong>Hobby:</strong> <?php echo $gamer2hobby; ?></p>
    <p><strong>Goals:</strong> <?php echo $gamer2goals; ?></p>
    <img src="images/liquid.jpg" />
  </div>

  <div id="footer">
    <?php if (isset($_SESSION["loggedIn"])) { ?>
      <button>
        <a href="logout.php">Logout</a>
      </button>
    <?php } ?>
    <p>&copy; <?php echo date("Y"); ?> Kc's Gaming Team. All Rights Reserved.</p>
    <p>Last modified: <?php echo date("F d Y H:i:s.", filemtime(__FILE__)); ?></p>
    <p>
      <a href="http://validator.w3.org/check?uri=referer">
        <img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML" />
      </a>
      <a href="http://jigsaw.w3.org/css-validator/check/referer">
        <img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS" />
      </a>
    </p>
  </div>
</body>

</html>
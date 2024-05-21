<?php
header("Content-Type: application/xhtml+xml; charset=utf-8");
header( "refresh:2;url=login.php" );
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
  <meta name="description" content="Module 5 Assignment" />
  <meta name="keywords" content="esports, professional, competitive" />
  <meta name="author" content="Ryan Lee" />
  <title>Module 5 Assignment</title>
  <link rel="stylesheet" type="text/css" href="../module5.css" />
</head>

<body>
  <?php include_once('../menu.php') ?>

  <div id="content">
    <h2>Log in failed... redirecting</h2>
  </div>

  <?php include_once('../footer.php') ?>
</body>

</html>
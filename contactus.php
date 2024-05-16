<?php
    header("Content-Type: application/xhtml+xml; charset=utf-8");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
    <meta name="description" content="Module 1 Foundations Assignment" />
    <meta name="keywords" content="Module 1, Foundations, Assignment" />
    <meta name="author" content="Ryan Lee" />
    <title>Module 1 Foundations Assignment</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
    <div id="header">
        <h1>Kc's Gaming Team</h1>
        <ul id="menu">
            <li><a href="module1.php">Module 1: Week 1 Foundations</a></li>
            <li><a href="aboutus.php">About Us</a></li>
            <li><a href="phpinfo.php">PHP Configuration</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
        </ul>
    </div>

    <div id="content">
     <?php
     print "<h2>Contact Us</h2>";
     print "<p>Email: kcsgamingteam@gmail.com</p>";
     print "<p>Phone Number: 123-456-7890</p>";
     ?>
    </div>

    <div id="footer">
        <p>&copy; <?php echo date("Y"); ?> Kc's Gaming Team. All Rights Reserved.</p>
	<p>Last modified: <?php echo date ("F d Y H:i:s.", filemtime(__FILE__)); ?></p>
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
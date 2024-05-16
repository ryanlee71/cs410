<?php
    header("Content-Type: application/xhtml+xml; charset=utf-8");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
    <meta name="description" content="This is a website created for my Kc's gaming team" />
    <meta name="keywords" content="kcgamingteam, professional, gaming" />
    <meta name="author" content="Ryan Lee" />
    <title>Kc's Gaming Team</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
    <div id="header">
        <h1>Kc's Gaming Team</h1>
        <ul id="menu">
            <li><a href="module1.php">Module 1: Week 1 Foundations</a></li>
            <li><a href="module1a.php">Module 1: Week 1 Variables</a></li>
            <li><a href="module2.php">Module 2: Week 2 Forms</a></li>
            <li><a href="module3.php">Module 3: Week 3 Arrays</a></li>
            <li><a href="module4.php">Module 4: Week 4 Sessions</a></li>
            <li><a href="module5.php">Module 5: Week 5 CMS Sessions</a></li>
            <li><a href="module6.php">Module 6: Week 6 Database</a></li>
            <li><a href="module8.php">Module 8: Week 8 CMS Database</a></li>
        </ul>
    </div>

    <div id="content">
        <h2>Welcome to Kc's Gaming Team.</h2>
        <p>We are Kc's Gaming Team. A new Esports team that wants to face the current champions and become champions of their own.</p>
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
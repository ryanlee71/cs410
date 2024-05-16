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
        <h2>About Us</h2>
       <p>Kc's Gaming Team is a new organization that is diving headfirst into the realm of professional gaming. Our dream is to make a name for ourselves in the competitive gaming 
        scene. We are all about passion, teamwork, and always aiming for the top! As a new organization, we are ready to shake up the competitive scene, dethrone the already well known 
        teams, and make our presence known!</p>
        <h2>Vision and Mission</h2>
        <p>Here at Kc's Gaming Team, our goal is quite simple: we want to create a safe space where gamers can thrive and reach their full potential. We prioritize integrity, fairness,  and 
        pushing the boundaries of what gaming can achieve. We believe in playing by the rules, treating others with respect, and constantly exploring new horizons in the gaming world. 
        Our mission is to provide a welcoming environment where gamers can come together, support each other, and achieve greatness. Through teamwork and dedication, we are 
        determined to make gaming exciting and inspiring for everyone that is involved.</p>
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
<?php
    header("Content-Type: application/xhtml+xml; charset=utf-8");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<?php include_once('header.php') ?>
<body>
  <?php include_once('menu.php') ?>

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
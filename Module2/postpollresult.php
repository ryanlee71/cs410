<?php
header("Content-Type: application/xhtml+xml; charset=utf-8");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
    <meta name="description" content="Module 2 Forms Assignment" />
    <meta name="keywords" content="professional, competitive" />
    <meta name="author" content="Ryan Lee" />
    <title>Module 2 Forms Assignment</title>
    <link rel="stylesheet" type="text/css" href="../styles2.css" />

</head>

<body>
    <div id="header">
        <h1>Kc's Gaming Team</h1>
        <ul id="menu">
            <li><a href="../module2.php">Module 2: Forms Assignment</a></li>
        </ul>
    </div>

    <div id="content">
        <h2>Module 2: Week 2 Forms Assignment</h2>
        <p>This contains the contents that were needed for Week 2 Forms Assignment.</p>

        <h2>POST Form</h2>
        <div>
           <p>
           name:<?php
                echo $_POST['Name'];
                ?>
           </p> 
           <p>
           comment:<?php
                echo $_POST['Comments'];
                ?>
           </p> 
        </div>
        <div style="display:flex;">
            <img src="images/headphones.jpg" />
            <p>Gaming Headphones: $190</p>

        </div>
        <div>
            <p>
                Would you buy these headphones at this price?
                <?php
                echo $_POST['1_price'];              
                ?>
            </p>
            <p>
                Do you like the colors that are offered?
                <?php
                echo $_POST['1_color'];
                ?>
            </p>
            <p>
                How would you rate the sound quality?
                <?php
                echo $_POST['1_sound'];
                ?>
            </p>
            <p>
                How would you rate the durability of the headphones?
                <?php
                echo $_POST['1_dura'];
                ?>
            </p>
            <p>
                Would you recommend these headphones?
                <?php
                echo $_POST['1_rec'];
                ?>
            </p>
        </div>

        <div style="display:flex;">
            <img src="images/mouse.jpg" />
            <p>Gaming Mouse: $150</p>

        </div>
        <div>
            <p>
                Would you buy the mouse at this price?
                <?php
                echo $_POST['2_price'];
                ?>
            </p>
            <p>
                Do you like the colors that are offered?
                <?php
                echo $_POST['2_color'];
                ?>
            </p>
            <p>
                How would you rate the quality?
                <?php
                echo $_POST['2_qual'];
                ?>
            </p>
            <p>
                How would you rate the durability of the mouse?
                <?php
                echo $_POST['2_dura'];
                ?>
            </p>
            <p>
                Would you recommend this mouse?
                <?php
                echo $_POST['2_rec'];
                ?>
            </p>
        </div>
        <div style="display:flex;">
            <img src="images/chair.jpg" />
            <p>Gaming Chair: $1500</p>

        </div>
        <div>
            <p>
                Would you buy the chair at this price?
                <?php
                echo $_POST['3_price'];
                ?>
            </p>
            <p>
                Do you like the colors that are offered?
                <?php
                echo $_POST['3_color'];
                ?>
            </p>
            <p>
                How would you rate the quality?
                <?php
                echo $_POST['3_qual'];
                ?>
            </p>
            <p>
                How would you rate the durability of the chair?
                <?php
                echo $_POST['3_dura'];
                ?>
            </p>
            <p>
                Would you recommend the chair?
                <?php
                echo $_POST['3_rec'];
                ?>
            </p>
        </div>
    </div>
    <div id="footer">
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
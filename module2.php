<?php
    header("Content-Type: application/xhtml+xml; charset=utf-8");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
    <meta name="description" content="Module 2 Forms Assignment" />
    <meta name="keywords" content="professional, competitive" />
    <meta name="author" content="Ryan Lee" />
    <title>Module 2 Forms Assignment</title>
    <link rel="stylesheet" type="text/css" href="styles2.css" />
</head>
<body>
    <div id="header">
        <h1>Kc's Gaming Team</h1>
        <ul id="menu">
            <li><a href="Module2/products.php">Module 2: Forms Assignment</a></li>
        </ul>
    </div>

    <div id="content">
        <h2>Module 2: Week 2 Forms Assignment</h2>
        <p>This contains the contents that were needed for Week 2 Forms Assignment.</p>
        <form action="poll_results.php" method="GET" id="GETForm">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name"></input>
        
        <!-- Input for 3 items -->
        <p>Gaming Headphones:</p>
        <input type="radio" name="product1" value="excellent"> Excellent </input>
        <input type="radio" name="product1" value="good"> Good </input>
        <input type="radio" name="product1" value="average"> Average </input>
        <input type="radio" name="product1" value="poor"> Poor </input>
        <input type="radio" name="product1" value="very poor"> Very Poor </input>

        <p>Gaming Mouse:</p>
        <input type="radio" name="product2" value="excellent"> Excellent </input>
        <input type="radio" name="product2" value="good"> Good </input>
        <input type="radio" name="product2" value="average"> Average </input>
        <input type="radio" name="product2" value="poor"> Poor </input>
        <input type="radio" name="product2" value="very poor"> Very Poor </input>

        <p>Gaming Monitors:</p>
        <input type="radio" name="product3" value="excellent"> Excellent </input>
        <input type="radio" name="product3" value="good"> Good </input>
        <input type="radio" name="product3" value="average"> Average </input>
        <input type="radio" name="product3" value="poor"> Poor </input>
        <input type="radio" name="product3" value="very poor"> Very Poor </input>
        
        <!-- Comment section -->
        <label for="comments">Comments:</label>
        <textarea id="comments" name="comments" rows="4" cols="50"></textarea>
        
        <input type="submit" value="Submit"/>
    </form>

    <form action="poll_results.php" method="POST" id="POSTform">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name"></input>
        
        <!-- Input for the 3 same items -->
        <p>Gaming Headphones:</p>
        <input type="radio" name="product1" value="excellent"> Excellent </input>
        <input type="radio" name="product1" value="good"> Good </input>
        <input type="radio" name="product1" value="average"> Average </input>
        <input type="radio" name="product1" value="poor"> Poor </input>
        <input type="radio" name="product1" value="very poor"> Very Poor </input>

        <p>Gaming Mouse:</p>
        <input type="radio" name="product2" value="excellent"> Excellent </input>
        <input type="radio" name="product2" value="good"> Good </input>
        <input type="radio" name="product2" value="average"> Average </input>
        <input type="radio" name="product2" value="poor"> Poor </input>
        <input type="radio" name="product2" value="very poor"> Very Poor </input>

        <p>Gaming Monitors:</p>
        <input type="radio" name="product3" value="excellent"> Excellent </input>
        <input type="radio" name="product3" value="good"> Good </input>
        <input type="radio" name="product3" value="average"> Average </input>
        <input type="radio" name="product3" value="poor"> Poor </input>
        <input type="radio" name="product3" value="very poor"> Very Poor </input>
        
        <label for="comments">Comments:</label>
        <textarea id="comments" name="comments" rows="4" cols="50"></textarea>
        
        <input type="submit" value="Submit"/>
    </form>
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
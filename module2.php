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
    <link rel="stylesheet" type="text/css" href="styles2.css" />

</head>

<body>
    <div id="header">
        <h1>Kc's Gaming Team</h1>
        <ul id="menu">
            <li><a href="./module2.php">Module 2: Forms Assignment</a></li>
        </ul>
    </div>

    <div id="content">
        <h2>Module 2: Week 2 Forms Assignment</h2>
        <p>This contains the contents that were needed for Week 2 Forms Assignment.</p>

        <h2>GET Form</h2>
        <form action="Module2/getpollresult.php" method="GET" class="module2form">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name"></input>

            <!-- Input for 3 items -->
            <div style="display:flex;">
                <img src="Module2/images/headphones.jpg" />
                <p>Gaming Headphones: $190</p>

            </div>
            <p>
                Would you buy these headphones at this price?
            </p>
            <label>
                <input type="radio" name="1_price" value="Most Likely" />
                Most Likely
            </label><br />
            <label>
                <input type="radio" name="1_price" value="Likely" />
                Likely
            </label><br />

            <label>
                <input type="radio" name="1_price" value="Neutral" />
                Neutral
            </label><br />

            <label>
                <input type="radio" name="1_price" value="Unlikely" />
                Unlikely
            </label><br />

            <label>
                <input type="radio" name="1_price" value="Very Unlikely" />
                Very Unlikely
            </label><br />
            <p>
                Do you like the colors that are offered?
            </p>
            <label>
                <input type="radio" name="1_color" value="Excellent" />
                Excellent
            </label><br />
            <label>
                <input type="radio" name="1_color" value="Great" />
                Great
            </label><br />

            <label>
                <input type="radio" name="1_color" value="Good" />
                Good
            </label><br />

            <label>
                <input type="radio" name="1_color" value="Average" />
                Average
            </label><br />

            <label>
                <input type="radio" name="1_color" value="Poor" />
                Poor
            </label><br />
            <p>
                How would you rate the sound quality?
            </p>
            <label>
                <input type="radio" name="1_sound" value="Excellent" />
                Excellent
            </label><br />
            <label>
                <input type="radio" name="1_sound" value="Great" />
                Great
            </label><br />

            <label>
                <input type="radio" name="1_sound" value="Good" />
                Good
            </label><br />

            <label>
                <input type="radio" name="1_sound" value="Average" />
                Average
            </label><br />

            <label>
                <input type="radio" name="1_sound" value="Poor" />
                Poor
            </label><br />
            <p>
                How would you rate the durability of the headphones?
            </p>
            <label>
                <input type="radio" name="1_dura" value="Excellent" />
                Excellent
            </label><br />
            <label>
                <input type="radio" name="1_dura" value="Great" />
                Great
            </label><br />

            <label>
                <input type="radio" name="1_dura" value="Good" />
                Good
            </label><br />

            <label>
                <input type="radio" name="1_dura" value="Average" />
                Average
            </label><br />

            <label>
                <input type="radio" name="1_dura" value="Poor" />
                Poor
            </label><br />
            <p>
                Would you recommend these headphones?
            </p>
            <label>
                <input type="radio" name="1_rec" value="Very Likely" />
                Very Likely
            </label><br />
            <label>
                <input type="radio" name="1_rec" value="Likely" />
                Likely
            </label><br />

            <label>
                <input type="radio" name="1_rec" value="Neutral" />
                Neutral
            </label><br />

            <label>
                <input type="radio" name="1_rec" value="Unlikely" />
                Unlikely
            </label><br />

            <label>
                <input type="radio" name="1_rec" value="Very Unlikely" />
                Very Unlikely
            </label><br />

            <div style="display:flex;">
                <img src="Module2/images/mouse.jpg" />
                <p>Gaming Mouse: $150</p>
            </div>

            <p>
                Would you buy this mouse at this price?
            </p>
            <label>
                <input type="radio" name="2_price" value="Most Likely" />
                Most Likely
            </label><br />
            <label>
                <input type="radio" name="2_price" value="Likely" />
                Likely
            </label><br />

            <label>
                <input type="radio" name="2_price" value="Neutral" />
                Neutral
            </label><br />

            <label>
                <input type="radio" name="2_price" value="Unlikely" />
                Unlikely
            </label><br />

            <label>
                <input type="radio" name="2_price" value="Very Unlikely" />
                Very Unlikely
            </label><br />
            <p>
                Do you like the colors that are offered?
            </p>
            <label>
                <input type="radio" name="2_color" value="Excellent" />
                Excellent
            </label><br />
            <label>
                <input type="radio" name="2_color" value="Great" />
                Great
            </label><br />

            <label>
                <input type="radio" name="2_color" value="Good" />
                Good
            </label><br />

            <label>
                <input type="radio" name="2_color" value="Average" />
                Average
            </label><br />

            <label>
                <input type="radio" name="2_color" value="Poor" />
                Poor
            </label><br />
            <p>
                How would you rate the quality?
            </p>
            <label>
                <input type="radio" name="2_qual" value="Excellent" />
                Excellent
            </label><br />
            <label>
                <input type="radio" name="2_qual" value="Great" />
                Great
            </label><br />

            <label>
                <input type="radio" name="2_qual" value="Good" />
                Good
            </label><br />

            <label>
                <input type="radio" name="2_qual" value="Average" />
                Average
            </label><br />

            <label>
                <input type="radio" name="2_qual" value="Poor" />
                Poor
            </label><br />
            <p>
                How would you rate the durability of the mouse?
            </p>
            <label>
                <input type="radio" name="2_dura" value="Excellent" />
                Excellent
            </label><br />
            <label>
                <input type="radio" name="2_dura" value="Great" />
                Great
            </label><br />

            <label>
                <input type="radio" name="2_dura" value="Good" />
                Good
            </label><br />

            <label>
                <input type="radio" name="2_dura" value="Average" />
                Average
            </label><br />

            <label>
                <input type="radio" name="2_dura" value="Poor" />
                Poor
            </label><br />
            <p>
                Would you recommend this mouse?
            </p>
            <label>
                <input type="radio" name="2_rec" value="Very Likely" />
                Very Likely
            </label><br />
            <label>
                <input type="radio" name="2_rec" value="Likely" />
                Likely
            </label><br />

            <label>
                <input type="radio" name="2_rec" value="Neutral" />
                Neutral
            </label><br />

            <label>
                <input type="radio" name="2_rec" value="Unlikely" />
                Unlikely
            </label><br />

            <label>
                <input type="radio" name="2_rec" value="Very Unlikely" />
                Very Unlikely
            </label><br />


            <div style="display:flex;">
                <img src="Module2/images/chair.jpg" />
                <p>Gaming Chair: $1500</p>
            </div>

            <p>
                Would you buy this chair at this price?
            </p>
            <label>
                <input type="radio" name="3_price" value="Most Likely" />
                Most Likely
            </label><br />
            <label>
                <input type="radio" name="3_price" value="Likely" />
                Likely
            </label><br />

            <label>
                <input type="radio" name="3_price" value="Neutral" />
                Neutral
            </label><br />

            <label>
                <input type="radio" name="3_price" value="Unlikely" />
                Unlikely
            </label><br />

            <label>
                <input type="radio" name="3_price" value="Very Unlikely" />
                Very Unlikely
            </label><br />
            <p>
                Do you like the colors that are offered?
            </p>
            <label>
                <input type="radio" name="3_color" value="Excellent" />
                Excellent
            </label><br />
            <label>
                <input type="radio" name="3_color" value="Great" />
                Great
            </label><br />

            <label>
                <input type="radio" name="3_color" value="Good" />
                Good
            </label><br />

            <label>
                <input type="radio" name="3_color" value="Average" />
                Average
            </label><br />

            <label>
                <input type="radio" name="3_color" value="Poor" />
                Poor
            </label><br />
            <p>
                How would you rate the quality?
            </p>
            <label>
                <input type="radio" name="3_qual" value="Excellent" />
                Excellent
            </label><br />
            <label>
                <input type="radio" name="3_qual" value="Great" />
                Great
            </label><br />

            <label>
                <input type="radio" name="3_qual" value="Good" />
                Good
            </label><br />

            <label>
                <input type="radio" name="3_qual" value="Average" />
                Average
            </label><br />

            <label>
                <input type="radio" name="3_qual" value="Poor" />
                Poor
            </label><br />
            <p>
                How would you rate the durability of the chair?
            </p>
            <label>
                <input type="radio" name="3_dura" value="Excellent" />
                Excellent
            </label><br />
            <label>
                <input type="radio" name="3_dura" value="Great" />
                Great
            </label><br />

            <label>
                <input type="radio" name="3_dura" value="Good" />
                Good
            </label><br />

            <label>
                <input type="radio" name="3_dura" value="Average" />
                Average
            </label><br />

            <label>
                <input type="radio" name="3_dura" value="Poor" />
                Poor
            </label><br />
            <p>
                Would you recommend the chair?
            </p>
            <label>
                <input type="radio" name="3_rec" value="Very Likely" />
                Very Likely
            </label><br />
            <label>
                <input type="radio" name="3_rec" value="Likely" />
                Likely
            </label><br />

            <label>
                <input type="radio" name="3_rec" value="Neutral" />
                Neutral
            </label><br />

            <label>
                <input type="radio" name="3_rec" value="Unlikely" />
                Unlikely
            </label><br />

            <label>
                <input type="radio" name="3_rec" value="Very Unlikely" />
                Very Unlikely
            </label><br />

            <br />

            <!-- Comment section -->
            <label for="comments">Comments:</label>
            <br />
            <textarea id="comments" name="comments" rows="4" cols="50"></textarea>
            <br />

            <input type="submit" value="Submit" />
        </form>

        <h2>POST Form</h2>

        <form action="Module2/postpollresult.php" method="POST" class="module2form">
            <label for="name">Your Name:</label>
            <input type="text" id="name" name="name"></input>

            <!-- Input for 3 items -->
            <div style="display:flex;">
                <img src="Module2/images/headphones.jpg" />
                <p>Gaming Headphones: $190</p>

            </div>
            <p>
                Would you buy these headphones at this price?
            </p>
            <label>
                <input type="radio" name="1_price" value="Most Likely" />
                Most Likely
            </label><br />
            <label>
                <input type="radio" name="1_price" value="Likely" />
                Likely
            </label><br />

            <label>
                <input type="radio" name="1_price" value="Neutral" />
                Neutral
            </label><br />

            <label>
                <input type="radio" name="1_price" value="Unlikely" />
                Unlikely
            </label><br />

            <label>
                <input type="radio" name="1_price" value="Very Unlikely" />
                Very Unlikely
            </label><br />
            <p>
                Do you like the colors that are offered?
            </p>
            <label>
                <input type="radio" name="1_color" value="Excellent" />
                Excellent
            </label><br />
            <label>
                <input type="radio" name="1_color" value="Great" />
                Great
            </label><br />

            <label>
                <input type="radio" name="1_color" value="Good" />
                Good
            </label><br />

            <label>
                <input type="radio" name="1_color" value="Average" />
                Average
            </label><br />

            <label>
                <input type="radio" name="1_color" value="Poor" />
                Poor
            </label><br />
            <p>
                How would you rate the sound quality?
            </p>
            <label>
                <input type="radio" name="1_sound" value="Excellent" />
                Excellent
            </label><br />
            <label>
                <input type="radio" name="1_sound" value="Great" />
                Great
            </label><br />

            <label>
                <input type="radio" name="1_sound" value="Good" />
                Good
            </label><br />

            <label>
                <input type="radio" name="1_sound" value="Average" />
                Average
            </label><br />

            <label>
                <input type="radio" name="1_sound" value="Poor" />
                Poor
            </label><br />
            <p>
                How would you rate the durability of the headphones?
            </p>
            <label>
                <input type="radio" name="1_dura" value="Excellent" />
                Excellent
            </label><br />
            <label>
                <input type="radio" name="1_dura" value="Great" />
                Great
            </label><br />

            <label>
                <input type="radio" name="1_dura" value="Good" />
                Good
            </label><br />

            <label>
                <input type="radio" name="1_dura" value="Average" />
                Average
            </label><br />

            <label>
                <input type="radio" name="1_dura" value="Poor" />
                Poor
            </label><br />
            <p>
                Would you recommend these headphones?
            </p>
            <label>
                <input type="radio" name="1_rec" value="Very Likely" />
                Very Likely
            </label><br />
            <label>
                <input type="radio" name="1_rec" value="Likely" />
                Likely
            </label><br />

            <label>
                <input type="radio" name="1_rec" value="Neutral" />
                Neutral
            </label><br />

            <label>
                <input type="radio" name="1_rec" value="Unlikely" />
                Unlikely
            </label><br />

            <label>
                <input type="radio" name="1_rec" value="Very Unlikely" />
                Very Unlikely
            </label><br />

            <div style="display:flex;">
                <img src="Module2/images/mouse.jpg" />
                <p>Gaming Mouse: $150</p>
            </div>

            <p>
                Would you buy this mouse at this price?
            </p>
            <label>
                <input type="radio" name="2_price" value="Most Likely" />
                Most Likely
            </label><br />
            <label>
                <input type="radio" name="2_price" value="Likely" />
                Likely
            </label><br />

            <label>
                <input type="radio" name="2_price" value="Neutral" />
                Neutral
            </label><br />

            <label>
                <input type="radio" name="2_price" value="Unlikely" />
                Unlikely
            </label><br />

            <label>
                <input type="radio" name="2_price" value="Very Unlikely" />
                Very Unlikely
            </label><br />
            <p>
                Do you like the colors that are offered?
            </p>
            <label>
                <input type="radio" name="2_color" value="Excellent" />
                Excellent
            </label><br />
            <label>
                <input type="radio" name="2_color" value="Great" />
                Great
            </label><br />

            <label>
                <input type="radio" name="2_color" value="Good" />
                Good
            </label><br />

            <label>
                <input type="radio" name="2_color" value="Average" />
                Average
            </label><br />

            <label>
                <input type="radio" name="2_color" value="Poor" />
                Poor
            </label><br />
            <p>
                How would you rate the quality?
            </p>
            <label>
                <input type="radio" name="2_qual" value="Excellent" />
                Excellent
            </label><br />
            <label>
                <input type="radio" name="2_qual" value="Great" />
                Great
            </label><br />

            <label>
                <input type="radio" name="2_qual" value="Good" />
                Good
            </label><br />

            <label>
                <input type="radio" name="2_qual" value="Average" />
                Average
            </label><br />

            <label>
                <input type="radio" name="2_qual" value="Poor" />
                Poor
            </label><br />
            <p>
                How would you rate the durability of the mouse?
            </p>
            <label>
                <input type="radio" name="2_dura" value="Excellent" />
                Excellent
            </label><br />
            <label>
                <input type="radio" name="2_dura" value="Great" />
                Great
            </label><br />

            <label>
                <input type="radio" name="2_dura" value="Good" />
                Good
            </label><br />

            <label>
                <input type="radio" name="2_dura" value="Average" />
                Average
            </label><br />

            <label>
                <input type="radio" name="2_dura" value="Poor" />
                Poor
            </label><br />
            <p>
                Would you recommend this mouse?
            </p>
            <label>
                <input type="radio" name="2_rec" value="Very Likely" />
                Very Likely
            </label><br />
            <label>
                <input type="radio" name="2_rec" value="Likely" />
                Likely
            </label><br />

            <label>
                <input type="radio" name="2_rec" value="Neutral" />
                Neutral
            </label><br />

            <label>
                <input type="radio" name="2_rec" value="Unlikely" />
                Unlikely
            </label><br />

            <label>
                <input type="radio" name="2_rec" value="Very Unlikely" />
                Very Unlikely
            </label><br />


            <div style="display:flex;">
                <img src="Module2/images/chair.jpg" />
                <p>Gaming Chair: $1500</p>
            </div>

            <p>
                Would you buy this chair at this price?
            </p>
            <label>
                <input type="radio" name="3_price" value="Most Likely" />
                Most Likely
            </label><br />
            <label>
                <input type="radio" name="3_price" value="Likely" />
                Likely
            </label><br />

            <label>
                <input type="radio" name="3_price" value="Neutral" />
                Neutral
            </label><br />

            <label>
                <input type="radio" name="3_price" value="Unlikely" />
                Unlikely
            </label><br />

            <label>
                <input type="radio" name="3_price" value="Very Unlikely" />
                Very Unlikely
            </label><br />
            <p>
                Do you like the colors that are offered?
            </p>
            <label>
                <input type="radio" name="3_color" value="Excellent" />
                Excellent
            </label><br />
            <label>
                <input type="radio" name="3_color" value="Great" />
                Great
            </label><br />

            <label>
                <input type="radio" name="3_color" value="Good" />
                Good
            </label><br />

            <label>
                <input type="radio" name="3_color" value="Average" />
                Average
            </label><br />

            <label>
                <input type="radio" name="3_color" value="Poor" />
                Poor
            </label><br />
            <p>
                How would you rate the quality?
            </p>
            <label>
                <input type="radio" name="3_qual" value="Excellent" />
                Excellent
            </label><br />
            <label>
                <input type="radio" name="3_qual" value="Great" />
                Great
            </label><br />

            <label>
                <input type="radio" name="3_qual" value="Good" />
                Good
            </label><br />

            <label>
                <input type="radio" name="3_qual" value="Average" />
                Average
            </label><br />

            <label>
                <input type="radio" name="3_qual" value="Poor" />
                Poor
            </label><br />
            <p>
                How would you rate the durability of the chair?
            </p>
            <label>
                <input type="radio" name="3_dura" value="Excellent" />
                Excellent
            </label><br />
            <label>
                <input type="radio" name="3_dura" value="Great" />
                Great
            </label><br />

            <label>
                <input type="radio" name="3_dura" value="Good" />
                Good
            </label><br />

            <label>
                <input type="radio" name="3_dura" value="Average" />
                Average
            </label><br />

            <label>
                <input type="radio" name="3_dura" value="Poor" />
                Poor
            </label><br />
            <p>
                Would you recommend the chair?
            </p>
            <label>
                <input type="radio" name="3_rec" value="Very Likely" />
                Very Likely
            </label><br />
            <label>
                <input type="radio" name="3_rec" value="Likely" />
                Likely
            </label><br />

            <label>
                <input type="radio" name="3_rec" value="Neutral" />
                Neutral
            </label><br />

            <label>
                <input type="radio" name="3_rec" value="Unlikely" />
                Unlikely
            </label><br />

            <label>
                <input type="radio" name="3_rec" value="Very Unlikely" />
                Very Unlikely
            </label><br />

            <br />

            <!-- Comment section -->
            <label for="comments">Comments:</label>
            <br />
            <textarea id="comments" name="comments" rows="4" cols="50"></textarea>
            <br />

            <input type="submit" value="Submit" />
        </form>
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
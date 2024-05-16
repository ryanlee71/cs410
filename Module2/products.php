<!DOCTYPE html>
<html>
<head>
    <title>Web Poll (GET Method)</title>
</head>
<body>
    <form action="poll_results.php" method="GET">
        <label for="name">Your Name:</label><br>
        <input type="text" id="name" name="name"><br><br>
        
        <!-- Input for 3 items -->
        <p>Gaming Headphones:</p>
        <input type="radio" name="product1" value="excellent"> Excellent
        <input type="radio" name="product1" value="good"> Good
        <input type="radio" name="product1" value="average"> Average
        <input type="radio" name="product1" value="poor"> Poor
        <input type="radio" name="product1" value="very poor"> Very Poor<br><br>

        <p>Gaming Mouse:</p>
        <input type="radio" name="product2" value="excellent"> Excellent
        <input type="radio" name="product2" value="good"> Good
        <input type="radio" name="product2" value="average"> Average
        <input type="radio" name="product2" value="poor"> Poor
        <input type="radio" name="product2" value="very poor"> Very Poor<br><br>

        <p>Gaming Monitors:</p>
        <input type="radio" name="product3" value="excellent"> Excellent
        <input type="radio" name="product3" value="good"> Good
        <input type="radio" name="product3" value="average"> Average
        <input type="radio" name="product3" value="poor"> Poor
        <input type="radio" name="product3" value="very poor"> Very Poor<br><br>
        
        <!-- Comment section -->
        <label for="comments">Comments:</label><br>
        <textarea id="comments" name="comments" rows="4" cols="50"></textarea><br><br>
        
        <input type="submit" value="Submit">
    </form>

    <form action="poll_results.php" method="POST">
        <label for="name">Your Name:</label><br>
        <input type="text" id="name" name="name"><br><br>
        
        <!-- Input for the 3 same items -->
        <p>Gaming Headphones:</p>
        <input type="radio" name="product1" value="excellent"> Excellent
        <input type="radio" name="product1" value="good"> Good
        <input type="radio" name="product1" value="average"> Average
        <input type="radio" name="product1" value="poor"> Poor
        <input type="radio" name="product1" value="very poor"> Very Poor<br><br>

        <p>Gaming Mouse:</p>
        <input type="radio" name="product2" value="excellent"> Excellent
        <input type="radio" name="product2" value="good"> Good
        <input type="radio" name="product2" value="average"> Average
        <input type="radio" name="product2" value="poor"> Poor
        <input type="radio" name="product2" value="very poor"> Very Poor<br><br>

        <p>Gaming Monitors:</p>
        <input type="radio" name="product3" value="excellent"> Excellent
        <input type="radio" name="product3" value="good"> Good
        <input type="radio" name="product3" value="average"> Average
        <input type="radio" name="product3" value="poor"> Poor
        <input type="radio" name="product3" value="very poor"> Very Poor<br><br>
        
        <label for="comments">Comments:</label><br>
        <textarea id="comments" name="comments" rows="4" cols="50"></textarea><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>

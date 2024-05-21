<?php

include ("db/db.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, 3306);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$allcomments = "SELECT * FROM comments";

$results = [];
if ($allcomments == null) {
  $results = [];
} else {
  $results = $conn->query($allcomments);
}

if (
  $_SERVER["REQUEST_METHOD"] == "POST"
  && isset($_POST["remove"])
) {
  $query = "DELETE FROM comments WHERE id = " . $_POST["id"];
  $conn->query($query);
  header('Location: /module6.php');
} else if (
  $_SERVER["REQUEST_METHOD"] == "POST"
  && isset($_POST["update"])
) {
  $query = "UPDATE comments set title = '" . $_POST["title"] . "', comment_text = '" . $_POST["comment"] . "' WHERE id = " . $_POST["id"];
  $conn->query($query);
  header('Location: /module6.php');
} else if (
  $_SERVER["REQUEST_METHOD"] == "POST"
  && isset($_POST["add"])
) {
  $addQuery = "INSERT INTO comments (name, title, comment_text) VALUES ('" . $_POST["name"] . "', '" . $_POST["title"] . "', '" . $_POST["comment"] . "')";
  $conn->query($addQuery);
  header('Location: /module6.php');
}

$conn->close();
?>

<div class="comments">
  <div class="commentsection">
    <h2>Add a comment</h2>
    <div class="addcommentsection">
      <form action="" method="POST" class="addcomment">
        <div>
          <label for="name">Name: </label>
          <input type="text" id="name" name="name" />
          <br />

          <label for="title">Title: </label>
          <input type="text" id="title" name="title" />
          <br />

          <textarea rows="4" cols="50" id="comment" name="comment"></textarea>
          <br />

          <input type="submit" name="add" value="Add" />
        </div>
      </form>
    </div>
    <div class="commentlist">
      <?php foreach ($results as $result) { ?>
        <div class="commentcontainer">
          <form action="" method="POST" class="commentform">
            <div class="comment">
              <input type="hidden" id="id" name="id" value="<?= $result['id'] ?>" />
              <div class="commentheader">
                <span><?= $result['name'] ?></span>
                <div class="commenttopright">
                  <span><?= date("F d, Y H:i:s", strtotime($result['commentdate'])); ?></span>
                  <div class="remove">
                    <input type="submit" name="remove" value="X" />
                  </div>
                </div>
              </div>

              <div class="title">
                <label for="title" class="titlelabel">Title: </label>
                <input type="text" id="title" name="title" value="<?= $result['title'] ?>" />
              </div>
              <br />

              <label for="comment" class="commenttextarea"></label>
              <textarea id="comment" name="comment"><?= $result['comment_text'] ?></textarea>
              <br />
              <br />

              <input type="submit" name="update" value="Update">Update</input>
            </div>
          </form>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
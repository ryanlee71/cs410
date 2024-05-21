<?php
header("Content-Type: application/xhtml+xml; charset=utf-8");
if (!isset($_SESSION)) {
  session_start();
}

include ("db/module8_db.php");
$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);

// Check connection
if (mysqli_connect_errno()) {
  die("Connection failed: " . mysqli_connect_error());
}

$hasDeletePermissions = $hasAddPermissions = $hasEditingPermissions = $currentlyAdding = $currentlyEditing = false;
$currentBlog = null;
if (isset($_SESSION["access_level"])) {
  if ($_SESSION["access_level"] == "admin") {
    $hasDeletePermissions = true;
    $hasEditingPermissions = true;
    $hasAddPermissions = true;
  } else if ($_SESSION["access_level"] == "publisher") {
    $hasDeletePermissions = false;
    $hasEditingPermissions = true;
    $hasAddPermissions = true;
  }
}

if (
  $_SERVER["REQUEST_METHOD"] == "POST"
  && isset($_POST["remove"])
  && $hasDeletePermissions
) {
  $removeBlog = "DELETE FROM blogs WHERE id = " . $_POST["blogId"];
  $conn->query($removeBlog);
} else if (
  $_SERVER["REQUEST_METHOD"] == "POST"
  && isset($_POST["add"])
  && $hasAddPermissions
) {
  $currentlyAdding = true;
}

$blogsQuery = "SELECT t1.id, t1.title, t1.content, t1.created_at, t2.first_name, t2.last_name FROM blogs AS t1 INNER JOIN users as t2 ON t1.user_id = t2.id";
$blogs = $conn->query($blogsQuery);
if ($blogs == null) {
  $blogs = [];
}

if (
  $_SERVER["REQUEST_METHOD"] == "POST"
  && isset($_POST["view"])
  && isset($_POST["blogId"])
) {
  $selectBlog = "SELECT t1.id, t1.title, t1.content, t1.created_at, t2.first_name, t2.last_name FROM blogs AS t1 INNER JOIN users as t2 ON t1.user_id = t2.id WHERE t1.id = " . $_POST["blogId"];
  $currentBlog = $conn->query($selectBlog)->fetch_assoc();
} else if (
  $_SERVER["REQUEST_METHOD"] == "POST"
  && isset($_POST["edit"])
  && isset($_POST["blogId"])
) {
  $currentlyEditing = true;
  $selectBlog = "SELECT t1.id, t1.title, t1.content, t1.created_at, t2.first_name, t2.last_name FROM blogs AS t1 INNER JOIN users as t2 ON t1.user_id = t2.id WHERE t1.id = " . $_POST["blogId"];
  $currentBlog = $conn->query($selectBlog)->fetch_assoc();
} else if (
  $_SERVER["REQUEST_METHOD"] == "POST"
  && isset($_POST["save"])
  && isset($_POST["blogId"])
) {
  $currentlyEditing = false;
  $currentlyAdding = false;
  $updateBlog = "UPDATE blogs set title = '" . htmlspecialchars($_POST["title"]) . "', content = '" . htmlspecialchars($_POST["content"]) . "' WHERE id = " . $_POST["blogId"];
  $conn->query($updateBlog);

  $selectBlog = "SELECT t1.id, t1.title, t1.content, t1.created_at, t2.first_name, t2.last_name FROM blogs AS t1 INNER JOIN users as t2 ON t1.user_id = t2.id WHERE t1.id = " . $_POST["blogId"];
  $currentBlog = $conn->query($selectBlog)->fetch_assoc();

  $blogsQuery = "SELECT t1.id, t1.title, t1.content, t1.created_at, t2.first_name, t2.last_name FROM blogs AS t1 INNER JOIN users as t2 ON t1.user_id = t2.id";
  $blogs = $conn->query($blogsQuery);
  header("Location: /8_blogs.php");
} else if (
  $_SERVER["REQUEST_METHOD"] == "POST"
  && isset($_POST["save"])
  && !isset($_POST["blogId"])
) {
  $currentlyEditing = false;
  $currentlyAdding = false;
  $insertBlog = "INSERT INTO blogs (title, content, user_id) VALUES ('" . htmlspecialchars($_POST["title"]) . "', '" . htmlspecialchars($_POST["content"]) . "', '" . $_SESSION["userId"] . "')";
  if ($conn->query($insertBlog)) {
    $last_id = $conn->insert_id;
    $selectBlog = "SELECT t1.id, t1.title, t1.content, t1.created_at, t2.first_name, t2.last_name FROM blogs AS t1 INNER JOIN users as t2 ON t1.user_id = t2.id WHERE t1.id = " . $last_id;
    $currentBlog = $conn->query($selectBlog)->fetch_assoc();

    $blogsQuery = "SELECT t1.id, t1.title, t1.content, t1.created_at, t2.first_name, t2.last_name FROM blogs AS t1 INNER JOIN users as t2 ON t1.user_id = t2.id";
    $blogs = $conn->query($blogsQuery);
  }
  header("Location: /8_blogs.php");
} else if (
  $_SERVER["REQUEST_METHOD"] == "POST"
  && isset($_POST["cancel"])
) {
  $currentlyEditing = false;
  $currentlyAdding = false;
  $selectBlog = "SELECT t1.id, t1.title, t1.content, t1.created_at, t2.first_name, t2.last_name FROM blogs AS t1 INNER JOIN users as t2 ON t1.user_id = t2.id WHERE t1.id = " . $_POST["blogId"];
  $currentBlog = $conn->query($selectBlog)->fetch_assoc();
}

if ($currentBlog == null && $blogs->num_rows > 0) {
  $currentBlog = $blogs->fetch_assoc();
}
$conn->close();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php include_once ('8_header.php') ?>

<body>
  <?php include_once ('8_menu.php') ?>
  <div id="content">
    <div class="blogs">
      <h1>Blogs</h1>
      <div class="blogscontainer">
        <div class="blogslist">
          <form action="" method="POST" class="addblog">
            <?php if ($hasAddPermissions) { ?>
              <input class="add" type="submit" name="add" value="+ Add New Blog" />
            <?php } ?>
          </form>
          <?php foreach ($blogs as $blog) { ?>
            <div class="blogpreview">
              <form action="" method="POST" class="blogs">
                <input type="hidden" name="blogId" value="<?= $blog['id'] ?>" />

                <div class="blogpreviewcontainer">
                  <div class="blogpreviewheader">
                    <h3><?= $blog['title'] ?></h3>
                    <?php if ($hasDeletePermissions) { ?>
                      <input class="remove" type="submit" name="remove" value="X Remove" />
                    <?php } ?>
                  </div>
                  <div class="blobpreviewsubtitle">
                    <span><?= date("F d, Y", strtotime($blog['created_at'])) ?></span>
                    <input class="viewbutton" type="submit" name="view" value="View" />
                  </div>
                </div>
              </form>
            </div>
            <hr />
          <?php } ?>
        </div>
        <div class="blogviewcontainer">
          <?php if ($currentBlog != null) { ?>
            <?php if ($hasEditingPermissions && ($currentlyEditing || $currentlyAdding)): ?>
              <form action="" method="POST">
                <?php if ($currentlyEditing) { ?>
                  <input type="hidden" name="blogId" value="<?= $blog['id'] ?>" />
                <?php } ?>
                <div class="blogview">
                  <div class="editblogtitle">
                    <h2><label for="title">Title: </label></h2>
                    <input class="edittitleinput" type="text" id="title" name="title"
                      value="<?= $currentlyAdding ? '' : $currentBlog['title'] ?>"></input>
                  </div>
                  <div class="blogsubtitle">
                    <?php if ($currentlyEditing): ?>
                      <span><?= $currentBlog['first_name'] ?>       <?= $currentBlog['last_name'] ?></span>
                      <span><?= date("F d, Y", strtotime($blog['created_at'])) ?></span>
                    <?php endif ?>
                  </div>
                  <div class="blogcontent">
                    <textarea id="content" name="content"><?= $currentlyAdding ? '' : $currentBlog['content'] ?></textarea>
                  </div>
                  <div class="editbuttongroup">
                    <input class="savebutton" type="submit" name="save" value="Save" />
                    <input class="remove" type="submit" name="save" value="Cancel" />
                  </div>
                </div>
              </form>
            <?php else: ?>
              <div class="blogview">
                <div class="blogtitle">
                  <h2><?= $currentBlog['title'] ?></h2>
                  <?php if ($hasEditingPermissions) { ?>
                    <form action="" method="POST">
                      <input type="hidden" name="blogId" value="<?= $blog['id'] ?>" />
                      <input class="editbutton" type="submit" name="edit" value="Edit" />
                    </form>
                  <?php } ?>
                </div>
                <div class="blogsubtitle">
                  <span><?= $currentBlog['first_name'] ?>     <?= $currentBlog['last_name'] ?></span>
                  <span><?= date("F d, Y", strtotime($blog['created_at'])) ?></span>
                </div>
                <div class="blogcontent">
                  <?= $currentBlog['content'] ?>
                </div>
              </div>
            <?php endif ?>
          <?php } ?>
        </div>
      </div>

    </div>
  </div>

  <?php include_once ('8_footer.php') ?>
</body>

</html>
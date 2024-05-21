<?php
header("Content-Type: application/xhtml+xml; charset=utf-8");
if (!isset($_SESSION)) {
  session_start();
}

if (isset($_SESSION["access_level"]) && $_SESSION["access_level"] != "admin") {
  header("Location: 8_unauthorized.php");
  exit();
}

include ("db/module8_db.php");
$conn = mysqli_connect($servername, $username, $password, $dbname, 3306);

// Check connection
if (mysqli_connect_errno()) {
  die("Connection failed: " . mysqli_connect_error());
}

$selectedUser = null;

if (
  $_SERVER["REQUEST_METHOD"] == "POST"
  && isset($_POST["update"])
  && isset($_POST["userId"])
) {
  $userId = $_POST['userId'];
  $firstName = htmlspecialchars($_POST['first_name']);
  $lastName = htmlspecialchars($_POST['last_name']);
  $email = htmlspecialchars($_POST['email']);
  $access_level = htmlspecialchars($_POST['access_level']);
  $updateQuery = "UPDATE users set first_name = '" . $firstName . "', last_name = '" . $lastName . "', email = '" . $email . "', access_level = '" . $access_level . "' WHERE id = '" . $userId . "'";
  $conn->query($updateQuery);
  header('Location: /8_accounts.php');
} else if (
  $_SERVER["REQUEST_METHOD"] == "GET"
  && isset($_GET["userId"])
) {
  $getUser = "SELECT * FROM users where id = '" . $_GET["userId"] . "'";
  $selectedUser = $conn->query($getUser)->fetch_assoc();
} else if (
  $_SERVER["REQUEST_METHOD"] == "POST"
  && isset($_POST["remove"])
) {
  $userId = $_POST["userId"];
  $removeQuery = "DELETE FROM users WHERE id = '" . $userId . "'";
  $conn->query($removeQuery);
  header('Location: /8_accounts.php');
}

$users = array();
$usersQuery = "SELECT * FROM users";
$result = $conn->query($usersQuery);
if ($result != null) {
  $users = $result;
}

$conn->close();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php include_once ('8_header.php') ?>

<body>
  <?php include_once ('8_menu.php') ?>
  <div id="content">
    <div class="users">
      <div class="usersheader">
        <h2>
          Users
        </h2>
        <form action="" method="GET" class="selectuser">
          <label for="user">Choose a user:</label>
          <select class="userdropdown" name="userId" id="user">
            <?php foreach ($users as $user) { ?>
              <option <?= ($selectedUser != null && $selectedUser['id'] == $user['id']) ? 'selected="selected"' : '' ?> value="<?= $user['id'] ?>">
                <?= htmlspecialchars($user['first_name']) ?>  <?= htmlspecialchars($user['last_name']) ?>
              </option>
              <?php
            } ?>
          </select>
          <input type="submit" value="Submit" />
        </form>
        <button>
          <a href="/Module8/addUser.php">Add User</a>
        </button>
      </div>

      <?php if ($selectedUser != null) { ?>
        <div class="selecteduser">
          <form action="" method="POST">
            <div class="selecteduserheader">
              <h3><?= $selectedUser['first_name'] ?>   <?= $selectedUser['last_name'] ?></h3>
              <p class="last_logged_in"><b>Last Logged In:</b>
                <?= date("F d, Y H:i:s", strtotime($selectedUser['last_logged_in'])) ?></p>
              <p><b>Access Level:</b> <?= $selectedUser['access_level'] ?></p>
              <input class="remove" type="submit" name="remove" value="X Delete" />
            </div>

            <div class="userformvalues">
              <input type="hidden" id="userId" name="userId" value="<?= $selectedUser['id'] ?>"></input>

              <label for="first_name">First Name: </label>
              <input type="text" id="first_name" name="first_name" value="<?= $selectedUser['first_name'] ?>"></input>

              <label for="last_name">Last Name: </label>
              <input type="text" id="last_name" name="last_name" value="<?= $selectedUser['last_name'] ?>"></input>

              <label for="email">Email: </label>
              <input type="text" id="email" name="email" value="<?= $selectedUser['email'] ?>"></input>

              <label for="access_level">Access Level: </label>
              <input type="text" id="access_level" name="access_level"
                value="<?= $selectedUser['access_level'] ?>"></input>
            </div>

            <div class="submit">
              <input type="submit" name="update" value="Update">Update</input>
            </div>
          </form>
        </div>
      <?php } ?>
    </div>
  </div>

  <?php include_once ('8_footer.php') ?>
</body>

</html>
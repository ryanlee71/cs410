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
        <?php include '../variables.php'; ?>
        <h2>Ryan Lee</h2>
        <p><strong>Job Title:</strong> <?php echo $gamer1title; ?></p>
        <p><strong>Favorite Food:</strong> <?php echo $gamer1favoritefood; ?></p>
        <p><strong>Hobby:</strong> <?php echo $gamer1hobby; ?></p>
        <p><strong>Goals:</strong> <?php echo $gamer1goals; ?></p>
        <img src="/images/tenz.jpg"/>
    </div>

  <?php include_once('footer.php') ?>
</body>
</html>

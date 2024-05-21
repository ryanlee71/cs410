<?php
header("Content-Type: application/xhtml+xml; charset=utf-8");
$gamers = [
  [
    // Gamer 1
    "name" => "Ryan Lee",
    "title" => "Professional Gamer",
    "food" => "Chicken Adobo",
    "hobby" => "Playing Apex Legends",
    "goals" => "To try and win a world championship",
  ],
  [
    // Gamer 2
    "name" => "Kc Lee",
    "title" => "Professional Gamer",
    "food" => "Fried Chicken",
    "hobby" => "Playing League of Legends",
    "goals" => "To be part of a well organized team that makes it to the finals",
  ],
  [
    // Gamer 3
    "name" => "Ryan Kc Lee",
    "title" => "Professional Gamer",
    "food" => "Mexican food",
    "hobby" => "Playing Valorant",
    "goals" => "To play for a team that can contend for finals",
  ],
]
  ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
  <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=utf-8" />
  <meta name="description" content="Module 1 Variables Assignment" />
  <meta name="keywords" content="esports, professional, competitive" />
  <meta name="author" content="Ryan Lee" />
  <title>Module 1 Variables Assignment</title>
  <link rel="stylesheet" type="text/css" href="styles2.css" />
</head>

<body>
  <div id="header">
    <h1>Kc's Gaming Team</h1>
    <ul id="menu">
      <li><a href="module3.php">Module 3: Week 3 Arrays</a></li>
    </ul>
  </div>

  <div id="content">
    <?php include 'variables.php'; ?>
    <h2 style="text-align: center;">Organizational Chart</h2>
    <div>
      <form action="Module3/userupdateresult.php" method="POST" class="module3form">
        <label for="gamer">Choose a gamer:</label>

        <select name="gamer" id="gamer">
          <?php
          foreach ($gamers as $id => $gamer) { ?>
            <option value="<?= $gamer['name'] ?>">
              <?= htmlspecialchars($gamer['name']) ?>
            </option>
            <?php
          } ?>
        </select>
        <br />

        <label for="title">Job Title: </label>
        <input type="text" id="title" name="title"></input>
        <br />

        <label for="food">Food: </label>
        <input type="text" id="food" name="food"></input>
        <br />

        <label for="hobby">Hobby: </label>
        <input type="text" id="hobby" name="hobby"></input>
        <br />

        <label for="goals">Goals: </label>
        <input type="text" id="goals" name="goals"></input>
        <br />
        <input type="submit" value="Submit" />
      </form>
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
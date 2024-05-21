
<div id="footer">
  <?php if (isset($_SESSION["loggedIn"])) { ?>
    <button>
      <a href="Module5/logout.php">Logout</a>
    </button>
  <?php } ?>
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
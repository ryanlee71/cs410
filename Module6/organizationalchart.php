<div id="content">
  <?php include 'variables.php'; ?>
  <h2 style="text-align: center;">Organizational Chart</h2>
  <div class="org-chart">
    <div class="org-item">
      <div class="org-content">
        <a href="/Module6/ryanlee.php"><?php echo $gamer1name; ?></a>
      </div>
      <div class="org-children">
        <div class="org-item">
          <div class="org-line"></div>
          <div class="org-content">
            <a href="/Module6/kclee.php"><?php echo $gamer2name; ?></a>
          </div>
        </div>
        <div class="org-item">
          <div class="org-line"></div>
          <div class="org-content">
            <a href="/Module6/ryankclee.php"><?php echo $gamer3name; ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
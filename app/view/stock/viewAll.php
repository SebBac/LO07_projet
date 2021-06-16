
<!-- ----- début viewAll -->
<?php

require ($root . '/app/view/fragment/fragmentCovidHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCovidMenu.html';
      include $root . '/app/view/fragment/fragmentCovidJumbotron.html';
      echo "<pre>";
      print_r($results);
      echo "</pre>";
      ?>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">centre</th>
          <th scope = "col">vaccin</th>
          <th scope = "col">doses</th>
        </tr>
      </thead>
      <tbody>
          <?php
          foreach ($results[0] as $element) {
           printf("<tr><td>%s</td><td>%s</td><td>%d</td></tr>", $results[1][$element[0]-1][0], $results[2][$element[0]-1][0], $element[2]);
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  
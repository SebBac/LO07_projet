
<!-- ----- début viewGlobal -->
<?php

require ($root . '/app/view/fragment/fragmentCovidHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCovidMenu.html';
      include $root . '/app/view/fragment/fragmentCovidJumbotron.html';
      ?>

      
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">centre</th>
          <th scope = "col">doses</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des vins est dans une variable $results             
          foreach ($results[0] as $element) {
           printf("<tr><td>%s</td><td>%d</td></tr>", $results[1][$element[0]-1][0], $element[1]);
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewGlobal -->
  
  
  
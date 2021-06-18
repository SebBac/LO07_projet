
<!-- ----- début viewRDVpatient -->
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
          <th scope = "col">Vaccin</th>
          <th scope = "col">Nombre de patients ayant reçu au moins une dose du vaccin</th>
        </tr>
      </thead>
      <tbody>
          <?php
               $i = 0;
               foreach ($vaccin as $element){
                    printf("<tr><td>%s</td><td>%d</td></tr>", $element->getLabel(), $numVaccine[$i]);
                    $i++;
               }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewRDVpatient -->
  
  
  

<!-- ----- début viewRDVpatient -->
<?php

require ($root . '/app/view/fragment/fragmentCovidHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCovidMenu.html';
      include $root . '/app/view/fragment/fragmentCovidJumbotron.html';
      printf("<h2>Dossier de vaccination de %s</h2>", $patient[1]);
      ?>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">centre</th>
          <th scope = "col">patient</th>
          <th scope = "col">injection</th>
          <th scope = "col">vaccin</th>
        </tr>
      </thead>
      <tbody>
          <?php
          if(isset($results[0])){
            foreach ($results as $element) {
              printf("<tr><td>%s</td><td>%s</td><td>%d</td><td>%s</td></tr>", $centre[$element->getCentre_id()-1]->getLabel(), 
                 $patient[1], $element->getInjection(), $vaccin[$element->getVaccin_id()-1]->getLabel());
            }
          }
          else{printf("<tr><td>-</td><td>%s</td><td>0</td><td>-</td></tr>", $patient[1]);}
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewRDVpatient -->
  
  
  
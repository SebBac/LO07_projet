
<!-- ----- début viewRDVpatient -->
<?php

require ($root . '/app/view/fragment/fragmentCovidHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCovidMenu.html';
      include $root . '/app/view/fragment/fragmentCovidJumbotron.html';
      printf("<h2>Dossier </h2>");
      ?>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">Nombre de personne totalement vacciné</th>
          <th scope = "col">Nombre de personne ayant reçu une dose</th>
          <th scope = "col">Nombre de personne en attente d'une 1ere injection</th>
        </tr>
      </thead>
      <tbody>
          <?php
                echo '<pre>';
                print_r($nbvaccinee);
                echo '</pre>';
          $totalement=0;
          $en_cours=0;
          $attente=0;
          
          foreach($nbvaccinee as $value){
              if($value===2){
                  $totalement=$totalement+1;
              }
              elseif($value===1){
                  $en_cours=$en_cours+1;
              }
              elseif($value===0){
                  $attente=$attente+1;
              }
          }
          
              printf("<tr><td>%d</td><td>%d</td><td>%d</td></tr>", $totalement, $en_cours, $attente);

          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewRDVpatient -->
  
  
  
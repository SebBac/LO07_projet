
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
          <th scope = "col">Nombre de personnes totalement vaccinées</th>
          <th scope = "col">Nombre de personne ayant reçu au moins une dose</th>
          <th scope = "col">Nombre de personne en attente d'une 1ère injection</th>
        </tr>
      </thead>
      <tbody>
          <?php
              printf("<tr><td>%d</td><td>%d</td><td>%d</td></tr>", $numVaccine, $numEnCours, $numNonVaccine);
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewRDVpatient -->
  
  
  
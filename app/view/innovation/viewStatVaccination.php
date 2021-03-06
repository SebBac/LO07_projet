
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
          <th scope = "col">Total de patients</th>
          <th scope = "col">Patients complétements vaccinées</th>
          <th scope = "col">Patients ayant commencé leur vaccination</th>
          <th scope = "col">Patients en attente d'une 1ère injection</th>
        </tr>
      </thead>
      <tbody>
          <?php
              printf("<tr><td>%d</td><td>%d</td><td>%d</td><td>%d</td></tr>",
               $numVaccine + $numEnCours + $numNonVaccine, $numVaccine, $numEnCours, $numNonVaccine);
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewRDVpatient -->
  
  
  
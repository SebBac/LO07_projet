
<!-- ----- début viewDocuInnov1 -->
<?php

require ($root . '/app/view/fragment/fragmentCovidHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCovidMenu.html';
      include $root . '/app/view/fragment/fragmentCovidJumbotron.html';
      ?>
      
      <div class="panel panel-primary">
          <div class="panel-heading">
              <h2 class="panel-title">Documentation innovation 1</h2>
          </div>
          <div class="panel-body">
                <h4>L'innovation 1 nous donne des statistiques sur l'état de vaccination des patients :</h4>
                On obtient un tableau avec :
                <ul>
                    <li>Le nombre total de patients</li>
                    <li>Le nombre de patients complétements vaccinés</li>
                    <li>Le nombre de patients ayant commencé leur vaccination,
                     <em>c'est-à-dire le nombre de patients ayant eu au moins une injection
                     mais n'ayant pas de reçu toutes les doses de leur vaccin</em></li>
                    <li>Le nombre de patients en attente de leur 1ère injection</li>
                </ul>
          </div>
      </div>
      
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewDocuInnov1 -->
  
  
  
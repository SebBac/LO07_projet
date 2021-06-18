
<!-- ----- début viewDocuInnov3 -->
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
              <h2 class="panel-title">Documentation innovation 3</h2>
          </div>
          <div class="panel-body">
                <h4>L'innovation 3 nous donne des statistiques sur le nombre de patients différents ayant utilisé chaque vaccin :</h4>
                On obtient un tableau avec :
                <ul>
                    <li>Le nom de chaque vaccin</li>
                    <li>Le nombre de patients différents ayant reçu au moins 1 dose pour chaque vaccin</li>
                </ul>
          </div>
      </div>
      
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewDocuInnov3 -->
  
  
  
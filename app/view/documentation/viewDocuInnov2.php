
<!-- ----- début viewDocuInnov2 -->
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
              <h2 class="panel-title">Documentation innovation 2</h2>
          </div>
          <div class="panel-body">
              <h4>L'innovation 2 est l'envoie de vaccins d'un centre vers un autre centre :</h4>
                On choisit d'abord le centre dont on veut redistribuer des vaccins
                 puis on choisit le centre receveur (évidemment, le centre donneur
                 n'apparait pas dans la liste des possibles receveurs) et
                 la quantité de chaque vaccin à donner en tenant compte de la
                 quantité de vaccins disponibles dans le centre donneur.<br>
                Si le centre donneur sélectionné n'a aucun vaction en stock alors
                 l'utilisateur en est informé et ne peut donc choisir aucun vaccin
                 à envoyer au centre receveur.<br><br>
                 <strong>Note :</strong> c'est donc sensiblement la même chose
                 que pour l'attribution de vaccins mais à partir du stock d'un centre.
          </div>
      </div>
      
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewDocuInnov2 -->
  
  
  
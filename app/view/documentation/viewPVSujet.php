
<!-- ----- début viewPVSujet -->
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
              <h2 class="panel-title">Notre point de vue global sur ce projet</h2>
          </div>
          <div class="panel-body">
                Ce projet a été intéressant à réaliser en binôme, notamment sur
                 l'utilisation de git pour la collaboration, ce qui nous sera
                 très utile pour de futurs projets. De plus, nous avons pu mobiliser
                 nos compétences webs acquises lors du semestre. <br>
                 C'est intéressant d'avoir des questions libres sur des innovations
                 mais c'est parfois un peu compliqué de trouver une idée, peut-être
                 proposer une liste d'innovation faisables sur le projet en précisant
                 que l'on peut nous-même en imaginer d'autres pourrait être intéressant ?
                 <br>Pour améliorer le site, on pourrait rajouter une nouvelle table
                 pour les stocks de vaccins possédés par l'état et pas encore
                 distribués aux centres hospitaliers. Ainsi, il faudrait
                 d'abord que l'état se fournisse en vaccins avant de pouvoir les
                 redistribuer aux différents centres.
          </div>
      </div>
      
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewPVSujet -->
  
  
  
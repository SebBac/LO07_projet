
<!-- ----- début viewUpdatedVaccinFromCenter -->
<?php

require ($root . '/app/view/fragment/fragmentCovidHeader.html');
?>

<body>
    <div class="container">
        <?php
        include $root . '/app/view/fragment/fragmentCovidMenu.html';
        include $root . '/app/view/fragment/fragmentCovidJumbotron.html';
        printf("<h2>Récapitulatif des doses attribuées au centre %s depuis le centre %s :</h2>", $centre2, $centre1);
        $attribution = false;
        for ($i=0 ; $i< sizeof($list_quantite) ; $i++){
            if ($list_quantite[$i] > 0){
                printf("<h3>%d doses de %s</h3>", $list_quantite[$i], $vaccin[$i]->getLabel());
                $attribution = true;
            }
        }
        if($attribution == false){printf("<h3>Aucune dose n'a été attribuée à ce centre</h3>");}
        ?>

    
    </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewUpdatedVaccinFromCenter -->
  
  
  

<!-- ----- début viewInserted -->
<?php
require ($root . '/app/view/fragment/fragmentCovidHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCovidMenu.html';
    include $root . '/app/view/fragment/fragmentCovidJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php
    if ($etat_stock) {
     echo ("<h3>Preparation à injection </h3>");
     echo("<ul>");
     echo ("<li>Centre = " . $centre_nom . "</li>");
     echo ("<li>ID lié = " . $centre_id . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème d'insertion du Vaccin</h3>");
     echo ("id = " . $_GET['label']);
    }
    
    echo '<pre>';
    print_r($etat_stock);
    echo '</pre>';
    
    echo 'quantité max est : '. $max;

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCovidFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    
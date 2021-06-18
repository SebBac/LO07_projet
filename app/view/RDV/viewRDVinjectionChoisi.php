
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
    
    foreach ($etat_stock as $value) {
        echo $value . '<br>';
    
}

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCovidFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    
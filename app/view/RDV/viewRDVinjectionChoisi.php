
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
    if ($patate) {
     echo ("<h3>Insertion réussi </h3>");
     echo("<ul>");
     echo ("<li>Vaccin = " . $vaccin_id . "</li>");
     echo ("<li>ID lié = " . $centre_id . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème d'insertion du Vaccination</h3>");
    }
    
    if($patate2){
        echo ("<h3>Update stock réussi </h3>");
    }
    

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCovidFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    
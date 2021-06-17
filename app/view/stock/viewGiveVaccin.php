
<!-- ----- début viewGiveVaccin -->
<?php 
require ($root . '/app/view/fragment/fragmentCovidHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCovidMenu.html';
      include $root . '/app/view/fragment/fragmentCovidJumbotron.html';
      ?>

    <form role="form" method='get' action='router.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='stockUpdateVaccin'>
            <?php
            printf("Centre choisi = %s", $_GET["centre"]);
            $i = 0;
            foreach ($results as $element) {
                echo "<div class=\"form-group\">\n" ;
                printf ("   <label for=\"doses%d\">Dose de %s à attribuer /%d doses : </label><input type=\"number\" 
                 step='any' id=\"doses%d\" name='doses%d' value='0' min='0' max='%d' class=\"form-control\">\n"
                , $i, $element->getLabel(), $element->getDose(), $i, $i, $element->getDose());               
                echo "</div>\n" ;
                $i++;
            }
            ?>
        </select>
      </div>
      
      <p/>
      <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewGiveVaccin -->

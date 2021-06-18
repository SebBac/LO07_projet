
<!-- ----- début viewGiveVaccinFromCenter -->
<?php 
require ($root . '/app/view/fragment/fragmentCovidHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCovidMenu.html';
      include $root . '/app/view/fragment/fragmentCovidJumbotron.html';
      $info_centre = explode(" | ", $_GET["centre"]);
      ?>

    <form role="form" method='get' action='router.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='stockUpdateVaccinFromCenter'>
       <?php 
            printf("<input type=\"hidden\" name='centre1_id' value='%d'>\n", $info_centre[0]);
            printf("<input type=\"hidden\" name='centre1' value='%s'>\n", $info_centre[1]);
            printf("Centre envoyant les vaccins : %s<br><br>\n", $info_centre[1]);
            ?>
            <label for="centre2">Centre où envoyer les vaccins : </label> <select class="form-control" id='centre2' name='centre2' style="width: 500px">
            <?php
            foreach ($autres_centres as $element) {
             printf("<option>%d | %s</option>", $element->getId(), $element->getLabel());
            }
            ?>
            </select>
            <?php
            $i = 0;
            foreach ($stock_centre1[0] as $element) {
                echo "<div class=\"form-group\">\n" ;
                printf ("   <label for=\"doses%d\">Doses de %s à attribuer /%d doses : </label><input type=\"number\" 
                 step='any' id=\"doses%d\" name='doses%d' value='0' min='0' max='%d' class=\"form-control\">\n"
                , $i, $vaccin[$element->getVaccin_id()-1]->getLabel(), $element->getQuantite(), $i, $i, $element->getQuantite());               
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

  <!-- ----- fin viewGiveVaccinFromCenter -->

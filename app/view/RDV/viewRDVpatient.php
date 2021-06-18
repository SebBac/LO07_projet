
<!-- ----- début viewRDVpatient -->
<?php

require ($root . '/app/view/fragment/fragmentCovidHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCovidMenu.html';
      include $root . '/app/view/fragment/fragmentCovidJumbotron.html';
      printf("<h2>Dossier de vaccination de %s</h2>", $patient[1]);
      ?>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">centre</th>
          <th scope = "col">patient</th>
          <th scope = "col">injection</th>
          <th scope = "col">vaccin</th>
        </tr>
      </thead>
      <tbody>
          <?php
          if(isset($results[0])){
            foreach ($results as $element) {
              printf("<tr><td>%s</td><td>%s</td><td>%d</td><td>%s</td></tr>", $centre[$element->getCentre_id()-1]->getLabel(), 
                 $patient[1], $element->getInjection(), $vaccin[$element->getVaccin_id()-1]->getLabel());
            }
          }
          else{printf("<tr><td>-</td><td>%s</td><td>0</td><td>-</td></tr>", $patient[1]);}
          
          if($vaccination===1){
              echo'<h3>Selectionner un centre de vaccination</h3>
                  <form role="form" method="get" action="router.php">
                    <div class="form-group">
                      <input type="hidden" name="action" value="defVaccinationpatient">
                      <label for="centre">Centre : </label> <select class="form-control" id="centre" name="centre_choix" style="width: 500px">';
                          
                          foreach ($centre_choix[0] as $element) {
                           printf("<option>%s</option>", $centre_choix[1][$element[0]-1][0]);
                          }
                          
                      echo'</select>
                    
                      <label for="patient">Pour Patient : </label> <input type="text" class="form-control" id="patient" placeholder="'.$_GET["patient"].'" name="patient" value="'.$_GET["patient"].'">
                          
                      </select>
                    </div>

                    <p/>
                    <button class="btn btn-primary" type="submit">Submit form</button>
                  </form>
                  <p/>';
          }
          elseif($vaccination===3){
              echo'<h3>Selectionner un centre de vaccination</h3>
                  <form role="form" method="get" action="router.php">
                    <div class="form-group">
                      <input type="hidden" name="action" value="defVaccinationpatient">
                      <label for="centre">Centre : </label> <select class="form-control" id="centre" name="centre_choix" style="width: 500px">';
                          
                          foreach ($centre_choix[0] as $element) {
                           printf("<option>%s</option>", $centre_choix[1][$element[0]-1][0]);
                          }
                          
                      echo'</select>
                    
                      <label for="patient">Pour Patient : </label> <input type="text" class="form-control" id="patient" placeholder="'.$_GET["patient"].'" name="patient" value="'.$_GET["patient"].'">
                          
                      </select>
                    </div>

                    <p/>
                    <button class="btn btn-primary" type="submit">Submit form</button>
                  </form>
                  <p/>';
          }
          
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewRDVpatient -->
  
  
  
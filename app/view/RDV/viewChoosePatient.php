
<!-- ----- début viewChoosePatient -->
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
        <input type="hidden" name='action' value='getRDVpatient'>
        <label for="patient">Patient : </label> <select class="form-control" id='patient' name='patient' style="width: 500px">
            <?php
            foreach ($results as $element) {
             printf("<option>%d | %s %s</option>", $element->getId(), $element->getNom(), $element->getPrenom());
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

  <!-- ----- fin viewChoosePatient -->
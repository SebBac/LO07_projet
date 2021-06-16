
<!-- ----- début viewLabel -->
<?php 
require ($root . '/app/view/fragment/fragmentCovidHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCovidMenu.html';
      include $root . '/app/view/fragment/fragmentCovidJumbotron.html';

      // $results contient un tableau avec la liste des clés.
      ?>

    <form role="form" method='get' action='router.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='vaccinUpdated'>
        <label for="id">label : </label> <select class="form-control" id='id' name='label' style="width: 100px">
            <?php
            foreach ($results as $label) {
             echo ("<option>$label</option>");
            }
            ?>
        </select>
      </div>
        <div class="form-group">
        <label for="id">Dose : </label><input type="number" step='any' name='doses' value='11' class="form-control">                
      </div>
      

      <p/>
      <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
    <p/>
  </div>

  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

  <!-- ----- fin viewLabel -->

<!-- ----- début viewInsert -->
 
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
        <input type="hidden" name='action' value='patientAdded'>        
        <label for="nom">Nom : </label><input id="nom" type="text" name='nom' size='20' value='Provencale'>
        <label for="prenom">Prénom : </label><input id="prenom" type="text" name='prenom' size='20' value='LeGaulois'>
        <label for="adresse">adresse : </label><input id="adresse" type="text" name='adresse' value='Troyes, 12 rue de LO07'>              
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCovidFooter.html'; ?>

<!-- ----- fin viewInsert -->




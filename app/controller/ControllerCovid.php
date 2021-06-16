
<!-- ----- debut ControllerCovid -->
<?php

class ControllerCovid {
 // --- page d'acceuil
 public static function covidAccueil() {
  include 'config.php';
  $vue = $root . '/app/view/viewCovidAccueil.php';
  if (DEBUG)
   echo ("ControllerPatient : covidAccueil : vue = $vue");
  require ($vue);
 }
}
 
?>
<!-- ----- fin ControllerCovid -->

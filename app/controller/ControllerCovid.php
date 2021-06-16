
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
 
 // --- page Documentation Innovation 1
 public static function docuInnov1() {
  include 'config.php';
  $vue = $root . '/app/view/documentation/viewDocuInnov1.php';
  if (DEBUG)
   echo ("ControllerDocumentation : DocuInnov1 : vue = $vue");
  require ($vue);
 }
 
 // --- page Documentation Innovation 2
 public static function docuInnov2() {
  include 'config.php';
  $vue = $root . '/app/view/documentation/viewDocuInnov2.php';
  if (DEBUG)
   echo ("ControllerDocumentation : DocuInnov2 : vue = $vue");
  require ($vue);
 }
 
 // --- page Documentation Innovation 3
 public static function docuInnov3() {
  include 'config.php';
  $vue = $root . '/app/view/documentation/viewDocuInnov3.php';
  if (DEBUG)
   echo ("ControllerDocumentation : DocuInnov3 : vue = $vue");
  require ($vue);
 }
 
 // --- page Point de vue global sur le projet
 public static function PVSujet() {
  include 'config.php';
  $vue = $root . '/app/view/documentation/viewPVSujet.php';
  if (DEBUG)
   echo ("ControllerDocumentation : PVSujet : vue = $vue");
  require ($vue);
 }
}
 
?>
<!-- ----- fin ControllerCovid -->


<!-- ----- debut ControllerStock -->
<?php
require_once '../model/ModelStock.php';

class ControllerStock {
 // --- page d'acceuil
 public static function caveAccueil() {
  include 'config.php';
  $vue = $root . '/app/view/viewCovidAccueil.php';
  if (DEBUG)
   echo ("ControllerStock : covidAccueil : vue = $vue");
  require ($vue);
 }

 // --- Liste des stocks de chaque vaccin dans chaque centre
 public static function stockReadAll() {
  $results = ModelStock::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/stock/viewAll.php';
  if (DEBUG)
   echo ("ControllerStock : stockReadAll : vue = $vue");
  require ($vue);
 }
 
 // --- Liste des stocks globaux dans chaque centre
 public static function stockReadGlobal() {
  $results = ModelStock::getGlobal();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/stock/viewGlobal.php';
  if (DEBUG)
   echo ("ControllerStock : stockReadAll : vue = $vue");
  require ($vue);
 }
 
 // --- Liste des centres (pour l'attribution de vaccin)
 public static function stockChooseCenter(){
    $results = ModelCentre::getAll();
    // ----- Construction chemin de la vue
    include 'config.php';
    $vue = $root . '/app/view/stock/viewChooseCenter.php';
    if (DEBUG)
        echo ("ControllerStock : stockChooseCenter : vue = $vue");
    require ($vue);
 }
 
 // --- Liste vaccins disponibles
 public static function stockGiveVaccin(){
    $results = modelVaccin::getAll();
    // ----- Construction chemin de la vue
    include 'config.php';
    $vue = $root . '/app/view/stock/viewGiveVaccin.php';
    if (DEBUG)
        echo ("ControllerStock : stockGiveVaccin : vue = $vue");
    require ($vue);
 }
 
 public static function stockUpdateVaccin(){
    $centre_id = 0;
    $list_vaccin_id = 0;
    $list_quantite = 0;
    $results = modelVaccin::update($centre_id, $list_vaccin_id, $list_quantite);
    include 'config.php';
    $vue = $root . '/app/view/stock/viewUpdatedVaccin.php';
    if (DEBUG)
        echo ("ControllerStock : stockUpdateVaccin : vue = $vue");
    require ($vue);
 }
}
?>
<!-- ----- fin ControllerStock -->



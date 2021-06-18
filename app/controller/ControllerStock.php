
<!-- ----- debut ControllerStock -->
<?php
require_once '../model/ModelStock.php';

class ControllerStock {
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
 
 // --- attribue les vaccins au centre choisi
 public static function stockUpdateVaccin(){
    $centre_id = $_GET["centre_id"];
    $vaccin = modelVaccin::getAll();
    $list_quantite = array();
    $i=0;
    foreach ($_GET as $element){
        if($i>2){$list_quantite[] .= $element;}
        $i++;
    }
    for ($i=0 ; $i< sizeof($list_quantite) ; $i++){
        if ($list_quantite[$i] > 0){
            $result = modelStock::updateStock($centre_id, $vaccin[$i]->getId(), $list_quantite[$i]);
            if($result == null){echo "ERREUR $i";}
        }
    }
    //$results = modelVaccin::update($centre_id, $list_quantite);
    include 'config.php';
    $vue = $root . '/app/view/stock/viewUpdatedVaccin.php';
    if (DEBUG)
        echo ("ControllerStock : stockUpdateVaccin : vue = $vue");
    require ($vue);
 }
}
?>
<!-- ----- fin ControllerStock -->



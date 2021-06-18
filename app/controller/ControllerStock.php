
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
 public static function stockChooseCenter($args){
    $results = ModelCentre::getAll();
    
    //passage du nom de la méthode cible pour le champ action du formulaire
        //Solution 1 : stockGiveVaccin
        //Solution 2 : stockGiveVaccinFromCenter

        $target = $args['target'];
   
    // ----- Construction chemin de la vue
    include 'config.php';
    $vue = $root . '/app/view/stock/viewChooseCenter.php';
    if (DEBUG)
        echo ("ControllerStock : stockChooseCenter : vue = $vue");
    require ($vue);
 }
 
 // --- Liste vaccins disponibles
 public static function stockGiveVaccin(){
    $results = modelVaccin::getAllLabel();
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
    $centre = $_GET["centre"];
    $vaccin = modelVaccin::getAll();
    $list_quantite = array();
    $i=0;
    foreach ($_GET as $element){
        if($i>2){$list_quantite[] .= $element;}
        $i++;
    }
    for ($i=0 ; $i< sizeof($list_quantite) ; $i++){
        if ($list_quantite[$i] > 0){
            if (modelStock::isStockDefined($centre_id, $vaccin[$i]->getId())){
                modelStock::updateStock($centre_id, $vaccin[$i]->getId(), $list_quantite[$i]);
            }
            else{
                modelStock::insertStock($centre_id, $vaccin[$i]->getId(), $list_quantite[$i]);
            }
        }
    }
    include 'config.php';
    $vue = $root . '/app/view/stock/viewUpdatedVaccin.php';
    if (DEBUG)
        echo ("ControllerStock : stockUpdateVaccin : vue = $vue");
    require ($vue);
 }
 
 // --- Liste vaccins disponibles
 public static function stockGiveVaccinFromCenter(){
    $stock_centre1= modelStock::getOneId($_GET["centre"]);
    $autres_centres = modelCentre::getAllExceptOne($_GET["centre"]);
    $vaccin = modelVaccin::getAll();
    // ----- Construction chemin de la vue
    include 'config.php';
    $vue = $root . '/app/view/innovation/viewGiveVaccinFromCenter.php';
    if (DEBUG)
        echo ("ControllerStock : stockGiveVaccinFromCenter : vue = $vue");
    require ($vue);
 }
 
 // --- attribue les vaccins au centre choisi
 public static function stockUpdateVaccinFromCenter(){
    $centre1_id = $_GET["centre1_id"];
    $centre1 = $_GET["centre1"];
    $centre = explode(" | ", $_GET["centre2"]);
    $centre2_id = $centre[0];
    $centre2 = $centre[1];
    $vaccin = modelVaccin::getAll();
    $list_quantite = array();
    $i=0;
    foreach ($_GET as $element){
        if($i>3){$list_quantite[] .= $element;}
        $i++;
    }
    for ($i=0 ; $i< sizeof($list_quantite) ; $i++){
        if ($list_quantite[$i] > 0){
            if (modelStock::isStockDefined($centre2_id, $vaccin[$i]->getId())){
                modelStock::updateStockFromCenter($centre1_id, $centre2_id, $vaccin[$i]->getId(), $list_quantite[$i]);
            }
            else{
                modelStock::insertStockFromCenter($centre1_id, $centre2_id, $vaccin[$i]->getId(), $list_quantite[$i]);
            }
        }
    }
    include 'config.php';
    $vue = $root . '/app/view/innovation/viewUpdatedVaccinFromCenter.php';
    if (DEBUG)
        echo ("ControllerStock : stockUpdateVaccinFromCenter : vue = $vue");
    require ($vue);
 }
}
?>
<!-- ----- fin ControllerStock -->




<!-- ----- debut ControllerDV -->
<?php
require_once '../model/ModelRDV.php';

class ControllerRDV {
 // --- Liste des centres (pour l'attribution de vaccin)
 public static function RDVChoosePatient(){
    $results = ModelPatient::getAll();
    // ----- Construction chemin de la vue
    include 'config.php';
    $vue = $root . '/app/view/RDV/viewChoosePatient.php';
    if (DEBUG)
        echo ("ControllerRDV : RDVChoosePatient : vue = $vue");
    require ($vue);
 }
    
    
    
 public static function getRDVpatient() {
  $patient = explode (" | ", $_GET["patient"]);
  $results = ModelRDV::getPatientRDV($patient[0]);
  $centre = modelCentre::getAll();
  $vaccin = modelVaccin::getAll();
  if(isset($results[0])){
    foreach ($results as $element) {
        
            }
        }
    else{
        //devons choisir centre et vaccin
        $vaccination_necessaire=1;
        $centre_choix=ModelStock::getGlobalDispo();
    }
  
  
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/RDV/viewRDVpatient.php';
  require ($vue);
 }
 
 public static function defVaccinationpatient() {
     $centre_nom=$_GET["centre_choix"];
     $centre=ModelCentre::getOne($centre_nom);
     foreach ($centre as $element) {
         $centre_id=$element->getId();
     } 
    //$centre_id=$centre[0];
     $etat_stock=ModelStock::getOneId($centre_id);
     
     // ----- Construction chemin de la vue
    include 'config.php';
    $vue = $root . '/app/view/RDV/viewRDVinjectionChoisi.php';
    require ($vue);
     
 }
 
 

 
 public static function getNBvaccine() {
     function update_last(&$array, $value){
    array_pop($array);
    array_push($array, $value);     
}
     $nbvaccinee=array();
  $patient_id = ModelPatient::getAllId();
  $compt=0;
  foreach ($patient_id as $value) {
      $results = ModelRDV::getPatientRDV($value);
      if(isset($results[0])){
            foreach ($results as $element) {
              if($compt=0){
              $patate=$element->getInjection();
              array_push($nbvaccinee,1);
              }
              else{
                  update_last($nbvaccinee, 2);
              }
              }
            }
    else{
        array_push($nbvaccinee,0);
    }
    $compt=0;
      
  }
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/innovation/viewStatVaccination.php';
  require ($vue);
 }
 
 
}
?>
<!-- ----- fin ControllerRDV -->



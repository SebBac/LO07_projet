
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
      foreach($results as $element){
          $vaccin=ModelVaccin::getOne($element->getVaccin_id());
          $vaccin_id=$element->getVaccin_id();
      }
      foreach($vaccin as $element){
          $dose_max=$element->getDose();
      }
    foreach ($results as $element) {
        if($element->getInjection()>0 && $element->getInjection()<$dose_max){
            $vaccination=3;
            $centre_choix=ModelStock::getGlobalDispoRestraint($vaccin_id);
            
        }
        elseif($element->getInjection()===$dose_max){
            $vaccination=5;
        }
    }
        }
    else{
        //devons choisir centre et vaccin
            $vaccination=1;
            $centre_choix=ModelStock::getGlobalDispo();        
    }
  
  
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/RDV/viewRDVpatient.php';
  require ($vue);
 }
 
 public static function defVaccinationpatient() {
     $centre_nom=$_GET["centre_choix"];
     $patient = explode (" | ", $_GET["patient"]);
     $patient_id=$patient[0];
     $results = ModelRDV::getPatientRDV($patient_id);
     $centre=ModelCentre::getOne($centre_nom);
     foreach ($centre as $element) {
         $centre_id=$element->getId();
     }
     $etat_stock=ModelStock::getOneId($centre_id);
     $max=0;
    foreach($etat_stock as $categorie){
        foreach($categorie as $element){
            if($element->getQuantite()>$max){
                $max=$element->getQuantite();
                $vaccin_id=$element->getVaccin_id();
            }
        }
    }
    $max2=0;
    if(isset($results[0])){
    foreach ($results as $element) {
        if($element->getInjection()>$max2){
            $injection=$element->getInjection();
        }
    }
    $patate=ModelRDV::insert($centre_id, $patient_id, $injection+1, $vaccin_id);
        }
    else{
        $patate=ModelRDV::insert($centre_id, $patient_id, 1, $vaccin_id);
    }
    $patate2=ModelStock::updateStock($centre_id, $vaccin_id, -1);
    
    
    //
     
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



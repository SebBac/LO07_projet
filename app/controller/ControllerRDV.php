
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
  $results = ModelRDV::getPatientHighInjectionRDV($patient[0]);
  $dose = $results[0][4];
  $results = ModelRDV::getPatientRDV($patient[0]);
  $centre = modelCentre::getAll();
  $vaccin = modelVaccin::getAll();
  if(isset($results[0])){
      if($dose == $vaccin[$results[0]->getVaccin_id()-1]->getDose()){
          $vaccination=5;
      }
      else{
          $vaccination=3;
          $centre_choix=ModelStock::getGlobalDispoRestraint($results[0]->getVaccin_id());
      }
  }
  else {
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
     $results = ModelRDV::getPatientHighInjectionRDV($patient_id);
     $vaccin_id=$results[0][3];
     $centre=ModelCentre::getOne($centre_nom);
     $centre_id=$centre[0]->getId();
     /*foreach ($centre as $element) {
         $centre_id=$element->getId();
     }
     $etat_stock=ModelStock::getOneId($centre_id);
    $max2=0;
    if(isset($results[0])){
    foreach ($results as $element) {
        if($element->getInjection()>$max2){
            $injection=$element->getInjection();
        }
    }
    $patate=ModelRDV::insert($centre_id, $patient_id, $injection+1, $results[0]->getVaccin_id());
        }
    else{
        $max=0;
    foreach($etat_stock as $categorie){
        foreach($categorie as $element){
            if($element->getQuantite()>$max){
                $max=$element->getQuantite();
                $vaccin_id=$element->getVaccin_id();
            }
        }
    }*/
    $max2=0;
    if(isset($results[0])){
    $patate=ModelRDV::insert($centre_id, $patient_id, $results[0][4]+1, $vaccin_id);
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
 
 public static function getStatPatient(){
    $patient = ModelPatient::getAllId();
    $vaccin = modelVaccin::getAll();
    $numVaccine = 0;
    $numEnCours = 0;
    $numNonVaccine = 0;
    foreach ($patient as $patient_id) {
       $result = modelRDV::getPatientHighInjectionRDV($patient_id);
       if(isset($result[0][0])){
           if($result[0][4] == $vaccin[$result[0][3]-1]->getDose()){
               $numVaccine++;
           }
           else{
               $numEnCours++;
           }
       }
       else{
           $numNonVaccine++;
       }
    }
    // ----- Construction chemin de la vue
    include 'config.php';
    $vue = $root . '/app/view/innovation/viewStatVaccination.php';
    require ($vue);
 }
 
 public static function getStatDose(){
    $vaccin = modelVaccin::getAll();
    $numVaccine = array();
    foreach ($vaccin as $element){
        $result = modelRDV::getNumVaccine($element->getId());
        $numVaccine[] .= sizeof($result);
    }
    // ----- Construction chemin de la vue
    include 'config.php';
    $vue = $root . '/app/view/innovation/viewStatDose.php';
    require ($vue);
 }
}
?>
<!-- ----- fin ControllerRDV -->



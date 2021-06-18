
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
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/RDV/viewRDVpatient.php';
  require ($vue);
 }
 
 public static function getNBvaccine() {
     $nbvaccinee=array();
  $patient_id = ModelPatient::getAllId();
  
  foreach ($patient_id as $value) {
      $patate=$value->getInjection();
      
      if(is_array($patate)){
          array_push($nbvaccinee,2);
      }
      elseif(isset($patate)){
          array_push($nbvaccinee,1);
      }
      else{
          array_push($nbvaccinee,0);
      }
      
      //$results = ModelRDV::get_Injection($value);
      /*if(isset($results[0])){
      array_push($nbvaccinee,2);}
        else{
            array_push($nbvaccinee,1);}
        }
        else{
      array_push($nbvaccinee,0);
  }*/   
  }
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/innovation/viewStatVaccination.php';
  require ($vue);
 }
 
 
}
?>
<!-- ----- fin ControllerRDV -->



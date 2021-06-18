
<!-- ----- debut modelPatient -->

<?php
require_once 'Model.php';

class modelRDV {
 private $centre_id, $patient_id, $injection, $vaccin_id;

 // pas possible d'avoir 2 constructeurs
 public function __construct($centre_id = NULL, $patient_id = NULL, $injection = NULL, $vaccin_id = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($centre_id)) {
   $this->centre_id = $centre_id;
   $this->patient_id = $patient_id;
   $this->injection = $injection;
   $this->vaccin_id = $vaccin_id;
  }
 }

 function setCentre_id($centre_id) {
  $this->centre_id = $centre_id;
 }

 function setPatient_id($patient_id) {
  $this->patient_id = $patient_id;
 }
 
 function setInjection($injection) {
  $this->injection = $injection;
 }
 
 function setVaccin_id($vaccin_id) {
  $this->vaccin_id = $vaccin_id;
 }

 function getCentre_id() {
  return $this->centre_id;
 }

 function getPatient_id() {
  return $this->patient_id;
 }
 
 function getInjection() {
  return $this->injection;
 }
 
 function getVaccin_id() {
  return $this->vaccin_id;
 }

 public static function getPatientRDV($patient_id) {
    try {
        $database = Model::getInstance();
        $query = "SELECT * FROM rendezvous WHERE patient_id = :patient_id";
        $statement = $database->prepare($query);
        $statement->execute(['patient_id' => $patient_id]);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, ModelRDV);
        return $results;
    } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
    }
 }
 
  
// retourne une liste des id
 /*public static function get_Injection($patient_id) {
  try {
   $database = Model::getInstance();
   $query = "select injection from rendezvous WHERE patient_id = :patient_id";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }*/
 
}
?>
<!-- ----- fin modelRDV -->
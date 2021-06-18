
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
        $query = "SELECT * FROM rendezvous WHERE patient_id = :patient_id ORDER BY injection";
        $statement = $database->prepare($query);
        $statement->execute(['patient_id' => $patient_id]);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "modelRDV");
        return $results;
    } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
    }
 }
 
 public static function getPatientHighInjectionRDV($patient_id) {
    try {
        $database = Model::getInstance();
        $query = "SELECT *,MAX(injection) FROM rendezvous WHERE patient_id = :patient_id";
        $statement = $database->prepare($query);
        $statement->execute(['patient_id' => $patient_id]);
        $results = $statement->fetchAll(PDO::FETCH_NUM);
        return $results;
    } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
    }
 }
 
 public static function insert($centre_id, $patient_id, $injection, $vaccin_id) {
  try {
   $database = Model::getInstance();

   // recherche de la valeur de la clé = max(id) + 1
   /*$query = "select max(id) from centre";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $id = $tuple['0'];
   $id++;*/

   // ajout d'un nouveau tuple;
   $query = "insert into rendezvous value (:centre_id, :patient_id, :injection, :vaccin_id)";
   $statement = $database->prepare($query);
   $statement->execute([
     'centre_id' => $centre_id,
     'patient_id' => $patient_id,
     'injection' => $injection,
     'vaccin_id' => $vaccin_id,
   ]);
   
  }catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }
 
 public static function getNumVaccine($vaccin_id){
    try {
        $database = Model::getInstance();
        $query = "SELECT DISTINCT patient_id FROM rendezvous WHERE vaccin_id = :vaccin_id";
        $statement = $database->prepare($query);
        $statement->execute(['vaccin_id' => $vaccin_id]);
        $results = $statement->fetchAll(PDO::FETCH_NUM);
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
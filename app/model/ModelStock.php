
<!-- ----- debut modelPatient -->

<?php
require_once 'Model.php';

class modelStock {
 private $centre_id, $vaccin_id, $quantite;

 // pas possible d'avoir 2 constructeurs
 public function __construct($centre_id = NULL, $vaccin_id = NULL, $quantite = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($centre_id)) {
   $this->centre_id = $centre_id;
   $this->vaccin_id = $vaccin_id;
   $this->quantite = $quantite;
  }
 }

 function setCentre_id($centre_id) {
  $this->centre_id = $centre_id;
 }

 function setVaccin_id($vaccin_id) {
  $this->vaccin_id = $vaccin_id;
 }
 
 function setQuantite($quantite) {
  $this->quantite = $quantite;
 }

 function getCentre_id() {
  return $this->centre_id;
 }

 function getVaccin_id() {
  return $this->vaccin_id;
 }
 
 function getQuantite() {
  return $this->quantite;
 }

 public static function getAll() {
    try {
        $database = Model::getInstance();
        $query = "select * from stock";
        $statement = $database->prepare($query);
        $statement->execute();
        $datas = $statement->fetchAll(PDO::FETCH_NUM);
        $cols = array("centre_id", "vaccin_id", "quantite");
        return array($cols, $datas);
    } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
    }
 }
 
 public static function getGlobal() {
    try {
    $database = Model::getInstance();
    $query = "SELECT centre_id, SUM(quantite) FROM stock GROUP BY centre_id";
    $statement = $database->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_NUM);
    return $results;
    } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
    }
 }

}
?>
<!-- ----- fin modelPatient -->
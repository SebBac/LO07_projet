
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
        $results1 = $statement->fetchAll(PDO::FETCH_NUM);
        $query = "SELECT label FROM centre";
        $statement = $database->prepare($query);
        $statement->execute();
        $results2 = $statement->fetchAll(PDO::FETCH_NUM);
        $query = "SELECT label FROM vaccin ORDER BY id";
        $statement = $database->prepare($query);
        $statement->execute();
        $results3 = $statement->fetchAll(PDO::FETCH_NUM);
        return array($results1, $results2, $results3);
    } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
    }
 }
 
 public static function getGlobal() {
    try {
    $database = Model::getInstance();
    $query = "SELECT centre_id, SUM(quantite) FROM stock GROUP BY centre_id ORDER BY SUM(quantite) DESC";
    $statement = $database->prepare($query);
    $statement->execute();
    $results1 = $statement->fetchAll(PDO::FETCH_NUM);
    $query = "SELECT label FROM centre";
    $statement = $database->prepare($query);
    $statement->execute();
    $results2 = $statement->fetchAll(PDO::FETCH_NUM);
    return array($results1, $results2);
    } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
    }
 }
 
  public static function getGlobalDispo() {
    try {
    $database = Model::getInstance();
    $query = "SELECT centre_id, SUM(quantite) FROM stock WHERE quantite>0 GROUP BY centre_id ORDER BY SUM(quantite) DESC";
    $statement = $database->prepare($query);
    $statement->execute();
    $results1 = $statement->fetchAll(PDO::FETCH_NUM);
    $query = "SELECT label FROM centre";
    $statement = $database->prepare($query);
    $statement->execute();
    $results2 = $statement->fetchAll(PDO::FETCH_NUM);
    return array($results1, $results2);
    } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
    }
 }

 public static function isStockDefined($centre_id, $vaccin_id){
    try {
        $database = Model::getInstance();
        $query = "SELECT * FROM stock WHERE centre_id = :centre_id AND vaccin_id = :vaccin_id";
        $statement = $database->prepare($query);
        $statement->execute(["centre_id" => $centre_id, "vaccin_id" => $vaccin_id]);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRDV");
        if($results == NULL){return false;}
        else{return true;}
    } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
    }
 }
 
 public static function updateStock($centre_id, $vaccin_id, $doses) {
    try {
        $database = Model::getInstance();
        $query = "UPDATE vaccin SET doses = doses - :doses WHERE id = :vaccin_id";
        $statement = $database->prepare($query);
        $statement->execute(["doses" => $doses, "vaccin_id" => $vaccin_id]);
        $query = "UPDATE stock SET quantite = quantite + :doses WHERE centre_id = :centre_id AND vaccin_id = :vaccin_id";
        $statement = $database->prepare($query);
        $statement->execute(["doses" => $doses, "centre_id" => $centre_id, "vaccin_id" => $vaccin_id]);
    } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
    }
    return 1;
 }
 
 public static function insertStock($centre_id, $vaccin_id, $doses) {
    try {
        $database = Model::getInstance();
        $query = "INSERT INTO stock VALUE (:centre_id, :vaccin_id, :doses)";
        $statement = $database->prepare($query);
        $statement->execute(["centre_id" => $centre_id, "vaccin_id" => $vaccin_id, "doses" => $doses]);
    } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
    }
 }
 
}
?>
<!-- ----- fin modelPatient -->
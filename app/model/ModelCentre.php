
<!-- ----- debut modelCentre -->

<?php
require_once 'Model.php';

class modelCentre {
 private $id, $label, $adresse;

 // pas possible d'avoir 2 constructeurs
 public function __construct($id = NULL, $label = NULL, $adresse = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->id = $id;
   $this->label = $label;
   $this->adresse = $adresse;
  }
 }

 function setId($id) {
  $this->id = $id;
 }

 function setLabel($label) {
  $this->label = $label;
 }

 function setAdresse($adresse) {
  $this->adresse = $adresse;
 }

 function getId() {
  return $this->id;
 }

 function getLabel() {
  return $this->label;
 }

 function getAdresse() {
  return $this->adresse;
 }
 
 
 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "select * from centre";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "modelCentre");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 public static function getAllExceptOne($id) {
  try {
   $database = Model::getInstance();
   $query = "SELECT * FROM centre WHERE id != :id";
   $statement = $database->prepare($query);
   $statement->execute(["id" => $id]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "modelCentre");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function insert($label, $adresse) {
  try {
   $database = Model::getInstance();

   // recherche de la valeur de la clé = max(id) + 1
   $query = "select max(id) from centre";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $id = $tuple['0'];
   $id++;

   // ajout d'un nouveau tuple;
   $query = "insert into centre value (:id, :label, :adresse)";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id,
     'label' => $label,
     'adresse' => $adresse,
   ]);
   
   //ajout du centre dans le stock
   $query = "insert into stock value (:id, 1, 0)";
   $statement = $database->prepare($query);
   $statement->execute(['id' => $id]);
   return $id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }
 
 
 public static function getOne($label) {
  try {
   $database = Model::getInstance();
   $query = "select * from centre where label = :label";
   $statement = $database->prepare($query);
   $statement->execute([
     'label' => $label
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "modelCentre");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 /*public static function getIDfromLabel($label){
     try {
   $database = Model::getInstance();
   $query = "SELECT id FROM centre WHERE label = :label";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetch();
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }*/

}
?>
<!-- ----- fin modelCentre -->


<!-- ----- debut ControllerRDV -->
<?php
require_once '../model/ModelRDV.php';

class ControllerRDV {
 // --- page d'acceuil
 public static function caveAccueil() {
  include 'config.php';
  $vue = $root . '/app/view/viewCaveAccueil.php';
  if (DEBUG)
   echo ("ControllerRDV : caveAccueil : vue = $vue");
  require ($vue);
 }

 // --- Liste des rdvs
 public static function rdvReadAll() {
  $results = ModelRDV::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/rdv/viewAll.php';
  if (DEBUG)
   echo ("ControllerRDV : rdvReadAll : vue = $vue");
  require ($vue);
 }

 // Affiche un formulaire pour sélectionner un id qui existe
 public static function rdvReadId() {
  $results = ModelRDV::getAllId();

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/rdv/viewId.php';
  require ($vue);
 }

 // Affiche un rdv particulier (id)
 public static function rdvReadOne() {
  $rdv_id = $_GET['id'];
  $results = ModelRDV::getOne($rdv_id);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/rdv/viewAll.php';
  require ($vue);
 }

 // Affiche le formulaire de creation d'un rdv
 public static function rdvCreate() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/rdv/viewInsert.php';
  require ($vue);
 }

 // Affiche un formulaire pour récupérer les informations d'un nouveau rdv.
 // La clé est gérée par le systeme et pas par l'internaute
 public static function rdvCreated() {
  // ajouter une validation des informations du formulaire
  $results = ModelRDV::insert(
      htmlspecialchars($_GET['cru']), htmlspecialchars($_GET['annee']), htmlspecialchars($_GET['degre'])
  );
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/rdv/viewInserted.php';
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerRDV -->



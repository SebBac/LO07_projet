
<!-- ----- debut ControllerCentre -->
<?php
require_once '../model/ModelCentre.php';

class ControllerCentre {
 // --- page d'acceuil
 public static function caveAccueil() {
  include 'config.php';
  $vue = $root . '/app/view/viewCovidAccueil.php';
  if (DEBUG)
   echo ("ControllerCentre : covidAccueil : vue = $vue");
  require ($vue);
 }

 // --- Liste des centres
 public static function centreReadAll() {
  $results = ModelCentre::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/centre/viewAll.php';
  if (DEBUG)
   echo ("ControllerCentre : centreReadAll : vue = $vue");
  require ($vue);
 }

 // Affiche un formulaire pour sélectionner un id qui existe
 public static function centreReadId() {
  $results = ModelCentre::getAllId();

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/centre/viewId.php';
  require ($vue);
 }

 // Affiche un centre particulier (id)
 public static function centreReadOne() {
  $centre_id = $_GET['id'];
  $results = ModelCentre::getOne($centre_id);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/centre/viewAll.php';
  require ($vue);
 }

 // Affiche le formulaire de creation d'un centre
 public static function centreCreate() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/centre/viewInsert.php';
  require ($vue);
 }

 // Affiche un formulaire pour récupérer les informations d'un nouveau centre.
 // La clé est gérée par le systeme et pas par l'internaute
 public static function centreCreated() {
  // ajouter une validation des informations du formulaire
  $results = ModelCentre::insert(
      htmlspecialchars($_GET['cru']), htmlspecialchars($_GET['annee']), htmlspecialchars($_GET['degre'])
  );
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/centre/viewInserted.php';
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerCentre -->



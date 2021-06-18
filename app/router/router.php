
<!-- ----- debut Router -->
<?php
require ('../controller/ControllerCentre.php');
require ('../controller/ControllerCovid.php');
require ('../controller/ControllerPatient.php');
require ('../controller/ControllerRDV.php');
require ('../controller/ControllerStock.php');
require ('../controller/ControllerVaccin.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

// Modification du routeur pour prendre en compte l'ensemble des paramètres
$action = $param['action'];

// --- On supprime l'élément action de la structure
unset($param['action']);

// --- Tout ce qui reste sont des arguments
$args = $param;

// --- Liste des méthodes autorisées
switch ($action) {
    case "vaccinReadAll" :
    case "vaccinReadLabel" :
    case "vaccinCreate" :
    case "vaccinCreated" :
    case "vaccinUpdated" :
        ControllerVaccin::$action();
        break;

    case "centreReadAll" :
    case "centreAdd" :
    case "centreAdded" :
        ControllerCentre::$action();
        break;
    
    case "docuInnov1" :
    case "docuInnov2" :
    case "docuInnov3" :
    case "PVSujet" :
        ControllerCovid::$action();
        break;
        
    case "patientReadAll" :
    case "patientAdd" :
    case "patientAdded" :
        ControllerPatient::$action();
        break;
    
    case "RDVChoosePatient" :
    case "getRDVpatient" :
    case "getStatPatient" :
    case "defVaccinationpatient" :
        ControllerRDV::$action();
        break;
    
    case "stockReadAll" :
    case "stockReadGlobal" :
    case "stockChooseCenter" :
    case "stockGiveVaccin" :
    case "stockUpdateVaccin" :
    case "stockGiveVaccinFromCenter" :
    case "stockUpdateVaccinFromCenter" :
        ControllerStock::$action($args);
        break;
    
 // Tache par défaut
 default:
  $action = "covidAccueil";
  ControllerCovid::$action();
}
?>
<!-- ----- Fin Router -->


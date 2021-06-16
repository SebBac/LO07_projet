
<!-- ----- debut Router -->
<?php
require ('../controller/ControllerCentre.php');
require ('../controller/ControllerCovid.php');
require ('../controller/ControllerPatient.php');
require ('../controller/ControllerStock.php');
require ('../controller/ControllerVaccin.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

// --- Liste des méthodes autorisées
switch ($action) {
    case "vaccinReadAll" :
    case "vaccinCreate" :
    case "vaccinCreated" :
    case "vaccinReadLabel" :
    case "vaccinUpdated" :
        ControllerVaccin::$action();
        break;

    case "centreAdd" :
    case "centreAdded" :
    case "centreReadAll" :
        ControllerCentre::$action();
        break;
    
    case "patientAdd" :
    case "patientAdded" :
    case "patientReadAll" :
    case "patientReadId" :
        ControllerPatient::$action();
        break;
    
    case "stockReadAll" :
    case "stockReadGlobal" :
    case "stockAddVaccin" :
        ControllerStock::$action();
        break;
    

 // Tache par défaut
 default:
  $action = "covidAccueil";
  ControllerCovid::$action();
}
?>
<!-- ----- Fin Router -->


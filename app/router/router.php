
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
    case "vaccinAdd" :
    case "vaccinUpdate" :
        ControllerVaccin::$action();
        break;

    case "centreAdd" :
    case "centreReadAll" :
    case "patientReadId" :
        ControllerCentre::$action();
        break;
    
    case "patientAdd" :
    case "patientReadAll" :
        ControllerPatient::$action();
        break;
    
    case "stockReadAll" :
    case "stockReadGlobal" :
    case "stockAddVaccin" :
        ControllerVaccin::$action();
        break;
    

 // Tache par défaut
 default:
  $action = "covidAccueil";
  ControllerCovid::$action();
}
?>
<!-- ----- Fin Router -->


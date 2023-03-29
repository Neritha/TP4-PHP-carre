<?php 
ob_start();
session_start();

include "vues/header.php";
include "models/continent.php";
include "models/nationalite.php"; 
include "models/monPdo.php";
include "vues/messagesFlash.php";

$uc = empty($_GET['uc']) ? "accueil" : $_GET['uc'];

switch($uc){
    case 'accueil':
        include('vues/accueil.php');
        break;
    case 'continent' :
        include('controllers/continentController.php');
        break;
    case 'nationalite':
        include ('controllers/nationaliteController.php');
        break;    
}

include "vues/footer.php"; 
?>

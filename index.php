<?php 
ob_start();
session_start();

include "vues/header.php";
include "models/genre.php";
include "models/continent.php";
include "models/nationalite.php";
include "models/auteur.php";
include "models/monPdo.php";
include "vues/messagesFlash.php";

$uc = empty($_GET['uc']) ? "accueil" : $_GET['uc'];

switch($uc){
    case 'accueil':
        include('vues/accueil.php');
        break;
    case 'continents' :
        include('controllers/continentController.php');
        break;
    case 'nationalites':
        include ('controllers/nationaliteController.php');
        break;   
    case 'genre':
        include ('controllers/genreController.php');
        break;   
    case 'auteur':
        include ('controllers/auteurController.php');
        break;  
}

include "vues/footer.php"; 
?>


<!--checke-->
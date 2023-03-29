<?php
$effet=$_GET['effet'];
switch($effet){
    case 'liste' :
        $lesNationalites=Nationalite::findAll();
        include('vues/listeNationalites.php');
        break;
}
<?php
$action=$_GET['action'];
switch($action){
    case 'liste' :
        $lesContinents=Continent::findAll();
        include('vues/listeContinents.php');
        break;

    case 'add':
        $mode="ajouter";
        include("vues/formContinent.php");
        break;

    case 'update':
        $mode="modifier";
        $continent=Continent::findById($Get['num']);
        include("vues/formContinent.php");
        break;

    case 'delete':
        $continent=Continent::findById($Get['num']);
        $nb=Continent::delete($continent);
        if($nb==1){
            $_SESSION['message']=["success"=>"Le continent a bien été supprimé"];
        }else{
            $_SESSION['message']=["danger"=>"Le continent a bien été supprimé"];
        }
        header('location:index.php?uc=continent&action=list');
        exit();
        //break;

    case 'valideForm':
        $continent=new Continent();
        if(empty($_POST['num'])){
            $continent->setLibelle($_POST['libelle']);
            $nb=Continent::add($continent);
            $message = "ajouté";

        }else{
            $continent->setNum($_POST['libelle']);
            $continent->setLibelle($_POST['libelle']);
            
            $nb=Continent::update($continent);
            $message = "modifié";
        }
        if($nb==1){
            $_SESSION['message']=["success"=>"Le continent a bien été $message"];
        }else{
            $_SESSION['message']=["danger"=>"Le continent a bien été $message"];
        }
        header('location:index.php?uc=continent&action=list');
        exit();
        //break;
    
}

?>
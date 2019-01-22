<?php
//gen
$rep=__DIR__.'/../';

// liste des modules à inclure

//$dConfig['includes']= array('controleur/Validation.php');


//BD

//$base="dbfanarboux";
$login="enki.garrigues"; //fanarboux
$mdp="enki2000"; //mdpphp
$dsn='mysql:host=sql.free.fr;dbname=enki.garrigues'; //berlin.iut.local

//Vues
$vues['erreur']='vues/erreur.php';
$vues['accueil']='vues/accueil.php';
$vues['connexion']='vues/connexion.php';
$vues['clients']='vues/clients.php';
$vues['factures']='vues/factures.php';
$vues['addclient']='vues/addclient.php';
$vues['addfacture']='vues/addfacture.php';


?>
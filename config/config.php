<?php
//gen
//$rep=__DIR__.'/../';

// liste des modules à inclure

//$dConfig['includes']= array('controleur/Validation.php');


$nbPage=1;
//$dVueErreur=[];
//BD

//$base="dbfanarboux";
$login="enki.garrigues"; //fanarboux
$mdp="enki2000"; //mdpphp
$dsn='mysql:host=sql.free.fr;dbname=enki.garrigues'; //berlin.iut.local

//Vues
$parseur['parseur']='parser/parseur.php';
$vues['erreur']='vues/erreur.php';
$vues['vitrine']='vues/vitrine.php';
$vues['auth']='vues/auth.php';
$vues['inscritpion']='vues/inscription.php';
$vues['vitrineAdmin']='vues/vitrineAdmin.php';
$vues['autherror']='vues/autherror.php';
$vues['inscitpionerror']='vues/inscitpionerror.php';


?>
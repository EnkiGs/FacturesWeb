<?php
//gen
$rep=__DIR__.'/../';

// liste des modules à inclure

//$dConfig['includes']= array('controleur/Validation.php');


//BD

//$base="dbfanarboux";
$login="enki.garrigues"; //fanarboux
$mdp="enki2000"; //mdpphp
$dsn='mysql:host=sql.free.fr;dbname=enki_garrigues'; //berlin.iut.local

//Vues
$vues['erreur']='vues/erreur.php';
$vues['accueil']='vues/accueil.php';
$vues['connexion']='vues/connexion.php';
$vues['clients']='vues/clients.php';
$vues['factures']='vues/factures.php';
$vues['addclient']='vues/addclient.php';
$vues['addfacture']='vues/addfacture.php';


function getGUID(){
    if (function_exists('com_create_guid')){
        return com_create_guid();
    }
    else {
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = chr(123)// "{"
            .substr($charid, 0, 8).$hyphen
            .substr($charid, 8, 4).$hyphen
            .substr($charid,12, 4).$hyphen
            .substr($charid,16, 4).$hyphen
            .substr($charid,20,12)
            .chr(125);// "}"
        return $uuid;
    }
}

?>
<?php
//si controller pas objet
//  header('Location: controller/controller.php');

//si controller objet

//chargement config
require_once('config/config.php'); // __DIR__./

//chargement autoloader pour autochargement des classes
require_once('config/Autoload.php'); //__DIR__./
Autoload::charger();
global $rep,$parseur;

require_once($parseur['parseur']);


$frontctrl=new FrontController();
//$cont = new VisitorController();


?> 
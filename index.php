<?php
//si controller pas objet
//  header('Location: controller/controller.php');

//si controller objet

//chargement config
require_once('config/config.php'); // __DIR__./
session_start();

//chargement autoloader pour autochargement des classes
require_once('config/Autoload.php'); //__DIR__./
Autoload::charger();
global $rep;

$frontctrl=new FrontController();
//$cont = new VisitorController();


?> 
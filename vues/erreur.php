<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil</title>
    <link href="vues/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="vues/css/commun.css" />
    <link type="text/css" rel="stylesheet" href="vues/css/accueil.css" />
</head>
<body>
<header class="container-fluid">
    <label class="seeL">Consulter : </label>
    <label class="addL">Ajouter : </label><br/>
    <a class="btn btn-primary seeB" href="index.php?action=factures">Factures</a>
    <a class="btn btn-primary seeB" href="index.php?action=clients">Clients</a>
    <a class="btn btn-primary addB" href="index.php?action=addFactureButton">Facture</a>
    <a class="btn btn-primary addB" href="index.php?action=addClientButton">Client</a>
</header>

<h1>Page d'erreur !</h1>
<?php

if(isset($erreurs)){
    foreach($erreurs as $val) {
        echo "ERREUR : $val" . "</br>";
    }
}
?>
<footer>
    <a class="btn btn-danger deco" href="index.php?action=deconnexion">Deconnexion</a>
</footer>
<script src="vues/js/bootstrap.min.js"></script>
</body>
</html>

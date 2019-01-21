<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Accueil</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/accueil.css" />
</head>
<body>
<header class="container-fluid">
    <label class="seeL">Consulter : </label>
    <label class="addL">Ajouter : </label><br/>
    <a class="btn btn-primary seeB" href="?action=factures">Factures</a>
    <a class="btn btn-primary seeB" href="?action=clients">Clients</a>
    <a class="btn btn-primary addB" href="?action=addFactureButton">Facture</a>
    <a class="btn btn-primary addB" href="?action=affClientButton">Client</a>
</header>
<div>
    <h1>Accueil</h1>
</div>
<footer>
    <a class="btn btn-danger deco" href="?action=deconnexion">Deconnexion</a>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/java.js">
</script>
</body>
</html>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Flux RSS</title>
    <link href="vues/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="vues/css/vitrine.css" />
</head>
<body>
<header>
    <a class="btn btn-info" href="index.php">Accueil</a>
</header>
<section class="container-fluid">
    <h2>Inscription :</h2>
    <div class="erreur">
        <p id="erreurco">Ce login est existe déjà, choisissez un autre login</p>
    </div>
    <form action="?action=inscription" method="post">
        <div>
            <label for="login">Nouveau login :</label>
            <input type="text" name="login">
        </div>
        <div>
            <label for="passwd">Nouveau Mot de Passe :</label>
            <input type="password" name ="passwd">
        </div>
        <div class="button">
            <button class="btn btn-success" type="submit">Inscription</button>
        </div>

    </form>
</section>
</body>
</html>
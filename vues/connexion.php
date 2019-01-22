<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/connexion.css" />
</head>
<body>
<section class="connexion container-fluid">
    <h2>Connexion :</h2>
    <?php
        if(isset($tabE) && count($tabE)>0){
            echo "<p class='erreur'>";
            foreach ($tabE as $item){
                echo "<span>- ".$item."</span>";
            }
            echo "</p>";
        }
    ?>
    <form action="../index.php?action=connexion" method="post">
        <div class="form-group">
            <label for="login">Login :</label>
            <input class="form-control" type="text" name="login">
        </div>
        <div class="form-group">
            <label for="passwd">Mot de passe :</label>
            <input class="form-control" type="password" name ="passwd">
        </div>
        <div class="button">
            <button class="btn btn-primary" type="submit">Connexion</button>
        </div>
    </form>
</section>
</body>
</html>
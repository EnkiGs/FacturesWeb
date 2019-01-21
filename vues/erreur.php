<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">																											
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Erreur</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
<!--	<link type="text/css" rel="stylesheet" href="css/vitrine.css" />-->
</head>
<body>
	<header>
		<a class="btn btn-info" href="../index.php">Accueil</a>
	</header>

<h1>Page d'erreur !</h1>

<?php

if(isset($dVueErreur)){
    foreach($dVueErreur as $val) {
        echo "ERREUR : $val" . "</br>";
    }
}
?>

</body>
</html>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Clients</title>
        <link href="vues/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="vues/css/commun.css" />
        <link type="text/css" rel="stylesheet" href="vues/css/clients.css" />
    </head>
    <body>
        <header class="container-fluid">
            <label class="seeL">Consulter : </label>
            <label class="addL">Ajouter : </label><br/>
            <a class="btn btn-primary seeB" href="index.php?action=factures">Factures</a>
            <a class="btn btn-primary seeB" href="index.php?action=clients">Clients</a>
            <a class="btn btn-primary addB" href="index.php?action=addFactureButton">Facture</a>
            <a class="btn btn-primary addB" href="index.php?action=addClientButton">Client</a>
            <h1> Clients </h1>
        </header>
        <section id="Clients" class="container-fluid">

            <div>
                <p>Nb clients :
                <?php
                if(isset($listC) && !empty($listC)){
                    echo count($listC).'</p>
                                <table class="clientsTable">';
                    foreach($listC as $c){
                        echo '<tr><td><a class="click" href="index.php?action=updateClient&cli='.$c->getId().'">'.$c->getNomaAfficher().'</a></td></tr>';
                    }
                    echo "</table>";
                }
                else{
                    echo '0 </p>';
                }

                ?>
            </div>

        </section>
        <footer>
            <a class="btn btn-danger deco" href="index.php?action=deconnexion">Deconnexion</a>
        </footer>
        <script src="vues/js/bootstrap.min.js"></script>
    </body>
</html>
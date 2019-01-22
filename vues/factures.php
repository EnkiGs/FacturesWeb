<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Factures</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/commun.css" />
    <link type="text/css" rel="stylesheet" href="css/factures.css" />
</head>
<body>
<header class="container-fluid">
    <label class="seeL">Consulter : </label>
    <label class="addL">Ajouter : </label><br/>
    <a class="btn btn-primary seeB" href="../index.php?action=factures">Factures</a>
    <a class="btn btn-primary seeB" href="../index.php?action=clients">Clients</a>
    <a class="btn btn-primary addB" href="../index.php?action=addFactureButton">Facture</a>
    <a class="btn btn-primary addB" href="../index.php?action=addClientButton">Client</a>
    <h1> Factures </h1>
</header>
<section id="Factures" class="container-fluid">
    <section id="form">
        <p class="formTitle">Rechercher : </p>
        <form action="../index.php?action=rechercherFact" method="post">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input class="form-control" type="text" name="nom">
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <select name="date" class="form-control">
                    <option selected value="0">Aucune</option>
                    <option value="1">12 derniers mois</option>
                </select>
            </div>
            <button class="btn btn-secondary" type="submit"><img src="images/recherche.png"/></button>

        </form>
    </section>
    <br/>
    <div>
        <p><span>Nb Factures :
            <?php
            if(isset($listF) && !empty($listF)){
                echo count($listF).'</span><span>Total : '.$totalFact.'</span></p>
                                <table class="facturesTable"><tr><th>Actions</th><th>Ref</th><th>Date</th><th>Client</th><th>Objet</th><th>Montant</th><th>Payé le</th></tr>';
                foreach($listF as $f){
                    echo '<tr>
                            <td>
                                <a href="../index.php?action=seeFact&fact="'.$f->getId().'><img src="images/seeico.png"/></a>
                                <a href="../index.php?action=updateFact&fact="'.$f->getId().'><img src="images/updateico.png"/></a>
                                <a href="../index.php?action=pdfFact&fact="'.$f->getId().'><img src="images/pdfico.png"/></a>
                            </td>
                            <td>'.$f->getRef().'</td>
                            <td>'.$f->getDateE().'</td>
                            <td>'.$f->getClient().'</td>
                            <td>'.$f->getObjet().'</td>
                            <td>'.$f->getTotal().'</td>
                            <td>'.$f->getDateP().'</td>
                          </tr>';
                }
                echo "</table>";
            }
            else{
                echo '0 </span><span>Total : 0 </span></p>';

            }

            ?>
    </div>

</section>
<footer>
    <a class="btn btn-danger deco" href="../index.php?action=deconnexion">Deconnexion</a>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/java.js">
</script>
</body>
</html>
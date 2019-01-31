<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter un client</title>
    <link href="vues/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="vues/css/commun.css" />
    <link type="text/css" rel="stylesheet" href="vues/css/addclient.css" />
</head>

<body>
<header class="container-fluid">
    <label class="seeL">Consulter : </label>
    <label class="addL">Ajouter : </label><br/>
    <a class="btn btn-primary seeB" href="index.php?action=factures">Factures</a>
    <a class="btn btn-primary seeB" href="index.php?action=clients">Clients</a>
    <a class="btn btn-primary addB" href="index.php?action=addFactureButton">Facture</a>
    <a class="btn btn-primary addB" href="index.php?action=addClientButton">Client</a>
    <h1> Ajouter un client </h1>
</header>

<section id="addClients" class="container-fluid">
    <?php
        if(isset($errClient) && count($errClient)>0){
            echo "<p class='erreur'>";
            foreach ($errClient as $item) {
                echo "<span>- ".$item."</span>";
            }
            echo "</p>";
        }
        if(isset($okClient) && count($okClient)>0){
            echo "<p class='ok'>";
            foreach ($okClient as $item) {
                echo "<span>".$item."</span>";
            }
            echo "</p>";
        }
    ?>
    <form name="ClientForm" action="index.php?action=addClient" method="post" onsubmit="return validateForm()">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="statut" id="statut1" value="professionnel">
            <label class="form-check-label" for="statut1">
                Professionnel
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="statut" id="statut2" value="particulier">
            <label class="form-check-label" for="statut2">
                Particulier
            </label>
        </div>
        <label class="errors" id="StatutError">Choisissez un statut !</label>

        <div class="form-group">
            <label for="societe">Société</label>
            <input type="text" class="form-control" name="societe" id="societe" placeholder="Société">
            <label class="errors" id="SocieteError">Entrez un nom !</label>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label for="civ">Civilité</label>
                <select class="form-control" name="civ" id="civ">
                    <option selected value="0">Société</option>
                    <option value="1">Madame</option>
                    <option value="2">Monsieur</option>
                    <option value="3">Monsieur ou Madame</option>
                    <option value="4">Monsieur et Madame</option>
                </select>
            </div>

            <div class="form-group col">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
                <label class="errors" id="NomError">Entrez un nom !</label>
            </div>

            <div class="form-group col">
                <label for="prenom">Prenom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom">
                <label class="errors" id="PrenomError">Entrez un prenom !</label>
            </div>
        </div>

        <div class="form-group">
            <label for="rue">Rue</label>
            <input type="text" class="form-control" id="rue" name="rue" placeholder="Rue">
        </div>

        <div class="form-row">
            <div class="form-group col-lg-4">
                <label for="codeP">Code postal</label>
                <input type="number" class="form-control" id="codeP" name="codeP" placeholder="Code postal">
                <label class="errors" id="CodePError">Entrez un code postal correct !</label>
            </div>

            <div class="form-group col-lg-8">
                <label for="ville">Ville</label>
                <input type="text" class="form-control" id="ville" name="ville" placeholder="Ville">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-sm-4">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                <label class="errors" id="EmailError">Entrez un email !</label>
            </div>

            <div class="form-group col-sm-4">
                <label for="tel">Téléphone</label>
                <input type="text" class="form-control" id="tel" name="tel" placeholder="Téléphone">
            </div>
        </div>

        <button type="submit" class="btn btn-dark submitB">Ajouter</button>

    </form>
    <script>
        function validateForm() {
            var ok = 0;

            var list = document.getElementsByClassName("errors");
            for(var i =0 ; i<list.length;i++){
                list[i].style.display = "none";
            }

            var statut = document.getElementsByName("statut");
            if(statut[0].checked === false && statut[1].checked === false){
                document.getElementById("StatutError").style.display = "inline";
                ok = 1;
            }

            var email = document.getElementById("email").value;
            if(email === ""){
                document.getElementById("EmailError").style.display = "inline";
                ok = 1;
            }

            var codeP = document.getElementById("codeP").value;
            if(codeP !== "" && (codeP>98890 || codeP<1000)){
                document.getElementById("CodePError").style.display = "inline";
                ok = 1;
            }

            var civ = document.getElementById("civ").value;
            switch (civ) {
                case "0":
                    if(document.getElementById("societe").value === ""){
                        document.getElementById("SocieteError").style.display = "inline";
                        ok = 1;
                    }
                    break;
                default:
                    if(document.getElementById("nom").value === "" || document.getElementById("prenom").value === ""){
                        document.getElementById("NomError").style.display = "inline";
                        document.getElementById("PrenomError").style.display = "inline";
                        ok = 1;
                    }
                    break;
            }
            if(ok === 0)
                return true;
            else
                return false;
        }
    </script>
</section>
<footer>
    <a class="btn btn-danger deco" href="index.php?action=deconnexion">Deconnexion</a>
</footer>
<script src="vues/js/bootstrap.min.js"></script>
</body>
</html>
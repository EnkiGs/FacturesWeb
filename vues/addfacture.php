<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ajouter une facture</title>
    <link href="vues/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="vues/css/commun.css" />
    <link type="text/css" rel="stylesheet" href="vues/css/addfacture.css" />
</head>

<body>
<header class="container-fluid">
    <label class="seeL">Consulter : </label>
    <label class="addL">Ajouter : </label><br/>
    <a class="btn btn-primary seeB" href="index.php?action=factures">Factures</a>
    <a class="btn btn-primary seeB" href="index.php?action=clients">Clients</a>
    <a class="btn btn-primary addB" href="index.php?action=addFactureButton">Facture</a>
    <a class="btn btn-primary addB" href="index.php?action=addClientButton">Client</a>
    <h1> Ajouter une facture </h1>
</header>

<section id="addFactures" class="container-fluid">
    <?php
    if(isset($errFact) && count($errFact)>0){
        echo "<p class='erreur'>";
        foreach ($errFact as $item) {
            echo "<span>- ".$item."</span>";
        }
        echo "</p>";
        if(isset($okFact) && count($okFact)>0){
            echo "<p class='ok'>";
            foreach ($okFact as $item) {
                echo "<span>".$item."</span>";
            }
            echo "</p>";
        }
    }
    ?>
    <form name="FactureForm" action="index.php?action=addFacture" method="post" onsubmit="return validateForm()">
        <div class="form-row">
            <div class="form-group col">
                <label for="cli">Client</label>
                <select class="form-control" id="cli">
                    <?php
                        foreach ($listClients as $cli){
                            echo "<option value=".$cli->getId().">".$cli->getNomaAfficher()."</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="form-group col">
                <label for="dateE">Date</label>
                <input type="date" class="form-control" name="dateE" id="dateE" placeholder="jj/mm/aaaa">
                <label class="errors" id="DateEError">Entrez une date !</label>
            </div>

            <div class="form-group col">
                <label for="objet">Objet</label>
                <input type="text" class="form-control" id="objet" name="objet" placeholder="Objet">
                <label class="errors" id="ObjetError">Entrez un objet !</label>
            </div>

        </div>


        <div class="form-group">
            <label id="libellesTitre">Facturation</label>
            <div id="tableDiv">
                <table id="libellesTable">
                    <tr>
                        <td>
                            <a class="click" onclick="selectedLib(this)">
                                <label for="libelle">Libellé</label>
                                <input type="text" class="form-control" id="libelleDesc" name="libelleDesc" placeholder="Description">
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="qte">Quantité</label>
                                        <input type="text" class="form-control" id="qte" name="qte" placeholder="Quantité">
                                    </div>
                                    <div class="form-group col">
                                        <label for="prixU">P.U. HT</label>
                                        <input type="text" class="form-control" id="prixU" name="prixU" placeholder="Prix unitaire">
                                    </div>
                                    <div class="form-group col">
                                        <label for="totalLib">Total HT</label>
                                        <p type="text" class="form-control" id="totalLib">0.00</p>
                                    </div>
                                </div>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
            <a id="addLib" class="btn btn-light">Ajouter ligne</a>
            <a id="delLib" class="btn btn-light">Supprimer ligne</a>
            <label class="errors" id="TotalError">Saisissez un libellé !</label>
        </div>

        <p id="total">Total : <span id="totalValue" type="text">0.00</span></p>


        <p id="reglementTitre">Règlement</p>

        <hr>

        <div class="form-row">
            <div class="form-group col-sm-3">
                <label for="modeR">Mode de règlement</label>
                <select class="form-control" name="modeR" id="modeR">
                    <option selected value="0">Non Payé</option>
                    <option value="1">Carte</option>
                    <option value="2">Virement</option>
                    <option value="3">Chèque</option>
                    <option value="4">Espèces</option>
                    <option value="5">Autre</option>
                </select>
            </div>

            <div class="form-group col-sm-3">
                <label for="dateP">Payé le</label>
                <input type="date" class="form-control" id="dateP" name="dateP" placeholder="jj/mm/aaaa">
            </div>

            <button type="submit" class="btn btn-dark submitB col-sm-2">Ajouter</button>
        </div>

    </form>
    <script>
        function validateForm() {
            var ok = 0;

            var list = document.getElementsByClassName("errors");
            for(var i =0 ; i<list.length;i++){
                list[i].style.display = "none";
            }

            var dateE = document.getElementById("dateE").value;
            if(dateE === "" || dateE == null){
                document.getElementById("DateEError").style.display = "inline";
                ok = 1;
            }

            var objet = document.getElementById("objet").value;
            if(objet === ""){
                document.getElementById("ObjetError").style.display = "inline";
                ok = 1;
            }

            var total = document.getElementById("totalValue").innerText;
            alert(total);
            if(total === "0.00"){
                document.getElementById("TotalError").style.display = "inline";
                ok = 1;
            }

            if(ok === 0)
                return true;
            else
                return false;
        }

        $ = (el) => document.querySelector(el);
        var tableLib = $("#libellesTable");
        var selectedElement;
        $("#addLib").addEventListener("click", (event) => {
            var tr = document.createElement("tr");
            var td = document.createElement("td");
            var a = document.createElement("a");
            var labelLib = document.createElement("label");
            var inputDesc = document.createElement("input");
            var div1 = document.createElement("div");
            var div2 = document.createElement("div");
            var labelQte = document.createElement("label");
            var inputQte = document.createElement("input");
            var div3 = document.createElement("div");
            var labelPU = document.createElement("label");
            var inputPU = document.createElement("input");
            var div4 = document.createElement("div");
            var labelTot = document.createElement("label");
            var pTot = document.createElement("p");

            setAttributes(a,{"class":"click", "onclick":"selectedLib(this)"});

            labelLib.setAttribute("for","libelle");
            labelLib.innerText = "Libellé";

            setAttributes(inputDesc, {"type":"text", "class":"form-control","id":"libelleDesc", "name":"libelleDesc", "placeholder":"Description"});

            div1.setAttribute("class","form-row");

            div2.setAttribute("class","form-group col");
            labelQte.setAttribute("for","qte");
            labelQte.innerText = "Quantité";
            setAttributes(inputQte, {"type":"text", "class":"form-control","id":"qte", "name":"qte", "placeholder":"Quantité"});
            div2.appendChild(labelQte);
            div2.appendChild(inputQte);

            div3.setAttribute("class","form-group col");
            labelPU.setAttribute("for","prixU");
            labelPU.innerText = "P.U. HT";
            setAttributes(inputPU, {"type":"text", "class":"form-control","id":"prixU", "name":"prixU", "placeholder":"Prix unitaire"});
            div3.appendChild(labelPU);
            div3.appendChild(inputPU);

            div4.setAttribute("class","form-group col");
            labelTot.setAttribute("for","totalLib");
            labelTot.innerText = "Total HT";
            setAttributes(pTot, {"type":"text", "class":"form-control","id":"totalLib"});
            pTot.innerText = "0.00";
            div4.appendChild(labelTot);
            div4.appendChild(pTot);


            div1.appendChild(div2);
            div1.appendChild(div3);
            div1.appendChild(div4);

            a.appendChild(labelLib);
            a.appendChild(inputDesc);
            a.appendChild(div1);

            td.appendChild(a);
            tr.appendChild(td);
            tableLib.appendChild(tr);
        });

        $("#delLib").addEventListener("click", (event) => {
            if(selectedElement != null){
                tableLib.removeChild(selectedElement);
            }
        });

        function setAttributes(el, attrs) {
            for(var key in attrs) {
                el.setAttribute(key, attrs[key]);
            }
        }

        function selectedLib(elmt) {
            var list = document.querySelectorAll("tr");
            for(var i =0 ; i<list.length;i++){
                list[i].style.backgroundColor = "";
            }
            selectedElement = elmt.parentElement.parentElement;
            selectedElement.style.backgroundColor = "rgba(68, 193, 255, 0.71)";
        }
        $("#addLib").click();
    </script>
</section>
<footer>
    <a class="btn btn-danger deco" href="index.php?action=deconnexion">Deconnexion</a>
</footer>
<script src="vues/js/bootstrap.min.js"></script>
</body>
</html>
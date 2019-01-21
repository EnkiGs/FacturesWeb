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
    <header class="container-fluid">
        <a class="btn btn-danger co" href="?action=deconnexion">Deconnexion</a>
        <a class="btn btn-info add" href="?action=inscriptionClick">Ajouter un admin</a>   
    </header>
    <section class="container-fluid">
        <h2> Actualités les mieux notées : </h2>
      <div id="BestNews">
         <?php
            if(!empty($listB)){
                foreach($listB as $lb){
                    echo "<section class='news'>
                        <p>".$lb->getDate()."    </p>
                        <p>Titre : <a href='".$lb->getURLTitre()."'>".$lb->getTitre()."</a></p><br/>
                        <div>Description : ".$lb->getDescription()."</p></div>
                        </section>";                
                }
            }
            
            else{
                echo 'Pas de News ... :( ';
            }

         ?>
      </div>
        <h2> Actualités : </h2>
        <div id="news">
            <?php
            if(!empty($listN)){
                foreach($listN as $news){
                    echo "<section class='news'>
                        <p>".$news->getDate()."    </p>
                        <p>Titre : <a href='".$lb->getURLTitre()."'>".$lb->getTitre()."</a></p><br/>
                        <div>Description : ".$news->getDescription()."</div>
                        </section>";
                }
            }
            else{
                echo 'Pas de News ... :( ';
            }

            ?>
        </div>
        
    </section>
    <footer>
        <nav class="navbar fixed-bottom">
            <div class="container-fluid mx-auto" >
                <ul class="nav navbar-nav">
                    <li class="bouton" ><a href="?<?php echo "nbPage=".($nbPage-1).""; ?>"><<</a></li>
                    <li class="bouton" ><a href="?<?php echo "nbPage=1";?>">1</a></li>
                    <li><a><strong>...</strong></a></li>
                    <li class="bouton" ><a href="?<?php echo "nbPage=".$pagespossibles."";?>"><?php echo $pagespossibles?></a></li>
                    <li class="bouton" ><a href="?<?php echo "nbPage=".($nbPage+1)."";?>">>></a></li>
                </ul>
            </div>
        </nav>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/java.js">
    </script>
  </body>
</html>
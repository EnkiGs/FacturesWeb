<?php

class VisitorController {

    function __construct() {
    	global $rep,$vues; // nécessaire pour utiliser variables globales
        //session_start();


        //debut

        //on initialise un tableau d'erreur
        $erreurs = array();
        try
        {
            if(isset($_REQUEST['action'])==false){
                $action=NULL;
            }
            else{
                $action=Nettoyage::nettoyerString($_REQUEST['action']);
            }

            switch($action) {

                //pas d'action, on réinitialise 1er appel
                case NULL:
                    $this->pageCo(NULL);
                    break;
                    
                case "connexion":
                    $this->connexion();
                    break;

                case "addUser":
                    $this->addUser();
                    break;


                //mauvaise action
                default:
                    $erreurs[] = "Erreur d'appel php";
                    require ($rep.$vues['erreur']);
                    break;
        }

        } catch (PDOException $e)
        {
            //si erreur BD, pas le cas ici
            $erreurs[] =	"Erreur inattendue!!! PDO... ";
            $erreurs[] =	$e;
            require ($rep.$vues['erreur']);

        }
        catch (Exception $e2)
        {
            $erreurs[] =	"Erreur inattendue!!! ";
            require ($rep.$vues['erreur']);
        }

        //fin
        exit(0);
    }//fin constructeur


    private function pageCo($tabE) {
        global $rep,$vues; // nécessaire pour utiliser variables globales*
        require_once($rep.$vues['connexion']);
    }

    private function connexion(){
        global $rep,$vues;
        $erreurs = array();

        $login=$_POST['login'];
        $pwd=$_POST['passwd'];
        $m= new ModeleUser();
        $user = $m->connexion($login,$pwd);
        switch ($user){
            case 0:
                $tabE[]="Identifiant incorrect";
                $this->pageCo($tabE);
                break;

            case 1:
                $tabE[]="Mot de passe incorrect";
                $this->pageCo($tabE);
                break;

            case 2:
                $_REQUEST['action']='accueil';
                new UserController();
                break;

            default:
                $erreurs[] = "Erreur inattendue connexion!!! ";
                require ($rep.$vues['erreur']);
                break;
        }
    }

    private function addUser()
    {
        $login = Nettoyage::nettoyerString($_GET['login']);
        $pwd = Nettoyage::nettoyerString($_GET['pwd']);
        $nom = Nettoyage::nettoyerString($_GET['nom']);
        $num = Nettoyage::nettoyerString($_GET['num']);
        $email = Nettoyage::nettoyerString($_GET['email']);
        $mu = new ModeleUser();
        $mu->addUser($login,$pwd,$nom,$num,$email,[NULL,NULL,NULL],NULL);
    }

}//fin class

?>

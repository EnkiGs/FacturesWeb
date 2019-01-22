<?php

class VisitorController {

    function __construct() {
    	global $rep,$vues; // nécessaire pour utiliser variables globales
        //session_start();


        //debut

        //on initialise un tableau d'erreur
        $erreurs = array ();

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
                    $this->pageCo();
                    break;
                    
                case "connexion":
                    $this->connexion();
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


    private function pageCo() {
        global $rep,$vues; // nécessaire pour utiliser variables globales*
        require_once($rep.$vues['connexion']);
    }

    private function connexion(){
        global $rep,$vues; // nécessaire pour utiliser variables globales
        $login=$_POST['login'];
        $pwd=$_POST['passwd'];
        $m= new ModeleUser();
        $user = $m->connexion($login,$pwd);
        if($user==NULL){
            $this->pageCo();
        }
        else{
            $_REQUEST['action']='accueil';
            new UserController();
        }
    }

}//fin class

?>

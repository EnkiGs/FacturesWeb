<?php
/**
 * Created by PhpStorm.
 * User: fanarboux
 * Date: 13/12/18
 * Time: 08:49
 */

class UserController
{
    public function __construct()
    {
        global $rep,$vues; // nécessaire pour utiliser variables globales

        $erreurs = array ();
        $mdlUser=new ModeleUser();
        if($mdlUser->isUser()==NULL){
            require($rep.$vues['connexion']);
        }

        try
        {
            $action=Nettoyage::nettoyerString($_REQUEST['action']);

            switch($action) {
                case "accueil":
                    $this->accueil();
                    break;
                case "factures":
                    break;
                case "clients":
                    break;
                case "addFactureButton":
                    break;
                case "addClientButton":
                    break;
                case "addFacture":
                    break;
                case "addClient":
                    break;
                case "rechercher":
                    break;
                case "seeFact":
                    break;
                case "updateFact":
                    break;
                case "pdfFact":
                    break;
                case "updateClient":
                    break;


                /*case "inscriptionClick":
                    $this->inscriptionClick();
                    break;

                case "inscription":
                    $this->inscription();
                    break;*/

                case "deconnexion":
                    $this->deconnexion();
                    break;
                //mauvaise action
                default:
                    $erreurs[] =	"Erreur d'appel php";
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

    private function accueil() {
        global $rep,$vues; // nécessaire pour utiliser variables globales
        require($rep.$vues['accueil']);
    }

    /*private function inscriptionClick()
    {
        global $rep,$vues; // nécessaire pour utiliser variables globales
        require($rep.$vues['inscritpion']);
    }

    private function inscription(){
        global $rep,$vues; // nécessaire pour utiliser variables globales
        $login=$_POST['login'];
        $pwd=$_POST['passwd'];
        $m= new ModeleUser();
        $admin = $m->inscription($login,$pwd);
        if($admin==NULL){
            require($rep.$vues['inscitpionerror']);
        }
        else{
            $_REQUEST['action']=NULL;
            new UserController();
        }
    }*/

    private function deconnexion()
    {
        global $rep,$vues; // nécessaire pour utiliser variables globales
        $m = new ModeleUser();
        $m->deconnexion();
        $_REQUEST['action']=NULL;
        new VisitorController();
    }



}
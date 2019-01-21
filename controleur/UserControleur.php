<?php

class UserControleur {

    function __construct() {
    	global $rep,$vues; // nécessaire pour utiliser variables globales
        // on démarre ou reprend la session si necessaire (préférez utiliser un modèle pour gérer vos session ou cookies)
        //session_start();


        //debut

        //on initialise un tableau d'erreur
        $dVueEreur = array ();

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
                    $this->princUser();
                    break;
                    
                case "connexion":
                    $this->connexion();
                    break;

                case "connexionClick":
                    $this->connexionClick();
                    break;

                case "ajouterAdmin":
                    $this->ajouterAdmin();
                    break;
                //mauvaise action
                default:
                    $dVueErreur[] =	"Erreur d'appel php";
                    require ($rep.$vues['erreur']);
                    break;
        }

        } catch (PDOException $e)
        {
            //si erreur BD, pas le cas ici
            $dVueErreur[] =	"Erreur inattendue!!! PDO... ";
            $dVueErreur[] =	$e;
            require ($rep.$vues['erreur']);

        }
        catch (Exception $e2)
        {
            $dVueErreur[] =	"Erreur inattendue!!! ";
            require ($rep.$vues['erreur']);
        }

        //fin
        exit(0);
    }//fin constructeur


    private function princUser() {
        global $rep,$vues,$nbPage; // nécessaire pour utiliser variables globales
        $r=Validation::validerNumPage($nbPage);
        if($r==false)
            $nbPage=1;
        $m=new ModeleNews();
        $nbN=$m->nbNews();
        if($nbN==0){
            $nbN=1;
        }
        $pagespossibles=(int)($nbN/10);
        if($nbN%10!=0){
            $pagespossibles=$pagespossibles+1;
        }
        if($nbPage>$pagespossibles){
            $nbPage=$pagespossibles;
        }
        $listN=$m->getNews($nbPage);
        $listB=$m->getBest();
        require_once($rep.$vues['vitrine']);
    }

    private function connexion(){
        global $rep,$vues; // nécessaire pour utiliser variables globales
        $login=$_POST['login'];
        $pwd=$_POST['passwd'];
        $m= new ModeleAdmin();
        $admin = $m->connexion($login,$pwd);
        if($admin==NULL){
            require($rep.$vues['autherror']);
        }
        else{
            $_REQUEST['action']=NULL;
            new AdminCtrl();
        }
    }

    private function connexionClick()
    {
        global $rep,$vues; // nécessaire pour utiliser variables globales
        require($rep.$vues['auth']);
    }


    private function ajouterAdmin(){
        global $rep,$vues;
        $login=Nettoyage::nettoyerString($_REQUEST['login']);
        $pwd=Nettoyage::nettoyerString($_REQUEST['pwd']);
        $mA=new ModeleAdmin();
        $mA->addAdmin($login,$pwd);
        $this->princUser();
    }

}//fin class

?>

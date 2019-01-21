<?php
/**
 * Created by PhpStorm.
 * User: fanarboux
 * Date: 13/12/18
 * Time: 08:49
 */

class AdminCtrl
{
    public function __construct()
    {
        global $rep,$vues; // nécessaire pour utiliser variables globales

        $dVueEreur = array ();
        $mdlAdmin=new ModeleAdmin();
        if($mdlAdmin->isAdmin()==NULL){
            require($rep.$vues['auth']);
        }

        try
        {
            if(!isset($_REQUEST['action'])){
                $action=NULL;
            }
            else{
                $action=Nettoyage::nettoyerString($_REQUEST['action']);
            }

            switch($action) {
                //pas d'action, on r�initialise 1er appel
                case NULL:
                    $this->princAdmin();
                    break;

                case "inscriptionClick":
                    $this->inscriptionClick();
                    break;

                case "inscription":
                    $this->inscription();
                    break;

                case "deconnexion":
                    $this->deconnexion();
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

    private function princAdmin() {  
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
        require($rep.$vues['vitrineAdmin']);
    }

    private function inscriptionClick()
    {
        global $rep,$vues; // nécessaire pour utiliser variables globales
        require($rep.$vues['inscritpion']);
    }

    private function inscription(){
        global $rep,$vues; // nécessaire pour utiliser variables globales
        $login=$_POST['login'];
        $pwd=$_POST['passwd'];
        $m= new ModeleAdmin();
        $admin = $m->inscription($login,$pwd);
        if($admin==NULL){
            require($rep.$vues['inscitpionerror']);
        }
        else{
            $_REQUEST['action']=NULL;
            new AdminCtrl();
        }
    }

    private function deconnexion()
    {
        global $rep,$vues; // nécessaire pour utiliser variables globales
        $m = new ModeleAdmin();
        $m->deconnexion();
        $_REQUEST['action']=NULL;
        new UserControleur();
    }



}
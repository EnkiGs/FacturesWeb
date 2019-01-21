<?php
/**
 * Created by PhpStorm.
 * User: fanarboux
 * Date: 13/12/18
 * Time: 07:19
 */

class FrontController
{
    public function __construct()
    {
        global $rep,$vues,$nbPage;
        session_start();
        $listeActions_Admin=array('deconnexion','inscriptionClick','inscription',NULL);
        $mdl_admin=new ModeleAdmin();
        try{
            $a=$mdl_admin->isAdmin();
            if(isset($_REQUEST['action'])==false){
                $action=NULL;
            }
            else{
                $action=Nettoyage::nettoyerString($_REQUEST['action']);
            }
            if(isset($_REQUEST['nbPage'])==true){
                $nbPage=$_REQUEST['nbPage'];
            }
            if(in_array($action,$listeActions_Admin)){
                if($a==NULL){

                    if($action==NULL){
                        new UserControleur();
                    }
                    else{
                        require($rep.$vues['auth']);
                    }
                }
                else{
                    new AdminCtrl();
                }
            }
            else{
                new UserControleur();
            }
        }
        catch (Exception $e){
            $dVueErreur[] =	"Problème FrontController";
            require ($rep.$vues['erreur']);
        }
    }
}
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
        global $rep,$vues;
        $listeActions_Visitor=array(NULL,'connexion');
        $mdl_user=new ModeleUser();
        try{
            $a=$mdl_user->isUser();
            if(isset($_REQUEST['action'])==false){
                $action=NULL;
            }
            else{
                $action=Nettoyage::nettoyerString($_REQUEST['action']);
            }
            if((!in_array($action,$listeActions_Visitor) && $a!=NULL) || ($action==NULL && $a!=NULL)){
                new UserController();
            }
            else{
                new VisitorController();
            }
        }
        catch (Exception $e){
            $erreurs[] = "Problème FrontController";
            require ($rep.$vues['erreur']);
        }
    }
}
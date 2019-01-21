<?php
/**
 * Created by PhpStorm.
 * User: fanarboux
 * Date: 18/12/18
 * Time: 11:34
 */

class ModeleAdmin
{
    private $gateway;
    public function __construct()
    {
        $this->gateway= new AdminGateway();
    }

    public function connexion($login,$pwd){
        $login=Nettoyage::nettoyerString($login);
        $pwd=Nettoyage::nettoyerString($pwd);
        $r=$this->gateway->checkAdmin($login,$pwd);
        if($r==false){
            return NULL;
        }
        $_SESSION['role']="admin";
        $_SESSION['login']=$login;
        return new Admin($login);
    }

    public function inscription($login,$pwd){
        $login=Nettoyage::nettoyerString($login);
        $pwd=Nettoyage::nettoyerString($pwd);
        $r=$this->gateway->addAdmin($login,$pwd);
        if($r==false){
            return NULL;
        }
        $_SESSION['role']="admin";
        $_SESSION['login']=$login;
        return new Admin($login);
    }

    public function deconnexion(){
        session_unset();
        session_destroy();
        $_SESSION=array();
    }

    public function isAdmin(){
        if(isset($_SESSION['login']) && isset($_SESSION['role']) && $_SESSION['role']=='admin'){
            $login=Nettoyage::nettoyerString($_SESSION['login']);
            return new Admin($login);
        }
        return NULL;
    }

    public function addAdmin($login,$pwd){
        $this->gateway->addAdmin($login,$pwd);
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: fanarboux
 * Date: 18/12/18
 * Time: 11:34
 */

class ModeleUser
{
    private $gateway;
    public function __construct()
    {
        $this->gateway= new UserGateway();
    }

    public function connexion($login,$pwd){
        $login=Nettoyage::nettoyerString($login);
        $pwd=Nettoyage::nettoyerString($pwd);
        $r=$this->gateway->checkUser($login,$pwd);
        if($r==false){
            return NULL;
        }
        $_SESSION['role']="user";
        $_SESSION['login']=$login;
        return 1;
    }

    public function inscription($login,$pwd){
        $login=Nettoyage::nettoyerString($login);
        $pwd=Nettoyage::nettoyerString($pwd);
        $r=$this->gateway->addUser($login,$pwd);
        if($r==false){
            return NULL;
        }
        $_SESSION['role']="user";
        $_SESSION['login']=$login;
        return 1;
    }

    public function deconnexion(){
        session_unset();
        session_destroy();
        $_SESSION=array();
    }

    public function isUser(){
        if(isset($_SESSION['login']) && isset($_SESSION['role']) && $_SESSION['role']=='user'){
            return 1;
        }
        return NULL;
    }

    public function addUser($login,$pwd,$nom, $num, $email, $adresse, $tel){
        return $this->gateway->addUser($login,$pwd,$nom, $num, $email, $adresse, $tel);
    }

    public function getUser($login){
        return $this->gateway->getUser($login);
    }

}
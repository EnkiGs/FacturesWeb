<?php
/**
 * Created by PhpStorm.
 * User: fanarboux
 * Date: 18/12/18
 * Time: 11:26
 */

class UserGateway
{
    private $con;

    public function __construct()
    {
        global $dsn,$login,$mdp;
        $this->con= new Connection($dsn,$login,$mdp);
    }

    public function checkUser($login,$pwd){
        $query='SELECT pwd FROM User where login=:login';
        $this->con->executeQuery($query,array(":login" => array($login,PDO::PARAM_STR)));
        $r=$this->con->getResults();
        if(count($r)!=0 && password_verify($pwd,$r[0][0])){
            return true;
        }
        return false;
    }

    public function addUser($login,$pwd,$nom, $num, $email, $adresse, $tel){
        $query='SELECT count(*) FROM User where login=:login';
        $this->con->executeQuery($query,array(":login" => array($login,PDO::PARAM_STR)));
        $r=$this->con->getResults();
        if($r[0]["count(*)"]==0){
            $pwd=password_hash($pwd, PASSWORD_DEFAULT);
            $query='INSERT into User values(:login,:pwd,:nom, :num, :email, :rue, :codeP, :ville, :tel)';
            $this->con->executeQuery($query,array(":login" => array($login,PDO::PARAM_STR),":pwd" => array($pwd,PDO::PARAM_STR),
                                                    ":nom" => array($nom,PDO::PARAM_STR),":num" => array($num,PDO::PARAM_STR),
                                                    ":email" => array($email,PDO::PARAM_STR),":rue" => array($adresse[0],PDO::PARAM_STR),
                                                    ":codeP" => array($adresse[1],PDO::PARAM_STR),":ville" => array($adresse[2],PDO::PARAM_STR),
                                                    ":tel" => array($tel,PDO::PARAM_STR)));
            return true;
        }
        return false;
    }

    public function delUser($login){
        $query='delete from User where login=:login';
        $this->con->executeQuery($query,array(":login" => array($login,PDO::PARAM_STR)));
    }

    public function getUser($login){
        $query='SELECT * FROM User where login=:login';
        $this->con->executeQuery($query,array(":login" => array($login,PDO::PARAM_STR)));
        $r=$this->con->getResults();
        foreach ($r as $item){
            return  new User($item['login'],$item['nom'],$item['num'],$item['email'],[$item['rue'],$item['codeP'],$item['ville']],$item['tel']);
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: fanarboux
 * Date: 18/12/18
 * Time: 11:26
 */

class AdminGateway
{
    private $con;

    public function __construct()
    {
        global $dsn,$login,$mdp;
        $this->con= new Connection($dsn,$login,$mdp);
    }

    public function checkAdmin($login,$pwd){
        $query='SELECT pwd FROM Admin where login=:login';
        $this->con->executeQuery($query,array(":login" => array($login,PDO::PARAM_STR)));
        $r=$this->con->getResults();
        if(count($r)!=0 && password_verify($pwd,$r[0][0])){
            return true;
        }
        return false;
    }

    public function addAdmin($login,$pwd){
        $query='SELECT count(*) FROM Admin where login=:login';
        $this->con->executeQuery($query,array(":login" => array($login,PDO::PARAM_STR)));
        $r=$this->con->getResults();
        if($r[0]["count(*)"]==0){
            $pwd=password_hash($pwd, PASSWORD_DEFAULT);
            $query='INSERT into Admin values(:login,:pwd)';
            $this->con->executeQuery($query,array(":login" => array($login,PDO::PARAM_STR),":pwd" => array($pwd,PDO::PARAM_STR)));
            return true;
        }
        return false;
    }

    public function delAdmin($login,$pwd){
        $query='delete from Admin where login=:login';
        $this->con->executeQuery($query,array(":login" => array($login,PDO::PARAM_STR)));
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 24/01/2019
 * Time: 19:16
 */

class ClientGateway
{
    private $con;
    private $tabC;

    public function __construct()
    {
        global $dsn,$login,$mdp;
        $this->con= new Connection($dsn,$login,$mdp);
        $this->tabC=array();
    }

    public function findClientById($id){
        $query='SELECT count(*) FROM Factures_Client WHERE id=:id';
        $this->con->executeQuery($query,array(':id'=>array($id,PDO::PARAM_STR)));
        $results = $this->con->getResults();
        if($results[0]["count(*)"]==0)
            return false;
        return true;
    }

    public function findClientByName($name){
        $query='SELECT count(*) FROM Factures_Client WHERE nomaAfficher=:name';
        $this->con->executeQuery($query,array(':name'=>array($name,PDO::PARAM_STR)));
        $results = $this->con->getResults();
        if($results[0]["count(*)"]==0)
            return false;
        return true;
    }

    public function findAllClients(){
        $query='SELECT * FROM Factures_Client';
        $this->con->executeQuery($query);
        $results = $this->con->getResults();
        foreach ($results as $row){
            $this->tabC[]= new Client($row['id'],$row['statut'],$row['nom'],$row['civ'],$row['email'],[$row['rue'],$row['codeP'],$row['ville']],$row['societe'],$row['prenom'],$row['tel'],$row['nomaAfficher']);
        }
        return $this->tabC;
    }

    public function addClient($statut,$nom,$civ, $email, $rue, $codeP, $ville,$societe,$prenom, $tel, $nomaAfficher){
        $r=$this->findClientByName($nomaAfficher);
        if(!$r){
            $query='INSERT into Factures_Client values(:id,:statut,:societe,:nom, :prenom, :civ, :email, :tel,:rue,:codeP, :ville,:nomaAfficher)';
            $this->con->executeQuery($query,array(":id" => array(getGUID(),PDO::PARAM_STR),":statut" => array($statut,PDO::PARAM_STR),
                ":nom" => array($nom,PDO::PARAM_STR),":civ" => array($civ,PDO::PARAM_STR),
                ":email" => array($email,PDO::PARAM_STR),":rue" => array($rue,PDO::PARAM_STR),
                ":codeP" => array($codeP,PDO::PARAM_STR),":ville" => array($ville,PDO::PARAM_STR),
                ":societe" => array($societe,PDO::PARAM_STR), ":prenom" => array($prenom,PDO::PARAM_STR), ":tel" => array($tel,PDO::PARAM_STR),
                ":nomaAfficher" => array($nomaAfficher,PDO::PARAM_STR)));
        }
        return !$r;
    }

    public function updateClient($id,$statut,$nom,$civ, $email, $rue, $codeP, $ville,$societe,$prenom, $tel, $nomaAfficher){
        $r=$this->findClientById($id);
        if($r) {
            $query = 'UPDATE Factures_Client SET statut=:statut, nom=:nom, civ=:civ, email=:email, rue=:rue, codeP=:codeP, ville=:ville, societe=:societe, prenom=:prenom, tel=:tel, nomaAfficher=:nomaAfficher WHERE id=:id';
            $this->con->executeQuery($query, array(":id" => array($id, PDO::PARAM_STR), ":statut" => array($statut, PDO::PARAM_STR),
                ":nom" => array($nom, PDO::PARAM_STR), ":civ" => array($civ, PDO::PARAM_STR),
                ":email" => array($email, PDO::PARAM_STR), ":rue" => array($rue, PDO::PARAM_STR),
                ":codeP" => array($codeP, PDO::PARAM_STR), ":ville" => array($ville, PDO::PARAM_STR),
                ":societe" => array($societe, PDO::PARAM_STR), ":prenom" => array($prenom, PDO::PARAM_STR), ":tel" => array($tel, PDO::PARAM_STR),
                ":nomaAfficher" => array($nomaAfficher, PDO::PARAM_STR)));
        }
        return !$r;
    }

    public function delClient($cli){
        $query='DELETE FROM Factures_Client where id=:id';
        $this->con->executeQuery($query,array(':id'=>array($cli->getId(),PDO::PARAM_STR)));

    }

    public function nbClients(){
        $query='SELECT count(*) FROM Factures_Client';
        $this->con->executeQuery($query,array());
        $results = $this->con->getResults();
        return $results[0]["count(*)"];
    }
}
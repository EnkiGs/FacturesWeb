<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 24/01/2019
 * Time: 19:17
 */

class FactureGateway
{
    private $con;
    private $tabF;
    private $tabL;

    public function __construct()
    {
        global $dsn,$login,$mdp;
        $this->con= new Connection($dsn,$login,$mdp);
        $this->tabF=array();
    }

    public function findFactureById($id){
        $query='SELECT count(*) FROM Factures_Facture WHERE id=:id';
        $this->con->executeQuery($query,array(':id'=>array($id,PDO::PARAM_STR)));
        $results = $this->con->getResults();
        if($results[0]["count(*)"]==0)
            return false;
        return true;
    }

    public function findFactureByRef($ref){
        $query='SELECT count(*) FROM Factures_Facture WHERE ref=:ref';
        $this->con->executeQuery($query,array(':ref'=>array($ref,PDO::PARAM_STR)));
        $results = $this->con->getResults();
        if($results[0]["count(*)"]==0)
            return false;
        return true;
    }

    public function findAllFactures(){
        $query='SELECT * FROM Factures_Facture';
        $this->con->executeQuery($query);
        $results = $this->con->getResults();
        foreach ($results as $row){
            $libelles=$this->findLibelles($row['id']);
            $this->tabF[]= new Facture($row['id'],$row['ref'],$row['client'],$row['dateE'],$row['objet'],$row['total'],$row['modeP'],$row['dateP'],$libelles);
        }
        return $this->tabF;
    }

    public function addFacture($ref, $client,$dateE,$objet,$total,$modeP,$dateP,$libelles){
        $r=$this->findFactureByRef($ref);
        if(!$r){
            $query='INSERT into Factures_Facture values(:id, :ref, :client, :dateE, :objet, :total, :modeP, :dateP)';
            $this->con->executeQuery($query,array(":id" => array(getGUID(),PDO::PARAM_STR),":ref" => array($ref,PDO::PARAM_STR),
                ":client" => array($client,PDO::PARAM_STR),":dateE" => array($dateE,PDO::PARAM_STR),
                ":objet" => array($objet,PDO::PARAM_STR),":total" => array($total,PDO::PARAM_STR),
                ":modeP" => array($modeP,PDO::PARAM_STR),":dateP" => array($dateP,PDO::PARAM_STR)));
            foreach ($libelles as $lib){
                $this->addLibelle($lib);
            }
        }
        return !$r;
    }

    public function updateFacture($id,$ref,$client,$dateE,$objet,$total,$modeP,$dateP,$libelles){
        $r=$this->findFactureById($id);
        if(!$r){
            $query = 'UPDATE Factures_Facture SET ref=:ref, client=:client, dateE=:dateE, objet=:objet, total=:total, modeP=:modeP, dateP=:dateP WHERE id=:id';
            $this->con->executeQuery($query,array(":id" => array($id,PDO::PARAM_STR),":ref" => array($ref,PDO::PARAM_STR),
                ":client" => array($client,PDO::PARAM_STR),":dateE" => array($dateE,PDO::PARAM_STR),
                ":objet" => array($objet,PDO::PARAM_STR),":total" => array($total,PDO::PARAM_STR),
                ":modeP" => array($modeP,PDO::PARAM_STR),":dateP" => array($dateP,PDO::PARAM_STR)));

            $this->delLibellebyFacture($id);

            foreach ($libelles as $lib){
                $this->addLibelle($lib);
            }
        }
        return !$r;
    }

    public function nbFactures(){
        $query='SELECT count(*) FROM Factures_Facture';
        $this->con->executeQuery($query,array());
        $results = $this->con->getResults();
        return $results[0]["count(*)"];
    }


    public function totalFactures()
    {
        $tabFact = $this->findAllFactures();
        $tot = 0;
        foreach ($tabFact as $f){
            $tot+=$f->getTotal();
        }
        return $tot;
    }

    //Libelles


    public function findLibelles($id)
    {
        $tabL = array();
        $query='SELECT * FROM Factures_Libelle where facture=:facture';
        $this->con->executeQuery($query,array(":facture" => array($id,PDO::PARAM_STR)));
        $results = $this->con->getResults();
        foreach ($results as $row){
            $tabL[] = new Libelle($row['id'],$row['facture'],$row['description'],$row['prixU'],$row['qte'],$row['total']);
        }
        return $this->tabL;
    }

    public function addLibelle($lib){
        $query='INSERT into Factures_Libelle values(:id, :facture, :description, :prixU, :qte, :total)';
        $this->con->executeQuery($query,array(":id" => array(getGUID(),PDO::PARAM_STR),":facture" => array($lib->getFacture(),PDO::PARAM_STR),
            ":description" => array($lib->getDescription(),PDO::PARAM_STR),":prixU" => array($lib->getPrixU(),PDO::PARAM_STR),
            ":qte" => array($lib->getQte(),PDO::PARAM_STR),":total" => array($lib->getTotal(),PDO::PARAM_STR)));
    }

    public function delLibellebyFacture($facture){
        $query = 'DELETE FROM Factures_Libelle where facture=:facture';
        $this->con->executeQuery($query, array(':facture' => array($facture, PDO::PARAM_STR)));
    }

}
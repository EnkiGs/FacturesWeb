<?php
/**
 * Created by PhpStorm.
 * User: fanarboux
 * Date: 06/12/18
 * Time: 07:47
 */

class NewsGateway
{
    private $con;
    private $tabN;
    private $tabB;

    public function __construct()
    {
        global $dsn,$login,$mdp;
        $this->con= new Connection($dsn,$login,$mdp);
        $this->tabN=array();
        $this->tabB=array();
    }

    private function findNews($news){
        $query='SELECT count(*) FROM News WHERE titre=:titre';
        $this->con->executeQuery($query,array(':titre'=>array($news->getTitre(),PDO::PARAM_STR)));
        $results = $this->con->getResults();
        if($results[0]["count(*)"]==0)
            return false;
        return true;
    }

    public function findAllNews($numP){
        $query='SELECT * FROM News order by date desc limit :page,10';
        $this->con->executeQuery($query,array(':page'=>array(($numP-1)*10+1,PDO::PARAM_INT)));
        $results = $this->con->getResults();
        foreach ($results as $row){
            $this->tabN[]= new News($row['titre'],$row['URLTitre'],$row['description'],$row['site'],$row['URLSite'],$row['date'],$row['note']);
        }
        return $this->tabN;
    }

    public function findBest(){
        $query='SELECT * FROM News order by note desc limit 1,3';
        $this->con->executeQuery($query);
        $results = $this->con->getResults();
        foreach ($results as $row){
            $this->tabB[]= new News($row['titre'],$row['URLTitre'],$row['description'],$row['site'],$row['URLSite'],$row['date'],$row['note']);
        }
        return $this->tabB;
    }

    public function addModifyNews($news){
        $r=$this->findNews($news);
        if($r){
            $query='UPDATE News SET URLTitre=:URLTitre, description=:description,date=:d,note=:note WHERE titre=:titre ';
            $this->con->executeQuery($query,array(':titre'=>array($news->getTitre(),PDO::PARAM_STR),':URLTitre'=>array($news->getURLTitre(),PDO::PARAM_STR),':description'=>array($news->getDescription(),PDO::PARAM_STR),':d'=>array($news->getDate(),PDO::PARAM_STR),':note'=>array($news->getNote(),PDO::PARAM_INT)));
        }
        else{
            $query='INSERT INTO News VALUES(:titre,:URLTitre,:description,:site,:URLSite,:d,:note)';
            $this->con->executeQuery($query,array(':titre'=>array($news->getTitre(),PDO::PARAM_STR),':URLTitre'=>array($news->getURLTitre(),PDO::PARAM_STR),':description'=>array($news->getDescription(),PDO::PARAM_STR),':d'=>array($news->getDate(),PDO::PARAM_STR),':site'=>array($news->getSite(),PDO::PARAM_STR),':URLSite'=>array($news->getURLSite(),PDO::PARAM_STR),':note'=>array($news->getnote(),PDO::PARAM_INT)));
        }
       

    }

    public function delNews($titre){
        $query='DELETE FROM News where titre=:titre';
        $this->con->executeQuery($query,array(':titre'=>array($titre,PDO::PARAM_STR)));

    }
    public function nbNews(){
        $query='SELECT count(*) FROM News';
        $this->con->executeQuery($query,array());
        $results = $this->con->getResults();
        return $results[0]["count(*)"];
    }
}
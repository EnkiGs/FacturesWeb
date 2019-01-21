<?php
/**
 * Created by PhpStorm.
 * User: fanarboux
 * Date: 06/12/18
 * Time: 07:38
 */

class ModeleNews
{
    private $gateway;
    public function __construct()
    {
        $this->gateway= new NewsGateway();
    }

    public function getNews($numP){
        return $this->gateway->findAllNews($numP);
    }

    public function addNews($news){
        $this->gateway->addModifyNews($news);
    }

    public function delNews($titre){
        $this->gateway->delNews($titre);
    }

    public function getBest(){
        return $this->gateway->findBest();
    }
    public function nbNews(){
        return $this->gateway->nbNews();
    }

}
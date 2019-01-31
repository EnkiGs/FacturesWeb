<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 24/01/2019
 * Time: 19:17
 */

class ModeleFacture
{
    private $gateway;
    public function __construct()
    {
        $this->gateway= new FactureGateway();
    }

    public function getFactures(){
        return $this->gateway->findAllFactures();
    }

    public function getFactureById($id){
        return $this->gateway->findFactureById($id);
    }

    public function getFactureByRef($ref){
        return $this->gateway->findFactureByRef($ref);
    }

    public function addFacture($client,$ref,$dateE,$objet,$total,$modeP,$dateP,$libelles){
        return $this->gateway->addFacture($ref,$client,$dateE,$objet,$total,$modeP,$dateP,$libelles);
    }

    public function updateFacture($id,$ref,$client,$dateE,$objet,$total,$modeP,$dateP,$libelles){
        return $this->gateway->updateFacture($id,$ref,$client,$dateE,$objet,$total,$modeP,$dateP,$libelles);
    }

    public function nbFactures(){
        return $this->gateway->nbFactures();
    }

    public function totalFactures(){
        return $this->gateway->totalFactures();
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 24/01/2019
 * Time: 19:16
 */

class ModeleClient
{
    private $gateway;
    public function __construct()
    {
        $this->gateway= new ClientGateway();
    }

    public function getClients(){
        return $this->gateway->findAllClients();
    }

    public function getClientById($id){
        return $this->gateway->findClientById($id);
    }

    public function getClientByName($name){
        return $this->gateway->findClientByName($name);
    }

    public function addClient($statut,$nom,$civ, $email, $rue, $codeP, $ville,$societe,$prenom, $tel, $nomaAfficher){
        return $this->gateway->addClient($statut,$nom,$civ, $email, $rue, $codeP, $ville,$societe,$prenom, $tel, $nomaAfficher);
    }

    public function updateClient($id,$statut,$nom,$civ, $email, $rue, $codeP, $ville,$societe,$prenom, $tel, $nomaAfficher){
        return $this->gateway->updateClient($id,$statut,$nom,$civ, $email, $rue, $codeP, $ville,$societe,$prenom, $tel, $nomaAfficher);
    }

    public function delNews($cli){
        return $this->gateway->delNews($cli);
    }

    public function nbClients(){
        return $this->gateway->nbClients();
    }
}
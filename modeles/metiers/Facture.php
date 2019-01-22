<?php

class Facture
{
    private $id;
    private $client;
    private $dateE;
    private $objet;
    private $total;
    private $modeP;
    private $dateP;

    /**
     * Facture constructor.
     * @param $client
     * @param $dateE
     * @param $objet
     * @param $total
     * @param $modeP
     * @param $dateP
     */
    public function __construct($client,$dateE,$objet,$total,$modeP,$dateP)
    {
        $this->id = com_create_guid();
        $this->client = $client;
        $this->dateE = $dateE;
        $this->objet = $objet;
        $this->total = $total;
        $this->modeP = $modeP;
        $this->dateP = $dateP;
    }

/*    public function Update($newDateE, $newObjet, $newTotal, $newModeP, $newDateP)
    {
        $this->dateE = $newDateE;
        $this->objet = $newObjet;
        $this->total = $newTotal;
        $this->modeP = $newModeP;
        $this->dateP = $newDateP;
    }*/

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @param mixed $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return mixed
     */
    public function getDateE()
    {
        return $this->dateE;
    }

    /**
     * @param mixed $dateE
     */
    public function setDateE($dateE)
    {
        $this->dateE = $dateE;
    }

    /**
     * @return mixed
     */
    public function getObjet()
    {
        return $this->objet;
    }

    /**
     * @param mixed $objet
     */
    public function setObjet($objet)
    {
        $this->objet = $objet;
    }

    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

    /**
     * @return mixed
     */
    public function getModeP()
    {
        return $this->modeP;
    }

    /**
     * @param mixed $modeP
     */
    public function setModeP($modeP)
    {
        $this->modeP = $modeP;
    }

    /**
     * @return mixed
     */
    public function getDateP()
    {
        return $this->dateP;
    }

    /**
     * @param mixed $dateP
     */
    public function setDateP($dateP)
    {
        $this->dateP = $dateP;
    }


}
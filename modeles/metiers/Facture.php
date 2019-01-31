<?php

class Facture
{
    private $id;
    private $ref;
    private $client;
    private $dateE;
    private $objet;
    private $total;
    private $modeP;
    private $dateP;
    private $libelles;

    /**
     * Facture constructor.
     * @param $client
     * @param $dateE
     * @param $objet
     * @param $total
     * @param $modeP
     * @param $dateP
     */
    public function __construct($id,$ref,$client,$dateE,$objet,$total,$modeP,$dateP,$libelles)
    {
        $this->id = $id;
        $this->ref = $ref;
        $this->client = $client;
        $this->dateE = $dateE;
        $this->objet = $objet;
        $this->total = $total;
        $this->modeP = $modeP;
        $this->dateP = $dateP;
        $this->libelles = $libelles;
    }

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

    /**
     * @return mixed
     */
    public function getLibelles()
    {
        return $this->libelles;
    }

    /**
     * @param mixed $libelles
     */
    public function setLibelles($libelles)
    {
        $this->libelles = $libelles;
    }

    /**
     * @return mixed
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * @param mixed $ref
     */
    public function setRef($ref)
    {
        $this->ref = $ref;
    }


}
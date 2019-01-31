<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 21/01/2019
 * Time: 19:34
 */

class Libelle
{

    private $id;
    private $facture;
    private $description;
    private $prixU;
    private $qte;
    private $total;

    /**
     * Libelle constructor.
     * @param $facture
     * @param $description
     * @param $prixU
     * @param $qte
     * @param $total
     */
    public function __construct($id, $facture, $description, $prixU, $qte, $total)
    {
        $this->id = $id;
        $this->facture = $facture;
        $this->description = $description;
        $this->prixU = $prixU;
        $this->qte = $qte;
        $this->total = $total;
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
    public function getFacture()
    {
        return $this->facture;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPrixU()
    {
        return $this->prixU;
    }

    /**
     * @param mixed $prixU
     */
    public function setPrixU($prixU)
    {
        $this->prixU = $prixU;
    }

    /**
     * @return mixed
     */
    public function getQte()
    {
        return $this->qte;
    }

    /**
     * @param mixed $qte
     */
    public function setQte($qte)
    {
        $this->qte = $qte;
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
}
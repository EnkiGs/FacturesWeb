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
    public function __construct($facture, $description, $prixU, $qte, $total)
    {
        $this->id = com_create_guid();
        $this->facture = $facture;
        $this->description = $description;
        $this->prixU = $prixU;
        $this->qte = $qte;
        $this->total = $total;
    }
}
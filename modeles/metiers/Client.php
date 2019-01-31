<?php

class Client
{
    private $id;
    private $statut;
    private $societe;
    private $nom;
    private $prenom;
    private $civ;
    private $email;
    private $tel;
    private $adresse;
    private $nomaAfficher;

    /**
     * Client constructor.
     * @param $statut
     * @param $nom
     * @param $civ
     * @param $email
     * @param $adresse
     * @param $societe
     * @param $prenom
     * @param $tel
     */
    public function __construct($id, $statut,$nom, $civ, $email, $adresse, $societe, $prenom, $tel,$nomaAfficher)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->societe = $societe;
        $this->prenom = $prenom;
        $this->tel = $tel;
        $this->civ = $civ;
        $this->email = $email;
        $this->adresse = $adresse;
        $this->statut = $statut;
        $this->nomaAfficher = $nomaAfficher;
    }

    /**
     * @return mixed
     */
    public function getSociete()
    {
        return $this->societe;
    }

    /**
     * @param mixed $societe
     */
    public function setSociete($societe)
    {
        $this->societe = $societe;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getCiv()
    {
        return $this->civ;
    }

    /**
     * @param mixed $civ
     */
    public function setCiv($civ)
    {
        $this->civ = $civ;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getNomaAfficher()
    {
        return $this->nomaAfficher;
    }

    /**
     * @param mixed $nomaAfficher
     */
    public function setNomaAfficher($nomaAfficher)
    {
        $this->nomaAfficher = $nomaAfficher;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }
}

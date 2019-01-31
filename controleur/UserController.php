<?php
/**
 * Created by PhpStorm.
 * User: fanarboux
 * Date: 13/12/18
 * Time: 08:49
 */

class UserController
{
    public function __construct()
    {
        global $rep,$vues; // nécessaire pour utiliser variables globales

        $erreurs = array ();
        $mdlUser=new ModeleUser();
        if($mdlUser->isUser()==NULL){
            require($rep.$vues['connexion']);
        }

        try
        {
            $action=Nettoyage::nettoyerString($_REQUEST['action']);

            switch($action) {
                case NULL:
                case "accueil":
                    $this->accueil();
                    break;
                case "factures":
                    $this->factures();
                    break;
                case "clients":
                    $this->clients();
                    break;
                case "addFactureButton":
                    $this->addFactureWindow();
                    break;
                case "addClientButton":
                    $this->addClientWindow();
                    break;
                case "addFacture":
                    $this->addFacture();
                    break;
                case "addClient":
                    $this->addClient();
                    break;
                case "rechercher":
                    $this->rechercher();
                    break;
                case "seeFact":
                    break;
                case "updateFact":
                    break;
                case "pdfFact":
                    break;
                case "updateClient":
                    break;


                /*case "inscriptionClick":
                    $this->inscriptionClick();
                    break;

                case "inscription":
                    $this->inscription();
                    break;*/

                case "deconnexion":
                    $this->deconnexion();
                    break;
                //mauvaise action
                default:
                    $erreurs[] =	"Erreur d'appel php";
                    require ($rep.$vues['erreur']);
                    break;
            }

        } catch (PDOException $e)
        {
            //si erreur BD, pas le cas ici
            $erreurs[] =	"Erreur inattendue!!! PDO... ";
            $erreurs[] =	$e;
            require ($rep.$vues['erreur']);

        }
        catch (Exception $e2)
        {
            $erreurs[] =	"Erreur inattendue!!! ";
            require ($rep.$vues['erreur']);
        }

//fin
        exit(0);
    }//fin constructeur

    private function accueil() {
        global $rep,$vues; // nécessaire pour utiliser variables globales
        $mc = new ModeleUser();
        $c = $mc->getUser(Nettoyage::nettoyerString($_SESSION['login']));
        $user = $c->getNom();
        require($rep.$vues['accueil']);
    }


    private function deconnexion()
    {
        global $rep,$vues; // nécessaire pour utiliser variables globales
        $m = new ModeleUser();
        $m->deconnexion();
        $_REQUEST['action']=NULL;
        new VisitorController();
    }

    private function factures()
    {
        global $rep,$vues; // nécessaire pour utiliser variables globales
        $mf = new ModeleFacture();
        $listF = $mf->getFactures();
        $totalFact = $mf->totalFactures();
        require($rep.$vues['factures']);
    }

    private function clients()
    {
        global $rep,$vues; // nécessaire pour utiliser variables globales
        $mc = new ModeleClient();
        $listC = $mc->getClients();
        require($rep.$vues['clients']);
    }

    private function addFactureWindow()
    {
        global $rep,$vues; // nécessaire pour utiliser variables globales
        $mc = new ModeleClient();
        $listClients = $mc->getClients();
        require($rep.$vues['addfacture']);
    }

    private function addClientWindow()
    {
        global $rep,$vues; // nécessaire pour utiliser variables globales
        require($rep.$vues['addclient']);
    }

    private function addFacture()
    {
        $this->accueil();
    }

    private function addClient()
    {
        global $rep,$vues;
        $statut = Nettoyage::nettoyerString($_POST['statut']);
        $societe = Nettoyage::nettoyerString($_POST['societe']);
        $nom = Nettoyage::nettoyerString($_POST['nom']);
        $prenom = Nettoyage::nettoyerString($_POST['prenom']);
        $civ = Nettoyage::nettoyerString($_POST['civ']);
        $rue = Nettoyage::nettoyerString($_POST['rue']);
        $codeP = Nettoyage::nettoyerString($_POST['codeP']);
        $ville = Nettoyage::nettoyerString($_POST['ville']);
        $email = Nettoyage::nettoyerString($_POST['email']);
        $tel = Nettoyage::nettoyerString($_POST['tel']);
        if($civ==0){
            $nomaAfficher = $societe;
        }
        else{
            $nomaAfficher = $prenom." ".$nom;
        }

        if($nomaAfficher==NULL || $nomaAfficher == ""){
            global $rep,$vues;
            $errClient[] = "Champs vides";
            require($rep.$vues['addclient']);
            return;
        }
        $mc = new ModeleClient();
        $r = $mc->addClient($statut,$nom,$civ,$email,$rue,$codeP,$ville,$societe,$prenom,$tel,$nomaAfficher);
        if($r)
            $okClient[] = "Client ajouté";
        else{
            $errClient[] = "Client existant";
        }
        require($rep.$vues['addclient']);
    }

    private function rechercher()
    {
        global $rep,$vues; // nécessaire pour utiliser variables globales
        require($rep.$vues['addclient']);
    }


    /*private function inscriptionClick()
    {
        global $rep,$vues; // nécessaire pour utiliser variables globales
        require($rep.$vues['inscritpion']);
    }

    private function inscription(){
        global $rep,$vues; // nécessaire pour utiliser variables globales
        $login=$_POST['login'];
        $pwd=$_POST['passwd'];
        $m= new ModeleUser();
        $admin = $m->inscription($login,$pwd);
        if($admin==NULL){
            require($rep.$vues['inscitpionerror']);
        }
        else{
            $_REQUEST['action']=NULL;
            new UserController();
        }
    }*/


}
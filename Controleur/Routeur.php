<?php


require_once 'ControleurAccueil.php';
require_once 'ControleurTicket.php';
require_once 'ControleurEtat.php';
require_once 'Vue/Vue.php';
class Routeur
{
    private $ctrlAccueil;
    private $ctrlTicket;
    private $ctrlEtat;
    public function __construct()
    {
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlTicket = new ControleurTicket();
        $this->ctrlEtat = new ControleurEtat();
    }
    // Traite une requête entrante
    public function routerRequete()
    {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'ticket') {
                    $idTicket = intval($this->getParametre($_GET, 'id'));
                    if ($idTicket != 0) {
                        $this->ctrlTicket->ticket($idTicket);
                    } else
                        throw new Exception("Identifiant de ticket non valide");
                } else if ($_GET['action'] == 'commenter') {
                    $auteur = $this->getParametre($_POST, 'auteur');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $idTicket = $this->getParametre($_POST, 'id');
                    $this->ctrlTicket->commenter($auteur, $contenu, $idTicket);
                } elseif ($_GET['action'] == 'ticketadd') {
                    $titre = $this->getParametre($_POST, 'titre');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $auteur = $this->getParametre($_POST, 'auteur');
                    $this->ctrlTicket->ticketadd($titre, $contenu, $auteur);
                } elseif ($_GET['action'] == 'changestatus') {
                    $idstatut = $this->getParametre($_POST, 'statut');
                    $idTicket = $this->getParametre($_POST, 'id');
                    $this->ctrlTicket->changestatus($idTicket, $idstatut);
                } elseif ($_GET['action'] == 'supprimerticket') {
                    $idTicket = intval($this->getParametre($_GET, 'id'));
                    $this->ctrlTicket->supprimerticket($idTicket);
                } elseif ($_GET['action'] == 'gesetat') {
                    $this->ctrlEtat->etats();
                } elseif ($_GET['action'] == 'etatadd') {
                    $idetat = $this->getParametre($_POST, 'id');
                    $nometat = $this->getParametre($_POST, 'etat');
                    $this->ctrlEtat->etatadd($idetat, $nometat);
                } elseif ($_GET['action'] == 'supprimeretat') {
                    $idetat = intval($this->getParametre($_GET, 'id'));
                    $this->ctrlEtat->supprimeretat($idetat);
                } elseif ($_GET['action'] == 'modifieretat') {
                    $idetat = $this->getParametre($_POST, 'id');
                    $nometat = $this->getParametre($_POST, 'etat');
                    $this->ctrlEtat->modifieretat($idetat, $nometat);
                } elseif ($_GET['action'] == 'editeretat') {
                    $idetat = $this->getParametre($_GET, 'id');
                    $this->ctrlEtat->editeretat($idetat);
                } elseif ($_GET['action'] == 'editerticket') {
                    $idTicket = $this->getParametre($_GET, 'id');
                    $this->ctrlTicket->editerticket($idTicket);
                } elseif ($_GET['action'] == 'modifierticket') {
                    $idTicket = $this->getParametre($_POST, 'id');
                    $titre = $this->getParametre($_POST, 'titre');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $this->ctrlTicket->modifierticket($idTicket, $titre, $contenu);
                } elseif ($_GET['action'] == 'gestick') {
                    $this->ctrlTicket->tousticket();
                } else
                    throw new Exception("Action non valide");
            } else { // aucune action définie : affichage de l'accueil
                $this->ctrlAccueil->accueil();
            }
        } catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }
    // Affiche une erreur
    private function erreur($msgErreur)
    {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }
    private function getParametre($tableau, $nom)
    {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        } else
            throw new Exception("Paramètre '$nom' absent");
    }
}

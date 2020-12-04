<?php
require_once 'Modele/Ticket.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/Vue.php';
require_once 'Modele/Statut.php';
class ControleurTicket
{
    private $ticket;
    private $commentaire;
    private $statut;
    public function __construct()
    {
        $this->ticket = new Ticket();
        $this->commentaire = new Commentaire();
        $this->statut = new Statut();
    }
    // Affiche les détails sur un billet
    public function ticket($idTicket)
    {
        $ticket = $this->ticket->getTicket($idTicket);
        $commentaires = $this->commentaire->getCommentaires($idTicket);
        $statut = $this->statut->getStatut($idTicket);
        $vue = new Vue("Ticket");
        $vue->generer(array('ticket' => $ticket, 'commentaires' => $commentaires, 'statut' => $statut));
    }

    public function ticketadd($titre, $contenu, $auteur)
    {
        $this->ticket->ajouterticket($titre, $contenu, $auteur);
        header('Location: .');
        die();
    }

    public function commenter($auteur, $contenu, $idTicket)
    {
        // Sauvegarde du commentaire
        $this->commentaire->ajouterCommentaire($auteur, $contenu, $idTicket);
        // Actualisation de l'affichage du billet
        $this->ticket($idTicket);
    }
    public function changestatus($idTicket, $idstatut)
    {
        $this->statut->modifystatus($idTicket, $idstatut);
        header('Location: .');
        $this->ticket($idTicket);
    }


    public function supprimerticket($idTicket)
    {
        $this->ticket->supprimerTicket($idTicket);
        header('Location: .');
        die();
    }

    // Affiche la liste de tous les tickets du site
    public function tousticket()
    {
        $tickets = $this->ticket->getTickets();
        $vue = new Vue("Tousticket");
        $vue->generer(array('tickets' => $tickets));
    }


    public function editerticket($idTicket)
    {
        $ticket = $this->ticket->getTicket($idTicket);

        $vue = new Vue("EditerTicket");
        $vue->generer(array('ticket' => $ticket));
    }

    public function modifierticket($idTicket, $titre, $contenu)
    {
        $this->ticket->modifierTicket($idTicket, $titre, $contenu);
        header('Location: index.php');
        die();
    }
}

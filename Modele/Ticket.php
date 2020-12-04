<?php
require_once 'Modele/Modele.php';
class Ticket extends Modele
{
   // Renvoie la liste des tickets du blog
   public function getTickets()
   {
      $sql = 'select TIC_ID as id, TIC_DATE as date,'
         . ' TIC_TITRE as titre, TIC_CONTENU as contenu, TIC_AUTEUR as auteur, nometat, TIC_ETAT as id_etat'
         . ' from T_TICKET inner join T_ETATS on T_ETATS.idetat = T_TICKET.TIC_ETAT'
         . ' order by TIC_ID desc';
      $tickets = $this->executerRequete($sql);
      return $tickets;
   }
   // Renvoie les informations sur un ticket
   public function getTicket($idTicket)
   {
      $sql = 'select TIC_ID as id, TIC_DATE as date,'
         . ' TIC_TITRE as titre, TIC_CONTENU as contenu, TIC_AUTEUR as auteur, nometat as etat'
         . ' from T_TICKET inner join T_ETATS on T_ETATS.idetat = T_TICKET.TIC_ETAT'
         . ' where TIC_ID=?';
      $ticket = $this->executerRequete($sql, array($idTicket));
      if ($ticket->rowCount() > 0)
         return $ticket->fetch(); // Accès à la première ligne de résultat
      else
         throw new Exception("Aucun ticket ne correspond à l'identifiant '$idTicket'");
   }
   public function ajouterticket($titre, $contenu, $auteur)
   {
      $sql = 'insert into T_TICKET' .
         '(TIC_DATE, TIC_TITRE, TIC_CONTENU, TIC_AUTEUR, TIC_ETAT)' .
         'values(?,?,?,?,1)';
      $date = date('Y-m-d H:i:s');
      $this->executerRequete($sql, array($date, $titre, $contenu, $auteur));
   }

   public function supprimerTicket($idTicket)
   {
      $sql = 'DELETE FROM `T_TICKET` WHERE TIC_ID = ?';
      $this->executerRequete($sql, array($idTicket));
   }

   public function modifierTicket($idTicket, $titre, $contenu)
   {
      $sql = "update T_TICKET SET TIC_TITRE = ?, TIC_CONTENU = ? WHERE TIC_ID = $idTicket";
      $this->executerRequete($sql, array($titre, $contenu));
   }
}

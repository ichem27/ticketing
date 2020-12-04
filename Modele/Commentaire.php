<?php
require_once 'Modele/Modele.php';
class Commentaire extends Modele {
 // Renvoie la liste des commentaires associés à un billet
 public function getCommentaires($idTicket) {
 $sql = 'select COM_ID as id, COM_DATE as date,'
 . ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE'
 . ' where TIC_ID=?';
 $commentaires = $this->executerRequete($sql, array($idTicket));
 return $commentaires;
 }
 public function ajouterCommentaire($auteur, $contenu, $idTicket) {
    $sql = 'insert into T_COMMENTAIRE(COM_DATE, COM_AUTEUR, COM_CONTENU, TIC_ID)'
    . ' values(?, ?, ?, ?)';
    $date = date('Y-m-d H:i:s'); // Récupère la date courante
    $this->executerRequete($sql, array($date, $auteur, $contenu, $idTicket));
 }
}
?>
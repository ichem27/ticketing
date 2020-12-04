<?php
    require_once 'Modele/Modele.php';
    class Statut extends Modele{
        public function getStatut($idTicket) {
            $sql = 'select nometat as name, idetat as id'
            . ' from T_ETATS';
            $statut = $this->executerRequete($sql, array($idTicket));
            return $statut;
        }
        public function modifystatus($idTicket,$statut){
            $sql = 'update T_TICKET set'.
            ' TIC_ETAT = ? where TIC_ID = ?';
            $this->executerRequete($sql,array($statut,$idTicket));
         }
    }

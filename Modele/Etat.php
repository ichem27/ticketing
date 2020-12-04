<?php
require_once 'Modele/Modele.php';
class Etat extends Modele
{

    // Renvoie la liste des tickets du blog
    public function getEtats()
    {
        $sql = 'select * FROM T_etats';
        $etats = $this->executerRequete($sql);
        return $etats;
    }

    // Renvoie la liste des tickets du blog
    public function getEtat($idetat)
    {
        $sql = "select * FROM T_etats WHERE idetat = $idetat";
        $etats = $this->executerRequete($sql)->fetch();
        return $etats;
    }

    public function ajouteretat($idetat, $nometat)
    {
        $idetat = $this->dernieridetat() + 1;
        $sql = 'INSERT INTO T_etats' .
            '(idetat, nometat)' .
            'VALUES (?,?)';
        $this->executerRequete($sql, array($idetat, $nometat));
    }

    public function dernieridetat()
    {
        $sql = 'SELECT idetat FROM T_etats ORDER BY idetat desc';
        return (int)$this->executerRequete($sql)->fetch()[0];
    }

    public function supprimerEtat($idetat)
    {
        $sql = 'DELETE FROM `tT_etats` WHERE idetat = ?';
        $this->executerRequete($sql, array($idetat));
    }

    public function modifierEtat($idetat, $nometat)
    {
        $sql = "UPDATE T_etats SET nometat = ? WHERE idetat = $idetat";
        $this->executerRequete($sql, array($nometat));
    }
}

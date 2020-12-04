<?php
require_once 'Modele/Etat.php';
require_once 'Vue/Vue.php';
class ControleurEtat
{
    private $etat;
    public function __construct()
    {
        $this->etat = new Etat();
    }
    
    public function etats()
    {
        $etats = $this->etat->getEtats();
        $vue = new Vue("Etat");
        $vue->generer(array('etats' => $etats));
    }

    public function etatadd($idetat, $nometat)
    {
        $this->etat->ajouteretat($idetat, $nometat);
        $this->etats();
    }

    public function supprimeretat($idetat)
    {
        $this->etat->supprimerEtat($idetat);
        header('Location: index.php?action=gesetat');
        die();
    }


    public function editeretat($idetat)
    {
        $etat = $this->etat->getEtat($idetat);
        $vue = new Vue("EditerEtat");
        $vue->generer(array('etat' => $etat));
    }

    public function modifieretat($idetat, $nometat)
    {
        $this->etat->modifierEtat($idetat, $nometat);
        header('Location: index.php?action=gesetat');
    }
}

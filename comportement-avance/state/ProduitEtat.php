<?php
require_once 'Brouillon.php';

class ProduitEtat
{
    private Etat $etat;

    public function __construct()
    {
        $this->etat = new Brouillon();
    }

    public function setEtat(Etat $etat): void
    {
        $this->etat = $etat;
    }

    public function getEtat(): string
    {
        return get_class($this->etat);
    }

    public function publier(): void
    {
        $this->etat->publier($this);
    }
}

<?php
require_once '../common/Produit.php';

abstract class Handler
{
    protected ?Handler $suivant = null;

    public function setSuivant(Handler $suivant): Handler
    {
        $this->suivant = $suivant;
        return $suivant;
    }

    abstract public function traiter(Produit $produit): void;
}

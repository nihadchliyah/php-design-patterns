<?php
require_once '../common/Produit.php';
require_once 'Observateur.php';

class SmsSender implements Observateur
{
    private string $telephone;

    public function __construct(string $telephone)
    {
        $this->telephone = $telephone;
    }

    public function actualiser(Produit $produit, string $evenement): void
    {
        echo nl2br("[SMS -> {$this->telephone}] $evenement : \"{$produit->libelle}\" a {$produit->prix} €\n");
    }
}

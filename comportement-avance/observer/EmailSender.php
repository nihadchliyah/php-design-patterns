<?php
require_once '../common/Produit.php';
require_once 'Observateur.php';

class EmailSender implements Observateur
{
    private string $destinataire;

    public function __construct(string $destinataire)
    {
        $this->destinataire = $destinataire;
    }

    public function actualiser(Produit $produit, string $evenement): void
    {
        echo nl2br("[EMAIL -> {$this->destinataire}] Evenement : $evenement | Produit : \"{$produit->libelle}\" | Prix : {$produit->prix} €\n");
    }
}
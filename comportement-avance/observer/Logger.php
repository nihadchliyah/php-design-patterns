<?php
require_once '../common/Produit.php';
require_once 'Observateur.php';

class Logger implements Observateur
{
    public function actualiser(Produit $produit, string $evenement): void
    {
        $date = date('Y-m-d H:i:s');
        echo nl2br("[LOG][$date] $evenement | \"{$produit->libelle}\" | Prix: {$produit->prix} € | Stock: {$produit->stock}\n");
    }
}
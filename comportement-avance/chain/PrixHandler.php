<?php
require_once 'Handler.php';

class PrixHandler extends Handler
{
    public function traiter(Produit $produit): void
    {
        if ($produit->prix <= 0) {
            echo nl2br("Prix invalide : {$produit->prix} €\n");
            return;
        }
        echo nl2br("Prix : {$produit->prix} €\n");
        $this->suivant?->traiter($produit);
    }
}

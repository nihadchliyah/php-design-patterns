<?php
require_once 'Handler.php';

class LibelleHandler extends Handler
{
    public function traiter(Produit $produit): void
    {
        if (empty($produit->libelle)) {
            echo nl2br("Libellé invalide.\n");
            return;
        }
        echo nl2br("Libellé : {$produit->libelle}\n");
        $this->suivant?->traiter($produit);
    }
}

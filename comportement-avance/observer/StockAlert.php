<?php
require_once '../common/Produit.php';
require_once 'Observateur.php';

class StockAlert implements Observateur
{
    private int $seuilMinimum;

    public function __construct(int $seuilMinimum = 5)
    {
        $this->seuilMinimum = $seuilMinimum;
    }

    public function actualiser(Produit $produit, string $evenement): void
    {
        $evenementsStock = ['AJOUT', 'MODIFICATION_STOCK', 'RUPTURE_STOCK'];

        if (!in_array($evenement, $evenementsStock, true)) {
            return;
        }

        $statut = $produit->stock === 0
            ? 'RUPTURE TOTALE'
            : ($produit->stock <= $this->seuilMinimum ? 'STOCK BAS' : 'Stock OK');

        echo nl2br("[ALERTE STOCK] \"{$produit->libelle}\" : {$produit->stock} unite(s) — $statut (seuil: {$this->seuilMinimum})\n");
    }
}

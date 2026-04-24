<?php
require_once '../common/Produit.php';
require_once 'Commande.php';

class AjouterProduitCommande implements Commande
{
    private Produit $produit;

    public function __construct(Produit $produit)
    {
        $this->produit = $produit;
    }

    public function executer(): void
    {
        echo nl2br(" Produit ajouté : {$this->produit->libelle} —> {$this->produit->prix} €\n");
    }
}

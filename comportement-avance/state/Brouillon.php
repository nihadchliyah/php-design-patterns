<?php
require_once 'Etat.php';
require_once 'Publie.php';

class Brouillon implements Etat
{
    public function publier($produit): void
    {
        echo nl2br("  Etat : Brouillon -> publication en cours...\n");
        $produit->setEtat(new Publie());
        echo nl2br("  Etat : passage à Publié.\n");
    }
}

<?php
require_once 'Etat.php';

class Publie implements Etat
{
    public function publier($produit): void
    {
        echo nl2br("  Etat : déjà Publié.\n");
    }
}

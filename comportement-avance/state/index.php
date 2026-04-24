<?php
require_once 'ProduitEtat.php';

/*
 * PATTERN : State
 * ----------------
 * Le comportement de ProduitEtat change selon son état interne.
 * Chaque état gère lui-même la transition vers le suivant.
 */

$produit = new ProduitEtat();

echo nl2br("====== Scénario 1 : Publier un brouillon ======\n\n");
echo nl2br("  Etat actuel : " . $produit->getEtat() . "\n");
$produit->publier();
echo nl2br("  Etat actuel : " . $produit->getEtat() . "\n");
echo nl2br("\n");

echo nl2br("====== Scénario 2 : Publier un produit déjà publié ======\n\n");
echo nl2br("  Etat actuel : " . $produit->getEtat() . "\n");
$produit->publier();
echo nl2br("\n");

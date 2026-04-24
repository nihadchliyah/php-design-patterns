<?php
require_once '../common/Produit.php';
require_once 'PrixHandler.php';
require_once 'LibelleHandler.php';

/*
 * PATTERN : Chain of Responsibility
 * -----------------------------------
 * Chaque Handler valide une règle et passe au suivant si tout est correct.
 * La chaîne s'arrête dès qu'une validation échoue.
 */
$prixHandler    = new PrixHandler();
$libelleHandler = new LibelleHandler();

$prixHandler->setSuivant($libelleHandler);

echo nl2br("====== Scénario 1 : Produit valide ======\n\n");
$prixHandler->traiter(new Produit(1, 'PC Dell XPS', 1199.99, 10));
echo nl2br("\n");

echo nl2br("====== Scénario 2 : Prix invalide ======\n\n");
$prixHandler->traiter(new Produit(2, 'Produit test', -50.00));
echo nl2br("\n");

echo nl2br("====== Scénario 3 : Libellé vide ======\n\n");
$prixHandler->traiter(new Produit(3, '', 299.00));
echo nl2br("\n");

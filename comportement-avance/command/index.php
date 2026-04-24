<?php
require_once 'AjouterProduitCommande.php';
require_once 'Invoker.php';

/*
 * PATTERN : Command
 * ------------------
 * Chaque action est encapsulée dans un objet Commande.
 * L'Invoker exécute les commandes sans connaître leur logique interne.
 */

$invoker = new Invoker();



echo nl2br("====== Scénario 1 : Ajout de produits ======\n\n");

$invoker->executerCommande(new AjouterProduitCommande(new Produit(1, 'PC Dell XPS',      1199.99, 10)));
$invoker->executerCommande(new AjouterProduitCommande(new Produit(2, 'iPhone 16 Pro',    1299.00,  5)));
$invoker->executerCommande(new AjouterProduitCommande(new Produit(3, 'Samsung Galaxy S25', 899.00, 8)));

echo nl2br("\n");


echo nl2br("====== Scénario 2 : Historique ======\n\n");
echo nl2br("  " . $invoker->nbCommandes() . " commande(s) enregistrée(s) dans l'historique.\n\n");

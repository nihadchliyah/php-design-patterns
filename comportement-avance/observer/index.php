<?php
require_once '../common/Produit.php';
require_once 'Observateur.php';
require_once 'Sujet.php';
require_once 'ProduitSujet.php';
require_once 'Logger.php';
require_once 'EmailSender.php';
require_once 'SmsSender.php';
require_once 'StockAlert.php';

/*
 * PATTERN : Observer
 * -------------------
 * Un sujet (ProduitSujet) maintient une liste d'observateurs.
 * Chaque modification du produit déclenche une notification automatique
 * vers tous les abonnés (Logger, EmailSender, SmsSender, StockAlert).
 */

// ── Observateurs ────────────────────────────────────────────────────────────

$logger     = new Logger();
$email      = new EmailSender('admin@boutique.fr');
$sms        = new SmsSender('+33 6 12 34 56 78');
$stockAlert = new StockAlert(seuilMinimum: 3);


echo nl2br("====== Scenario 1 : Ajout d'un produit ======\n\n");

$sujet = new ProduitSujet();
$sujet->abonner($logger);
$sujet->abonner($email);
$sujet->abonner($sms);
$sujet->abonner($stockAlert);

$sujet->ajouterProduit(new Produit(1, 'PC Dell XPS', 1199.99, 10));

echo nl2br("\n");



echo nl2br("====== Scenario 2 : Modification du prix ======\n\n");

$sujet->modifierPrix(999.99);

echo nl2br("\n");


echo nl2br("====== Scenario 3 : Stock faible (sous le seuil) ======\n\n");

$sujet->modifierStock(2);

echo nl2br("\n");



echo nl2br("====== Scenario 4 : Rupture de stock ======\n\n");

$sujet->modifierStock(0);

echo nl2br("\n");



echo nl2br("====== Scenario 5 : Desabonnement du SMS, puis restock ======\n\n");

$sujet->desabonner($sms);
$sujet->modifierStock(20);

echo nl2br("\n");



echo nl2br("====== Scenario 6 : Nouveau produit (Telephone) ======\n\n");

$sujet2 = new ProduitSujet();
$sujet2->abonner($logger);
$sujet2->abonner(new EmailSender('stock@boutique.fr'));
$sujet2->abonner(new StockAlert(seuilMinimum: 5));

$sujet2->ajouterProduit(new Produit(2, 'iPhone 16 Pro', 1299.00, 4));
$sujet2->modifierPrix(1199.00);

echo nl2br("\n");



echo nl2br("====== Scenario 7 : Suppression du produit ======\n\n");

$sujet2->supprimerProduit();

echo nl2br("\n");
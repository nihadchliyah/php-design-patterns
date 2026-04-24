<?php
require_once 'StrategieTVA.php';
require_once 'StrategiePromo.php';
require_once 'CalculateurPrix.php';

/*
 * PATTERN : Strategy
 * -------------------
 * Le CalculateurPrix délègue le calcul à une StrategiePrix interchangeable.
 * On peut changer la stratégie à la volée sans modifier la classe contexte.
 */

$prixBase = 100.00;
$calc     = new CalculateurPrix(new StrategiePromo());



echo nl2br("====== Scénario 1 : Prix promotionnel (-20%) ======\n\n");
echo nl2br("Prix de base  : {$prixBase} €\n");
echo nl2br("Prix après promo : " . $calc->calculer($prixBase) . " €\n\n");




echo nl2br("====== Scénario 2 : Prix avec TVA (+20%) ======\n\n");
$calc->setStrategie(new StrategieTVA());
echo nl2br("Prix de base  : {$prixBase} €\n");
echo nl2br("Prix avec TVA : " . $calc->calculer($prixBase) . " €\n\n");

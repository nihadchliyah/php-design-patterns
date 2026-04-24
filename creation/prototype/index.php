<?php
require_once '../common/product.php';

/*
 * PATTERN : Prototype
 * --------------------
 * Crée de nouveaux objets en clonant un prototype existant
 * au lieu d'instancier depuis zéro.
 */
class ProductPrototype extends Product
{
    public function __clone() {}
}

// ── Exemple d'utilisation ───────────────────────────────────────────────────

echo "=== Prototype ===\n\n";

// Prototype de base (le modèle)
$prototype = new ProductPrototype(1, 'Livre PHP', 29.99);

echo "Prototype original :\n";
$prototype->display();

// Clone 1 : même prix, libellé différent
$product2 = clone $prototype;
$product2->id      = 2;
$product2->libelle = 'Livre JavaScript';
echo "Clone 1 :\n";
$product2->display();

// Clone 2 : nouveau produit, prix différent
$product3 = clone $prototype;
$product3->id      = 3;
$product3->libelle = 'Livre Python';
$product3->prix    = 24.99;
echo "Clone 2 :\n";
$product3->display();

// Clone 3 : à partir du clone 2 (prototype d'un téléphone)
$phonePrototype = new ProductPrototype(10, 'Téléphone Samsung', 499.99);

$phone2 = clone $phonePrototype;
$phone2->id      = 11;
$phone2->libelle = 'Téléphone iPhone';
$phone2->prix    = 899.99;

$phone3 = clone $phonePrototype;
$phone3->id      = 12;
$phone3->libelle = 'Téléphone Huawei';
$phone3->prix    = 349.99;

echo nl2br("Prototype téléphone :\n");
$phonePrototype->display();

echo nl2br("Clone téléphone 1 :\n");
$phone2->display();

echo nl2br("Clone téléphone 2 :\n");
$phone3->display();

// Vérification : les clones sont des objets indépendants
echo nl2br("Même objet ? " . ($prototype === $product2 ? "OUI" : "NON") . "\n");

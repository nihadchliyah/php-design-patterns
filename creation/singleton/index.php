<?php
require_once '../common/product.php';

/*
 * PATTERN : Singleton
 * --------------------
 * Garantit qu'une classe n'a qu'UNE SEULE instance
 * et fournit un point d'accès global à cette instance.
 */
class ProductSingleton
{
    private static ?ProductSingleton $instance = null;

    public Product $product;

    private function __construct()
    {
        $this->product = new Product(1, 'Produit Unique', 100.00);
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new ProductSingleton();
        }
        return self::$instance;
    }

    private function __clone() {}
}

echo nl2br("=== Singleton ===\n\n");

$instance1 = ProductSingleton::getInstance();
echo nl2br("Instance 1 :\n");
$instance1->product->display();

$instance2 = ProductSingleton::getInstance();
echo nl2br( "Instance 2 :\n");
$instance2->product->display();

$instance3 = ProductSingleton::getInstance();
echo nl2br("Instance 3 :\n");
$instance3->product->display();

echo nl2br( "\nModification du produit via instance2 :\n");
$instance2->product->libelle = 'Produit Modifié';
$instance2->product->prix    = 250.00;

echo nl2br ("Après modification — Instance 1 :\n");
$instance1->product->display();

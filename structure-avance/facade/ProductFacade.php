<?php
require_once '../common/Product.php';

/*
 * PATTERN : Facade
 * -----------------
 * Fournit une interface simplifiée à un sous-système complexe.
 * Ici : création et affichage d'un produit via une seule classe.
 */
class ProductFacade
{
    public function createProduct(): Product
    {
        return new Product(1, "Clavier Facade", 70);
    }

    public function show(Product $p): string
    {
        return $p->getInfo();
    }
}

echo nl2br("=== Facade ===\n\n");

$facade  = new ProductFacade();
$product = $facade->createProduct();
echo nl2br($facade->show($product) . "\n");

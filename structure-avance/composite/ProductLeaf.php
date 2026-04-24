<?php
require_once '../common/Product.php';
require_once "ProductComponent.php";

/*
 * PATTERN : Composite — Feuille
 * --------------------------------
 * Représente un produit individuel dans l'arbre composite.
 */
class ProductLeaf implements ProductComponent
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getInfo(): string
    {
        return $this->product->getInfo();
    }
}

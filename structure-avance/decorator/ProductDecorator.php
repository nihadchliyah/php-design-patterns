<?php
require_once '../common/product.php';

/*
 * PATTERN : Decorator (classe de base)
 * --------------------------------------
 * Enveloppe un objet Product pour pouvoir y ajouter
 * des comportements supplémentaires dynamiquement.
 */
class ProductDecorator
{
    public $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getInfo(): string
    {
        return $this->product->getInfo();
    }
}

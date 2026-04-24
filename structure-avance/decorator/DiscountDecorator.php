<?php
require_once "ProductDecorator.php";

/*
 * PATTERN : Decorator — DiscountDecorator
 * -----------------------------------------
 * Ajoute dynamiquement une remise à un produit
 * sans modifier la classe Product d'origine.
 */
class DiscountDecorator extends ProductDecorator
{
    public $discount;

    public function __construct(Product $product, float $discount)
    {
        parent::__construct($product);
        $this->discount = $discount;
    }

    public function getInfo(): string
    {
        $newPrice = $this->product->prix - $this->discount;
        return "{$this->product->id} - {$this->product->libelle} - {$newPrice}€ (promo)";
    }
}



echo nl2br("=== Decorator ===\n\n");


$product1 = new Product(1, "Souris", 30);
$promo1   = new DiscountDecorator($product1, 5);
echo nl2br($promo1->getInfo() . "\n");
$product2 = new Product(2, "Ordinateur Dell", 1199.99);
$promo2   = new DiscountDecorator($product2, 100);
echo nl2br($promo2->getInfo() . "\n");


$product3 = new Product(3, "Casque Sony", 89.99);
$promo3   = new DiscountDecorator($product3, 10);
echo nl2br($promo3->getInfo() . "\n");

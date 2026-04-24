<?php
require_once '../common/product.php';

/*
 * PATTERN : Adapter
 * ------------------
 * Convertit une interface incompatible en une interface attendue.
 * Ici : un tableau associatif externe est converti en objet Product.
 */
class ProductAdapter
{
    public static function fromArray(array $data): Product
    {
        return new Product(
            $data['id'],
            $data['name'],
            $data['price']
        );
    }
}

// ── Exemples d'utilisation ──────────────────────────────────────────────────

echo nl2br("=== Adapter ===\n\n");

$products = [
    ["id" => 1, "name" => "Clavier",  "price" => 50.00],
    ["id" => 2, "name" => "Souris",   "price" => 25.00],
    ["id" => 3, "name" => "Écran",    "price" => 199.00],
    ["id" => 4, "name" => "Casque",   "price" => 89.00],
    ["id" => 5, "name" => "Webcam",   "price" => 60.00],
];

foreach ($products as $data) {
    $product = ProductAdapter::fromArray($data);
    echo nl2br($product->getInfo() . "\n");
}

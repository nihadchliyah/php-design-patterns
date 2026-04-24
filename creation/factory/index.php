<?php
require_once '../common/product.php';

/*
 * PATTERN : Factory Method
 * --------------------------
 * Une seule classe statique qui décide quel produit créer
 * selon le type passé en paramètre.
 */
class ProductFactory
{
    public static function create(string $type): Product
    {
        switch ($type) {
            case 'book':
                return new Product(1, 'Livre PHP', 29.99);
            case 'phone':
                return new Product(2, 'Téléphone Samsung', 499.99);
            case 'laptop':
                return new Product(3, 'Ordinateur Dell', 1199.99);
            case 'tablet':
                return new Product(4, 'Tablette iPad', 349.99);
            case 'headphones':
                return new Product(5, 'Casque Sony', 89.99);
            default:
                throw new Exception("Type de produit inconnu : \"$type\"");
        }
    }
}

// ── Exemples d'utilisation ──────────────────────────────────────────────────

echo nl2br(" ====== Factory Method ======\n\n");

$types = ['book', 'phone', 'laptop', 'tablet', 'headphones'];

foreach ($types as $type) {
    echo nl2br("Produit créé ($type) :\n");
    ProductFactory::create($type)->display();
}

// Exemple avec un type inconnu (exception)
echo nl2br("Test type inconnu :\n");
try {
    ProductFactory::create('unknown');
} catch (Exception $e) {
    echo "  Erreur : " . $e->getMessage() . "\n";
}

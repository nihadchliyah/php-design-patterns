<?php
require_once '../common/product.php';

/*
 * PATTERN : Abstract Factory
 * ----------------------------
 * Différence avec Factory Method :
 *   → L'Abstract Factory crée une FAMILLE de produits liés.
 *   → Chaque factory concrète (FR, US, MA) produit PLUSIEURS types
 *     d'objets cohérents entre eux (livre + téléphone + ordinateur).
 */

// Interface commune : définit les produits que chaque factory doit créer
interface AbstractProductFactory
{
    public function createBook(): Product;
    public function createPhone(): Product;
    public function createLaptop(): Product;
    public function createHeadphones(): Product;
}

// ── Factory France ──────────────────────────────────────────────────────────
class FrenchFactory implements AbstractProductFactory
{
    public function createBook(): Product
    {
        return new Product(1, 'Livre PHP (FR)', 29.99);
    }

    public function createPhone(): Product
    {
        return new Product(2, 'Téléphone Samsung (FR)', 499.99);
    }

    public function createLaptop(): Product
    {
        return new Product(3, 'Ordinateur Dell (FR)', 1199.99);
    }

    public function createHeadphones(): Product
    {
        return new Product(4, 'Casque Sony (FR)', 89.99);
    }
}

// ── Factory USA ─────────────────────────────────────────────────────────────
class USFactory implements AbstractProductFactory
{
    public function createBook(): Product
    {
        return new Product(5, 'PHP Book (US)', 24.99);
    }

    public function createPhone(): Product
    {
        return new Product(6, 'iPhone (US)', 899.99);
    }

    public function createLaptop(): Product
    {
        return new Product(7, 'MacBook (US)', 1499.99);
    }

    public function createHeadphones(): Product
    {
        return new Product(8, 'AirPods (US)', 129.99);
    }
}

// ── Factory Maroc ───────────────────────────────────────────────────────────
class MAFactory implements AbstractProductFactory
{
    public function createBook(): Product
    {
        return new Product(9, 'كتاب PHP (MA)', 199.00);
    }

    public function createPhone(): Product
    {
        return new Product(10, 'هاتف سامسونج (MA)', 4500.00);
    }

    public function createLaptop(): Product
    {
        return new Product(11, 'حاسوب ديل (MA)', 11000.00);
    }

    public function createHeadphones(): Product
    {
        return new Product(12, 'سماعة سوني (MA)', 850.00);
    }
}

// ── Fonction utilitaire pour afficher tous les produits d'une factory ───────
function showCatalog(AbstractProductFactory $factory, string $region): void
{
    echo nl2br( "=== Catalogue $region ===\n");
    $factory->createBook()->display();
    $factory->createPhone()->display();
    $factory->createLaptop()->display();
    $factory->createHeadphones()->display();
    echo nl2br("\n");
}

// ── Exemples d'utilisation ──────────────────────────────────────────────────
showCatalog(new FrenchFactory(), 'France 🇫🇷');
showCatalog(new USFactory(),     'USA 🇺🇸');
showCatalog(new MAFactory(),     'Maroc 🇲🇦');

// Exemple : changer de région dynamiquement
echo nl2br("=== Changement dynamique de région ===\n");

$region   = 'US'; // simuler un paramètre de config
$factory  = match ($region) {
    'FR'  => new FrenchFactory(),
    'US'  => new USFactory(),
    'MA'  => new MAFactory(),
    default => throw new Exception("Région inconnue"),
};

echo nl2br("Téléphone pour la région $region :\n");
$factory->createPhone()->display();

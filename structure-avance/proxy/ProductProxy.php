<?php
require_once '../common/Product.php';

/*
 * PATTERN : Proxy
 * ----------------
 * Fournit un substitut à un objet réel.
 * Ici : chargement paresseux (lazy loading) — le produit n'est
 * chargé depuis la base de données qu'au premier accès.
 */
class ProductProxy
{
    private $product = null;
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    private function load(): Product
    {
        return new Product($this->id, "Produit DB", 99.99);
    }

    public function getProduct(): Product
    {
        if ($this->product === null) {
            $this->product = $this->load();
        }
        return $this->product;
    }
}

echo nl2br("=== Proxy  ===\n\n");

$proxy = new ProductProxy(10);
echo nl2br("Premier accès (chargement) :\n");
echo nl2br($proxy->getProduct()->getInfo() . "\n\n");

echo nl2br("Second accès (déjà en mémoire) :\n");
echo nl2br($proxy->getProduct()->getInfo() . "\n\n");

echo nl2br("Autre proxy (id 42) :\n");
$proxy2 = new ProductProxy(42);
echo nl2br($proxy2->getProduct()->getInfo() . "\n");

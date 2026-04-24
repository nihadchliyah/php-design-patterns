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
        // simulation base de données
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

// ── Exemples d'utilisation ──────────────────────────────────────────────────

echo nl2br("=== Proxy  ===\n\n");

// Exemple 1 : premier accès → charge le produit depuis la "BDD"
$proxy = new ProductProxy(10);
echo nl2br("Premier accès (chargement) :\n");
echo nl2br($proxy->getProduct()->getInfo() . "\n\n");

// Exemple 2 : second appel sur le même proxy → retourne l'instance déjà en mémoire
echo nl2br("Second accès (déjà en mémoire) :\n");
echo nl2br($proxy->getProduct()->getInfo() . "\n\n");

// Exemple 3 : autre proxy avec un id différent
echo nl2br("Autre proxy (id 42) :\n");
$proxy2 = new ProductProxy(42);
echo nl2br($proxy2->getProduct()->getInfo() . "\n");

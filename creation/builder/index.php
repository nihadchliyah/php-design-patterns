<?php
require_once '../common/product.php';

/*
 * PATTERN : Builder
 * ------------------
 * Permet de construire un objet étape par étape
 * grâce au chaînage de méthodes (fluent interface).
 */
class ProductBuilder
{
    private int    $id      = 0;
    private string $libelle = '';
    private float  $prix    = 0.0;

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;
        return $this;
    }

    public function setPrix(float $prix): self  // ← méthode manquante ajoutée
    {
        $this->prix = $prix;
        return $this;
    }

    public function build(): Product  // ← méthode manquante ajoutée
    {
        return new Product($this->id, $this->libelle, $this->prix);
    }
}

// ── Exemples d'utilisation ──────────────────────────────────────────────────

echo nl2br("=== Builder ===\n\n");

// Exemple 1 : Livre
echo nl2br("Produit 1 — Livre :\n");
$book = (new ProductBuilder())
    ->setId(1)
    ->setLibelle('Livre PHP Moderne')
    ->setPrix(29.99)
    ->build();
$book->display();

// Exemple 2 : Téléphone
echo nl2br( "Produit 2 — Téléphone :\n");
$phone = (new ProductBuilder())
    ->setId(2)
    ->setLibelle('Téléphone Samsung Galaxy')
    ->setPrix(499.99)
    ->build();
$phone->display();

// Exemple 3 : Ordinateur portable
echo nl2br("Produit 3 — Ordinateur :\n");
$laptop = (new ProductBuilder())
    ->setId(3)
    ->setLibelle('Ordinateur Dell XPS')
    ->setPrix(1199.99)
    ->build();
$laptop->display();

// Exemple 4 : Tablette
echo nl2br("Produit 4 — Tablette :\n");
$tablet = (new ProductBuilder())
    ->setId(4)
    ->setLibelle('Tablette iPad Pro')
    ->setPrix(349.99)
    ->build();
$tablet->display();

// Exemple 5 : Casque audio
echo nl2br("Produit 5 — Casque :\n");
$headphones = (new ProductBuilder())
    ->setId(5)
    ->setLibelle('Casque Sony WH-1000XM5')
    ->setPrix(89.99)
    ->build();
$headphones->display();


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

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;
        return $this;
    }

    public function build(): Product
    {
        return new Product($this->id, $this->libelle, $this->prix);
    }
}

echo nl2br("=== Builder ===\n\n");
echo nl2br("Produit 1 — Livre :\n");
$book = (new ProductBuilder())
    ->setId(1)
    ->setLibelle('Livre PHP Moderne')
    ->setPrix(29.99)
    ->build();
$book->display();

echo nl2br( "Produit 2 — Téléphone :\n");
$phone = (new ProductBuilder())
    ->setId(2)
    ->setLibelle('Téléphone Samsung Galaxy')
    ->setPrix(499.99)
    ->build();
$phone->display();

echo nl2br("Produit 3 — Ordinateur :\n");
$laptop = (new ProductBuilder())
    ->setId(3)
    ->setLibelle('Ordinateur Dell XPS')
    ->setPrix(1199.99)
    ->build();
$laptop->display();

echo nl2br("Produit 4 — Tablette :\n");
$tablet = (new ProductBuilder())
    ->setId(4)
    ->setLibelle('Tablette iPad Pro')
    ->setPrix(349.99)
    ->build();
$tablet->display();

echo nl2br("Produit 5 — Casque :\n");
$headphones = (new ProductBuilder())
    ->setId(5)
    ->setLibelle('Casque Sony WH-1000XM5')
    ->setPrix(89.99)
    ->build();
$headphones->display();


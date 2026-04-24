<?php
require_once "ProductComponent.php";
require_once '../common/Product.php';
require_once "ProductLeaf.php";

/*
 * PATTERN : Composite
 * ---------------------
 * Permet de traiter un groupe de produits exactement comme
 * un produit individuel. Les groupes peuvent être imbriqués.
 */
class ProductComposite implements ProductComponent
{
    private $children = [];

    public function add(ProductComponent $p): void
    {
        $this->children[] = $p;
    }

    public function getInfo(): string
    {
        $result = "Groupe:\n";
        foreach ($this->children as $child) {
            $result .= "- " . $child->getInfo() . "\n";
        }
        return $result;
    }
}

// ── Exemples d'utilisation ──────────────────────────────────────────────────

echo nl2br("=== Composite ===\n\n");

// Exemple 1 : groupe simple
echo nl2br("-- Groupe simple --\n");
$p1    = new Product(1, "Clavier", 50);
$p2    = new Product(2, "Souris",  20);
$leaf1 = new ProductLeaf($p1);
$leaf2 = new ProductLeaf($p2);

$group = new ProductComposite();
$group->add($leaf1);
$group->add($leaf2);
echo nl2br($group->getInfo() . "\n");

// Exemple 2 : groupes imbriqués (composite dans un composite)
echo nl2br("-- Groupes imbriqués --\n");
$p3    = new Product(3, "Écran",   199);
$p4    = new Product(4, "Webcam",   60);
$leaf3 = new ProductLeaf($p3);
$leaf4 = new ProductLeaf($p4);

$group2 = new ProductComposite();
$group2->add($leaf3);
$group2->add($leaf4);

$groupPrincipal = new ProductComposite();
$groupPrincipal->add($group);
$groupPrincipal->add($group2);
echo nl2br($groupPrincipal->getInfo());

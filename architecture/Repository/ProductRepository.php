<?php
require_once '../common/Product.php';

class ProductRepository
{
    private array $data = [
        1 => ["id" => 1, "libelle" => "Clavier", "prix" => 50],
        2 => ["id" => 2, "libelle" => "Souris",  "prix" => 30],
    ];

    public function findById(int $id): ?Product
    {
        if (!isset($this->data[$id])) {
            return null;
        }

        $p = $this->data[$id];
        return new Product($p['id'], $p['libelle'], $p['prix']);
    }
}
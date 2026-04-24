<?php
require_once '../repository/ProductRepository.php';

class ProductService
{
    private ProductRepository $repo;

    public function __construct()
    {
        $this->repo = new ProductRepository();
    }

    public function getPrixTTC(int $id): ?float
    {
        $product = $this->repo->findById($id);

        if (!$product) {
            return null;
        }

        return $product->prix * 1.2;
    }
}
<?php
require_once '../repository/ProductRepository.php';
require_once 'ProductDTO.php';

class ProductService
{
    private ProductRepository $repo;

    public function __construct()
    {
        $this->repo = new ProductRepository();
    }

    public function getProductDTO(int $id): ?ProductDTO
    {
        $product = $this->repo->findById($id);

        if (!$product) {
            return null;
        }

        return new ProductDTO($product->id, $product->libelle, $product->prix);
    }
}
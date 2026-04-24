<?php
require_once 'ProductRepository.php';

$repo    = new ProductRepository();
$product = $repo->findById(1);
$product->display();
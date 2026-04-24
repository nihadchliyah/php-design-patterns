<?php
require_once 'ProductService.php';
$service = new ProductService();
echo $service->getPrixTTC(1);
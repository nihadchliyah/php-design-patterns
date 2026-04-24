<?php
class ProductDTO
{
    public int    $id;
    public string $libelle;
    public float  $prix;

    public function __construct(int $id, string $libelle, float $prix)
    {
        $this->id      = $id;
        $this->libelle = $libelle;
        $this->prix    = $prix;
    }
}
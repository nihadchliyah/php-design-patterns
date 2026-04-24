<?php

class Produit
{
    public int    $id;
    public string $libelle;
    public float  $prix;
    public int    $stock;

    public function __construct(int $id, string $libelle, float $prix, int $stock = 0)
    {
        $this->id      = $id;
        $this->libelle = $libelle;
        $this->prix    = $prix;
        $this->stock   = $stock;
    }

    public function display(): void
    {
        echo nl2br("  ID      : {$this->id}\n");
        echo nl2br("  Libellé : {$this->libelle}\n");
        echo nl2br("  Prix    : {$this->prix} €\n");
        echo nl2br("  Stock   : {$this->stock} unité(s)\n");
        echo nl2br("  ---\n");
    }
}
<?php

class Product
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

    public function display(): void
    {
        echo nl2br("  ID      : {$this->id}\n");
        echo nl2br( "  Libellé : {$this->libelle}\n");
        echo nl2br("  Prix    : {$this->prix} €\n");
        echo nl2br("  ---\n");
    }
}

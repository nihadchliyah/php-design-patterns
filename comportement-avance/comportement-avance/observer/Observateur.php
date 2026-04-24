<?php

interface Observateur
{
    public function actualiser(Produit $produit, string $evenement): void;
}
<?php
require_once 'StrategiePrix.php';

class StrategieTVA implements StrategiePrix
{
    public function calculer(float $prix): float
    {
        return $prix * 1.2; // +20% TVA
    }
}

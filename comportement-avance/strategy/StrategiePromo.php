<?php
require_once 'StrategiePrix.php';

class StrategiePromo implements StrategiePrix
{
    public function calculer(float $prix): float
    {
        return $prix * 0.8; // -20%
    }
}

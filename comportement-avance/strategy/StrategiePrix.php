<?php
interface StrategiePrix
{
    public function calculer(float $prix): float;
}

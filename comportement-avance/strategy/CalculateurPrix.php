<?php
require_once 'StrategiePrix.php';

class CalculateurPrix
{
    private StrategiePrix $strategie;

    public function __construct(StrategiePrix $strategie)
    {
        $this->strategie = $strategie;
    }

    public function setStrategie(StrategiePrix $strategie): void
    {
        $this->strategie = $strategie;
    }

    public function calculer(float $prix): float
    {
        return $this->strategie->calculer($prix);
    }
}
